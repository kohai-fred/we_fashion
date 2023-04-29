<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(fake()->numberBetween(1, 3), true),
            'description' => fake()->paragraph(fake()->numberBetween(10, 18)),
            'price' => fake()->randomFloat(2, 9, 400),
            'published' => fake()->numberBetween(0, 1),
            'promotion' => fake()->numberBetween(0, 1),
            'reference' => uniqid('wf_'),
            'created_at' => now(),
            'updated_at' => now(),
            'image' => "faker",
        ];
    }
}
