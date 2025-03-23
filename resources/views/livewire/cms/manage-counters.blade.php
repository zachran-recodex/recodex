<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Counters</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">CMS</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Counters</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search counters..." />

            <flux:modal.trigger name="form">
                <flux:button type="button" variant="primary" class="w-fit" icon="plus">
                    Add New
                </flux:button>
            </flux:modal.trigger>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Title</flux:table.column>
                        <flux:table.column>Number</flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($counters as $counter)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $counter->title }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ number_format($counter->number) }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $counter->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $counter->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="3" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:icon.calculator class="size-12 mb-2" />
                                        <flux:heading size="lg">No counters found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new counter.
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
            {{ $counters->links() }}
        </flux:card.footer>

        <flux:modal name="form" class="w-7xl">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Counter' : 'Add New Counter' }}
                </flux:heading>

                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">
                            <flux:input
                                label="Title"
                                wire:model="title"
                                placeholder="Enter counter title"
                            />

                            <flux:input
                                type="number"
                                label="Number"
                                wire:model="number"
                                placeholder="Enter counter number"
                                min="0"
                                step="1"
                            />
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $isEditing ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        <flux:modal name="delete" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete counter?</flux:heading>

                    <flux:subheading>
                        <p>Are you sure you want to delete this counter?</p>
                        <p>This action cannot be undone.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:button variant="danger" wire:click="delete">Delete</flux:button>
                </div>
            </div>
        </flux:modal>
    </flux:card>
</flux:container>