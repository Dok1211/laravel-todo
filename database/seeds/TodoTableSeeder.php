<?php

use App\User;
use App\Todo;
use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TodosTableSeeder::class);
    }
}
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
class TodosTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            if ($i < 6) {
                $user_id = 1;
            } else {
                $user_id = 2;
            }
            Todo::create([
                'user_id' => $user_id,
                'title' => "title_{$i}",
            ]);
        }
    }
}
