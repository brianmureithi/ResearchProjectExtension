<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Course;

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
        //
        view()->composer('front-end.partials.footer', function ($view) {
     $course=Course::all();
            $view->with(['course'=>$course]);
        });
    }
}
