<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Clients</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}" separator="slash">Project</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Clients</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search clients..." />

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
                        <flux:table.column>Photo</flux:table.column>
                        <flux:table.column>Name</flux:table.column>
                        <flux:table.column>Email</flux:table.column>
                        <flux:table.column>Phone</flux:table.column>
                        <flux:table.column>Company</flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($clients as $client)
                            <flux:table.row>
                                <flux:table.cell>
                                    <img src="{{ Storage::url($client->photo) }}" alt="{{ $client->name }}" class="w-12 h-12 object-cover rounded-full">
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $client->name }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $client->email }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $client->phone }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $client->company }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $client->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $client->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:icon.users class="size-12 mb-2" />
                                        <flux:heading size="lg">No clients found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new client.
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
            {{ $clients->links() }}
        </flux:card.footer>

        <flux:modal name="form" class="w-7xl">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Client' : 'Add New Client' }}
                </flux:heading>

                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">
                            <flux:field>
                                <flux:label>Photo</flux:label>
                                @if ($newPhoto)
                                    <img src="{{ $newPhoto->temporaryUrl() }}" alt="Preview" class="h-32 w-32 object-cover rounded-full">
                                @elseif ($photo && !$newPhoto)
                                    <img src="{{ Storage::url($photo) }}" alt="Current Photo" class="h-32 w-32 object-cover rounded-full">
                                @endif
                                <flux:input type="file" wire:model="newPhoto" accept="image/*" />
                                <flux:error name="newPhoto" />
                            </flux:field>

                            <flux:input
                                label="Name"
                                wire:model="name"
                                placeholder="Enter client name"
                            />

                            <flux:input
                                type="email"
                                label="Email"
                                wire:model="email"
                                placeholder="Enter client email"
                            />

                            <flux:input
                                label="Phone"
                                wire:model="phone"
                                placeholder="Enter client phone"
                            />

                            <flux:input
                                label="Company"
                                wire:model="company"
                                placeholder="Enter client company"
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
                    <flux:heading size="lg">Delete client?</flux:heading>

                    <flux:subheading>
                        <p>Are you sure you want to delete this client?</p>
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