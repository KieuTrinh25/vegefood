<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code'=>fake()->name(),
            'discount'=>fake()->numberBetween(0,100),
            'quantity'=>fake()->numberBetween(0,100),
            'time_from'=>fake()->numberBetween(0,100),
            'time_end'=>fake()->numberBetween(0,100),
        ];
    }
}
