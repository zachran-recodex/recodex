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
        // Get all clients
        $clients = Client::all();

        if ($clients->isEmpty()) {
            // Create a default client if none exists
            $defaultClient = Client::create([
                'name' => 'Default Client',
                'email' => 'client@example.com',
                'phone' => '123456789',
                'company' => 'Default Company',
                'photo' => 'images/clients/default.jpg',
            ]);
            $clients = collect([$defaultClient]);
        }

        $projects = [
            [
                'client_id' => $clients->where('name', 'Sagala Pro')->first()->id ?? $clients->first()->id,
                'image' => 'images/projects/web_development.jpg',
                'title' => 'Corporate Website Redesign',
                'category' => 'Web Development',
                'description' => 'Complete redesign of corporate website for PT Triwalana Sagala Pro with modern UI/UX and responsive design',
                'project_date' => '2023-01-15',
                'duration' => '3 months',
                'cost' => 25000000,
                'status' => 'completed',
            ],
            [
                'client_id' => $clients->where('name', 'Alfa5 Aviation')->first()->id ?? $clients->first()->id,
                'image' => 'images/projects/mobile_development.jpg',
                'title' => 'Aviation Services Portal',
                'category' => 'Web Development',
                'description' => 'Development of comprehensive aviation services web portal for PT Alfalima Cakrawala Indonesia with booking system',
                'project_date' => '2023-04-01',
                'duration' => '4 months',
                'cost' => 35000000,
                'status' => 'in_progress',
            ],
            [
                'client_id' => $clients->where('name', 'Private Jet Charter')->first()->id ?? $clients->first()->id,
                'image' => 'images/projects/seo.jpg',
                'title' => 'Charter Booking Platform',
                'category' => 'Web Development',
                'description' => 'Custom web application for PT Prioritas Jasa Cakti Indonesia featuring private jet booking and management system',
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
