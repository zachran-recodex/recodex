<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Domains</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}">Project</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Domains</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">List Domains</flux:heading>

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
                        <flux:table.column class="min-w-[300px] md:w-auto">Name</flux:table.column>
                        <flux:table.column class="min-w-[200px] md:w-auto">Registration Date</flux:table.column>
                        <flux:table.column class="min-w-[200px] md:w-auto">Expiration Date</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($domains as $domain)
                            <flux:table.row>
                                <flux:table.cell class="text-sm md:text-base">{{ $domain->name }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">{{ $domain->registration_date->format('d F Y') }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">{{ $domain->expiration_date->format('d F Y') }}</flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" wire:click="edit({{ $domain->id }})" icon="pencil" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $domain->id }})" icon="trash" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="4" class="text-center py-6 md:py-8">
                                    <flux:heading size="lg" class="text-base md:text-lg">No data found</flux:heading>
                                    <flux:subheading class="text-sm md:text-base">Start by creating a new domain.</flux:subheading>
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
    </flux:card>

    <flux:modal name="form" class="min-w-sm md:min-w-2xl lg:min-w-4xl">
        <div class="space-y-4 sm:space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $domain_id ? 'Edit Domain' : 'Add New Domain' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-4 sm:space-y-6">

                        <flux:field>
                            <flux:label>Name</flux:label>
                            <flux:input wire:model="name" />
                            <flux:error name="name" />
                        </flux:field>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

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

                        <div class="flex justify-end">
                            <flux:button type="submit" variant="primary" class="w-full md:w-fit">
                                {{ $domain_id ? 'Update' : 'Create' }}
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
                <flux:heading size="lg" class="font-semibold">Delete domain?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this domain?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex justify-end">
                <flux:button type="button" variant="danger" wire:click="deleteDomain" class="w-full sm:w-fit">
                    Delete
                </flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
