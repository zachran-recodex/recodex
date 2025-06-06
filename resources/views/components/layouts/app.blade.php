<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('components.partials.head')

        @yield('meta_tag')

        <title>{{ $title ?? config('app.name') }}</title>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist.group class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>Dashboard</flux:navlist.item>

                @if(auth()->user()->hasRole(['Super Admin', 'Admin']))

                    @if(auth()->user()->hasRole(['Super Admin']))
                        <flux:navlist variant="outline">
                            <flux:navlist.group expandable heading="Administrator" class="grid">
                                <flux:navlist.item icon="users" :href="route('admin.users')" :current="request()->routeIs('admin.users')" wire:navigate>Manage Users</flux:navlist.item>
                                <flux:navlist.item icon="shield-check" :href="route('admin.roles')" :current="request()->routeIs('admin.roles')" wire:navigate>Manage Roles</flux:navlist.item>
                            </flux:navlist.group>
                        </flux:navlist>
                    @endif

                    @can('manage cms')
                        <flux:navlist variant="outline">
                            <flux:navlist.group expandable heading="Content Management" class="grid">
                                <flux:navlist.item icon="document-text" :href="route('cms.faqs')" :current="request()->routeIs('cms.faqs')" wire:navigate>FAQs</flux:navlist.item>
                                <flux:navlist.item icon="briefcase" :href="route('cms.services')" :current="request()->routeIs('cms.services')" wire:navigate>Services</flux:navlist.item>
                                <flux:navlist.item icon="currency-dollar" :href="route('cms.pricings')" :current="request()->routeIs('cms.pricings')" wire:navigate>Pricing Packages</flux:navlist.item>
                                <flux:navlist.item icon="arrow-path" :href="route('cms.work-processes')" :current="request()->routeIs('cms.work-processes')" wire:navigate>Work Processes</flux:navlist.item>
                                <flux:navlist.item icon="information-circle" :href="route('cms.about')" :current="request()->routeIs('cms.about')" wire:navigate>About</flux:navlist.item>
                                <flux:navlist.item icon="flag" :href="route('cms.hero')" :current="request()->routeIs('cms.hero')" wire:navigate>Hero</flux:navlist.item>
                            </flux:navlist.group>
                        </flux:navlist>
                    @endcan

                    @can('manage pm')
                        <flux:navlist variant="outline">
                            <flux:navlist.group expandable heading="Project Management" class="grid">
                                <flux:navlist.item icon="squares-2x2" :href="route('pm.projects')" :current="request()->routeIs('pm.projects')" wire:navigate>Projects</flux:navlist.item>
                                <flux:navlist.item icon="document-check" :href="route('pm.clients')" :current="request()->routeIs('pm.clients')" wire:navigate>Clients</flux:navlist.item>
                                <flux:navlist.item icon="document-text" :href="route('pm.invoices')" :current="request()->routeIs('pm.invoices')" wire:navigate>Invoices</flux:navlist.item>
                            </flux:navlist.group>
                        </flux:navlist>
                    @endcan

                @endif
            </flux:navlist.group>

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :avatar="Storage::url(auth()->user()->photo_path)"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    @if(auth()->user()->photo_path && Storage::disk('public')->exists(auth()->user()->photo_path))
                                        <img
                                            src="{{ Storage::url(auth()->user()->photo_path) }}"
                                            alt="{{ auth()->user()->name }}"
                                            class="h-full w-full object-cover"
                                        />
                                    @else
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    @endif
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>Settings</flux:menu.item>
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
                    :avatar="Storage::url(auth()->user()->photo_path)"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    @if(auth()->user()->photo_path && Storage::disk('public')->exists(auth()->user()->photo_path))
                                        <img
                                            src="{{ Storage::url(auth()->user()->photo_path) }}"
                                            alt="{{ auth()->user()->name }}"
                                            class="h-full w-full object-cover"
                                        />
                                    @else
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    @endif
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>Settings</flux:menu.item>
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
        </flux:header>

        <flux:main>
            {{ $slot }}
        </flux:main>

        @fluxScripts
    </body>
</html>
