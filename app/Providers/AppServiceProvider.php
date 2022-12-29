<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Darryldecode\Cart\Cart;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('categories', Category::all());
            $view->with('totalCartProduct', count(\Cart::getContent()));
            $view->with('cartProducts', \Cart::getContent());
        });
    }
}
