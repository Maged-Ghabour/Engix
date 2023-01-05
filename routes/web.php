<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/{id}', [\App\Http\Controllers\Front\ProfileController::class, 'show'])->name('profile');
            Route::put('/update/{id}', [\App\Http\Controllers\Front\ProfileController::class, 'update'])->name('profile.updateing');
        });
    });

    Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');
    Route::group(["prefix" => 'enginx'], function () {
        Route::resource('cart', CartController::class);
    });

    Route::group(["prefix" => 'enginx'], function () {
        Route::get('checkout', [CheckoutController::class, "create"])->name("checkout");
        Route::post('checkout', [CheckoutController::class, "store"]);
    });
});



require __DIR__ . '/auth.php';

require __DIR__ . '/front.php';
require __DIR__ . '/dashboard.php';