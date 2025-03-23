<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Blog</flux:heading>

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
                    <flux:table.column>Image</flux:table.column>
                    <flux:table.column>Created At</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($blogs as $blog)
                        <flux:table.row>
                            <flux:table.cell>
                                {{ $blog->title }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ Str::limit($blog->description, 100) }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <img src="{{ $blog->image ? Storage::url($blog->image) : asset('images/placeholder.png') }}"
                                    alt="{{ $blog->name }}"
                                    class="h-10 w-10 object-cover">
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $blog->created_at->format('M d, Y') }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $blog->id }})" icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $blog->id }})" icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="5" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.document-text class="size-12 mb-2" />
                                    <flux:heading size="lg">No blogs found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new blog post.
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
        {{ $blogs->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Blog' : 'Add New Blog' }}
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

                        {{-- Image --}}
                        <flux:field>
                            <flux:label>Image</flux:label>
                            <flux:input type="file" wire:model="temp_image" accept="image/*" />
                            <flux:error name="temp_image" />

                            {{-- Image Preview --}}
                            <div class="mt-2">
                                @if ($temp_image)
                                    <img src="{{ $imagePreview }}" alt="Preview" class="h-32 w-32 object-cover">
                                @elseif ($isEditing && $image)
                                    <img src="{{ Storage::url($image) }}" alt="Current Image" class="h-32 w-32 object-cover">
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
                <flux:heading size="lg">Delete blog?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this blog post?</p>
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
