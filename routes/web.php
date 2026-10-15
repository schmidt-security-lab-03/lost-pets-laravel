<?php

use App\Http\Controllers\PetReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PetReportController::class, 'index'])->name('home');
Route::get('/animais', [PetReportController::class, 'index'])->name('pets.index');

Route::middleware('editor')->group(function (): void {
    Route::get('/animais/novo', [PetReportController::class, 'create'])->name('pets.create');
    Route::post('/animais', [PetReportController::class, 'store'])->name('pets.store');
    Route::get('/animais/{pet}/editar', [PetReportController::class, 'edit'])->whereNumber('pet')->name('pets.edit');
    Route::put('/animais/{pet}', [PetReportController::class, 'update'])->whereNumber('pet')->name('pets.update');
    Route::delete('/animais/{pet}', [PetReportController::class, 'destroy'])->whereNumber('pet')->name('pets.destroy');
});

Route::get('/animais/{pet}', [PetReportController::class, 'show'])->whereNumber('pet')->name('pets.show');
