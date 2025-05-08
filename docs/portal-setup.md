# Panduan Pengaturan Subdomain Portal di Shared Hosting cPanel

Dokumen ini berisi petunjuk untuk mengatur subdomain portal di shared hosting cPanel untuk aplikasi Laravel Recodex.

## Langkah-langkah Pengaturan

### 1. Membuat Subdomain di cPanel

1. Login ke cPanel hosting Anda
2. Cari dan klik menu "Subdomains"
3. Buat subdomain baru dengan nama "portal"
4. Arahkan document root ke folder `public_html/portal`
5. Klik "Create"

### 2. Mengupload File

Setelah subdomain dibuat, upload file-file berikut ke server:

1. Upload seluruh aplikasi Laravel ke folder root hosting (biasanya `public_html`)
2. Pastikan folder `public/portal` dengan file `.htaccess` dan `index.php` sudah ada di dalam aplikasi

### 3. Konfigurasi File

1. Pastikan file `.env` sudah diupdate dengan nilai yang benar:
   ```
   APP_DOMAIN=recodex.id
   PORTAL_URL=http://portal.recodex.id
   ```

2. Pastikan file `.htaccess` di root aplikasi sudah benar untuk mengarahkan permintaan ke `public/index.php`

3. Pastikan file `.htaccess` di folder `public/portal` sudah benar untuk mengarahkan permintaan ke aplikasi Laravel

### 4. Struktur Folder

Berikut adalah struktur folder yang diharapkan di server shared hosting:

```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── index.php
│   ├── .htaccess
│   ├── portal/
│   │   ├── index.php
│   │   └── .htaccess
├── resources/
├── routes/
├── storage/
├── .env
├── .htaccess
└── server.php
```

### 5. Pengujian

Setelah semua file diupload dan dikonfigurasi:

1. Akses subdomain portal melalui browser: `http://portal.recodex.id`
2. Pastikan landing page portal tampil dengan benar
3. Uji halaman login dan register untuk memastikan routing berfungsi dengan baik

## Troubleshooting

### Masalah Umum

1. **Error 404 Not Found**
   - Periksa konfigurasi subdomain di cPanel
   - Pastikan file `.htaccess` sudah benar
   - Periksa permission file dan folder

2. **Error 500 Internal Server Error**
   - Periksa log error di cPanel
   - Pastikan nilai di file `.env` sudah benar
   - Periksa permission folder `storage` dan `bootstrap/cache`

3. **Routing Tidak Berfungsi**
   - Pastikan konfigurasi subdomain di `routes/web.php` sudah benar
   - Periksa nilai `APP_DOMAIN` di file `.env`

## Catatan Penting

- Pastikan folder `storage` memiliki permission yang benar (755 untuk folder, 644 untuk file)
- Jalankan perintah `php artisan config:cache` setelah mengubah file `.env`
- Pastikan ekstensi PHP yang diperlukan sudah diaktifkan di server hosting
