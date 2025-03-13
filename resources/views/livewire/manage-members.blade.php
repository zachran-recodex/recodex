<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">Team Members</flux:heading>

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
                    <flux:table.column>Position</flux:table.column>
                    <flux:table.column>Qualification</flux:table.column>
                    <flux:table.column>Attribute</flux:table.column>
                    <flux:table.column>Skill</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($members as $member)
                        <flux:table.row>
                            <flux:table.cell>
                                <img src="{{ $member->photo ? Storage::url($member->photo) : asset('images/placeholder.png') }}"
                                     alt="{{ $member->name }}"
                                     class="h-10 w-10 object-cover rounded-full">
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $member->name }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $member->position }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $member->qualification }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $member->attribute }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $member->skill }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $member->id }})" icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $member->id }})" icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="7" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.users class="size-12" />
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">
                                        No members found
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Start by creating a new team member.
                                    </p>
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </flux:card.body>

    <flux:card.footer>
        {{ $members->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Member' : 'Add New Member' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- Name --}}
                        <flux:input label="Name" wire:model="name" />

                        {{-- Position --}}
                        <flux:input label="Position" wire:model="position" />

                        {{-- Qualification --}}
                        <flux:input label="Qualification" wire:model="qualification" />

                        {{-- Attribute --}}
                        <flux:textarea
                            label="Attribute"
                            wire:model="attribute"
                            rows="3"
                        />

                        {{-- Skill --}}
                        <flux:textarea
                            label="Skill"
                            wire:model="skill"
                            rows="3"
                        />

                        {{-- Photo --}}
                        <flux:field>
                            <flux:label>Photo</flux:label>
                            <flux:input type="file" wire:model="temp_photo" accept="image/*" />
                            <flux:error name="temp_photo" />

                            {{-- Photo Preview --}}
                            <div class="mt-2">
                                @if ($temp_photo)
                                    <img src="{{ $photoPreview }}" alt="Preview" class="h-32 w-32 object-cover rounded-full">
                                @elseif ($isEditing && $photo)
                                    <img src="{{ Storage::url($photo) }}" alt="Current Photo" class="h-32 w-32 object-cover rounded-full">
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
                <flux:heading size="lg">Delete member?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this member?</p>
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