<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Course ' . fake()->numberBetween(1, 9),
            'description' => fake()->text(100),
            'detail' => fake()->text(200),
            'price' => fake()->numberBetween(1, 9) * 100000,
            'lecturer_id' => 1,
        ];
    }
}
