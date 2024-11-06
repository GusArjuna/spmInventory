<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Admin','$2y$12$neYQITnt0Ks4a6Hw.F6PWu526RynJgyyeM5lD3717IjOZ5mRpWKEq','on'],
        ];

        foreach ($data as $item) {
            User::create([
                'username' => $item[0],
                'password' => $item[1],
            ]);
        }
    }
}
