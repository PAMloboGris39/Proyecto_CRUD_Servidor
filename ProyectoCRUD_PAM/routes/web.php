<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;

// Página principal (main) - la que usará el logo y el link "Inicio"
Route::get('/', [HomeController::class, 'index'])->name('main');

// Dashboard de Breeze (opcional)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Proyectos
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

    // CRUD Alumnos
    Route::resource('alumnos', AlumnoController::class);
});

// Cambio de idioma (persistente en sesión)
Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['es', 'en', 'fr'])) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('lang.switch');

require __DIR__.'/auth.php';
