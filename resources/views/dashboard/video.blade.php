<x-layouts.app>
    <flux:container class="space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <flux:heading size="xl" class="font-bold!">Manage Video</flux:heading>

            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item separator="slash">Video</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>

        <!-- Component Livewire -->
        <livewire:manage-videos />
    </flux:container>
</x-layouts.app>