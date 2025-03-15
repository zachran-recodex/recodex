<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('counters')->insert([
            [
                'title'      => 'Projects Completed',
                'number'     => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Happy Clients',
                'number'     => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Awards Won',
                'number'     => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
