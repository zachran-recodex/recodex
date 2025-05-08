<?php

// Mendefinisikan konstanta untuk menandai bahwa ini adalah subdomain portal
define('PORTAL_SUBDOMAIN', true);

// Mendapatkan URI yang sudah di-decode
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Memeriksa apakah URI bukan root dan apakah file tersebut ada
if ($uri !== '/' && file_exists(__DIR__.'/'.$uri)) {
    return false; // Jika ada file, biarkan server menangani permintaan ini
}

// Jika tidak ada file yang ditemukan, lanjutkan dengan memuat aplikasi Laravel
require_once __DIR__.'/../public/index.php';
