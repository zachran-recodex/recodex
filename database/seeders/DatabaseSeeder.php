<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersRolesAndPermissionsSeeder::class,
            AboutSeeder::class,
            CounterSeeder::class,
            FAQSeeder::class,
            HeroSeeder::class,
            ProjectSeeder::class,
            ServiceSeeder::class,
            WorkProcessSeeder::class,
            ClientSeeder::class,
        ]);
    }
}
