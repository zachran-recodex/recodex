<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('components.layouts.partials.head')
        <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">

        <!-- Sidebar -->
        @include('components.layouts.partials.sidebar')

        <!-- Header -->
        @include('components.layouts.partials.header')

        <flux:main>
            {{ $slot }}
        </flux:main>

        <livewire:notification />

        @fluxScripts
        <script src="{{ asset('vendor/quill/quill.js') }}" defer></script>
    </body>
</html>
