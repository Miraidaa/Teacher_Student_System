<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
     public function run()
     {
         $this->call([
             \Database\Seeders\LmsSeeder::class,
             \Database\Seeders\SubjectSeeder::class
         ]);
     }
     
    
}
