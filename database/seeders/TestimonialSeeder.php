<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('testimonials')->insert([
                'title'       => $faker->sentence(3),
                'description' => $faker->paragraph(4),
                'rating'      => $faker->numberBetween(7, 10), // Rating antara 7-10
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
