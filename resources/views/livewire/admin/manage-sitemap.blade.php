<flux:container class="space-y-4 sm:space-y-6">

    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Generate Sitemap</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Admin</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Generate Sitemap</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    <div class="mt-6 space-y-6">
        @if ($lastGenerated)
            <div class="space-y-4">
                <flux:heading>Status Sitemap</flux:heading>
                <flux:text>Terakhir di-generate: {{ date('d M Y H:i', $lastGenerated) }}</flux:text>
                <flux:text><flux:link href="{{ $sitemapUrl }}" target="_blank">Lihat Sitemap</flux:link></flux:text>
            </div>
        @else
            <flux:callout variant="warning">
                <flux:callout.heading icon="exclamation-circle">Sitemap belum di-generate</flux:callout.heading>

                <flux:callout.text>Klik tombol Generate untuk membuat sitemap baru.</flux:callout.text>
            </flux:callout>
        @endif

        <flux:button type="button" variant="primary" class="w-full sm:w-fit" icon="plus" wire:click="generate" wire:loading.attr="disabled">
            Generate Sitemap
        </flux:button>
    </div>
</flux:container>
