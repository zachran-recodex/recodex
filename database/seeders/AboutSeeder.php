<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Tentang Recodex ID',
            'description' => 'Recodex ID adalah perusahaan jasa pembuatan website profesional yang didedikasikan untuk membantu bisnis dari berbagai skala meraih potensi maksimal mereka di dunia digital. Didirikan dengan semangat untuk menggabungkan teknologi mutakhir dan desain kreatif, kami hadir sebagai mitra digital terpercaya bagi klien yang menginginkan kehadiran online yang kuat dan efektif.',
            'vision' => 'Menjadi mitra teknologi digital terpercaya dalam menghadirkan solusi website inovatif yang mendorong pertumbuhan bisnis di era revolusi industri',
            'mission' => [
                'Menyediakan layanan pembuatan website yang responsif, fungsional, dan estetik sesuai kebutuhan klien.',
                'Mengutamakan pengalaman pengguna (user experience) dalam setiap desain dan pengembangan website.',
                'Membantu bisnis meningkatkan visibilitas online melalui solusi digital yang terintegrasi, mulai dari desain hingga optimasi SEO.',
                'Memberikan pelayanan profesional, cepat, dan terpercaya dengan dukungan pemeliharaan dan pendampingan teknis jangka panjang.',
                'Terus berinovasi dalam teknologi dan desain untuk menghadirkan solusi website yang adaptif dan dapat berkembang sesuai kebutuhan bisnis.'
            ],
        ]);
    }
}
