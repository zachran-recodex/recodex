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
            FaqSeeder::class,
            ServiceSeeder::class,
            WorkProcessSeeder::class,
            HeroSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
            PricingSeeder::class,
            InvoiceSeeder::class,
        ]);
    }
}
