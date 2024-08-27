<?php

use App\Livewire\Destinations;
use App\Livewire\EstablishmentInformation;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/destinations', Destinations::class)->name('destinations');

    Route::get('/help', function () {
        return view('pages.help');
    })->name('help');

    Route::get('/establishments/{establishment}', EstablishmentInformation::class)->name('establishment.show');

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});
