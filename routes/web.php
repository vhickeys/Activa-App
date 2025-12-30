<?php

use App\Http\Controllers\Client\HomepageController;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Client Route
Route::prefix('/')->controller(HomepageController::class)->group(function () {
    Route::get('', 'index')->name('homepage');
    Route::get('about', 'about')->name('about');
    Route::get('facilites/{slug}', 'facility_details')->name('facility.details');
    Route::get('search/facilities', 'facilities_search')->name('facilities.search');
});
