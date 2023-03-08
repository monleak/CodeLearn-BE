<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(100) ,
            'description' => fake()->text(100),
            'thumbnail' => fake()->text(100),
            'status' => fake()->randomElement(['public','private']),
            'type' => NULL,
            'content' => fake()->text(100),
            'duration' => 0,
            'order' => 0,
            'chapter_id' => Chapter::factory(),
            'creator_id' => User::factory(),
        ];
    }
}
