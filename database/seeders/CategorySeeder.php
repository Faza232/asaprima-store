<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data nama Category
        $categoriesData = [
            'Implants',
            'Instruments',
            'General Instruments Surgical',
        ];

        foreach ($categoriesData as $categoryName) {
            // Membuat slug dari nama
            $slug = strtolower(str_replace(' ', '-', $categoryName));

            // Membuat Category baru
            Category::create([
                'name' => $categoryName,
                'slug' => $slug,
            ]);
        }
    }
}
