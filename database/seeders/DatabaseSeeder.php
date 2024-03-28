<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\SemesterModel;
use Illuminate\Database\Seeder;
use App\Models\AcademicYearModel;
use Database\Seeders\FakultasSeeder;
use Database\Seeders\TahunAkademikSeeder;
use Database\Factories\AcademicYearModelFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nidn' => '123',
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'nidn' => '123123',
            'name' => 'dosen',
            'email' => 'dosen@test.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            TahunAkademikSeeder::class,
            FakultasSeeder::class,
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
