<?php

use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\dashboard\jobController;
use App\Http\Controllers\dashboard\OfferController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\OrderDetailsController;
use App\Http\Controllers\Dashboard\SettingController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin-dashboard'], function () {
    Route::group(['middleware' => 'adminRedirect:admin'], function () {
        Route::get('/login', [AdminAuthController::class, 'login'])->name('Admin.Login');
        Route::post('/confirm', [AdminAuthController::class, 'confirm'])->name('Admin.confirm');
    });
    Route::group(["middleware" => ["adminAuth:admin"], "as" => "dashboard."], function () {
        Route::get("/", [DashboardController::class, "index"])->name('Admin.index');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('Admin.Logout');
        Route::resource("/categories", CategoryController::class);
        Route::resource("/products", ProductController::class);
        Route::resource("/users", UserController::class);
        Route::resource("/offers", OfferController::class);
        Route::resource("/jobs", jobController::class);
        Route::resource("/ourCustomers", CustomerController::class);
        Route::get('/allCV/{id}', [\App\Http\Controllers\Dashboard\ApplicantController::class, 'index'])->name('allCV');
        Route::get('/CV/{id}', [\App\Http\Controllers\Dashboard\ApplicantController::class, 'show'])->name('MyCv');
        Route::delete('/destroyCV/{id}', [\App\Http\Controllers\Dashboard\ApplicantController::class, 'destroy'])->name('destroy');
        Route::get("/settings" , [SettingController::class , "index"])->name("settings.index");
        Route::post("/settings" , [SettingController::class , "store"])->name("settings.store");


        Route::group(["prefix" => "/orders"], function () {
            Route::get('delivering/{id}', [OrderController::class, 'delivering'])->name('delivering');
            Route::get('completed/{id}', [OrderController::class, 'completed'])->name('completed');
            Route::get('cancelled/{id}', [OrderController::class, 'cancelled'])->name('cancelled');
            Route::get('refunded/{id}', [OrderController::class, 'refunded'])->name('refunded');
            Route::get('trashedOrders', [OrderController::class, 'trashedOrders'])->name('trashedOrders');
            Route::get('restoreOrder/{id}', [OrderController::class, 'restoreOrder'])->name('restoreOrder');
        });
        Route::resource('/orders', OrderController::class);
        Route::get('/orders/print/{id}', [OrderController::class, 'print'])->name('order.print');
        Route::get('/ordersDetails', [OrderDetailsController::class, "index"])->name("orderDetails.index");
    });
});
