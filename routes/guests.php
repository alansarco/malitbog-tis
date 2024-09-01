<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Destinations;
use App\Livewire\EstablishmentInformation;


/**
 * This endpoints are accessible for end user to navigation to each destination
 */

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/destinations', Destinations::class)->name('destinations');

    Route::get('/establishments/{establishment}', EstablishmentInformation::class)->name('establishment.show');

});
