<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Portfolios</flux:heading>

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
                    <flux:table.column>Image</flux:table.column>
                    <flux:table.column>Title</flux:table.column>
                    <flux:table.column>Description</flux:table.column>
                    <flux:table.column>Project Date</flux:table.column>
                    <flux:table.column>Duration</flux:table.column>
                    <flux:table.column>Cost</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($portfolios as $portfolio)
                        <flux:table.row>
                            <flux:table.cell>
                                <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->title }}" class="h-10 w-auto object-cover rounded">
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $portfolio->title }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $portfolio->description }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $portfolio->project_date->format('d M Y') }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $portfolio->duration }}
                            </flux:table.cell>

                            <flux:table.cell>
                                ${{ number_format($portfolio->cost, 2) }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $portfolio->id }})" icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $portfolio->id }})" icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="7" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.folder class="size-12 mb-2" />
                                    <flux:heading size="lg">No portfolios found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new portfolio.
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
        {{ $portfolios->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Portfolio' : 'Add New Portfolio' }}
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
                            rows="4"
                        />

                        {{-- Project Date --}}
                        <flux:input type="date" label="Project Date" wire:model="project_date" />

                        {{-- Duration --}}
                        <flux:input label="Duration" wire:model="duration" placeholder="e.g., 3 months" />

                        {{-- Cost --}}
                        <flux:input type="number" label="Cost" wire:model="cost" step="0.01" min="0" />

                        {{-- Image --}}
                        <flux:field>
                            <flux:label>Image</flux:label>
                            <flux:input type="file" wire:model="temp_image" accept="image/*" />
                            <flux:error name="temp_image" />

                            {{-- Image Preview --}}
                            <div class="mt-2">
                                @if ($temp_image)
                                    <img src="{{ $imagePreview }}" alt="Preview" class="h-32 w-auto object-cover rounded">
                                @elseif ($isEditing && $image)
                                    <img src="{{ Storage::url($image) }}" alt="Current Image" class="h-32 w-auto object-cover rounded">
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
                <flux:heading size="lg">Delete portfolio?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this portfolio?</p>
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