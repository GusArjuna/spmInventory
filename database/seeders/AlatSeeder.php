<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['DC-70','15'],
            ['DC-35','15'],
            ['DC-93','15'],
            ['L5018','20'],
            ['L4018','20'],
            // Tambahkan baris data lain di sini jika diperlukan
        ];

        foreach ($data as $item) {
            Alat::create([
                'nomor' => $item[0],
                'stock' => $item[1],
            ]);
        }
    }
}
