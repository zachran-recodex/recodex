<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Client</flux:heading>

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
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($clients as $client)
                        <flux:table.row>
                            <flux:table.cell>
                                <img src="{{ $client->photo ? Storage::url($client->photo) : asset('images/placeholder.png') }}"
                                    alt="{{ $client->name }}" class="h-10 w-10 object-cover rounded-full">
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

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Client' : 'Add New Client' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- Name --}}
                        <flux:input label="Name" wire:model="name" />

                        {{-- Email --}}
                        <flux:input type="email" label="Email" wire:model="email" />

                        {{-- Phone --}}
                        <flux:input label="Phone" wire:model="phone" />

                        {{-- Company --}}
                        <flux:input label="Company" wire:model="company" />

                        {{-- Photo --}}
                        <flux:field>
                            <flux:label>Photo</flux:label>
                            <flux:input type="file" wire:model="temp_photo" accept="image/*" />
                            <flux:error name="temp_photo" />

                            {{-- Photo Preview --}}
                            <div class="mt-2">
                                @if ($temp_photo)
                                    <img src="{{ $photoPreview }}" alt="Preview"
                                        class="h-32 w-32 object-cover rounded-full">
                                @elseif ($isEditing && $photo)
                                    <img src="{{ Storage::url($photo) }}" alt="Current Photo"
                                        class="h-32 w-32 object-cover rounded-full">
                                @endif
                            </div>
                        </flux:field>
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

    {{-- Delete Modal --}}
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
