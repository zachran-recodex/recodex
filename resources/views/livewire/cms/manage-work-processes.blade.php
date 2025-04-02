<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Work Process</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">CMS</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Work Process</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">List Work Process</flux:heading>

                <flux:modal.trigger name="form">
                    <flux:button type="button" variant="primary" class="w-full sm:w-fit" icon="plus" wire:click="create">
                        Add New
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column class="min-w-[300px] md:w-auto">Title</flux:table.column>
                        <flux:table.column class="min-w-[300px] md:w-auto">Description</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($processes as $process)
                            <flux:table.row>
                                <flux:table.cell>
                                    <flux:heading class="font-semibold text-sm md:text-base">{{ $process->title }}</flux:heading>
                                </flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">
                                    {{ Str::limit($process->description, 100) }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" wire:click="edit({{ $process->id }})"
                                                icon="pencil" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $process->id }})"
                                                icon="trash" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="3" class="text-center py-6 md:py-8">
                                    <flux:heading size="lg" class="text-base md:text-lg">No data found.</flux:heading>
                                    <flux:subheading class="text-sm md:text-base">Start by creating new work process.</flux:subheading>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </flux:card.body>

        <flux:card.footer>
            {{ $processes->links() }}
        </flux:card.footer>
    </flux:card>

    <flux:modal name="form" class="min-w-sm md:min-w-lg lg:min-w-xl">
        <div class="space-y-4 sm:space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $process_id ? 'Edit Work Process' : 'Add New Work Process' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-4 sm:space-y-6">

                        <flux:field>
                            <flux:label>Title</flux:label>
                            <flux:input wire:model="title" />
                            <flux:error name="title" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Description</flux:label>
                            <flux:textarea wire:model="description" rows="4" />
                            <flux:error name="description" />
                        </flux:field>

                        <div class="flex justify-end">
                            <flux:button type="submit" variant="primary" class="w-full md:w-fit">
                                {{ $process_id ? 'Update' : 'Create' }}
                            </flux:button>
                        </div>
                    </div>
                </flux:fieldset>
            </form>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-[280px] sm:min-w-sm">
        <div class="space-y-4 sm:space-y-6">
            <div class="text-center sm:text-left">
                <flux:heading size="lg" class="font-semibold">Delete work process?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this work process?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex justify-end">
                <flux:button type="button" variant="danger" wire:click="deleteProcess" class="w-full sm:w-fit">
                    Delete
                </flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
