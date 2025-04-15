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
                    <flux:navlist.item icon="users" :href="route('dashboard.admin.user')" :current="request()->routeIs('dashboard.admin.user')" wire:navigate>User</flux:navlist.item>
                @endcan

                @can('manage roles')
                    <flux:navlist.item icon="shield-check" :href="route('dashboard.admin.role')" :current="request()->routeIs('dashboard.admin.role')" wire:navigate>Role</flux:navlist.item>
                @endcan

                <flux:navlist.item icon="shield-check" :href="route('dashboard.admin.sitemap')" :current="request()->routeIs('dashboard.admin.sitemap')" wire:navigate>Generate Sitemap</flux:navlist.item>

                <flux:navlist.item icon="shield-check" :href="route('dashboard.admin.contact')" :current="request()->routeIs('dashboard.admin.contact')" wire:navigate>Contact</flux:navlist.item>

            </flux:navlist.group>
        @endif

        @can('manage cms')
            <flux:navlist.group expandable heading="CMS">
                <flux:navlist.item icon="wrench-screwdriver" :href="route('dashboard.cms.services')" :current="request()->routeIs('dashboard.cms.services')" wire:navigate>Services</flux:navlist.item>

                <flux:navlist.item icon="newspaper" :href="route('dashboard.cms.blogs')" :current="request()->routeIs('dashboard.cms.blogs')" wire:navigate>Blogs</flux:navlist.item>

                <flux:navlist.item icon="calculator" :href="route('dashboard.cms.counters')" :current="request()->routeIs('dashboard.cms.counters')" wire:navigate>Counters</flux:navlist.item>

                <flux:navlist.item icon="question-mark-circle" :href="route('dashboard.cms.faqs')" :current="request()->routeIs('dashboard.cms.faqs')" wire:navigate>FAQs</flux:navlist.item>

                <flux:navlist.item icon="cog" :href="route('dashboard.cms.work-processes')" :current="request()->routeIs('dashboard.cms.work-processes')" wire:navigate>Work Processes</flux:navlist.item>

                <flux:navlist.item icon="document-text" :href="route('dashboard.cms.about')" :current="request()->routeIs('dashboard.cms.about')" wire:navigate>About</flux:navlist.item>

                <flux:navlist.item icon="tv" :href="route('dashboard.cms.hero')" :current="request()->routeIs('dashboard.cms.hero')" wire:navigate>Hero</flux:navlist.item>
            </flux:navlist.group>
        @endcan

        <flux:navlist.group expandable heading="Project">
            <flux:navlist.item :href="route('dashboard.project.overview')" :current="request()->routeIs('dashboard.project.index')" wire:navigate>Overview</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.project.clients')" :current="request()->routeIs('dashboard.project.clients')" wire:navigate>Clients</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.project.domains')" :current="request()->routeIs('dashboard.project.domains')" wire:navigate>Domains</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.project.projects')" :current="request()->routeIs('dashboard.project.projects')" wire:navigate>Projects</flux:navlist.item>
            <flux:navlist.item :href="route('dashboard.project.emails')" :current="request()->routeIs('dashboard.project.emails')" wire:navigate>Emails</flux:navlist.item>
        </flux:navlist.group>

    </flux:navlist>
</flux:sidebar>
