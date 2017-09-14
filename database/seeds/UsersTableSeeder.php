<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            User::create([
                'name' => "user_{$i}",
                'email' => "admin{$i}@gmail.com",
                'password' => bcrypt('administrator'),
            ]);
        }
    }
}
