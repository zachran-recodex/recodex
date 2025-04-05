<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Services</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">CMS</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Services</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">List Services</flux:heading>

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
                        <flux:table.column class="min-w-[50px] md:w-auto">Icon</flux:table.column>
                        <flux:table.column class="min-w-[20px] md:w-auto">Image</flux:table.column>
                        <flux:table.column class="min-w-[300px] md:w-auto">Title</flux:table.column>
                        <flux:table.column class="min-w-[300px] md:w-auto">Description</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Actions</flux:table.column>
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
                                    <flux:heading class="font-semibold text-sm md:text-base">{{ $service->title }}</flux:heading>
                                </flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">
                                    {{ Str::limit($service->description, 100) }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" wire:click="edit({{ $service->id }})" icon="pencil" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $service->id }})" icon="trash" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="5" class="text-center py-6 md:py-8">
                                    <flux:heading size="lg" class="text-base md:text-lg">No data found.</flux:heading>
                                    <flux:subheading class="text-sm md:text-base">Start by creating new service.</flux:subheading>
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
    </flux:card>

    <flux:modal name="form" class="min-w-sm md:min-w-2xl lg:min-w-4xl">
        <div class="space-y-4 sm:space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $service_id ? 'Edit Service' : 'Add New Service' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-4 sm:space-y-6">
                        <flux:field>
                            <flux:label badge="1286x590">Image</flux:label>
                            @if ($image)
                                <img
                                    src="{{ $image->temporaryUrl() }}"
                                    alt="Image Preview"
                                    class="h-32 w-auto"
                                >
                            @elseif ($existing_image)
                                <div class="flex flex-col sm:flex-row gap-4 items-start">
                                    <img
                                        src="{{ Storage::url($existing_image) }}"
                                        alt="Current Image"
                                        class="h-32 w-auto"
                                    >
                                    <flux:button type="button" variant="danger" wire:click="$set('existing_image', null)" class="w-fit">
                                        Delete
                                    </flux:button>
                                </div>
                            @endif
                            <flux:input
                                type="file"
                                wire:model="image"
                                accept="image/jpeg,image/png,image/jpg"
                            />
                            <flux:description>Max size: 2MB. Formats: JPG, JPEG, PNG</flux:description>
                            <flux:error name="image" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Title</flux:label>
                            <flux:input wire:model="title" />
                            <flux:error name="title" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Description</flux:label>
                            <flux:textarea wire:model="description" rows="4"></flux:textarea>
                            <flux:error name="description" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Icon</flux:label>
                            <flux:radio.group variant="grid" cols="6" wire:model="icon">
                                @foreach ($iconOptions as $iconName)
                                    <flux:radio value="{{ $iconName }}" icon="{{ $iconName }}" />
                                @endforeach
                            </flux:radio.group>
                            <flux:error name="icon" />
                        </flux:field>

                        <div class="flex justify-end">
                            <flux:button type="submit" variant="primary" class="w-full md:w-fit" wire:loading.attr="disabled">
                                {{ $service_id ? 'Update' : 'Create' }}
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
                <flux:heading size="lg" class="font-semibold">Delete service?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this service?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex justify-end">
                <flux:button type="button" variant="danger" wire:click="deleteService" class="w-full sm:w-fit">
                    Delete
                </flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
