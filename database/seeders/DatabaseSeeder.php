<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    // Prevent from triggering model events
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate(['email' => 'admin@study.soict.ai'], [
            'name' => 'Super Admin',
            'email' => 'admin@study.soict.ai',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::factory()
            ->count(5)
            ->create();

        \App\Models\Course::factory()
            ->count(10)
            ->create();

        \App\Models\Chapter::factory()
            ->count(6)
            ->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
