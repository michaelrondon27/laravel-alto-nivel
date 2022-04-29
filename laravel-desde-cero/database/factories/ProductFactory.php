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
    public function definition()
    {
        return [
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomFloat($maxDecimals = 2, $min = 3, $max = 100),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'stock' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(3),
        ];
    }
}
