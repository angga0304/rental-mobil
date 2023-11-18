<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'merk' => 'Honda',
            'model' => 'Jazz',
            'plat' => 'D 1234 BC',
            'price' => 300000,
            'available' => 1,
        ]);

        DB::table('cars')->insert([
            'merk' => 'Toyota',
            'model' => 'Avanza',
            'plat' => 'D 4578 KL',
            'price' => 450000,
            'available' => 1,
        ]);
        
        DB::table('cars')->insert([
            'merk' => 'Honda',
            'model' => 'Brio',
            'plat' => 'D 2134 BC',
            'price' => 200000,
            'available' => 1,
        ]);
        
        DB::table('cars')->insert([
            'merk' => 'Suzuki',
            'model' => 'Ignis',
            'plat' => 'D 1243 EC',
            'price' => 300000,
            'available' => 1,
        ]);
    }
}
