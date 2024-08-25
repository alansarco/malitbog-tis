<?php

use App\Livewire\Destinations;
use App\Livewire\EstablishmentInformation;
use App\Livewire\OrganizationInformation;
use Illuminate\Support\Facades\Route;

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
