<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
                ->count(10)
                ->create();

        \App\Models\Course::factory()  
                ->count(20)
                ->hasLessons(5)
                ->create();
        
        \App\Models\Test::factory()
                ->count(20)
                ->create();

        \App\Models\Feedback::factory()
                ->count(10)
                ->create();

        \App\Models\Bill::factory()
                ->count(5)
                ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
