<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class VendorUpdateController extends Controller
{
    public function index()
    {
        return view('dashboard.vendor-update');
    }

    public function update()
    {
        $phpPath = '/usr/local/bin/php'; // Path PHP dari cPanel
        $composerPath = base_path('composer.phar'); // Gunakan composer.phar lokal jika tidak bisa pakai global

        $command = escapeshellcmd("$phpPath $composerPath update 2>&1");

        return response()->stream(function () use ($command) {
            $process = popen($command, 'r'); // Buka proses shell
            if ($process) {
                while (!feof($process)) {
                    echo fread($process, 4096);
                    ob_flush();
                    flush();
                }
                pclose($process);
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type'  => 'text/plain',
        ]);
    }
}
