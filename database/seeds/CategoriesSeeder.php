<?php

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table('categories')->count()) {
            DB::table('categories')->insert($this->getSameCategories());
        }
    }

    private function getSameCategories()
    {
        $names = [
            'О погоде', 'О спорте', 'О политике', 'Про разное'
        ];
        $images = CustomServiceProvider::getImageUrls('files');
        for ($i = 0; $i < count($names); $i++) {
            $name = $names[$i];
            $data[] = [
                'name' => CustomServiceProvider::translitText($name),
                'caption' => $name,
                'image' => $images[$i]
            ];
        }
        return $data;
    }

}
