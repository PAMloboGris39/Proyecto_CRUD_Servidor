<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('alumnos', AlumnoController::class);
});

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['es', 'en', 'fr'])) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('lang.switch');


require __DIR__.'/auth.php';
