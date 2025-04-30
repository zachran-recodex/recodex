<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'title' => 'Solusi Digital Terbaik untuk Anda',
            'subtitle' => 'Di Recodex ID, setiap proyek adalah wujud komitmen kami dalam menghadirkan solusi website yang inovatif, fungsional, dan sesuai kebutuhan klien.',
            'motto' => 'Recode - Innovate - Transform',
            'button_text' => 'Konsultasi Sekarang',
            'image_path' => null,
        ]);
    }
}
