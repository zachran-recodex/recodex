<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('services')->insert([
                'icon'        => 'icons/service_' . $i . '.png',
                'image'       => 'images/services/service_' . $i . '.jpg',
                'title'       => $faker->sentence(3),
                'description' => $faker->paragraph(3),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
