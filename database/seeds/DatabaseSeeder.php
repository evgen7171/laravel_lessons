<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $this->call(CategoriesSeeder::class);
=======
        // $this->call(UsersTableSeeder::class);

<<<<<<< HEAD
        if (!DB::table('categories')->count()) {
            $this->call(CategoriesSeeder::class);
        }
=======
        $this->call(CategoriesSeeder::class);
>>>>>>> master
>>>>>>> master
        $this->call(NewsSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
