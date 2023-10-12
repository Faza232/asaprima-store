<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(mt_rand(2, 8)),
            'email' => $this->faker->email(),
            'isi' => $this->faker->sentence(10),
            // 'body' => '<p>' . implode('</p><p>',$this->faker->paragraph(mt_rand(5, 10))) . '</p>',
            'status' => $this->faker->boolean,
        ];
    }
}
