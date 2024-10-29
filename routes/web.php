<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferingController;
use App\Http\Controllers\OwnerEstablishmentController;
use App\Http\Controllers\OwnerGalleryController;


// New Routes
Route::middleware('guest')->group(function () {
  Route::get('/', fn() => view('welcome'))->name('root');
  Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
  });
});


Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



  Route::middleware('role:admin')->group(function () {
    Route::resource('accounts', AccountController::class);
    Route::resource('establishments', EstablishmentController::class);
    Route::resource('business-types', BusinessTypeController::class);
    Route::resource('events', EventController::class);
    Route::resource('offerings', OfferingController::class);
  });

  Route::middleware('role:owner')->group(function () {
    Route::get('/my-establishment', [OwnerEstablishmentController::class, 'index'])->name('owners.establishment-index');
    Route::put('/my-establishment', [OwnerEstablishmentController::class, 'update'])->name('owners.establishment-update');

    Route::get('/offers', [OfferController::class, 'index'])->name('owners.establishment-offers');
    Route::post('/offers', [OfferController::class, 'store'])->name('owners.establishment-offers-store');

    Route::get('/my-galleries', [OwnerGalleryController::class, 'index'])->name('owners.establishment-galleries');
  });

  //new route -clint task
  Route::post('/accounts', [EstablishmentController::class, 'storeOwnerWithEstablishment'])->name('accounts.store');
  Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');

});
