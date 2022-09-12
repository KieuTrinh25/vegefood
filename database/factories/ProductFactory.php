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
            'name'=>fake()->name(),
            'price'=>fake()->numberBetween(5, 500),
            'quantity'=>fake()->numberBetween(0,100),
            'img'=>fake()->url(),
            'description'=>fake()->sentence(),
            'category_id'=>fake()->numberBetween(1,20),
        ];
    }
}
