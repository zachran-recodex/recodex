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
        </div>

        <!-- Overview -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <!-- Content Management System -->
            <a href="">
                <flux:card>
                    <flux:card.body class="p-4! gap-2 flex justify-center items-center">
                        <flux:badge color="fuchsia" size="lg" class="w-10 h-10 flex items-center justify-center rounded-full!">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:heading>Content Management System</flux:heading>
                    </flux:card.body>
                </flux:card>
            </a>

            <!-- Project Management -->
            <a href="">
                <flux:card>
                    <flux:card.body class="p-4! gap-2 flex justify-center items-center">
                        <flux:badge color="blue" size="lg" class="w-10 h-10 flex items-center justify-center rounded-full!">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:heading>Project Management</flux:heading>
                    </flux:card.body>
                </flux:card>
            </a>

            <!-- Invoice -->
            <a href="">
                <flux:card>
                    <flux:card.body class="p-4! gap-2 flex justify-center items-center">
                        <flux:badge color="blue" size="lg" class="w-10 h-10 flex items-center justify-center rounded-full!">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:heading>Generate Invoice</flux:heading>
                    </flux:card.body>
                </flux:card>
            </a>

            <!-- Work Contract Aggrement -->
            <a href="">
                <flux:card>
                    <flux:card.body class="p-4! gap-2 flex justify-center items-center">
                        <flux:badge color="blue" size="lg" class="w-10 h-10 flex items-center justify-center rounded-full!">
                            <flux:icon.currency-dollar />
                        </flux:badge>

                        <flux:heading>Work Contract Aggrement</flux:heading>
                    </flux:card.body>
                </flux:card>
            </a>

        </div>
    </flux:container>
</x-layouts.app>
