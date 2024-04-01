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
            'lecturer_id' => 2,
            'type_research' => 'devotion',
            'funding' => 'independent',
            'academic_year_id' => 1
        ]);
    }
}
