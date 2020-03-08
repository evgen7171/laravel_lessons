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
        // $this->call(UsersTableSeeder::class);

<<<<<<< HEAD
        if (!DB::table('categories')->count()) {
            $this->call(CategoriesSeeder::class);
        }
=======
        $this->call(CategoriesSeeder::class);
>>>>>>> master
        $this->call(NewsSeeder::class);
    }
}
