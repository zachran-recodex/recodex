<?php

/**
 * Script untuk menyalin asset Vite ke folder portal
 *
 * Script ini menyalin folder build dari direktori public ke direktori portal
 * sehingga asset yang di-build oleh Vite dapat diakses dari subdomain portal.
 * Gunakan script ini jika symlink tidak berfungsi di lingkungan hosting.
 */

// Definisikan path ke folder build di public
$sourcePath = __DIR__ . '/../public/build';

// Definisikan path target di folder portal
$targetPath = __DIR__ . '/build';

// Periksa apakah folder build ada di public
if (!file_exists($sourcePath)) {
    echo "Error: Folder build tidak ditemukan di public. Jalankan 'npm run build' terlebih dahulu.\n";
    exit(1);
}

// Fungsi untuk menyalin folder secara rekursif
function copyDirectory($source, $destination) {
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $dir = opendir($source);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $srcFile = $source . '/' . $file;
            $destFile = $destination . '/' . $file;

            if (is_dir($srcFile)) {
                copyDirectory($srcFile, $destFile);
            } else {
                copy($srcFile, $destFile);
            }
        }
    }
    closedir($dir);
}

// Hapus folder target jika sudah ada
if (file_exists($targetPath)) {
    // Fungsi untuk menghapus folder secara rekursif
    function removeDirectory($path) {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        return rmdir($path);
    }

    removeDirectory($targetPath);
    echo "Folder target lama dihapus.\n";
}

// Salin folder build ke folder portal
copyDirectory($sourcePath, $targetPath);
echo "Asset berhasil disalin ke folder portal.\n";

echo "Selesai! Asset Vite sekarang tersedia di subdomain portal.\n";
