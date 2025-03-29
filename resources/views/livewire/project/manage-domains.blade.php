<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Domains</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}" separator="slash">Project</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Domains</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:heading size="lg">List Domain</flux:heading>

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
                        <flux:table.column>Name</flux:table.column>
                        <flux:table.column>Registration Date</flux:table.column>
                        <flux:table.column>Expiration Date</flux:table.column>
                        <flux:table.column>Action</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($domains as $domain)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $domain->name }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $domain->registration_date ? $domain->registration_date->format('d F Y') : '-' }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $domain->expiration_date ? $domain->expiration_date->format('d F Y') : '-' }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $domain->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $domain->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="4" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:heading size="lg">No domains found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new domain.
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
            {{ $domains->links() }}
        </flux:card.footer>

        <flux:modal name="form" class="min-w-4xl" x-on:hidden="$wire.closeModal()">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Domain' : 'Add New Domain' }}
                </flux:heading>

                <form wire:submit.prevent="save">
                    <flux:fieldset>
                        <div class="space-y-6">

                            <div class="grid grid-cols-2 gap-6">

                                <flux:field>
                                    <flux:label>Client</flux:label>
                                    <flux:select wire:model="client_id">
                                        <option value="">Select Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </flux:select>
                                    <flux:error name="client_id" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Name</flux:label>
                                    <flux:input wire:model="name" />
                                    <flux:error name="name" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Registration Date</flux:label>
                                    <flux:input type="date" wire:model="registration_date" />
                                    <flux:error name="registration_date" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Expiration Date</flux:label>
                                    <flux:input type="date" wire:model="expiration_date" />
                                    <flux:error name="expiration_date" />
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
                    <flux:heading size="lg">Delete {{ $domainToDelete }}?</flux:heading>

                    <flux:text class="mt-2">
                        <p>Are you sure you want to delete this domain?</p>
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
