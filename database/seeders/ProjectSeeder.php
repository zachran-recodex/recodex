<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Domain;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Create Clients
        $clients = [
            [
                'name' => 'Acme Corporation',
                'email' => 'contact@acme.com',
                'phone' => '(555) 123-4567',
                'company' => 'Acme Corp',
                'logo' => 'acme-logo.png'
            ],
            [
                'name' => 'Tech Solutions',
                'email' => 'info@techsolutions.com',
                'phone' => '(555) 987-6543',
                'company' => 'Tech Solutions Inc',
                'logo' => 'tech-logo.png'
            ],
        ];

        foreach ($clients as $clientData) {
            $client = Client::create($clientData);

            // Create Domains for each client
            $domain = Domain::create([
                'client_id' => $client->id,
                'name' => str_replace('contact@', '', $client->email),
                'registration_date' => Carbon::now()->subYears(rand(1, 3)),
                'expiration_date' => Carbon::now()->addYears(rand(1, 2)),
            ]);

            // Create Emails for each domain
            $emails = [
                [
                    'email' => 'admin@' . $domain->name,
                    'password' => bcrypt('password123'),
                    'password_updated_at' => Carbon::now(),
                ],
                [
                    'email' => 'support@' . $domain->name,
                    'password' => bcrypt('password123'),
                    'password_updated_at' => Carbon::now(),
                ],
            ];

            foreach ($emails as $emailData) {
                $domain->emails()->create($emailData);
            }

            // Create Projects for each client
            $projects = [
                [
                    'title' => 'Website Redesign',
                    'category' => 'Web Development',
                    'description' => 'Complete website overhaul and modernization',
                    'image' => 'website-redesign.jpg',
                    'start_date' => Carbon::now()->subMonths(2),
                    'end_date' => Carbon::now()->addMonths(4),
                    'cost' => rand(5000, 15000),
                    'status' => Project::STATUS_IN_PROGRESS,
                ],
                [
                    'title' => 'Mobile App Development',
                    'category' => 'Mobile Development',
                    'description' => 'Native mobile application development',
                    'image' => 'mobile-app.jpg',
                    'start_date' => Carbon::now()->addMonth(),
                    'end_date' => Carbon::now()->addMonths(6),
                    'cost' => rand(10000, 25000),
                    'status' => Project::STATUS_PENDING,
                ],
            ];

            foreach ($projects as $projectData) {
                $client->projects()->create($projectData);
            }
        }
    }
}