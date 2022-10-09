<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rated>
 */
class RatedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rated'=>fake()->numberBetween(0, 100),
            'content'=>fake()->sentence(),
            'product_id'=>fake()->numberBetween(1,5),
            'user_id'=>fake()->numberBetween(1,5),
        ];
    }
}
