<x-layouts.app>
    <flux:container class="space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <flux:heading size="xl" class="font-bold!">Manage Work Process</flux:heading>

            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item separator="slash">Work Process</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>

        <!-- Component Livewire -->
        <livewire:cms.manage-work-process />
    </flux:container>
</x-layouts.app>
