<?php

/**
 * Script untuk membuat symlink ke folder build
 *
 * Script ini membuat symlink dari folder build di direktori public ke direktori portal
 * sehingga asset yang di-build oleh Vite dapat diakses dari subdomain portal.
 */

// Definisikan path ke folder build di public
$sourcePath = __DIR__ . '/../public/build';

// Definisikan path target symlink di folder portal
$targetPath = __DIR__ . '/build';

// Periksa apakah folder build ada di public
if (!file_exists($sourcePath)) {
    echo "Error: Folder build tidak ditemukan di public. Jalankan 'npm run build' terlebih dahulu.\n";
    exit(1);
}

// Hapus symlink yang sudah ada jika ada
if (file_exists($targetPath)) {
    if (is_link($targetPath)) {
        unlink($targetPath);
        echo "Symlink lama dihapus.\n";
    } else {
        echo "Error: $targetPath sudah ada dan bukan symlink.\n";
        exit(1);
    }
}

// Buat symlink baru
if (symlink($sourcePath, $targetPath)) {
    echo "Symlink berhasil dibuat: $targetPath -> $sourcePath\n";
} else {
    echo "Error: Gagal membuat symlink.\n";
    exit(1);
}

echo "Selesai!\n";
