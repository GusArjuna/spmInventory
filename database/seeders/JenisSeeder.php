<?php

namespace Database\Seeders;

use App\Models\jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['DC-70','Alat'],
            ['DC-35','Alat'],
            ['DC-93','Alat'],
            ['L5018','Suku Cadang'],
            ['L4018','Suku Cadang'],

            // Tambahkan baris data lain di sini jika diperlukan
        ];

        foreach ($data as $item) {
            jenis::create([
                'nomor' => $item[0],
                'jenis' => $item[1],
            ]);
        }
    }
}
