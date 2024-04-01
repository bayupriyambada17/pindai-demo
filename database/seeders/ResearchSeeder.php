<?php

namespace Database\Seeders;

use App\Models\ResearchModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResearchModel::create([
            'title' => 'Riset Masyarakat',
            'dosen_id' => 2,
            'type_riset' => 'Pengabdian',
            'dana' => 'DiDanai',
            'status' => 'Selesai',
            'tahun_akademik_id' => 1
        ]);
    }
}
