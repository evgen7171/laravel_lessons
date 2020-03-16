<?php

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Providers\CustomServiceProvider;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(News::class, 10)->create();
    }

    private function getFakerNews(int $count, int $categoriesCount)
    {
        $faker = Faker\Factory::create('ru_RU');
        $images = CustomServiceProvider::getImageUrls('fakers');

        $data = [];
        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(20, 50)),
                'text' => $faker->realText(rand(1000, 2000)),
                'isPrivate' => CustomServiceProvider::randBoolean(),
                'image' => $images[rand(1, count($images) - 1)],
                'category_id' => rand(1, $categoriesCount)
            ];
        }
        return $data;
    }
}
