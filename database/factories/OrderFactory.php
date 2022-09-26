<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code'=>fake()->isbn10(),
            'status'=>fake()->sentence(),
<<<<<<< HEAD
            'user_id'=>fake()->numberBetween(1,10),
=======
            'user_id'=>fake()->numberBetween(1,6),
>>>>>>> ac76b40 (sold_product)
        ];
    }
}
