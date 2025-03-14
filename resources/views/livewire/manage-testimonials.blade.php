<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">Testimonials</flux:heading>

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
                    <flux:table.column>Description</flux:table.column>
                    <flux:table.column>Rating</flux:table.column>
                    <flux:table.column>Created At</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($testimonials as $testimonial)
                        <flux:table.row>
                            <flux:table.cell>
                                {{ $testimonial->title }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ Str::limit($testimonial->description, 100) }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <div class="flex items-center gap-1">
                                    <flux:icon.star class="size-4 text-yellow-400" />
                                    <span>{{ $testimonial->rating }}/10</span>
                                </div>
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $testimonial->created_at->format('M d, Y') }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $testimonial->id }})" icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $testimonial->id }})" icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="5" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.chat-bubble-left-right class="size-12 mb-2" />
                                    <flux:heading size="lg">No testimonials found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new testimonial.
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
        {{ $testimonials->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Testimonial' : 'Add New Testimonial' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- Title --}}
                        <flux:input label="Title" wire:model="title" />

                        {{-- Description --}}
                        <flux:textarea
                            label="Description"
                            wire:model="description"
                            rows="5"
                        />

                        {{-- Rating --}}
                        <flux:input
                            type="number"
                            label="Rating (0-10)"
                            wire:model="rating"
                            min="0"
                            max="10"
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

    {{-- Delete Modal --}}
    <flux:modal name="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete testimonial?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this testimonial?</p>
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
