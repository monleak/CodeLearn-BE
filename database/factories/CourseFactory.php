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
            'details' => fake()->sentence(10),
            'image' => fake()->imageUrl(640, 480, 'technics', true),
            'price' => fake()->numberBetween(1, 20) * 100000,
            'lecturer_id' => fake()->numberBetween(1, 3),
        ];
    }
}
