<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'Yudha',
            'email'=>'yudha@gmail.com',
            'password'=>Hash::make('yudha'),
            'profil'=>'1.jpg',
            'level'=>'1',
        ]);
        User::create([
            'name'=>'Zildan',
            'email'=>'zildan@gmail.com',
            'password'=>Hash::make('zildan'),
            'profil'=>'1.jpg',
            'level'=>'2',
        ]);
    }
}
