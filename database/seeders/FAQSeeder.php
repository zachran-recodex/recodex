<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa layanan utama yang ditawarkan Recodex ID?',
                'answer' => 'Recodex ID menyediakan layanan pembuatan website, pengembangan aplikasi mobile, SEO optimization, registrasi domain, hosting, maintenance & support, IT consultant, dan UI/UX design.',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'question' => 'Apa keunggulan layanan website Recodex ID?',
                'answer' => 'Kami mengembangkan website yang responsif, fungsional, estetik, serta mengutamakan user experience dan optimasi SEO.',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'question' => 'Bagaimana proses kerja di Recodex ID?',
                'answer' => 'Proses kerja kami meliputi konsultasi & perencanaan, desain & pengembangan, pengujian & optimasi, peluncuran, serta dukungan berkelanjutan.',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'question' => 'Apakah Recodex ID menyediakan layanan maintenance website?',
                'answer' => 'Ya, kami menyediakan layanan maintenance termasuk update sistem, perbaikan bug, dan dukungan teknis jangka panjang.',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'question' => 'Apakah Recodex ID membantu dalam SEO website?',
                'answer' => 'Ya, kami menyediakan layanan SEO untuk meningkatkan visibilitas website di Google dan mesin pencari lainnya.',
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'question' => 'Apakah Recodex ID menyediakan domain dan hosting?',
                'answer' => 'Kami menyediakan layanan registrasi domain berbagai ekstensi dan layanan hosting yang aman, cepat, dan stabil.',
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'question' => 'Apakah bisa berkonsultasi sebelum mulai proyek?',
                'answer' => 'Tentu saja! Kami menyediakan layanan konsultasi IT untuk membantu menentukan solusi digital yang tepat dan efisien.',
                'is_active' => true,
                'sort_order' => 7
            ],
            [
                'question' => 'Bagaimana cara menghubungi Recodex ID?',
                'answer' => 'Anda dapat menghubungi kami melalui email di info@recodex.id atau WhatsApp di +62 822-9814-1940.',
                'is_active' => true,
                'sort_order' => 8
            ],
            [
                'question' => 'Apa visi dari Recodex ID?',
                'answer' => 'Menjadi mitra teknologi digital terpercaya dalam menghadirkan solusi website inovatif yang mendorong pertumbuhan bisnis di era revolusi industri.',
                'is_active' => true,
                'sort_order' => 9
            ],
            [
                'question' => 'Apa misi utama Recodex ID?',
                'answer' => 'Misi kami meliputi penyediaan website responsif, fokus pada user experience, meningkatkan visibilitas online, layanan profesional, serta inovasi berkelanjutan.',
                'is_active' => true,
                'sort_order' => 10
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
