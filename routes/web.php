<?php

use App\Http\Controllers\AvistamientoController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('consultar-estado-busqueda', function() {
    //
})->name('consultar-estado-busqueda');

Route::resources([
    'matriculas' => MatriculaController::class,
    'avistamientos' => AvistamientoController::class
]);

route::get('politica-de-privacidad', function() {
    return view('politica-de-privacidad');
});

Route::get('matricula-status', function() {
    return view('matriculas.status.index');
})->name('matricula.status');

require __DIR__.'/auth.php';
