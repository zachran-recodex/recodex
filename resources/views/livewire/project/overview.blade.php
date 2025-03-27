<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl" class="font-bold!">Hello {{ auth()->user()->name }}! 🙌🏻</flux:heading>
            <flux:subheading class="mt-2">
                Welcome to Dashboard Projects
            </flux:subheading>
        </div>
    </div>

    <flux:separator />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <flux:card>
            <flux:card.body>
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <flux:badge color="fuchsia" size="sm" variant="solid" class="rounded-full! w-10 h-10 flex items-center justify-center">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:dropdown>
                            <flux:button size="xs" iconTrailing="chevron-down">This Month</flux:button>

                            <flux:menu>
                                <flux:menu.radio.group wire:model="sortBy">
                                    <flux:menu.radio checked>Latest activity</flux:menu.radio>
                                    <flux:menu.radio>Date created</flux:menu.radio>
                                    <flux:menu.radio>Most popular</flux:menu.radio>
                                </flux:menu.radio.group>
                            </flux:menu>
                        </flux:dropdown>
                    </div>

                    <flux:heading size="xl" class="font-bold!">
                        Rp {{ number_format($totalRevenue, 0, ',', '.') }},-
                    </flux:heading>

                    <div class="flex justify-between items-end">
                        <p>Total Revenue</p>

                        <p class="text-green-500">+8%</p>
                    </div>
                </div>
            </flux:card.body>
        </flux:card>

        <flux:card>
            <flux:card.body>
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <flux:badge color="orange" size="sm" variant="solid" class="rounded-full! w-10 h-10 flex items-center justify-center">
                            <flux:icon.folder />
                        </flux:badge>

                        <flux:dropdown>
                            <flux:button size="xs" iconTrailing="chevron-down">This Month</flux:button>

                            <flux:menu>
                                <flux:menu.radio.group wire:model="sortBy">
                                    <flux:menu.radio checked>Latest activity</flux:menu.radio>
                                    <flux:menu.radio>Date created</flux:menu.radio>
                                    <flux:menu.radio>Most popular</flux:menu.radio>
                                </flux:menu.radio.group>
                            </flux:menu>
                        </flux:dropdown>
                    </div>

                    <flux:heading size="xl" class="font-bold!">
                        {{ $totalProjects }}
                    </flux:heading>

                    <div class="flex justify-between items-end">
                        <p>Total Project</p>

                        <p class="text-green-500">+8%</p>
                    </div>
                </div>
            </flux:card.body>
        </flux:card>

        <flux:card>
            <flux:card.body>
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <flux:badge color="green" size="sm" variant="solid" class="rounded-full! w-10 h-10 flex items-center justify-center">
                            <flux:icon.play />
                        </flux:badge>

                        <flux:dropdown>
                            <flux:button size="xs" iconTrailing="chevron-down">This Month</flux:button>

                            <flux:menu>
                                <flux:menu.radio.group wire:model="sortBy">
                                    <flux:menu.radio checked>Latest activity</flux:menu.radio>
                                    <flux:menu.radio>Date created</flux:menu.radio>
                                    <flux:menu.radio>Most popular</flux:menu.radio>
                                </flux:menu.radio.group>
                            </flux:menu>
                        </flux:dropdown>
                    </div>

                    <flux:heading size="xl" class="font-bold!">
                        {{ $ongoingProjects }}
                    </flux:heading>

                    <div class="flex justify-between items-end">
                        <p>Ongoing Project</p>

                        <p class="text-green-500">+8%</p>
                    </div>
                </div>
            </flux:card.body>
        </flux:card>

        <flux:card>
            <flux:card.body>
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <flux:badge color="blue" size="sm" variant="solid" class="rounded-full! w-10 h-10 flex items-center justify-center">
                            <flux:icon.hand-thumb-up />
                        </flux:badge>

                        <flux:dropdown>
                            <flux:button size="xs" iconTrailing="chevron-down">This Month</flux:button>

                            <flux:menu>
                                <flux:menu.radio.group wire:model="sortBy">
                                    <flux:menu.radio checked>Latest activity</flux:menu.radio>
                                    <flux:menu.radio>Date created</flux:menu.radio>
                                    <flux:menu.radio>Most popular</flux:menu.radio>
                                </flux:menu.radio.group>
                            </flux:menu>
                        </flux:dropdown>
                    </div>

                    <flux:heading size="xl" class="font-bold!">
                        {{ $totalClients }}
                    </flux:heading>

                    <div class="flex justify-between items-end">
                        <p>Total Client</p>

                        <p class="text-green-500">+8%</p>
                    </div>
                </div>
            </flux:card.body>
        </flux:card>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

        <flux:card>
            <flux:card.header>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <flux:badge color="indigo" size="sm" variant="solid" class="rounded-full! w-10 h-10 flex items-center justify-center">
                            <flux:icon.check-circle />
                        </flux:badge>
                        <div class="ml-6">
                            <flux:heading size="lg">Project Summary</flux:heading>
                            <flux:subheading>Prioritize doing the closest tasks first.</flux:subheading>
                        </div>
                    </div>
                    <flux:dropdown>
                        <flux:button size="xs" class="rounded-full! w-10 h-10 flex items-center justify-center">
                            <flux:icon.funnel />
                        </flux:button>

                        <flux:menu>
                            <flux:menu.radio.group wire:model="sortBy">
                                <flux:menu.radio checked>Latest activity</flux:menu.radio>
                                <flux:menu.radio>Date created</flux:menu.radio>
                                <flux:menu.radio>Most popular</flux:menu.radio>
                            </flux:menu.radio.group>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </flux:card.header>
            <flux:card.body :padding="false">
                <div class="overflow-x-auto">
                    <flux:table hover striped>
                        <flux:table.columns>
                            <flux:table.column>Client</flux:table.column>
                            <flux:table.column>Project Name</flux:table.column>
                            <flux:table.column>Due Date</flux:table.column>
                            <flux:table.column>Status</flux:table.column>
                        </flux:table.columns>

                        <flux:table.rows>
                            @forelse ($projects as $project)
                                <flux:table.row>
                                    <flux:table.cell>
                                        {{ $project->client->name }}
                                    </flux:table.cell>

                                    <flux:table.cell>
                                        {{ $project->title }}
                                    </flux:table.cell>

                                    <flux:table.cell>
                                        {{ $project->project_date->format('d M Y') }}
                                    </flux:table.cell>

                                    <flux:table.cell>
                                        <flux:badge variant="solid" :color="match($project->status) {
                                            'pending' => 'yellow',
                                            'in_progress' => 'blue',
                                            'completed' => 'green',
                                            'cancelled' => 'red',
                                            'on_hold' => 'orange',
                                            default => 'gray'
                                        }">
                                            {{ str_replace('_', ' ', ucfirst($project->status)) }}
                                        </flux:badge>
                                    </flux:table.cell>
                                </flux:table.row>
                            @empty
                                <flux:table.row>
                                    <flux:table.cell colspan="4" class="text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <flux:icon.folder class="size-12 mb-2" />
                                            <flux:heading size="lg">No projects found</flux:heading>
                                            <flux:subheading>
                                                Start by creating a new project.
                                            </flux:subheading>
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforelse
                        </flux:table.rows>
                    </flux:table>
                </div>
            </flux:card.body>
            <flux:card.footer>
                {{ $projects->links() }}
            </flux:card.footer>
        </flux:card>

        <flux:card>
            <flux:card.header>
                <div class="flex justify-between items-center">

                    <flux:heading size="lg">Overall Progress</flux:heading>

                    <flux:dropdown>
                        <flux:button size="xs" iconTrailing="chevron-down">This Month</flux:button>

                        <flux:menu>
                            <flux:menu.radio.group wire:model="sortBy">
                                <flux:menu.radio checked>Latest activity</flux:menu.radio>
                                <flux:menu.radio>Date created</flux:menu.radio>
                                <flux:menu.radio>Most popular</flux:menu.radio>
                            </flux:menu.radio.group>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </flux:card.header>
            <flux:card.body>
                <div>
                    <canvas id="overallProgressChart" style="width: 100%; height: 300px;"></canvas>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('overallProgressChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Revenue (Millions)', 'Total Projects', 'Ongoing Projects', 'Total Clients'],
                                datasets: [{
                                    label: 'Current Statistics',
                                    data: [
                                        {{ $totalRevenue / 1000000 }}, // Convert to millions
                                        {{ $totalProjects }},
                                        {{ $ongoingProjects }},
                                        {{ $totalClients }}
                                    ],
                                    backgroundColor: [
                                        'rgb(232, 121, 249)',
                                        'rgb(249, 115, 22)',
                                        'rgb(34, 197, 94)',
                                        'rgb(59, 130, 246)'
                                    ],
                                    borderColor: [
                                        'rgb(232, 121, 249)',
                                        'rgb(249, 115, 22)',
                                        'rgb(34, 197, 94)',
                                        'rgb(59, 130, 246)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: {
                                            drawBorder: false
                                        }
                                    },
                                    x: {
                                        grid: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });
                    });
                </script>
            </flux:card.body>
        </flux:card>
    </div>
</flux:container>