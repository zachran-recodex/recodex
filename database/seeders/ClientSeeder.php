<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [];

        for ($i = 1; $i <= 20; $i++) {
            $clients[] = [
                'name'       => 'Client ' . $i,
                'email'      => 'client' . $i . '@example.com',
                'phone'      => '0812' . rand(10000000, 99999999),
                'company'    => 'Company ' . $i,
                'photo'      => 'images/clients/client_' . $i . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('clients')->insert($clients);
    }
}
