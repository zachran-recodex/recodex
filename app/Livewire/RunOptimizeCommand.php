<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class RunOptimizeCommand extends Component
{
    public $isRunning = false;
    public $message = '';
    public $status = '';

    public function optimize()
    {
        $this->isRunning = true;
        $this->message = 'Running optimization...';
        $this->status = 'processing';

        try {
            Artisan::call('optimize');
            $this->message = 'Application optimized successfully!';
            $this->status = 'success';
        } catch (\Exception $e) {
            $this->message = 'Error: ' . $e->getMessage();
            $this->status = 'error';
        }

        $this->isRunning = false;
    }

    public function render()
    {
        return view('livewire.run-optimize-command');
    }
}
