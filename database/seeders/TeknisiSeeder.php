<?php

namespace Database\Seeders;

use App\Models\Teknisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['TK-01','Ryo','Teknisi',"2024-11-04",1],
            ['TK-02','Teguh','Teknisi',"2024-11-04",1],

            // Tambahkan baris data lain di sini jika diperlukan
        ];

        foreach ($data as $item) {
            Teknisi::create([
                'nomor' => $item[0],
                'nama' => $item[1],
                'jabatan' => $item[2],
                'dipekerjakan' => $item[3],
                'status' => $item[4],
            ]);
        } 
    }
}
