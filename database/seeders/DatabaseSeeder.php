<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        User::updateOrCreate(['email' => 'admin@study.soict.ai'], [
            'name' => 'Super Admin',
            'email' => 'admin@study.soict.ai',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()
            ->count(5)
            ->create();

        \App\Models\Course::factory()
            ->count(5)
            ->create();
    }
}
