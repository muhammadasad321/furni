<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Cart;

use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('layout', function ($view) {
            $CategoryList = Category::where('status',1)->get();
            $customerId = session('id');
    
            $itemCount = app(\App\Http\Controllers\FrontendController::class)->itemCountInCart();
       
            $view->with(['CategoryList' => $CategoryList, 'itemCount' => $itemCount]);
        });
    }
    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
