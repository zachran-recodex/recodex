<div
    class="sticky top-0 z-40 flex items-center h-16 px-4 bg-white border-b border-shark-200 shadow-sm shrink-0 gap-x-4 sm:gap-x-6 sm:px-6 lg:px-8">
    <button type="button" class="-m-2.5 p-2.5 text-shark-950 lg:hidden" @click="sidebarOpen = true">
        <span class="sr-only">Open sidebar</span>
        <x-fas-bars class="w-6 h-6" />
    </button>

    <!-- Separator -->
    <div class="w-px h-6 bg-shark-950 lg:hidden" aria-hidden="true"></div>

    <div class="flex items-center gap-x-4 lg:gap-x-6">
        <livewire:run-optimize-command />

        <livewire:run-clear-command />
    </div>

    <div class="flex justify-end flex-1 gap-x-4 self-stretch lg:gap-x-6">
        <div class="flex items-center gap-x-4 lg:gap-x-6">
            <!-- Notification dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="p-2 bg-shark-100 rounded-full text-shark-500 hover:text-shark-700">
                    <span class="sr-only">View notifications</span>
                    <x-fas-bell class="w-4 h-4" />
                </button>

                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 z-10 w-64 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                     tabindex="-1">
                    <div class="border-b px-4 py-2 text-sm">Notification</div>
                    <div class="px-4 py-2 text-sm text-shark-700">No new notifications</div>
                </div>
            </div>

            <!-- Message dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="p-2 bg-shark-100 rounded-full text-shark-500 hover:text-shark-700">
                    <span class="sr-only">View messages</span>
                    <x-fas-message class="w-4 h-4" />
                </button>

                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 z-10 w-64 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                     tabindex="-1">
                    <div class="border-b px-4 py-2 text-sm">Message</div>
                    <div class="px-4 py-2 text-sm text-shark-700">No new messages</div>
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
                    </div>
                </button>

                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                     tabindex="-1">
                    <a href="{{ route('profile.show') }}" class="flex px-4 py-2 text-sm text-shark-700 hover:bg-shark-100" role="menuitem" tabindex="-1">
                        <x-fas-user class="w-4 h-4 mr-2" />
                        My Profile
                    </a>
                    <a href="" class="flex px-4 py-2 text-sm text-shark-700 hover:bg-shark-100" role="menuitem" tabindex="-1">
                        <x-fas-cog class="w-4 h-4 mr-2" />
                        Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="border-t">
                        @csrf
                        <button type="submit" class="flex w-full px-4 py-2 text-left text-sm text-shark-700 hover:bg-shark-100" role="menuitem" tabindex="-1">
                            <x-fas-sign-out-alt class="w-4 h-4 mr-2" />
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
