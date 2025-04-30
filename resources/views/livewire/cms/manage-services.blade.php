<div>
    <header class="mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold! mb-4">Manage Services</flux:heading>
        <div class="flex items-center justify-between gap-4">
            <div class="w-72">
                <flux:input class="w-full" wire:model.live.debounce.300ms="search" placeholder="Search services..." icon="magnifying-glass" />
            </div>

            <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
        </div>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Services Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Title
                        </flux:table.column>
                        <flux:table.column>
                            Subtitle
                        </flux:table.column>
                        <flux:table.column>
                            Icon
                        </flux:table.column>
                        <flux:table.column>
                            Status
                        </flux:table.column>
                        <flux:table.column>
                            Order
                        </flux:table.column>
                        <flux:table.column>
                            Actions
                        </flux:table.column>
                    </flux:table.columns>
                    <flux:table.rows>
                        @forelse ($services as $service)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $service->title }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ Str::limit($service->subtitle, 50) }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    @if ($service->icon)
                                        <div class="flex items-center justify-center w-8 h-8 bg-zinc-100 dark:bg-zinc-700 rounded-md">
                                            <flux:icon name="{{ $service->icon }}" class="w-5 h-5 text-zinc-800 dark:text-zinc-200" />
                                        </div>
                                    @else
                                        <span class="text-zinc-400">—</span>
                                    @endif
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$service->is_active ? 'green' : 'red'">
                                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $service->sort_order }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $service->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmServiceDeletion({{ $service->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No services found</p>
                                        @if ($search)
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search criteria</p>
                                        @else
                                            <flux:button wire:click="create" size="sm" variant="primary">
                                                Add Your First Service
                                            </flux:button>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="6">
                            {{ $services->links() }}
                        </flux:table.column>
                    </flux:table.columns>
                </flux:table>
            </div>
        </div>
    </main>

    <!-- Create/Edit Modal -->
    <flux:modal wire:model="isOpen" class="max-w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $serviceId ? 'Edit Service' : 'Add New Service' }}</flux:heading>
                <flux:text class="mt-2">Manage services easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title and Slug -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Title</flux:label>

                        <flux:input wire:model="title" placeholder="Enter service title" />

                        <flux:error name="title" />
                    </flux:field>

                    <!-- Description -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Description</flux:label>

                        <flux:textarea wire:model="description" placeholder="Enter service description" />

                        <flux:error name="description" />
                    </flux:field>

                    <!-- Image -->
                    <flux:field class="md:col-span-2">
                        <flux:label badge="1286x590">Image</flux:label>

                        <flux:input type="file" wire:model="image" accept="image/*" />

                        @if ($image)
                            <div class="mt-2 flex items-center space-x-2">
                                <img src="{{ $image->temporaryUrl() }}" alt="Image preview" class="h-10 w-auto rounded border" />
                                <span class="text-xs text-zinc-500">Image Preview</span>
                            </div>
                        @elseif ($current_image)
                            <div class="mt-2 flex items-center space-x-2">
                                <img src="{{ Storage::url($current_image) }}" alt="Current image" class="h-10 w-auto rounded border" />
                                <span class="text-xs text-zinc-500">Current image</span>
                            </div>
                        @endif

                        <flux:error name="image" />
                    </flux:field>

                    <!-- Subtitle -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Subtitle</flux:label>

                        <flux:input wire:model="subtitle" placeholder="Enter service subtitle" />

                        <flux:error name="subtitle" />
                    </flux:field>

                    <!-- Content -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Content (HTML)</flux:label>

                        <flux:textarea wire:model="content" placeholder="Enter service content (HTML supported)" />

                        <flux:error name="content" />
                    </flux:field>

                    <!-- Content Image -->
                    <flux:field class="md:col-span-2">
                        <flux:label badge="548x632">Content Image</flux:label>

                        <flux:input type="file" wire:model="content_image" accept="image/*" />

                        @if ($content_image)
                            <div class="mt-2 flex items-center space-x-2">
                                <img src="{{ $content_image->temporaryUrl() }}" alt="Content image preview" class="h-10 w-auto rounded border" />
                                <span class="text-xs text-zinc-500">Content Image Preview</span>
                            </div>
                        @elseif ($current_content_image)
                            <div class="mt-2 flex items-center space-x-2">
                                <img src="{{ Storage::url($current_content_image) }}" alt="Current content image" class="h-10 w-auto rounded border" />
                                <span class="text-xs text-zinc-500">Current content image</span>
                            </div>
                        @endif

                        <flux:error name="content_image" />
                    </flux:field>

                    <!-- Icon -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Icon</flux:label>

                        <flux:input wire:model="icon" placeholder="Icon name (e.g., 'window')" />

                        <flux:error name="icon" />
                    </flux:field>

                    <!-- Order -->
                    <flux:field>
                        <flux:label>Display Order</flux:label>

                        <flux:input wire:model="sort_order" type="number" min="0" />

                        <flux:error name="sort_order" />
                    </flux:field>

                    <!-- Status -->
                    <flux:field>
                        <flux:label>Status</flux:label>

                        <flux:switch wire:model.live="is_active" align="left" label="{{ $is_active ? 'Active' : 'Inactive' }}" />

                        <flux:error name="is_active" />
                    </flux:field>
                </div>

                <!-- Feature List -->
                <flux:separator class="md:col-span-2" />

                <flux:fieldset class="md:col-span-2">
                    <flux:legend>Feature List (Optional)</flux:legend>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                        <!-- Categories Column -->
                        <div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <flux:label>Categories</flux:label>
                                    <div class="flex items-center space-x-1">
                                        <flux:button size="xs" wire:click="addCategory" icon="plus" variant="outline" />
                                    </div>
                                </div>

                                <div class="flex items-center mb-2">
                                    <flux:input wire:model="new_category_title" placeholder="New category title" class="mr-2" />
                                </div>

                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    @foreach ($feature_categories as $index => $category)
                                        <div class="flex items-center justify-between p-2 rounded-md {{ $selected_category_index === $index ? 'bg-primary-50 dark:bg-primary-900' : 'hover:bg-zinc-50 dark:hover:bg-zinc-700' }}">
                                            <button
                                                type="button"
                                                wire:click="selectCategory({{ $index }})"
                                                class="text-left flex-grow truncate {{ $selected_category_index === $index ? 'font-medium text-primary-700 dark:text-primary-300' : '' }}"
                                            >
                                                {{ $category['title'] }}
                                            </button>
                                            <flux:button type="button" icon="x-mark" variant="danger" size="xs" wire:click="removeCategory({{ $index }})" />
                                        </div>
                                    @endforeach

                                    @if (empty($feature_categories))
                                        <div class="text-center py-4 text-zinc-500">
                                            No categories yet
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Points Column -->
                        <div class="md:col-span-2">
                            <div>
                                @if ($selected_category_index !== null && isset($feature_categories[$selected_category_index]))
                                    <div class="mb-4">
                                        <flux:label class="font-medium! mb-2!">Points for "{{ $feature_categories[$selected_category_index]['title'] }}"</flux:label>

                                        <div class="flex items-center mb-2">
                                            <flux:input wire:model="new_point" placeholder="New point" class="mr-2" />
                                            <flux:button size="sm" icon="plus" wire:click="addPoint" variant="outline" />
                                        </div>

                                        <div class="space-y-2 max-h-60 overflow-y-auto">
                                            @foreach ($feature_categories[$selected_category_index]['points'] as $pointIndex => $point)
                                                <div class="flex items-center justify-between p-2 rounded-md hover:bg-zinc-50 dark:hover:bg-zinc-700">
                                                    <span class="flex-grow truncate">{{ $point }}</span>
                                                    <flux:button type="button" icon="x-mark" variant="danger" size="xs" wire:click="removePoint({{ $selected_category_index }}, {{ $pointIndex }})" />
                                                </div>
                                            @endforeach

                                            @if (empty($feature_categories[$selected_category_index]['points']))
                                                <div class="text-center py-4 text-zinc-500">
                                                    No points added yet
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-8 text-zinc-500">
                                        <flux:icon.information-circle class="mx-auto mb-2" />
                                        <p>Select a category to manage its points</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </flux:fieldset>

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">{{ $serviceId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingServiceDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Service?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this service.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteService" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
