<?php

namespace Database\Seeders;

use App\Models\Beasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beasiswa::create([
            'nama' => 'Beasiswa Akademik',
            'deskripsi' => 'Beasiswa berdasarkan nilai akademik.',
            'ipk' => 3.00,
            'photo' => null
        ]);

        Beasiswa::create([
            'nama' => 'Beasiswa Non-Akademik',
            'deskripsi' => 'Beasiswa berdasarkan prestasi non-akademik.',
            'ipk' => 3.00,
            'photo' => null
        ]);
    }
}
