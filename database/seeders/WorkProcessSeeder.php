<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workProcesses = [
            ['title' => 'Konsultasi & Perencanaan', 'description' => 'Memahami kebutuhan dan tujuan bisnis anda.'],
            ['title' => 'Desain & Pengembangan', 'description' => 'Menciptakan website yang fungsional dan menarik.'],
            ['title' => 'Pengujian & Optimas', 'description' => 'Memastikan performa terbaik di semua perangkat.'],
            ['title' => 'Peluncuran', 'description' => 'Menerapkan website anda secara profesional.'],
            ['title' => 'Dukungan Berkelanjutan', 'description' => 'Mendampingi pertumbuhan digital anda.'],
        ];

        foreach ($workProcesses as $process) {
            DB::table('work_processes')->insert([
                'title'       => $process['title'],
                'description' => $process['description'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
