<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'image' => 'images/projects/web_development.jpg',
                'title' => 'Web Development',
                'description' => 'PT Triwalana Sagala Pro',
                'project_date' => '2023-01-15',
                'duration' => '3 months',
                'cost' => 25000000,
            ],
            [
                'image' => 'images/projects/mobile_development.jpg',
                'title' => 'Web Development',
                'description' => 'PT Alfalima Cakrawala Indonesia',
                'project_date' => '2023-04-01',
                'duration' => '4 months',
                'cost' => 35000000,
            ],
            [
                'image' => 'images/projects/seo.jpg',
                'title' => 'Web Development',
                'description' => 'Indonesian Conference on Religion and Peace',
                'project_date' => '2023-08-20',
                'duration' => '2 months',
                'cost' => 15000000,
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert(array_merge($project, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
