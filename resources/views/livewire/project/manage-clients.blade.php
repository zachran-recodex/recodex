<flux:container class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <flux:heading size="xl" class="font-bold!">Manage Clients</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}">Project</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Manage Client</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex justify-between items-center">
                <flux:heading size="lg" class="semi-bold!">List Client</flux:heading>

                <flux:modal.trigger name="form">
                    <flux:button type="button" variant="primary" class="w-fit" icon="plus" wire:click="create">
                        Add New
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Logo</flux:table.column>
                        <flux:table.column>Client</flux:table.column>
                        <flux:table.column>Email</flux:table.column>
                        <flux:table.column>Phone</flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($clients as $client)
                            <flux:table.row>
                                <flux:table.cell>
                                    @if ($client->logo)
                                        <img
                                            src="{{ Storage::url($client->logo) }}"
                                            alt="{{ $client->name }}"
                                            class="w-auto h-12"
                                        >
                                    @else
                                        <span class="text-zinc-400">N/A</span>
                                    @endif
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:heading class="font-semibold">{{ $client->name }}</flux:heading>
                                </flux:table.cell>
                                <flux:table.cell>{{ $client->email ?: 'N/A' }}</flux:table.cell>
                                <flux:table.cell>{{ $client->phone ?: 'N/A' }}</flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $client->id }})" icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $client->id }})" icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="5" class="text-center py-8">
                                    <flux:heading size="lg">No data found.</flux:heading>
                                    <flux:subheading>Start by creating new client.</flux:subheading>
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
    </flux:card>

    <flux:modal name="form" class="min-w-4xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $client_id ? 'Edit Client' : 'Add New Client' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-6">

                        <flux:field>
                            <flux:label>Logo</flux:label>
                            @if ($existing_logo)
                                <img
                                    src="{{ Storage::url($existing_logo) }}"
                                    alt="Current Logo"
                                    class="h-32 w-auto"
                                >
                                <flux:button type="button" variant="danger" wire:click="$set('existing_logo', null)" class="w-fit">
                                    Delete
                                </flux:button>
                            @elseif ($logo)
                                <img
                                    src="{{ $logo->temporaryUrl() }}"
                                    alt="Logo Preview"
                                    class="h-32 w-auto"
                                >
                            @endif
                            <flux:input
                                type="file"
                                wire:model="logo"
                                accept="image/png,image"
                            />
                            <flux:description>Max size: 2MB. Formats: PNG</flux:description>
                            <flux:error name="logo" />
                        </flux:field>

                        <div class="grid grid-cols-2 gap-6 items-start">
                            <flux:field>
                                <flux:label>Name</flux:label>
                                <flux:input wire:model="name" />
                                <flux:error name="name" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Company</flux:label>
                                <flux:input wire:model="company" />
                                <flux:error name="company" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Email</flux:label>
                                <flux:input type="email" wire:model="email" />
                                <flux:error name="email" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Phone</flux:label>
                                <flux:input type="tel" wire:model="phone" />
                                <flux:error name="phone" />
                            </flux:field>
                        </div>

                        <div class="flex">
                            <flux:spacer />
                            <flux:button type="submit" variant="primary" class="w-fit" wire:loading.attr="disabled">
                                {{ $client_id ? 'Update' : 'Save' }}
                            </flux:button>
                        </div>
                    </div>
                </flux:fieldset>
            </form>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete client?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this client?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button type="button" variant="danger" wire:click="deleteClient">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
