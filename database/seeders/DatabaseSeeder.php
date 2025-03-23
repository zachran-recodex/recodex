<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            BlogSeeder::class,
            ClientSeeder::class,
            CounterSeeder::class,
            FAQSeeder::class,
            HeroSeeder::class,
            ProjectSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            VideoSeeder::class,
            WorkProcessSeeder::class,
        ]);
    }
}
