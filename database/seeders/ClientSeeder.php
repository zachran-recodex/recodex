<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['company' => 'PT Narazel Berkah Selamat', 'name' => 'Razel'],
            ['company' => 'CV Mandiri Teknologi', 'name' => 'Budi'],
            ['company' => 'PT Solusi Kreatif Indonesia', 'name' => 'Ani'],
            ['company' => 'UD Maju Jaya', 'name' => 'Joko'],
            ['company' => 'PT Cipta Inovasi Digital', 'name' => 'Sari'],
        ];

        foreach ($clients as $client) {
            Client::create([
                'company' => $client['company'],
                'slug' => Str::slug($client['company']),
                'name' => $client['name'],
                'email' => null,
                'phone' => null,
                'address' => null,
            ]);
        }
    }
}
