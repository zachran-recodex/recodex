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
        Client::create([
            'company' => 'PT Narazel Berkah Selamat',
            'slug' => 'pt-narazel-berkah-selamat',
            'name' => 'Razel',
            'email' => null,
            'phone' => null,
            'address' => null,
        ]);
    }
}
