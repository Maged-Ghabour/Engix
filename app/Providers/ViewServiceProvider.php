<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('Front.includes.header-bottom', function ($view) {

            $view->with('categories', Category::with('children')
                ->with('parent')->with('products')
                ->where('parent_id', null)->get());

            $view->with('sub_categories', Category::with('children')
                ->with('parent')
                ->where('parent_id', "<>", null)->get());

            $view->with('products', Product::with('category')->get());
        });

        view()->composer('Front.includes.header-center', function ($view) {

            $view->with('categories', Category::with('children')
                ->with('parent')->with('products')
                ->where('parent_id', null)->get());

            $view->with('sub_categories', Category::with('children')
                ->with('parent')
                ->where('parent_id', "<>", null)->get());

            $view->with('products', Product::with('category')->get());
        });

        view()->composer('Front.includes.header-top', function ($view) {
            $view->with('category', Category::select('id', 'name')
                ->where('name', 'خدمات')
                ->get());
        });
    }








    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
