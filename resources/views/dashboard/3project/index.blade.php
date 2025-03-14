<x-layouts.app>
    <flux:container class="space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl" class="font-bold!">Hello {{ auth()->user()->name }}! 🙌🏻</flux:heading>

                <flux:subheading class="mt-2">
                    We hope you having a best day!
                </flux:subheading>
            </div>

            <flux:button type="button" variant="primary" class="w-fit" icon="plus">
                New Project
            </flux:button>
        </div>

        <!-- Overview -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <!-- Total Projects -->
            <flux:card>
                <flux:card.body class="flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <flux:badge color="fuchsia" size="lg" class="w-12 h-12 flex items-center justify-center  rounded-full!">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:button icon-trailing="chevron-down" size="xs">This Month</flux:button>
                    </div>
                    <div class="mt-8">
                        <flux:heading size="xl">Rp 7.000.000,-</flux:heading>
                        <flux:subheading>Total Revenue <span class="ms-4 text-green-500">+8%</span></flux:sheading>
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
                    <div class="mt-8">
                        <flux:heading size="xl">10</flux:heading>
                        <flux:subheading>Total Project <span class="ms-4 text-green-500">+2%</span></flux:sheading>
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
                    <div class="mt-8">
                        <flux:heading size="xl">5</flux:heading>
                        <flux:subheading>Ongoing Project <span class="ms-4 text-green-500">+2%</span></flux:sheading>
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
                    <div class="mt-8">
                        <flux:heading size="xl">2</flux:heading>
                        <flux:subheading>Pending Project <span class="ms-4 text-green-500">+2%</span></flux:sheading>
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
                                            <flux:icon.briefcase class="size-12 mb-2" />
                                            <flux:heading size="lg">No projects found</flux:heading>
                                            <flux:subheading>
                                                Start by creating a new project.
                                            </flux:subheading>
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
    </flux:container>
</x-layouts.app>
