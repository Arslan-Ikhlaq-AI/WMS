<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Guest routes (only for users who are NOT logged in)
|--------------------------------------------------------------------------
| The 'guest' middleware redirects already-authenticated users away from
| the login page (to /dashboard by default).
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated routes (only for users who ARE logged in)
|--------------------------------------------------------------------------
| The 'auth' middleware redirects guests to the 'login' route.
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
