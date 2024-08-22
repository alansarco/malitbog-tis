<?php

use App\Livewire\Destinations;
use App\Livewire\OrganizationInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/destinations', Destinations::class)->name('destinations');

Route::get('/help', function () {
    return view('pages.help');
})->name('help');

Route::get('/establishments/{establishment}', OrganizationInformation::class)->name('establishment.show');
