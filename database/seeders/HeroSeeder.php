<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('heroes')->insert([
            'title'       => 'Solusi Digital Terbaik untuk Anda',
            'subtitle'    => 'Di Recodex ID, setiap proyek adalah wujud komitmen kami dalam menghadirkan solusi website yang inovatif, fungsional, dan sesuai kebutuhan klien.',
            'motto'       => 'Recode - Innovate - Transform',
            'button_text' => 'Konsultasi Sekarang',
            'image'       => 'images/hero/banner.jpg',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
