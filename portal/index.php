<?php

/**
 * Portal subdomain entry point
 *
 * This file serves as the entry point for the portal subdomain on a cPanel shared hosting environment.
 * It maps requests to the Laravel application's public directory.
 */

// Define the parent application path (relative to this file)
$laravelPublicPath = __DIR__ . '/../public';

// Change the current working directory to the Laravel public path
chdir($laravelPublicPath);

// Include Laravel's public index.php file which bootstraps the application
require_once $laravelPublicPath . '/index.php';
