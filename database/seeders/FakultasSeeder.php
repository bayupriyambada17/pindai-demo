<?php

namespace Database\Seeders;

use App\Models\FakultasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FakultasModel::create([
            'nama_fakultas' => 'Fakultas Ilmu Komputer',
            'kode_fakultas' => 'FK',
            'target' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        FakultasModel::create([
            'nama_fakultas' => 'Fakultas Ilmu Komunikasi',
            'kode_fakultas' => 'FIK',
            'target' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
