<?php

use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    //
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Account Inactive" description="Your account is currently inactive. Please contact the administrator for account activation." />

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        Return to
        <flux:link :href="route('home')" wire:navigate>Home</flux:link>
    </div>
</div>
