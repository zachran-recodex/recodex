<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class RunClearCommand extends Component
{
    public $isRunning = false;
    public $messages = [];
    public $status = '';

    public function clearAll()
    {
        $this->isRunning = true;
        $this->messages = [];
        $this->status = 'processing';

        try {
            $commands = [
                'optimize:clear' => 'Clearing optimization cache...',
                'cache:clear' => 'Clearing application cache...',
                'config:clear' => 'Clearing configuration cache...',
                'view:clear' => 'Clearing view cache...'
            ];

            foreach ($commands as $command => $message) {
                $this->messages[] = $message;
                Artisan::call($command);
                $this->messages[] = 'Done: ' . Artisan::output();
            }

            $this->messages[] = 'All caches cleared successfully!';
            $this->status = 'success';
        } catch (\Exception $e) {
            $this->messages[] = 'Error: ' . $e->getMessage();
            $this->status = 'error';
        }

        $this->isRunning = false;
    }

    public function render()
    {
        return view('livewire.run-clear-command');
    }
}
