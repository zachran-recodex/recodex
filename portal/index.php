<?php

/**
 * Portal subdomain entry point
 *
 * This file serves as the entry point for the portal subdomain on a cPanel shared hosting environment.
 * It maps requests to the Laravel application's public directory.
 */

// Periksa apakah request adalah untuk asset Vite di folder build
if (strpos($_SERVER['REQUEST_URI'], '/build/') === 0) {
    // Jika folder build ada di portal, gunakan itu
    $buildPath = __DIR__ . '/build';
    if (!file_exists($buildPath)) {
        // Jika tidak ada, coba buat symlink atau salin dari public
        $sourcePath = __DIR__ . '/../public/build';
        if (file_exists($sourcePath)) {
            // Coba buat symlink jika memungkinkan
            @symlink($sourcePath, $buildPath);
        }
    }
}

// Define the parent application path (relative to this file)
$laravelPublicPath = __DIR__ . '/../public';

// Change the current working directory to the Laravel public path
chdir($laravelPublicPath);

// Include Laravel's public index.php file which bootstraps the application
require_once $laravelPublicPath . '/index.php';
