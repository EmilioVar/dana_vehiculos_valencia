<?php

use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resources([
    'matriculas' => MatriculaController::class
]);

require __DIR__.'/auth.php';
