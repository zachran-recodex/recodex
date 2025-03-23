<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Services</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">CMS</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Services</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search services..." />

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
                        <flux:table.column>Icon</flux:table.column>
                        <flux:table.column>Image</flux:table.column>
                        <flux:table.column>Title</flux:table.column>
                        <flux:table.column>Description</flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($services as $service)
                            <flux:table.row>
                                <flux:table.cell>
                                    <flux:icon :name="$service->icon" class="size-6" />
                                </flux:table.cell>

                                <flux:table.cell>
                                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-16 h-16 object-cover rounded-lg">
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $service->title }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ Str::limit($service->description, 100) }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $service->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $service->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="5" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:icon.wrench-screwdriver class="size-12 mb-2" />
                                        <flux:heading size="lg">No services found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new service.
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
            {{ $services->links() }}
        </flux:card.footer>

        <flux:modal name="form" class="w-7xl">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Service' : 'Add New Service' }}
                </flux:heading>

                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">

                            <flux:field>
                                <flux:label>Image</flux:label>
                                @if ($newImage)
                                    <img src="{{ $newImage->temporaryUrl() }}" alt="Preview" class="h-32 w-auto object-cover rounded">
                                @elseif ($image && !$newImage)
                                    <img src="{{ Storage::url($image) }}" alt="Current Image" class="h-32 w-auto object-cover rounded">
                                @endif
                                <flux:input type="file" wire:model="newImage" accept="image/*" />
                                <flux:error name="newImage" />
                            </flux:field>

                            <flux:input
                                label="Title"
                                wire:model="title"
                                placeholder="Enter service title"
                            />

                            <flux:textarea
                                label="Description"
                                wire:model="description"
                                placeholder="Enter service description"
                                rows="4"
                            />

                            <flux:field>
                                <flux:label>Icon</flux:label>
                                <flux:radio.group variant="grid" cols="6" wire:model="icon">
                                    @foreach ($iconOptions as $iconName)
                                        <flux:radio value="{{ $iconName }}" icon="{{ $iconName }}" />
                                    @endforeach
                                </flux:radio.group>
                                <flux:error name="icon" />
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

        <flux:modal name="delete" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete service?</flux:heading>

                    <flux:subheading>
                        <p>Are you sure you want to delete this service?</p>
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
</flux:container>