<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'method_payment' => $this->faker->randomElement(['cash', 'credit_card', 'debit_card']),
          'paid'           => $this->faker->boolean,
          'paid_in'        => $this->faker->date(),
        ];
    }
}
