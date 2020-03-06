<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use App\Providers\CustomServiceProvider;
use Illuminate\Support\Facades\DB;

$factory->define(News::class, function () {

    $categoriesCount = DB::table('categories')->count() ?: 1;
    $faker = Faker\Factory::create('ru_RU');

    return [
        'title' => $faker->realText(rand(20, 50)),
        'text' => $faker->realText(rand(1000, 2000)),
        'isPrivate' => CustomServiceProvider::randBoolean(),
        'image' => '',
        'category_id' => rand(1, $categoriesCount)
    ];
});
