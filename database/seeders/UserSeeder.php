<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'fullname' => 'nvadmin',
            'password' => bcrypt('123456'),
            'level' => 'admin',
            'status' => 'active',
            'avatar' => 'abc.jpg',
        ]);
        User::create([
            'username' => 'member',
            'email' => 'member@gmail.com',
            'fullname' => 'nvmember',
            'password' => bcrypt('123456'),
            'level' => 'member',
            'status' => 'active',
            'avatar' => 'abc.jpg',
        ]);
    }
}
