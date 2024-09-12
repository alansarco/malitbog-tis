<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('pages.login');
})->name('login')->middleware('guest');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');


include 'guests.php';

Route::middleware('auth')->group(function () {

    Route::get('/help', function () {
        return view('pages.help');
    })->name('help');


    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::resource('accounts', AccountController::class);
});
