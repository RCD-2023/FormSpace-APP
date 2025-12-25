<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\FormController;





//Ruta catre pagina generala de start (aceasta duce direct la login)
Route::get('/', [HomePageController::class, 'index'])->name('homepage');

//Route admin only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


//Route groups protected by 'quest'
Route::middleware('guest')->group(function () {
    // Rute pentru login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});


//Ruta pentru logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Rutele pentru paginile din forms
Route::get('/entries', [FormController::class, 'index'])->name('entries.index')->middleware('auth');
Route::get('/entries/create', [FormController::class, 'create'])->name('entries.create')->middleware('auth');;
Route::post('/entries', [FormController::class, 'store'])->name('entries.store');

// Route::get('/entries/{entry}', [FormController::class, 'show'])->name('forms.show');
Route::get('/entries/{entry}/edit', [FormController::class, 'edit'])->name('forms.edit')->middleware('auth');;
Route::put('/entries/{entry}', [FormController::class, 'update'])->name('forms.update')->middleware('auth');;
Route::delete('/entries/{entry}', [FormController::class, 'destroy'])->name('forms.destroy')->middleware('auth');;
