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

                <flux:navlist.item icon="users" :href="route('dashboard.cms.clients')" :current="request()->routeIs('dashboard.cms.clients')" wire:navigate>Manage Clients</flux:navlist.item>

                <flux:navlist.item icon="calculator" :href="route('dashboard.cms.counters')" :current="request()->routeIs('dashboard.cms.counters')" wire:navigate>Manage Counters</flux:navlist.item>

                <flux:navlist.item icon="question-mark-circle" :href="route('dashboard.cms.faqs')" :current="request()->routeIs('dashboard.cms.faqs')" wire:navigate>Manage FAQs</flux:navlist.item>

                <flux:navlist.item icon="cog" :href="route('dashboard.cms.work-processes')" :current="request()->routeIs('dashboard.cms.work-processes')" wire:navigate>Manage Work Processes</flux:navlist.item>

                <flux:navlist.item icon="cog" :href="route('dashboard.cms.about')" :current="request()->routeIs('dashboard.cms.about')" wire:navigate>Manage About</flux:navlist.item>

                <flux:navlist.item icon="cog" :href="route('dashboard.cms.hero')" :current="request()->routeIs('dashboard.cms.hero')" wire:navigate>Manage Hero</flux:navlist.item>
            </flux:navlist.group>
        @endcan

        <flux:navlist.group expandable heading="Projects">
            <flux:navlist.item href="#">Total Project</flux:navlist.item>
            <flux:navlist.item href="#">Running Project</flux:navlist.item>
            <flux:navlist.item href="#">Income Project</flux:navlist.item>
        </flux:navlist.group>

    </flux:navlist>
</flux:sidebar>
