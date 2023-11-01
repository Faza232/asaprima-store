<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'kategori_id' => '1',
            'subkategori_id' => '1',
            'nama' => 'ini produk seed',
        ]);
    }
}
