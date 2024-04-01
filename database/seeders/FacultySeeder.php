<?php

namespace Database\Seeders;

use App\Models\FacultyModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacultyModel::create([
            'faculty_name' => 'Fakultas Ilmu Komputer',
            'faculty_code' => 'FILKOM',
            'faculty_target' => 10,
        ]);

        FacultyModel::create([
            'faculty_name' => 'Fakultas Hukum',
            'faculty_code' => 'FHUKUM',
            'faculty_target' => 10,

        ]);

        FacultyModel::create([
            'faculty_name' => 'Fakultas Teknik',
            'faculty_code' => 'FTEKNIK',
            'faculty_target' => 10,
        ]);
    }
}
