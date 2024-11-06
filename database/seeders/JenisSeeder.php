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
