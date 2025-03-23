<x-layouts.app>
    <flux:container class="space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <flux:heading size="xl" class="font-bold!">Manage Member</flux:heading>

            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item separator="slash">Member</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>

        <!-- Component Livewire -->
        <livewire:cms.manage-members />
    </flux:container>
</x-layouts.app>
