<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'name' => 'Implants',
            'slug' => 'implants'
        ]);

        Kategori::create([
            'name' => 'Instriments',
            'slug' => 'instriments'
        ]);

        Kategori::create([
            'name' => 'General Instruments Surgical',
            'slug' => 'general instruments surgical'
        ]);
    }
}
