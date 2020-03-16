<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use App\Providers\CustomServiceProvider;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    $categoriesCount = DB::table('categories')->count() ?: 1;
    $images = CustomServiceProvider::getImageUrls('fakers');

    return [
        'title' => $faker->realText(rand(20, 50)),
        'text' => $faker->realText(rand(1000, 2000)),
        'isPrivate' => CustomServiceProvider::randBoolean(),
        'image' => $images[rand(1, count($images) - 1)],
        'category_id' => rand(1, $categoriesCount)
    ];

});
