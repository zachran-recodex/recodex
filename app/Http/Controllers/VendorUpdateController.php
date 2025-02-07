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
        $phpPath = '/usr/local/bin/php'; // Path PHP di cPanel
        $composerPath = base_path('composer.phar'); // Gunakan composer lokal

        $command = "$phpPath $composerPath update";

        $descriptors = [
            1 => ['pipe', 'w'], // stdout
            2 => ['pipe', 'w'], // stderr
        ];

        $process = proc_open($command, $descriptors, $pipes, base_path(), []);

        if (is_resource($process)) {
            return response()->stream(function () use ($process, $pipes) {
                while (!feof($pipes[1])) {
                    echo fread($pipes[1], 4096); // Membaca output
                    ob_flush();
                    flush();
                }
                fclose($pipes[1]);
                fclose($pipes[2]);
                proc_close($process);
            }, 200, [
                'Cache-Control' => 'no-cache',
                'X-Accel-Buffering' => 'no',
                'Content-Type' => 'text/plain',
            ]);
        }

        return response()->json(['error' => 'Gagal menjalankan proses'], 500);
    }
}
