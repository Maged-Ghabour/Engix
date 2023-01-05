<?php

use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OfferController;
use App\Http\Controllers\Front\ProductController;
use \App\Http\Controllers\Front\SerController;
use \App\Http\Controllers\Front\ProgramController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('Home');

    Route::group(["prefix" => 'enginx'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('Home');
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('Product.index');
            Route::get('/{id}', [ProductController::class, 'show'])->name('Product.show');
            Route::get('/search/{id}', [ProductController::class, 'search'])->name('Search');
        });
        Route::group(['prefix' => 'offers'], function () {
            Route::get('/', [OfferController::class, 'index'])->name('Offer.index');
            Route::get('show/{id}', [OfferController::class, 'show'])->name('Offer.show');
        });
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('Category.index');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('Category.show');
            Route::get('/{id}/sub_category/{sub_id}', [CategoryController::class, 'show_sub_category'])->name('Sub_Category.Show');
        });
        Route::group(['prefix' => 'jobs'], function () {
            Route::get('/', [\App\Http\Controllers\Front\JobController::class, 'index'])->name('MyJops');
            Route::get('/show/{id}', [\App\Http\Controllers\Front\JobController::class, 'show'])->name('show');
            Route::post('/store', [\App\Http\Controllers\Front\ApplicantController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'ourcustomers'], function () {
            Route::get('/', [\App\Http\Controllers\Front\CustomerController::class, 'index'])->name('customer.index');
            Route::get('/{id}', [\App\Http\Controllers\Front\CustomerController::class, 'show'])->name('customer.show');
        });
        Route::group(['prefix' => 'services'], function () {
            Route::get('/show/{id}',  [SerController::class, 'show'])->name('services.show');
            Route::get('/show_sub_cat/{id}/sub_cat/{sub_id}',  [SerController::class, 'show_sub_category'])->name('sub_cat');
        });
        Route::group(['prefix' => 'programs'], function () {
            Route::get('/show/{id}',  [ProgramController::class, 'show'])->name('programs.show');
            Route::get('/sub_cat/{id}/sub_cat/{sub_id}',  [ProgramController::class, 'show_sub_category'])->name('show_sub_cat');
        });
        Route::group(['prefix' => 'contact-us'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('contact_us.index');
            Route::post('/', [ContactController::class, 'store'])->name('contact_us.store');
        });
        Route::get(
            '/who',
            function () {
                return view('front.footer.who');
            }
        )->name('who');

        Route::get(
            '/payments',
            function () {
                return view('front.footer.payments');
            }
        )->name('payments');

        Route::get(
            '/polices',
            function () {
                return view('front.footer.polices');
            }
        )->name('polices');

        Route::get(
            '/rules',
            function () {
                return view('front.footer.rules');
            }
        )->name('rules');

        Route::get(
            '/uses',
            function () {
                return view('front.footer.uses');
            }
        )->name('uses');
    });
});
