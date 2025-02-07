<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xterm/css/xterm.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-background-light">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen">
        <!-- Off-canvas menu for mobile -->
        <div x-show="sidebarOpen" class="relative z-50 lg:hidden" x-description="Off-canvas menu for mobile"
            role="dialog" aria-modal="true">
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-shark-950/80"></div>

            <div class="fixed inset-0 flex">
                <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    class="relative flex flex-1 w-full max-w-xs mr-16">
                    <div class="absolute top-0 flex justify-center w-16 pt-5 left-full">
                        <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="w-6 h-6 text-shark-50" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Sidebar component for mobile -->
                    <div
                        class="flex flex-col px-6 pb-4 overflow-y-auto bg-white border-r border-shark-200 grow gap-y-5">
                        <div class="flex items-center h-16 shrink-0">
                            <h3 class="text-2xl font-bold tracking-tight text-primary-500">
                                Recodex ID
                            </h3>
                        </div>
                        <nav class="flex flex-col flex-1">
                            <ul role="list" class="flex flex-col flex-1 gap-y-6">
                                <li>
                                    <h2 class="text-xs font-semibold leading-6 text-shark-400 uppercase">PAGES</h2>

                                    <ul role="list" class="-mx-2 space-y-1">
                                        <!-- Dashboard Link -->
                                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                            class="flex items-center p-2 rounded-md gap-x-3">
                                            <svg
                                                class="w-6 h-6 shrink-0 {{ request()->routeIs('dashboard') ? 'text-primary-500' : 'text-shark-400' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                            Dashboard
                                        </x-nav-link>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-64 lg:flex-col">
            <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-white border-r border-shark-200 grow gap-y-5">
                <div class="flex items-center h-16 shrink-0">
                    <a href="" class="text-2xl font-bold tracking-tight text-primary-500">
                        Recodex ID
                    </a>
                </div>
                <nav class="flex flex-col flex-1">
                    <ul role="list" class="flex flex-col flex-1 gap-y-6">
                        <li>
                            <h2 class="text-xs font-semibold leading-6 text-shark-400 uppercase">PAGES</h2>

                            <ul role="list" class="-mx-2 space-y-1">
                                <!-- Dashboard Link -->
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                    class="flex items-center p-2 rounded-md gap-x-3">
                                    <svg
                                        class="w-6 h-6 shrink-0 {{ request()->routeIs('dashboard') ? 'text-primary-500' : 'text-shark-400' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Dashboard
                                </x-nav-link>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-64">
            <!-- Top header -->
            <div
                class="sticky top-0 z-40 flex items-center h-16 px-4 bg-white border-b border-shark-200 shadow-sm shrink-0 gap-x-4 sm:gap-x-6 sm:px-6 lg:px-8">
                <button type="button" class="-m-2.5 p-2.5 text-shark-950 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- Separator -->
                <div class="w-px h-6 bg-shark-950 lg:hidden" aria-hidden="true"></div>

                <div class="flex justify-end flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <!-- Notification dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="p-2 text-shark-500 hover:text-shark-700">
                                <span class="sr-only">View notifications</span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <div class="px-4 py-2 text-sm text-shark-700">No new notifications</div>
                            </div>
                        </div>

                        <!-- Separator -->
                        <div class="w-px h-6 bg-shark-950"></div>

                        <!-- Profile dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center p-1.5">
                                <span class="sr-only">Open user menu</span>
                                <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                                    <h3 class="text-primary-600 font-medium text-sm">
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </h3>
                                </div>
                                <div class="hidden lg:flex lg:items-center">
                                    <h3 class="ml-4 text-sm font-semibold leading-6 text-shark-900"
                                        aria-hidden="true">{{ Auth::user()->name }}
                                    </h3>
                                    <svg class="w-5 h-5 ml-2 text-shark-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-shark-700 hover:bg-shark-100" role="menuitem"
                                    tabindex="-1">Your Profile</a>
                                <a href="" class="block px-4 py-2 text-sm text-shark-700 hover:bg-shark-100"
                                    role="menuitem" tabindex="-1">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-shark-700 hover:bg-shark-100"
                                        role="menuitem" tabindex="-1">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
