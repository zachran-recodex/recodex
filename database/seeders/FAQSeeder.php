<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            ['question' => 'Apa itu layanan kami?', 'answer' => 'Layanan kami menyediakan solusi digital terbaik untuk bisnis Anda.'],
            ['question' => 'Bagaimana cara mendaftar?', 'answer' => 'Anda dapat mendaftar melalui halaman pendaftaran di website kami.'],
            ['question' => 'Apakah layanan ini gratis?', 'answer' => 'Kami menyediakan paket gratis dan berbayar sesuai kebutuhan Anda.'],
            ['question' => 'Bagaimana cara menghubungi customer support?', 'answer' => 'Anda bisa menghubungi kami melalui email atau live chat.'],
            ['question' => 'Apakah ada garansi?', 'answer' => 'Kami memberikan garansi 30 hari untuk semua layanan kami.'],
            ['question' => 'Berapa lama proses aktivasi akun?', 'answer' => 'Akun akan aktif dalam waktu maksimal 24 jam setelah pendaftaran.'],
            ['question' => 'Bisakah saya membatalkan langganan?', 'answer' => 'Ya, Anda dapat membatalkan langganan kapan saja melalui dashboard.'],
            ['question' => 'Apakah data saya aman?', 'answer' => 'Kami menggunakan enkripsi canggih untuk menjaga keamanan data Anda.'],
            ['question' => 'Bagaimana cara melakukan pembayaran?', 'answer' => 'Pembayaran dapat dilakukan melalui transfer bank atau kartu kredit.'],
            ['question' => 'Apakah layanan ini mendukung mobile?', 'answer' => 'Ya, layanan kami dapat diakses melalui perangkat mobile.'],
            ['question' => 'Bagaimana cara reset password?', 'answer' => 'Anda bisa reset password melalui halaman "Lupa Password" di website.'],
            ['question' => 'Apakah saya bisa meng-upgrade paket?', 'answer' => 'Ya, Anda dapat meng-upgrade paket kapan saja melalui dashboard.'],
            ['question' => 'Apakah ada fitur API?', 'answer' => 'Ya, kami menyediakan API untuk integrasi dengan sistem lain.'],
            ['question' => 'Bisakah saya meminta fitur khusus?', 'answer' => 'Kami menerima permintaan fitur khusus sesuai kebutuhan pengguna.'],
            ['question' => 'Apakah ada layanan pelatihan?', 'answer' => 'Kami menyediakan pelatihan online dan onsite untuk pengguna.'],
            ['question' => 'Bagaimana cara melaporkan bug?', 'answer' => 'Silakan laporkan bug melalui email support kami.'],
            ['question' => 'Apakah saya bisa mengakses data saya?', 'answer' => 'Ya, Anda dapat mengunduh data Anda kapan saja melalui dashboard.'],
            ['question' => 'Bagaimana cara mengetahui update terbaru?', 'answer' => 'Kami selalu mengirimkan email dan update melalui website.'],
            ['question' => 'Apakah ada komunitas pengguna?', 'answer' => 'Ya, kami memiliki komunitas pengguna di forum resmi kami.'],
            ['question' => 'Bisakah saya mencoba layanan sebelum membeli?', 'answer' => 'Kami menyediakan uji coba gratis selama 7 hari.'],
        ];

        foreach ($faqs as &$faq) {
            $faq['created_at'] = now();
            $faq['updated_at'] = now();
        }

        DB::table('faqs')->insert($faqs);
    }
}
