<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            'role' => 'lecturer',
            'faculty_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'nidn' => '123124',
            'name' => 'dosen2',
            'email' => 'dosen2@test.com',
            'password' => bcrypt('password'),
            'role' => 'lecturer',
            'faculty_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
