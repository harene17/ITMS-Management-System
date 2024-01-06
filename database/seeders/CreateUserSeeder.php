<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>'Mathew',
                'email'=>'manager1@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 0
            ],
            [
                'name'=>'Henry',
                'email'=>'leadDev1@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 1
            ],
            [
                'name'=>'Patric',
                'email'=>'leadDev2@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 1
            ],
            [
                'name'=>'John',
                'email'=>'leadDev3@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 1
            ],
            [
                'name'=>'Andrew',
                'email'=>'dev1@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Alena',
                'email'=>'dev2@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Aisyah',
                'email'=>'dev3@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Kumar',
                'email'=>'dev4@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
            [
                'name'=>'Alicia',
                'email'=>'dev5@uniten.edu.my',
                'password'=> bcrypt('password'),
                'user_level' => 2
            ],
        ];
        // foreach item in the $users array (above), create user
        foreach ($users as $key => $user) {
            User::create($user);
        }

    }
}
