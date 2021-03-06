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
        $this->fakerCreate();
     
//        \Validator::extend('tags', function ($attr, $value, $param, $validator) {
//            preg_match_all('/#[a-z]+/',$value,$matches,PREG_OFFSET_CAPTURE);
//            return count($matches[0]);
//        });
    }

    private function fakerCreate()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('ru_RU');
        });
    }
}
