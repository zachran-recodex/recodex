<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a random client or create one if none exists
        $client = Client::inRandomOrder()->first() ?? Client::create([
            'name' => 'Default Client',
            'email' => 'client@example.com',
            'phone' => '123456789',
            'company' => 'Default Company',
            'photo' => 'images/clients/default.jpg',
        ]);

        $projects = [
            [
                'client_id' => $client->id,
                'image' => 'images/projects/web_development.jpg',
                'title' => 'Web Development',
                'category' => 'Web Development',
                'description' => 'PT Triwalana Sagala Pro',
                'project_date' => '2023-01-15',
                'duration' => '3 months',
                'cost' => 25000000,
                'status' => 'completed',
            ],
            [
                'client_id' => $client->id,
                'image' => 'images/projects/mobile_development.jpg',
                'title' => 'Web Development',
                'category' => 'Web Development',
                'description' => 'PT Alfalima Cakrawala Indonesia',
                'project_date' => '2023-04-01',
                'duration' => '4 months',
                'cost' => 35000000,
                'status' => 'in_progress',
            ],
            [
                'client_id' => $client->id,
                'image' => 'images/projects/seo.jpg',
                'title' => 'Web Development',
                'category' => 'Web Development',
                'description' => 'Indonesian Conference on Religion and Peace',
                'project_date' => '2023-08-20',
                'duration' => '2 months',
                'cost' => 15000000,
                'status' => 'pending',
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
