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
            ['title' => 'Analisis Kebutuhan', 'description' => 'Memahami kebutuhan klien dan merancang solusi yang tepat.'],
            ['title' => 'Perencanaan', 'description' => 'Membuat blueprint dan menetapkan timeline untuk proyek.'],
            ['title' => 'Pengembangan', 'description' => 'Melakukan coding dan pengembangan fitur sesuai rencana.'],
            ['title' => 'Pengujian', 'description' => 'Melakukan testing untuk memastikan kualitas dan performa.'],
            ['title' => 'Deployment & Maintenance', 'description' => 'Menyebarkan proyek ke server dan melakukan pemeliharaan berkala.'],
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
