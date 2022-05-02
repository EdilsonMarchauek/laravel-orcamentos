<?php

namespace App\Providers;

use App\Models\Models\Category;
use Illuminate\Support\Facades\Schema;
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
       //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(
            'admin.products.*',
            function($view){
                //$view->with('categories', Category::all()) ou;
                $view->with('categories', Category::pluck('title', 'id'));
            }
        );

        
        view()->composer(
            'site.home.*',
            function($view2){
                //$view->with('categories', Category::all()) ou;
                $view2->with('categories', Category::pluck('title', 'id'));
            }
        );

    }
}
