<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class LmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\User::create([
        'name' => 'teacher1',
        'email' => 'teacher1@example.com',
        'password' => Hash::make('password'), 
        'role' => 'teacher'
    ]);

    \App\Models\User::create([
        'name' => 'student1',
        'email' => 'student1@example.com',
        'password' => bcrypt('password'),
        'role' => 'student'
    ]);

   
}

}
