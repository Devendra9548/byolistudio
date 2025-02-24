<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['components.header'],function($view){
            $view->with('ProductCategory', ProductCategory::all());
        });
    }
}
