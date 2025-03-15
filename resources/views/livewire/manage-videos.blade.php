<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Video</flux:heading>

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
                    <flux:table.column>Preview</flux:table.column>
                    <flux:table.column>YouTube Link</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($videos as $video)
                        <flux:table.row>
                            <flux:table.cell>
                                @if($embedUrl = $getYoutubeEmbedUrl($video->youtube_link))
                                    <div class="relative w-40 h-24">
                                        <iframe
                                            src="{{ $embedUrl }}"
                                            class="absolute inset-0 w-full h-full rounded"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                @else
                                    <span class="text-red-500">Invalid YouTube URL</span>
                                @endif
                            </flux:table.cell>

                            <flux:table.cell>
                                <a href="{{ $video->youtube_link }}" target="_blank" class="text-primary-600 hover:underline">
                                    {{ $video->youtube_link }}
                                </a>
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $video->id }})" icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $video->id }})" icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="4" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.play-circle class="size-12 mb-2" />
                                    <flux:heading size="lg">No videos found</flux:heading>
                                    <flux:subheading>
                                        Start by adding a new video.
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
        {{ $videos->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Video' : 'Add New Video' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- YouTube Link --}}
                        <flux:input
                            type="url"
                            label="YouTube Link"
                            wire:model="youtube_link"
                            placeholder="https://www.youtube.com/watch?v=..."
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
                <flux:heading size="lg">Delete video?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this video?</p>
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
