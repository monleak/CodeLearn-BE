<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['B,P,V']);

        return [
            'user_id' => User::factory(),
            'amount' => $this->faker->numberBetween(100,20000),
            'status' => $status,
            'billed_dated' => $this->faker->dateTimeThisDecade(),
            'paid_dated' => $status == 'P' ? $this->faker->dateTimeThisDecade() : NULL,
        ];
    }
}
