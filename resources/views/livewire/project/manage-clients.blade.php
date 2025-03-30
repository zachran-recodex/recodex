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
            <flux:heading size="lg">Client List</flux:heading>

            <flux:modal.trigger name="form">
                <flux:button type="button" variant="primary" class="w-fit" icon="plus" wire:click="create">
                    Add New
                </flux:button>
            </flux:modal.trigger>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Logo</flux:table.column>
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
                                    <div class="space-y-2">
                                        <flux:heading class="font-semibold">{{ $client->name }}</flux:heading>
                                        @if($client->domain)
                                            <flux:text>
                                                <flux:link href="https://{{ $client->domain->name }}" target="_blank">{{ $client->domain->name }}</flux:link>
                                            </flux:text>
                                        @endif
                                    </div>
                                </flux:table.cell>
                                <flux:table.cell>{{ $client->email ?: 'N/A' }}</flux:table.cell>
                                <flux:table.cell>{{ $client->phone ?: 'N/A' }}</flux:table.cell>
                                <flux:table.cell>{{ $client->company }}</flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="show">
                                        <flux:button
                                            variant="success"
                                            wire:click="show({{ $client->id }})"
                                            icon="eye"
                                        ></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="form">
                                        <flux:button
                                            variant="warning"
                                            wire:click="edit({{ $client->id }})"
                                            icon="pencil"
                                        ></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button
                                            variant="danger"
                                            wire:click="confirmDelete({{ $client->id }})"
                                            icon="trash"
                                        ></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:heading size="lg">No Clients Found</flux:heading>
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

        <flux:modal variant="flyout" name="show" x-on:hidden="$wire.closeModal()">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    Client Details
                </flux:heading>

                <flux:separator />

                <div class="space-y-6">
                    @if ($logo)
                        <div class="flex justify-center">
                            <img
                                src="{{ Storage::url($logo) }}"
                                alt="{{ $name }}"
                                class="h-32 w-auto"
                            >
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <flux:label>Name</flux:label>
                            <flux:text>{{ $name }}</flux:text>
                        </div>

                        <div>
                            <flux:label>Company</flux:label>
                            <flux:text>{{ $company }}</flux:text>
                        </div>

                        <div>
                            <flux:label>Email</flux:label>
                            <flux:text>{{ $email ?: 'N/A' }}</flux:text>
                        </div>

                        <div>
                            <flux:label>Phone</flux:label>
                            <flux:text>{{ $phone ?: 'N/A' }}</flux:text>
                        </div>

                        <div>
                            <flux:label>Domain</flux:label>
                            <flux:text>
                                @if($domain)
                                    <flux:link href="https://{{ $domain }}" target="_blank">
                                        {{ $domain }}
                                    </flux:link>
                                @else
                                    N/A
                                @endif
                            </flux:text>
                        </div>
                    </div>
                </div>
            </div>
        </flux:modal>

        <flux:modal name="form" class="min-w-4xl" x-on:hidden="$wire.closeModal()">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Client' : 'Add New Client' }}
                </flux:heading>

                <flux:separator />

                <form wire:submit.prevent="save">
                    <flux:fieldset>
                        <div class="space-y-6">

                            <flux:field>
                                <flux:label>Domain</flux:label>
                                <flux:input.group>
                                    <flux:input.group.prefix>https://</flux:input.group.prefix>
                                    <flux:input wire:model="domain" placeholder="example.com" />
                                </flux:input.group>
                                <flux:error name="domain" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Logo</flux:label>
                                @if ($newLogo)
                                    <img
                                        src="{{ $newLogo->temporaryUrl() }}"
                                        alt="Preview"
                                        class="h-32 w-auto"
                                    >
                                @elseif ($logo)
                                    <img
                                        src="{{ Storage::url($logo) }}"
                                        alt="Current Logo"
                                        class="h-32 w-auto"
                                    >
                                @endif
                                <flux:input
                                    type="file"
                                    wire:model="newLogo"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                />
                                <flux:description>Max size: 2MB. Formats: JPEG, PNG, GIF</flux:description>
                                <flux:error name="newLogo" />
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
                                <flux:button type="submit" variant="primary" class="w-fit">
                                    {{ $isEditing ? 'Update' : 'Create' }}
                                </flux:button>
                            </div>

                        </div>
                    </flux:fieldset>
                </form>
            </div>
        </flux:modal>

        <flux:modal name="delete" class="min-w-sm" x-on:hidden="$wire.closeModal()">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete {{ $clientToDelete }}?</flux:heading>

                    <flux:text class="mt-2">
                        <p>Are you sure you want to delete this client?</p>
                        <p>This action can be reversed from the trash.</p>
                    </flux:text>
                </div>

                <div class="flex">
                    <flux:spacer />
                    <flux:button variant="danger" wire:click="delete">Delete</flux:button>
                </div>
            </div>
        </flux:modal>
    </flux:card>
</flux:container>
