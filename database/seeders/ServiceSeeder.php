<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'subtitle' => 'Website Profesional untuk Bisnis Anda',
                'description' => 'Kami menyediakan layanan pembuatan website profesional yang responsif, fungsional, dan sesuai kebutuhan bisnis Anda, baik untuk company profile, e-commerce, maupun platform custom.',
                'content' => '<p>Kami mengembangkan website dengan pendekatan modern, mengutamakan kecepatan, keamanan, dan desain user-centric. Mulai dari desain wireframe hingga deployment hosting.</p>',
                'icon' => 'window',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'SEO Optimization',
                'subtitle' => 'Tingkatkan Visibilitas Website Anda',
                'description' => 'Layanan optimasi mesin pencari untuk meningkatkan visibilitas website Anda di Google dan mesin pencari lainnya, sehingga bisnis Anda lebih mudah ditemukan oleh calon pelanggan.',
                'content' => '<p>Kami melakukan riset kata kunci, optimasi on-page, technical SEO, dan backlink building untuk meningkatkan peringkat website Anda.</p>',
                'icon' => 'cursor-arrow-rays',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'Domain Registration',
                'subtitle' => 'Domain Bisnis Anda, Identitas Online Anda',
                'description' => 'Penyediaan layanan registrasi domain dengan berbagai pilihan ekstensi yang sesuai dengan identitas bisnis Anda, sekaligus memastikan keamanan dan kemudahan pengelolaan.',
                'content' => '<p>Kami membantu Anda memilih domain yang tepat, serta melakukan registrasi, perpanjangan, dan pengelolaan domain dengan mudah.</p>',
                'icon' => 'bookmark-square',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'title' => 'Hosting',
                'subtitle' => 'Hosting Cepat dan Aman',
                'description' => 'Menyediakan layanan hosting yang aman, cepat, dan stabil untuk menjamin performa website tetap optimal, didukung oleh server berkualitas tinggi.',
                'content' => '<p>Kami menyediakan shared hosting, VPS, dan dedicated server dengan uptime 99.9% serta dukungan penuh 24/7.</p>',
                'icon' => 'server-stack',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'title' => 'Maintenance & Support',
                'subtitle' => 'Layanan Pemeliharaan Website Anda',
                'description' => 'Layanan pemeliharaan website dan aplikasi, termasuk update sistem, perbaikan bug, dan dukungan teknis agar performa digital bisnis Anda tetap prima.',
                'content' => '<p>Kami memberikan layanan update berkala, backup data, security monitoring, dan perbaikan teknis cepat untuk website Anda.</p>',
                'icon' => 'wrench-screwdriver',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'title' => 'IT Consultant',
                'subtitle' => 'Solusi Teknologi untuk Bisnis Anda',
                'description' => 'Memberikan konsultasi teknologi informasi yang strategis untuk membantu bisnis menentukan solusi digital yang tepat, efisien, dan sesuai kebutuhan.',
                'content' => '<p>Kami membantu bisnis Anda dalam memilih, mengembangkan, dan mengimplementasikan solusi IT yang efektif dan sesuai target bisnis.</p>',
                'icon' => 'briefcase',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'title' => 'UI/UX Design',
                'subtitle' => 'Pengalaman Digital yang Menarik',
                'description' => 'Perancangan antarmuka (UI) dan pengalaman pengguna (UX) yang intuitif, modern, dan menarik, guna memastikan kenyamanan dan kemudahan bagi pengguna website maupun aplikasi.',
                'content' => '<p>Dalam desain UI/UX, kami fokus pada riset pengguna, wireframing, prototyping, desain visual, usability testing, dan iterasi berkelanjutan untuk menciptakan pengalaman digital yang memuaskan.</p>',
                'icon' => 'photo',
                'image_path' => null,
                'content_image_path' => null,
                'feature_list' => null,
                'is_active' => true,
                'sort_order' => 7
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
