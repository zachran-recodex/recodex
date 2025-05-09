import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [`resources/views/**/*`],
            // Konfigurasi untuk menangani subdomain
            detectTls: 'recodex.id',
            // Pastikan asset dapat diakses dari subdomain
            publicDirectory: 'public',
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
        // Izinkan akses dari semua subdomain
        host: true,
    },
});
