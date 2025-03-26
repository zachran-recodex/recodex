<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Alfa5 Aviation',
                'email' => 'john@example.com',
                'phone' => '123-456-7890',
                'company' => 'PT Alfalima Cakrawala Indonesia',
                'photo' => null,
            ],
            [
                'name' => 'Sagala Pro',
                'email' => 'jane@example.com',
                'phone' => '987-654-3210',
                'company' => 'PT Triwalana Sagala Pro',
                'photo' => null,
            ],
            [
                'name' => 'Private Jet Charter',
                'email' => 'robert@example.com',
                'phone' => '555-123-4567',
                'company' => 'PT Prioritas Jasa Cakti Indonesia',
                'photo' => null,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}