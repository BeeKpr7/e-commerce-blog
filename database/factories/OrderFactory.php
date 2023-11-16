<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
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
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'address_id' => AdressFactory::create(),
            'status' => $this->faker->randomElement(array_column(OrderStatus::cases(), 'value')),
            'total' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
