# Implementasi Subdomain Portal untuk Recodex

Dokumentasi ini menjelaskan implementasi landing page untuk subdomain portal (`portal.recodex.id`) yang telah dikonfigurasi untuk berjalan di shared hosting cPanel.

## Fitur yang Diimplementasikan

1. Landing page untuk subdomain portal
2. Halaman login dan register portal
3. Konfigurasi routing untuk subdomain portal
4. Middleware untuk mendeteksi dan menangani request dari subdomain portal
5. Konfigurasi .htaccess untuk shared hosting cPanel

## Struktur File

```
├── app/
│   └── Http/
│       ├── Controllers/
│       │   └── PortalController.php    # Controller untuk portal
│       └── Middleware/
│           └── DetectSubdomain.php     # Middleware untuk deteksi subdomain
├── bootstrap/
│   └── app.php                         # Konfigurasi middleware
├── public/
│   ├── portal/
│   │   ├── .htaccess                   # Konfigurasi Apache untuk subdomain
│   │   ├── index.php                   # Entry point untuk subdomain
│   │   └── README.md                   # Dokumentasi folder portal
├── resources/
│   └── views/
│       └── portal/
│           ├── index.blade.php         # View landing page portal
│           ├── login.blade.php         # View halaman login
│           └── register.blade.php      # View halaman register
├── routes/
│   └── web.php                         # Konfigurasi routing subdomain
├── .env                                # Konfigurasi environment
├── .htaccess                           # Konfigurasi Apache root
└── docs/
    └── portal-setup.md                 # Panduan pengaturan di cPanel
```

## Cara Kerja

1. **Routing Subdomain**:
   - Subdomain portal dideteksi melalui `Route::domain('portal.' . env('APP_DOMAIN'))`
   - Semua request ke subdomain portal akan diarahkan ke controller `PortalController`

2. **Middleware DetectSubdomain**:
   - Mendeteksi apakah request berasal dari subdomain portal
   - Mengatur konfigurasi aplikasi sesuai dengan subdomain yang terdeteksi

3. **Konfigurasi .htaccess**:
   - File `.htaccess` di root dan di folder `portal` dikonfigurasi untuk mengarahkan request dengan benar
   - Mendukung shared hosting cPanel dengan struktur folder yang sesuai

## Deployment di Shared Hosting cPanel

Untuk petunjuk lengkap deployment di shared hosting cPanel, silakan lihat file [docs/portal-setup.md](/Users/user/Herd/recodex/docs/portal-setup.md).

Ringkasan langkah-langkah:

1. Buat subdomain `portal` di cPanel
2. Upload aplikasi ke server hosting
3. Pastikan struktur folder sudah benar
4. Konfigurasi file `.env` dengan nilai yang sesuai
5. Atur permission folder dan file

## Pengujian

Setelah deployment, akses subdomain portal melalui browser:

```
http://portal.recodex.id
```

Pastikan landing page portal tampil dengan benar dan routing untuk halaman login dan register berfungsi dengan baik.

## Catatan Penting

- Pastikan nilai `APP_DOMAIN` di file `.env` sudah benar
- Jalankan `php artisan config:cache` setelah mengubah file `.env`
- Pastikan folder `storage` memiliki permission yang benar
- Jika menggunakan SSL, pastikan konfigurasi URL di `.env` menggunakan `https://`
