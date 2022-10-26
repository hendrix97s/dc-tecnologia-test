<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Installment>
 */
class InstallmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'sale_id'  => Sale::factory(),
          'amount'   => $this->faker->randomFloat(2, 0, 1000),
          'paid'     => $this->faker->boolean,
          'paid_in'  => $this->faker->date(),
          'due_date' => $this->faker->date(),
        ];
    }
}
