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
            'title'       => 'Selamat Datang di Website Kami',
            'subtitle'    => 'Solusi Digital Terbaik untuk Anda',
            'motto'       => 'Kami hadir untuk memberikan layanan terbaik bagi bisnis Anda.',
            'button_text' => 'Pelajari Lebih Lanjut',
            'image'       => 'images/hero/banner.jpg',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
