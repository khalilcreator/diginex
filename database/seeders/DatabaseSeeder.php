<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 1,
        ]);

        // User
        User::create([
            'name' => 'Simple User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 0,
        ]);

        $this->call([
            ServiceSeeder::class,
            ContentSeeder::class,
        ]);
    }
}
