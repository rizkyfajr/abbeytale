<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StatusPegawai;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => bcrypt('admin123'),
        ]);

        StatusPegawai::factory()->create([
            'nama_status' => 'Tetap',
            'deskripsi' => 'Status pegawai Tetap',
        ]);

        StatusPegawai::factory()->create([
                'nama_status' => 'Kontrak',
                'deskripsi' => 'Status pegawai kontrak',
        ]);
    }
}
