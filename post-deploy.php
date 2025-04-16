<?php

/**
 * Post-deployment script to run database migrations on the server
 *
 * This script should be executed on the server after files are deployed via FTP
 * It handles database migrations that can't be run during GitHub Actions workflow
 */

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/bootstrap/app.php';

// Get the Artisan console kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "Starting post-deployment tasks...\n";

try {
    // Run database migrations
    echo "Running database migrations...\n";
    $status = $kernel->call('migrate', ['--force' => true]);
    echo $status === 0 ? "Migrations completed successfully.\n" : "Migrations failed with status {$status}.\n";

    // Clear caches again to ensure everything is fresh
    echo "Clearing caches...\n";
    $kernel->call('optimize:clear');
    $kernel->call('config:cache');
    $kernel->call('route:cache');
    $kernel->call('view:cache');
    $kernel->call('optimize');
    $kernel->call('permission:cache-reset');

    echo "Post-deployment tasks completed.\n";
} catch (\Exception $e) {
    echo "Error during post-deployment: " . $e->getMessage() . "\n";
    exit(1);
}

$kernel->terminate(null, $status);
exit($status);
