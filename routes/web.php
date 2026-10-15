<?php

use App\Http\Controllers\PetReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PetReportController::class, 'index'])->name('home');
Route::get('/pets', [PetReportController::class, 'index'])->name('pets.index');

Route::middleware('editor')->group(function (): void {
    Route::get('/pets/create', [PetReportController::class, 'create'])->name('pets.create');
    Route::post('/pets', [PetReportController::class, 'store'])->name('pets.store');
    Route::get('/pets/{pet}/edit', [PetReportController::class, 'edit'])->whereNumber('pet')->name('pets.edit');
    Route::put('/pets/{pet}', [PetReportController::class, 'update'])->whereNumber('pet')->name('pets.update');
    Route::delete('/pets/{pet}', [PetReportController::class, 'destroy'])->whereNumber('pet')->name('pets.destroy');
});

Route::get('/pets/{pet}', [PetReportController::class, 'show'])->whereNumber('pet')->name('pets.show');
