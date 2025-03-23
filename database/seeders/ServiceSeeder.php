<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'icon' => 'window',
                'image' => 'images/services/web_development.jpg',
                'title' => 'Web Development',
                'description' => 'Kami menyediakan layanan pembuatan website profesional yang responsif, fungsional, dan sesuai kebutuhan bisnis anda, baik untuk company profile, e-commerce, maupun platform custom.',
            ],
            [
                'icon' => 'code-bracket-square',
                'image' => 'images/services/mobile_development.jpg',
                'title' => 'Mobile App Development',
                'description' => 'Pengembangan aplikasi mobile berbasis Android dan iOS yang user- friendly dan dirancang untuk meningkatkan kemudahan akses serta keterlibatan pengguna.',
            ],
            [
                'icon' => 'cursor-arrow-rays',
                'image' => 'images/services/seo.jpg',
                'title' => 'SEO Optimization',
                'description' => 'Layanan optimasi mesin pencari untuk meningkatkan visibilitas website di Google dan mesin pencari lainnya, sehingga bisnis Anda lebih mudah ditemukan oleh calon pelanggan.',
            ],
            [
                'icon' => 'bookmark-square',
                'image' => 'images/services/domain.jpg',
                'title' => 'Domain Registration',
                'description' => 'Penyediaan layanan registrasi domain dengan berbagai pilihan ekstensi yang sesuai dengan identitas bisnis Anda, sekaligus memastikan keamanan dan kemudahan pengelolaan.',
            ],
            [
                'icon' => 'server-stack',
                'image' => 'images/services/hosting.jpg',
                'title' => 'Hosting',
                'description' => 'Menyediakan layanan hosting yang aman, cepat, dan stabil untuk menjamin performa website tetap optimal, didukung oleh server berkualitas tinggi.',
            ],
            [
                'icon' => 'wrench-screwdriver',
                'image' => 'images/services/maintenance.jpg',
                'title' => 'Maintenance & Support',
                'description' => 'Layanan pemeliharaan website dan aplikasi, termasuk update sistem, perbaikan bug, dan dukungan teknis agar performa digital bisnis Anda tetap prima.',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert(array_merge($service, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
