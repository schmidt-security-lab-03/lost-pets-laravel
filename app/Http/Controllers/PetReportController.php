<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePetReportRequest;
use App\Models\PetReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PetReportController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:120'],
            'species' => ['nullable', 'in:dog,cat,other'],
            'status' => ['nullable', 'in:lost,found,reunited'],
        ]);

        $query = PetReport::query()->latest('last_seen_at')->latest('id');
        if (! empty($filters['q'])) {
            $term = '%'.$filters['q'].'%';
            $query->where(fn ($q) => $q->where('name', 'like', $term)->orWhere('description', 'like', $term)->orWhere('neighborhood', 'like', $term));
        }
        foreach (['city', 'species', 'status'] as $filter) {
            if (! empty($filters[$filter])) {
                $query->where($filter, $filters[$filter]);
            }
        }

        return view('pets.index', [
            'reports' => $query->paginate(12)->withQueryString(),
            'cities' => PetReport::query()->distinct()->orderBy('city')->pluck('city'),
            'filters' => $filters,
            'openCount' => PetReport::whereIn('status', ['lost', 'found'])->count(),
            'reunitedCount' => PetReport::where('status', 'reunited')->count(),
        ]);
    }

    public function show(PetReport $pet): View
    {
        return view('pets.show', ['pet' => $pet]);
    }

    public function create(): View
    {
        return view('pets.form', ['pet' => new PetReport(['status' => 'lost', 'species' => 'dog', 'last_seen_at' => today()])]);
    }

    public function store(SavePetReportRequest $request): RedirectResponse
    {
        $pet = PetReport::create($request->validated());
        return redirect()->route('pets.show', $pet)->with('status', 'Aviso cadastrado.');
    }

    public function edit(PetReport $pet): View
    {
        return view('pets.form', ['pet' => $pet]);
    }

    public function update(SavePetReportRequest $request, PetReport $pet): RedirectResponse
    {
        $pet->update($request->validated());
        return redirect()->route('pets.show', $pet)->with('status', 'Aviso atualizado.');
    }

    public function destroy(PetReport $pet): RedirectResponse
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('status', 'Aviso removido.');
    }
}
