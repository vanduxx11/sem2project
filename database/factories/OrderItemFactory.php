<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->randomDigit(),
            'price' => $this->faker->randomFloat(1, 20, 30),
            'order_id' => $this->faker->numberBetween(1, 10),
            'product_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
