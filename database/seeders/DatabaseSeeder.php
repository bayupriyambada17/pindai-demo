<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FacultySeeder;
use Database\Seeders\ResearchSeeder;
use Database\Seeders\TahunAkademikSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            TahunAkademikSeeder::class,
            FacultySeeder::class,
            UserSeeder::class,
            ResearchSeeder::class,
        ]);
        // for ($i = 0; $i < 5; $i++) {
        //     AcademicYearModel::create([
        //         'academic_year' => '2021' + ($i + 1),
        //     ]);
        // }

        // SemesterModel::create([
        //     'name' => 'Genap',
        //     'start_month' => 'September',
        //     'end_month' => 'Februari',
        //     'academic_year_id' => 1,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // SemesterModel::create([
        //     'name' => 'Ganjil',
        //     'start_month' => 'Maret',
        //     'end_month' => 'Agustus',
        //     'academic_year_id' => 1,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
