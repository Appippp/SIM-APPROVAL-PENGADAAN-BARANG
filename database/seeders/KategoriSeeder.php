<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Alkes'
            ],
            [
                'nama_kategori' => 'Barang Umum'
            ],

        ];

        \App\Models\Kategori::insert($kategori);
    }
}
