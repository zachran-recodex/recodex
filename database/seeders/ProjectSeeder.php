<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'client_id' => 1,
                'service_id' => 1,
                'title' => 'Company Profile',
                'slug' => 'company-profile',
                'date' => '2024-06-16',
                'duration' => 'Two Months',
                'cost' => '50k USD',
                'image_path' => 'assets/img/images/th-1/project-details-hero-img.jpg',
                'description' => 'The project began when a leading technology identified a market need for an innovative and energy-efficient smart home thermostat.',
                'steps' => [
                    [
                        'title' => 'Concept Development',
                        'description' => 'Based on the market research findings, the design team began developing conceptual designs for the smart thermostat. They brainstormed ideas, created mood boards, and explored various design directions.',
                    ],
                    [
                        'title' => 'Manufacturing and Production',
                        'description' => 'Once the design was finalized, the project transitioned to the manufacturing phase. Materials, suppliers, and production processes were carefully selected to ensure quality and cost-effectiveness.',
                    ],
                    [
                        'title' => 'Success and Impact',
                        'description' => 'The smart home thermostat quickly gained popularity and was well-received in the market. The project was a success, benefiting both the company and the environment.',
                    ],
                ],
                'content_image_path' => 'assets/img/images/th-1/portfolio-content-img.jpg',
                'is_active' => true,
                'sort_order' => 1,
            ],
        ];

        for ($i = 2; $i <= 10; $i++) {
            $projects[] = [
                'client_id' => rand(1, 5),
                'service_id' => rand(1, 7),
                'title' => "Project Title {$i}",
                'slug' => "project-title-{$i}",
                'date' => now()->subDays(rand(1, 365))->toDateString(),
                'duration' => rand(1, 6) . ' Months',
                'cost' => rand(10, 100) . 'k USD',
                'image_path' => "assets/img/images/th-1/project-{$i}.jpg",
                'description' => "This is a description for project {$i}. It was initiated to address a specific client need and went through various stages of development.",
                'steps' => [
                    [
                        'title' => 'Planning Phase',
                        'description' => "Initial planning and requirement gathering for project {$i}.",
                    ],
                    [
                        'title' => 'Execution Phase',
                        'description' => "Execution and implementation of the solution in project {$i}.",
                    ],
                    [
                        'title' => 'Delivery and Feedback',
                        'description' => "Final delivery and client feedback collection for project {$i}.",
                    ],
                ],
                'content_image_path' => "assets/img/images/th-1/portfolio-content-{$i}.jpg",
                'is_active' => true,
                'sort_order' => $i,
            ];
        }

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
