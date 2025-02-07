<?php

namespace App\Livewire;

use Livewire\Component;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class VendorUpdate extends Component
{
    public $output = "";

    public function updateVendor()
    {
        $phpPath = '/usr/local/bin/php'; // Path PHP dari cPanel
        $composerPath = base_path('composer.phar'); // Gunakan composer.phar lokal

        // Cek apakah composer.phar ada, jika tidak, tampilkan error
        if (!file_exists($composerPath)) {
            $this->output = "Error: File composer.phar tidak ditemukan di " . $composerPath;
            return;
        }

        // Jalankan proses update menggunakan PHP dari cPanel
        $process = new Process([$phpPath, $composerPath, 'update']);
        $process->setWorkingDirectory(base_path());
        $process->setTimeout(300); // 5 menit (sesuai kebutuhan)

        // Tambahkan Environment Variables untuk cPanel
        $process->setEnv([
            'HOME' => '/home/recodexi',  // Sesuaikan dengan username cPanel
            'COMPOSER_HOME' => '/home/recodexi/.composer',
            'PATH' => getenv('PATH')
        ]);

        // Jalankan proses & tampilkan output real-time
        $process->run(function ($type, $buffer) {
            $this->output .= nl2br($buffer);
            $this->dispatch('vendorUpdateOutput', $this->output);
        });

        // Jika gagal, tampilkan error
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }

    public function render()
    {
        return view('livewire.vendor-update');
    }
}
