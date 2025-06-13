<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            [
                'name' => 'Advanced Mathematics',
                'description' => 'Deep dive into calculus and algebra.',
                'subject_code' => 'MATH2025',
                'credit' => 3,
                'teacher_id' => 1 
            ],
            [
                'name' => 'Computer Science Fundamentals',
                'description' => 'Introduction to programming and algorithms.',
                'subject_code' => 'CS101',
                'credit' => 4,
                'teacher_id' => 2
            ]
        ]);
    }
}
