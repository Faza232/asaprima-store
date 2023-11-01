<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Ulasan;
use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProdukSeeder;
use Database\Seeders\KategoriSeeder;
use Database\Seeders\SubKategoriSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            SubKategoriSeeder::class,
            ProdukSeeder::class,
        ]);
        Ulasan::factory(20)->create();
        Artikel::factory(20)->create();
     }
}
