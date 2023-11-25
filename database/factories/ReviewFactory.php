<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(mt_rand(2, 8)),
            'email' => $this->faker->email(),
            'body' => $this->faker->sentence(10),
            // 'body' => '<p>' . implode('</p><p>',$this->faker->paragraph(mt_rand(5, 10))) . '</p>',
            'status' => $this->faker->boolean,
        ];
    }
}
