<?php

namespace Database\Seeders;

use App\Models\TahunAkademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tahun_akademik' => '2023/2024',
                'periode_ganjil_start' => '2023-09-01',
                'periode_ganjil_end' => '2024-02-28',
                'periode_genap_start' => '2024-03-01',
                'periode_genap_end' => '2024-08-31',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'tahun_akademik' => '2024/2025',
                'periode_ganjil_start' => '2024-09-01',
                'periode_ganjil_end' => '2025-02-28',
                'periode_genap_start' => '2025-03-01',
                'periode_genap_end' => '2025-08-31',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        TahunAkademik::insert($data);
    }
}
