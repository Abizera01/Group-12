<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Delete all existing users
        DB::table('users')->delete();

        // Insert John Doe
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Insert Philemon
        DB::table('users')->insert([
            'name' => 'Philemon',
            'email' => 'philemon21og@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
