<x-layouts.app>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <flux:heading size="xl" class="font-bold!">Project</flux:heading>

            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard.project') }}" separator="slash">Project</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>

        <!-- Overview -->
        <flux class="grid auto-rows-min gap-4 md:grid-cols-4">
            <!-- Total Projects -->
            <flux:card>
                <flux:card.body class="flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <flux:badge color="fuchsia" size="lg" class="w-12 h-12 flex items-center justify-center  rounded-full!">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:button icon-trailing="chevron-down" size="xs">This Month</flux:button>
                    </div>
                    <div class="mt-8 space-y-2">
                        <p class="text-3xl font-semibold text-gray-900">Rp 7.000.000,-</p>
                        <p class="text-sm text-gray-500">Total Revenue <span class="ms-4 text-green-500">+8%</span></p>
                    </div>
                </flux:card.body>
            </flux:card>

            <!-- Completed Projects -->
            <flux:card>
                <flux:card.body class="flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <flux:badge color="blue" size="lg" class="w-12 h-12 flex items-center justify-center rounded-full!">
                            <flux:icon.briefcase />
                        </flux:badge>

                        <flux:button icon-trailing="chevron-down" size="xs">This Month</flux:button>
                    </div>
                    <div class="mt-8 space-y-2">
                        <p class="text-3xl font-semibold text-gray-900">10</p>
                        <p class="text-sm text-gray-500">Total Project <span class="ms-4 text-green-500">+2%</span></p>
                    </div>
                </flux:card.body>
            </flux:card>

            <!-- In Progress Projects -->
            <flux:card>
                <flux:card.body class="flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <flux:badge color="green" size="lg" class="w-12 h-12 flex items-center justify-center rounded-full!">
                            <flux:icon.play-circle />
                        </flux:badge>

                        <flux:button icon-trailing="chevron-down" size="xs">This Month</flux:button>
                    </div>
                    <div class="mt-8 space-y-2">
                        <p class="text-3xl font-semibold text-gray-900">5</p>
                        <p class="text-sm text-gray-500">Ongoing Project <span class="ms-4 text-green-500">+2%</span></p>
                    </div>
                </flux:card.body>
            </flux:card>

            <!-- Pending Projects -->
            <flux:card>
                <flux:card.body class="flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <flux:badge color="yellow" size="lg" class="w-12 h-12 flex items-center justify-center rounded-full!">
                            <flux:icon.stop-circle />
                        </flux:badge>

                        <flux:button icon-trailing="chevron-down" size="xs">This Month</flux:button>
                    </div>
                    <div class="mt-8 space-y-2">
                        <p class="text-3xl font-semibold text-gray-900">2</p>
                        <p class="text-sm text-gray-500">Pending Project <span class="ms-4 text-green-500">+2%</span></p>
                    </div>
                </flux:card.body>
            </flux:card>

            <!-- Project Timeline -->
            <flux:card class="col-span-2">
                <flux:card.header>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <flux:badge color="yellow" size="lg" class="w-12 h-12 flex items-center justify-center rounded-full!">
                                <flux:icon.stop-circle />
                            </flux:badge>
                            <div>
                                <flux:heading size="lg" class="font-semibold">Project Summary</flux:heading>
                                <flux:subheading>
                                    View and manage your projects.
                                </flux:subheading>
                            </div>
                        </div>

                        <flux:button class="rounded-full! w-12 h-12">
                            <flux:icon.funnel variant="outline" />
                        </flux:button>
                    </div>
                </flux:card.header>

                <flux:card.body :padding="false">
                    <div class="overflow-x-auto">
                        <flux:table hover striped>
                            <flux:table.columns>
                                <flux:table.column>Name</flux:table.column>
                                <flux:table.column>Due Date</flux:table.column>
                                <flux:table.column>Status</flux:table.column>
                            </flux:table.columns>

                            <flux:table.rows>
                                <flux:table.row>
                                    <flux:table.cell colspan="3" class="text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <flux:icon.briefcase class="size-12" />
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                                No portfolios found
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Start by creating a new portfolio.
                                            </p>
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            </flux:table.rows>
                        </flux:table>
                    </div>
                </flux:card.body>

                <flux:card.footer>

                </flux:card.footer>
            </flux:card>

            <!-- Project Statistics -->
            <flux:card class="col-span-2">

                <flux:card.header>
                    <flux:heading size="lg" class="font-semibold">Overall Progress</flux:heading>
                </flux:card.header>

                <flux:card.body>

                </flux:card.body>
            </flux:card>

        </div>
    </div>
</x-layouts.app>
