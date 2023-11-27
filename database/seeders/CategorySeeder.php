<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Implants',
            'slug' => 'implants'
        ]);

        Category::create([
            'name' => 'Instriments',
            'slug' => 'instriments'
        ]);

        Category::create([
            'name' => 'General Instruments Surgical',
            'slug' => 'general instruments surgical'
        ]);
    }
}
