<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = fake()->randomElement(['positive','negative']);

        return [
            'user_id' => User::factory(),
            'course_id' => Course::factory(),
            'content' => 'aaaaaaaaaaaaaaaaaaaaaaaa0',
            'status' => $status,
            
        ];
    }
}
