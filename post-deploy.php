<?php

/**
 * Post-deployment script to run database migrations on the server
 *
 * This script should be executed on the server after files are deployed via FTP
 * It handles database migrations that can't be run during GitHub Actions workflow
 */

use Illuminate\Support\Facades\DB;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/bootstrap/app.php';

// Get the Artisan console kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "Starting post-deployment tasks...\n";

// Function to check database connection
function checkDatabaseConnection() {
    try {
        DB::connection()->getPdo();
        return true;
    } catch (\Exception $e) {
        echo "Database connection failed: " . $e->getMessage() . "\n";
        return false;
    }
}

try {
    // Check database connection before running database-dependent operations
    echo "Checking database connection...\n";
    $dbConnected = checkDatabaseConnection();

    if ($dbConnected) {
        // Run database migrations
        echo "Running database migrations...\n";
        $status = $kernel->call('migrate', ['--force' => true]);
        echo $status === 0 ? "Migrations completed successfully.\n" : "Migrations failed with status {$status}.\n";
    } else {
        echo "Skipping database migrations due to connection issues.\n";
        $status = 0; // Set status to success to continue with non-database operations
    }

    // Clear caches again to ensure everything is fresh
    echo "Clearing caches...\n";
    $kernel->call('optimize:clear');
    $kernel->call('config:cache');
    $kernel->call('route:cache');
    $kernel->call('view:cache');
    $kernel->call('optimize');

    // Only run permission cache reset if database is connected
    if ($dbConnected) {
        echo "Resetting permission cache...\n";
        try {
            $kernel->call('permission:cache-reset');
        } catch (\Exception $e) {
            echo "Permission cache reset failed: " . $e->getMessage() . "\n";
            echo "Continuing with other tasks...\n";
        }
    } else {
        echo "Skipping permission cache reset due to database connection issues.\n";
    }

    echo "Post-deployment tasks completed.\n";
} catch (\Exception $e) {
    echo "Error during post-deployment: " . $e->getMessage() . "\n";
    exit(1);
}

$kernel->terminate(null, $status);
exit($status);
