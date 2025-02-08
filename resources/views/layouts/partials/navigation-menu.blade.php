<nav class="flex flex-col flex-1">
    <ul role="list" class="flex flex-col flex-1 gap-y-6">
        <li>
            <h2 class="text-xs font-semibold leading-6 text-shark-400 uppercase">MENU</h2>
            <ul role="list" class="-mx-2 space-y-1">
                <!-- Static Navigation Links -->
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-home class="w-5 h-5 shrink-0 @if(request()->routeIs('dashboard')) text-primary-500 @else text-shark-950 @endif" />
                    Dashboard
                </x-nav-link>

                <x-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')"
                            class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-calendar-days class="w-5 h-5 shrink-0 @if(request()->routeIs('calendar')) text-primary-500 @else text-shark-950 @endif" />
                    Calendar
                </x-nav-link>

                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-user class="w-5 h-5 shrink-0" />
                    Profile
                </x-nav-link>

                <!-- Task Dropdown Implementation -->
                <div x-data="{ show: false }">
                    <button @click="show = ! show"
                            class="flex items-center w-full p-2 rounded-md gap-x-3 hover:bg-shark-50 hover:text-primary-500">
                        <x-fas-list-ul class="w-5 h-5 shrink-0" />
                        <span class="w-full flex">Task</span>
                        <x-fas-chevron-down class="w-4 h-4 shrink-0 transition-transform"
                                            x-bind:class="show ? 'rotate-180' : ''" />
                    </button>
                    <div x-show="show"
                         x-transition
                         class="pl-4 mt-1 space-y-1">
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Task List</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Task Details</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Task Calendar</x-nav-link>
                    </div>
                </div>

                <!-- Forms Dropdown Implementation -->
                <div x-data="{ show: false }">
                    <button @click="show = ! show"
                            class="flex items-center w-full p-2 rounded-md gap-x-3 hover:bg-shark-50 hover:text-primary-500">
                        <x-fas-clipboard class="w-5 h-5 shrink-0" />
                        <span class="w-full flex">Forms</span>
                        <x-fas-chevron-down class="w-4 h-4 shrink-0 transition-transform"
                                            x-bind:class="show ? 'rotate-180' : ''" />
                    </button>
                    <div x-show="show"
                         x-transition
                         class="pl-4 mt-1 space-y-1">
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Basic Forms</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Form Validation</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Form Wizards</x-nav-link>
                    </div>
                </div>

                <!-- Tables Dropdown Implementation -->
                <div x-data="{ show: false }">
                    <button @click="show = ! show"
                            class="flex items-center w-full p-2 rounded-md gap-x-3 hover:bg-shark-50 hover:text-primary-500">
                        <x-fas-table class="w-5 h-5 shrink-0" />
                        <span class="w-full flex">Tables</span>
                        <x-fas-chevron-down class="w-4 h-4 shrink-0 transition-transform"
                                            x-bind:class="show ? 'rotate-180' : ''" />
                    </button>
                    <div x-show="show"
                         x-transition
                         class="pl-4 mt-1 space-y-1">
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Basic Tables</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Data Tables</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Responsive Tables</x-nav-link>
                    </div>
                </div>

                <!-- Pages Dropdown Implementation -->
                <div x-data="{ show: false }">
                    <button @click="show = ! show"
                            class="flex items-center w-full p-2 rounded-md gap-x-3 hover:bg-shark-50 hover:text-primary-500">
                        <x-fas-pager class="w-5 h-5 shrink-0" />
                        <span class="w-full flex">Pages</span>
                        <x-fas-chevron-down class="w-4 h-4 shrink-0 transition-transform"
                                            x-bind:class="show ? 'rotate-180' : ''" />
                    </button>
                    <div x-show="show"
                         x-transition
                         class="pl-4 mt-1 space-y-1">
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">User Profile</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">FAQ</x-nav-link>
                        <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">Pricing</x-nav-link>
                    </div>
                </div>
            </ul>
        </li>

        <li>
            <h2 class="text-xs font-semibold leading-6 text-shark-400 uppercase">SUPPORT</h2>
            <ul role="list" class="-mx-2 space-y-1">
                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-envelope class="w-5 h-5 shrink-0" />
                    Messages
                </x-nav-link>

                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-inbox class="w-5 h-5 shrink-0" />
                    Inbox
                </x-nav-link>

                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-file-invoice class="w-5 h-5 shrink-0" />
                    Invoice
                </x-nav-link>
            </ul>
        </li>

        <li>
            <h2 class="text-xs font-semibold leading-6 text-shark-400 uppercase">OTHERS</h2>
            <ul role="list" class="-mx-2 space-y-1">
                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-chart-pie class="w-5 h-5 shrink-0" />
                    Charts
                </x-nav-link>

                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-object-group class="w-5 h-5 shrink-0" />
                    UI Elements
                </x-nav-link>

                <x-nav-link class="flex items-center p-2 rounded-md gap-x-3">
                    <x-fas-sign-out-alt class="w-5 h-5 shrink-0" />
                    Authentication
                </x-nav-link>
            </ul>
        </li>
    </ul>
</nav>
