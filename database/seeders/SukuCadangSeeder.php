<?php

namespace Database\Seeders;

use App\Models\SukuCadang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SukuCadangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['HH164-32430','CARTRIDGE,OIL','L5018','35000','129'],
            ['7P676-54060','BLADE (L) (krx193ne, l5018)','L5018','60000','16'],
            ['7P676-54070','BLADE (R) (KRX193NE, L5018)','L5018','60000','16'],
            ['W9501-45101','HYDRAULIK FILTER','L5018','115000','5'],
            ['tc822-82620','hydraulic filter (lot 10)','L4018','135000','12'],
            ['W9501-B1001','FUEL FILTER','L4018','55000','5'],
            ['TC422-43012','ELEMENT FILTER ','L4018','80000','1'],

            // Tambahkan baris data lain di sini jika diperlukan
        ];

        foreach ($data as $item) {
            SukuCadang::create([
                'nomor' => $item[0],
                'nama' => $item[1],
                'jenis' => $item[2],
                'harga' => $item[3],
                'stock' => $item[4],
            ]);
        }
    }
}
