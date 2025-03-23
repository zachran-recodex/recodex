<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('home') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <!-- Theme Switcher -->
                <flux:radio.group variant="segmented" x-model="$flux.appearance" class="mx-4 mb-4">
                    <flux:radio value="light" icon="sun" />
                    <flux:radio value="dark" icon="moon" />
                    <flux:radio value="system" icon="computer-desktop" />
                </flux:radio.group>

                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>Dashboard</flux:navlist.item>

                @if(auth()->user()->hasRole(['admin', 'super-admin']))
                    <flux:navlist.group expandable heading="Admin">
                        @can('manage users')
                            <flux:navlist.item icon="users" :href="route('dashboard.admin.user')" :current="request()->routeIs('dashboard.admin.user')" wire:navigate>Manage User</flux:navlist.item>
                        @endcan

                        @can('manage roles')
                            <flux:navlist.item icon="shield-check" :href="route('dashboard.admin.role')" :current="request()->routeIs('dashboard.admin.role')" wire:navigate>Manage Role</flux:navlist.item>
                        @endcan
                    </flux:navlist.group>
                @endif

                @can('manage cms')
                    <flux:navlist.group expandable heading="CMS">
                        <flux:navlist.item icon="wrench-screwdriver" :href="route('dashboard.cms.services')" :current="request()->routeIs('dashboard.cms.services')" wire:navigate>Manage Services</flux:navlist.item>

                        <flux:navlist.item icon="folder" :href="route('dashboard.cms.projects')" :current="request()->routeIs('dashboard.cms.projects')" wire:navigate>Manage Projects</flux:navlist.item>

                        <flux:navlist.item icon="newspaper" :href="route('dashboard.cms.blogs')" :current="request()->routeIs('dashboard.cms.blogs')" wire:navigate>Manage Blogs</flux:navlist.item>
                    </flux:navlist.group>
                @endcan

                <flux:navlist.group expandable heading="Projects">
                    <flux:navlist.item href="#">Total Project</flux:navlist.item>
                    <flux:navlist.item href="#">Running Project</flux:navlist.item>
                    <flux:navlist.item href="#">Income Project</flux:navlist.item>
                </flux:navlist.group>

            </flux:navlist>
        </flux:sidebar>

        <flux:header sticky class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <flux:navbar class="w-full">
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                <flux:spacer />

                <flux:dropdown position="bottom" align="end">
                    <flux:profile
                        :avatar="auth()->user()->photo ? Storage::url(auth()->user()->photo) : null"
                        :initials="auth()->user()->initials()"
                        :name="auth()->user()->name"
                        :role="Str::title(str_replace('-', ' ', auth()->user()->roles->first()?->name))"
                        icon-trailing="chevron-down"
                        class="border! border-zinc-200! dark:border-zinc-700!"
                    />

                    <flux:menu>
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
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

            </flux:navbar>
        </flux:header>

        <flux:main>
            {{ $slot }}
        </flux:main>

        <livewire:notification />

        @fluxScripts
    </body>
</html>
