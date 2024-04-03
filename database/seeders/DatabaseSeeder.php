<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FacultySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            FacultySeeder::class,
            UserSeeder::class,
            // ResearchSeeder::class,
        ]);
    }
}
