<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Contacts</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Contacts</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">List Contacts</flux:heading>
            </div>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column class="min-w-[150px] md:w-auto">Name</flux:table.column>
                        <flux:table.column class="min-w-[150px] md:w-auto">Email</flux:table.column>
                        <flux:table.column class="min-w-[150px] md:w-auto">Phone</flux:table.column>
                        <flux:table.column class="min-w-[300px] md:w-auto">Message</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Status</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($contacts as $contact)
                            <flux:table.row>
                                <flux:table.cell class="text-sm md:text-base">{{ $contact->name }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">{{ $contact->email }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">{{ $contact->phone }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">{{ $contact->message }}</flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">
                                    @if($contact->is_read)
                                        <flux:badge variant="success">Dibaca</flux:badge>
                                    @else
                                        <flux:badge variant="warning">Belum Dibaca</flux:badge>
                                    @endif
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <flux:modal.trigger name="show">
                                            <flux:button variant="primary" wire:click="markAsRead({{ $contact->id }})" icon="eye" class="!p-1.5 md:!p-2" title="Tandai sebagai dibaca"></flux:button>
                                        </flux:modal.trigger>
                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $contact->id }})" icon="trash" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center py-6 md:py-8">
                                    <flux:heading size="lg" class="text-base md:text-lg">No data found</flux:heading>
                                    <flux:subheading class="text-sm md:text-base">Start by creating a new contact.</flux:subheading>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </flux:card.body>

        <flux:card.footer>
            {{ $contacts->links() }}
        </flux:card.footer>
    </flux:card>

    <flux:modal name="show" variant="flyout">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>

            <flux:input label="Name" placeholder="Your name" />

            <flux:input label="Date of birth" type="date" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-[280px] sm:min-w-sm">
        <div class="space-y-4 sm:space-y-6">
            <div class="text-center sm:text-left">
                <flux:heading size="lg" class="font-semibold">Delete contact?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this contact?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex justify-end">
                <flux:button type="button" variant="danger" wire:click="delete" class="w-full sm:w-fit">
                    Delete
                </flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>

