<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     */
    public function created(Service $service): void
    {
        $this->clearServicesMenuCache();
    }

    /**
     * Handle the Service "updated" event.
     */
    public function updated(Service $service): void
    {
        $this->clearServicesMenuCache();
    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        $this->clearServicesMenuCache();
    }

    /**
     * Handle the Service "restored" event.
     */
    public function restored(Service $service): void
    {
        $this->clearServicesMenuCache();
    }

    /**
     * Handle the Service "force deleted" event.
     */
    public function forceDeleted(Service $service): void
    {
        $this->clearServicesMenuCache();
    }

    /**
     * Clear the cached services menu.
     */
    protected function clearServicesMenuCache(): void
    {
        Cache::forget('services_menu');
    }
}
