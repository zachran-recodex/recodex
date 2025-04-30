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
        Project::create([
            'title' => 'Product Design',
            'client' => 'Alfado Company, UK',
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
        ]);
    }
}
