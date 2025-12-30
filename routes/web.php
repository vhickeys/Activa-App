<?php

use App\Http\Controllers\Client\HomepageController;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Client Route
Route::prefix('/')->controller(HomepageController::class)->group(function () {
    Route::get('', 'index')->name('homepage');
    Route::get('services', 'categories')->name('categories');
    Route::get('services/{category_slug}', 'category')->name('category');

    Route::get('our-partners', 'partners')->name('our.partners');
    Route::get('our-partners/{partner_slug}', 'partner_categories')->name('partner.categories');
    Route::get('our-partners/{partner_slug}/{subcategory_slug}', 'partner_subcategories')->name('partner.subcategories');
    Route::get('membership/{membership_slug}', 'membership')->name('membership');
});
