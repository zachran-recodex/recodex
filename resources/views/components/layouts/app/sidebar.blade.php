<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>Dashboard</flux:navlist.item>

                <flux:navlist.group expandable heading="CMS" class="hidden lg:grid">

                    <flux:navlist.item icon="information-circle" :href="route('dashboard.about')" :current="request()->routeIs('dashboard.about')" wire:navigate>
                        About
                    </flux:navlist.item>

                    <flux:navlist.item icon="document-text" :href="route('dashboard.blog')" :current="request()->routeIs('dashboard.blog')" wire:navigate>
                        Blog
                    </flux:navlist.item>

                    <flux:navlist.item icon="users" :href="route('dashboard.client')" :current="request()->routeIs('dashboard.client')" wire:navigate>
                        Client
                    </flux:navlist.item>

                    <flux:navlist.item icon="chart-bar" :href="route('dashboard.counter')" :current="request()->routeIs('dashboard.counter')" wire:navigate>
                        Counter
                    </flux:navlist.item>

                    <flux:navlist.item icon="question-mark-circle" :href="route('dashboard.faq')" :current="request()->routeIs('dashboard.faq')" wire:navigate>
                        FAQ
                    </flux:navlist.item>

                    <flux:navlist.item icon="presentation-chart-bar" :href="route('dashboard.hero-section')" :current="request()->routeIs('dashboard.hero-section')" wire:navigate>
                        Hero Section
                    </flux:navlist.item>

                    <flux:navlist.item icon="user-group" :href="route('dashboard.member')" :current="request()->routeIs('dashboard.member')" wire:navigate>
                        Member
                    </flux:navlist.item>

                    <flux:navlist.item icon="folder" :href="route('dashboard.portfolio')" :current="request()->routeIs('dashboard.portfolio')" wire:navigate>
                        Portfolio
                    </flux:navlist.item>

                    <flux:navlist.item icon="currency-dollar" :href="route('dashboard.pricing')" :current="request()->routeIs('dashboard.pricing')" wire:navigate>
                        Pricing
                    </flux:navlist.item>

                    <flux:navlist.item icon="wrench-screwdriver" :href="route('dashboard.service')" :current="request()->routeIs('dashboard.service')" wire:navigate>
                        Services
                    </flux:navlist.item>

                    <flux:navlist.item icon="chat-bubble-left-right" :href="route('dashboard.testimonial')" :current="request()->routeIs('dashboard.testimonial')" wire:navigate>
                        Testimonial
                    </flux:navlist.item>

                    <flux:navlist.item icon="play-circle" :href="route('dashboard.video')" :current="request()->routeIs('dashboard.video')" wire:navigate>
                        Video
                    </flux:navlist.item>

                    <flux:navlist.item icon="cog-6-tooth" :href="route('dashboard.work-process')" :current="request()->routeIs('dashboard.work-process')" wire:navigate>
                        Work Process
                    </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group expandable heading="Projects" class="hidden lg:grid">
                    <flux:navlist.item icon="home" :href="route('dashboard.project')" :current="request()->routeIs('dashboard.project')" wire:navigate>Overview</flux:navlist.item>
                    <flux:navlist.item href="#">Total Project</flux:navlist.item>
                    <flux:navlist.item href="#">Running Project</flux:navlist.item>
                    <flux:navlist.item href="#">Income Project</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Platform" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard.erd')" :current="request()->routeIs('dashboard.erd')" wire:navigate>
                        Entity Relationship Diagram
                    </flux:navlist.item>
                </flux:navlist.group>

            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                    Repository
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                    Documentation
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            Log Out
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        <livewire:notification />

        @fluxScripts
    </body>
</html>
