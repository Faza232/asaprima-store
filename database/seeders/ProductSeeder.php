<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => '1',
            'slug' => 'ini-product-seed',
            'subcategory_id' => '1',
            'name' => 'ini product seed',
        ]);
    }
}
