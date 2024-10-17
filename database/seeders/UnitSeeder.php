<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit = [
            [
                'nama_unit' => 'Klinik Utama Nusa Lima',
            ],
            [
                'nama_unit' => 'Klinik Pratama Nusalima Pekanbaru',
            ],
            [
                'nama_unit' => 'Klinik Pratama Emplasment Lubuk Dalam',
            ],
            [
                'nama_unit' => 'Klinik Pratama Emplasment Sei Galuh',
            ],
            [
                'nama_unit' => 'Klinik Pratama Emplasment Sei Lindai',
            ],
            [
                'nama_unit' => 'Klinik Pratama Emplasment Terantam',
            ],
            [
                'nama_unit' => 'Klinik Pratama Nusalima Kasikan',
            ],
            [
                'nama_unit' => 'Klinik Pratama Sri Rokan',
            ],
        ];

        Unit::insert($unit);
    }
}
