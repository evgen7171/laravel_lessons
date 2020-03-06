<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
//        \Validator::extend('tags', function ($attr, $value, $param, $validator) {
//            preg_match_all('/#[a-z]+/',$value,$matches,PREG_OFFSET_CAPTURE);
//            return count($matches[0]);
//        });
    }
}
