#!/bin/bash

# Script untuk membangun asset dan menyalinnya ke folder portal
# Jalankan script ini setelah melakukan perubahan pada kode

echo "Memulai proses build dan penyalinan asset ke portal..."

# Jalankan build Vite
echo "Menjalankan npm run build..."
npm run build

# Periksa apakah build berhasil
if [ $? -ne 0 ]; then
    echo "Error: Gagal menjalankan npm run build."
    exit 1
fi

# Periksa apakah folder build ada
if [ ! -d "./public/build" ]; then
    echo "Error: Folder build tidak ditemukan di public."
    exit 1
fi

# Buat folder build di portal jika belum ada
if [ ! -d "./portal/build" ]; then
    echo "Membuat folder build di portal..."
    mkdir -p "./portal/build"
fi

# Salin semua file dari public/build ke portal/build
echo "Menyalin asset dari public/build ke portal/build..."
cp -R ./public/build/* ./portal/build/

# Salin .htaccess khusus untuk folder build
if [ -f "./portal/build.htaccess" ]; then
    echo "Menyalin .htaccess khusus untuk folder build..."
    cp ./portal/build.htaccess ./portal/build/.htaccess
fi

echo "Selesai! Asset berhasil disalin ke folder portal."
echo "Subdomain portal sekarang dapat mengakses asset dengan benar."
