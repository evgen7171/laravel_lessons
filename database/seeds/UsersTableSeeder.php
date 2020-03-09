<?php

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\TrimStrings;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table('users')->count()) {
            $this->createMainAdmin();
        }
        factory(User::class)->create();

    }

    private function createMainAdmin()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123123123),
            'remember_token' => Str::random(10),
            'created_at'=>now(),
            'updated_at'=>now(),
            'is_admin' => 1
        ]);
    }
}
