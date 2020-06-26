<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Imran Hossain',
            'email' => 'imranhossainppip@gmail.com',
            'password' => bcrypt('6260362400'),
            'description' => 'Hello, I am a web developer',
        ]);
    }
}
