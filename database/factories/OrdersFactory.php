<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beverage' => fake() -> city(),
            'payments_id' => fake() -> numberBetween(1, 4),
            'total' => fake() -> numberBetween(10, 35),
            'order_date' => fake() -> dateTimeThisMonth('-2 days'),
            'buyer' => fake() -> name(),
            'address' => fake() -> address()
        ];
    }
}
