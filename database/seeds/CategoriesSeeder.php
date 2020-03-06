<?php

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\TrimStrings;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
//        DB::table('categories')->insert($this->getFakerCategories(5));
        DB::table('categories')->insert($this->getSameCategories());
=======
        DB::table('categories')->insert($this->getFakerCategories(5));
>>>>>>> master
    }

    private function getFakerCategories(int $count)
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < $count; $i++) {
            $name = $faker->realText(18);
            $data[] = [
                'name' => CustomServiceProvider::translitText($name),
                'caption' => $name
            ];
        }
        return $data;
    }

<<<<<<< HEAD
    private function getSameCategories()
    {
        $names = [
            'О погоде', 'О спорте', 'О политике', 'Про разное'
        ];
        for ($i = 0; $i < count($names); $i++) {
            $name = $names[$i];
            $data[] = [
                'name' => CustomServiceProvider::translitText($name),
                'caption' => $name
            ];
        }
        return $data;
    }

=======
>>>>>>> master
}
