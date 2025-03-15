<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('projects')->insert([
                'image'        => 'images/projects/project_' . $i . '.jpg',
                'title'        => $faker->sentence(3),
                'description'  => $faker->paragraph(4),
                'project_date' => $faker->date(),
                'duration'     => $faker->numberBetween(1, 12) . ' bulan',
                'cost'         => $faker->randomFloat(2, 5000, 500000),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
