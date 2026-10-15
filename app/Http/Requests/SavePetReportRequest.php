<?php

namespace App\Http\Requests;

use App\Models\PetReport;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SavePetReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        // The editor middleware authenticates these routes before this request.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'species' => ['required', Rule::in(array_keys(PetReport::SPECIES))],
            'breed' => ['nullable', 'string', 'max:100'],
            'color' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:120'],
            'neighborhood' => ['required', 'string', 'max:120'],
            'last_seen_at' => ['required', 'date', 'before_or_equal:today'],
            'description' => ['required', 'string', 'min:10', 'max:3000'],
            'status' => ['required', Rule::in(array_keys(PetReport::STATUSES))],
        ];
    }

    public function attributes(): array
    {
        return ['name' => 'name', 'species' => 'species', 'breed' => 'breed', 'color' => 'color', 'city' => 'city', 'neighborhood' => 'neighborhood', 'last_seen_at' => 'incident date', 'description' => 'description', 'status' => 'status'];
    }
}
