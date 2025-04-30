<div>
    <header class="mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold! mb-4">Manage Projects</flux:heading>
        <div class="flex items-center justify-between gap-4">
            <div class="w-72">
                <flux:input class="w-full" wire:model.live.debounce.300ms="search" placeholder="Search projects..." icon="magnifying-glass" />
            </div>

            <div class="flex items-center gap-4">
                <flux:dropdown>
                    <flux:button icon:trailing="chevron-down">Sort by</flux:button>

                    <flux:menu>
                        <flux:menu.radio.group>
                            <flux:menu.radio wire:click="sortBy('sort_order')" :checked="$sortField === 'sort_order'">Default</flux:menu.radio>
                            <flux:menu.radio wire:click="sortBy('title')" :checked="$sortField === 'title'">Title</flux:menu.radio>
                            <flux:menu.radio wire:click="sortBy('category')" :checked="$sortField === 'category'">Category</flux:menu.radio>
                            <flux:menu.radio wire:click="sortBy('client')" :checked="$sortField === 'client'">Client</flux:menu.radio>
                            <flux:menu.radio wire:click="sortBy('created_at')" :checked="$sortField === 'created_at'">Created At</flux:menu.radio>
                            <flux:menu.radio wire:click="sortBy('is_active')" :checked="$sortField === 'is_active'">Status</flux:menu.radio>
                        </flux:menu.radio.group>
                    </flux:menu>
                </flux:dropdown>
                <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
            </div>
        </div>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Projects Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Title
                        </flux:table.column>
                        <flux:table.column>
                            Category
                        </flux:table.column>
                        <flux:table.column>
                            Client
                        </flux:table.column>
                        <flux:table.column>
                            Start Date
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
                        @forelse ($projects as $project)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $project->title }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $project->category }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $project->client }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $project->date ? $project->date->format('d F Y') : '—' }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$project->is_active ? 'green' : 'red'">
                                        {{ $project->is_active ? 'Active' : 'Inactive' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $project->sort_order }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $project->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmProjectDeletion({{ $project->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="7" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No projects found</p>
                                        @if ($search)
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search criteria</p>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="7">
                            {{ $projects->links() }}
                        </flux:table.column>
                    </flux:table.columns>
                </flux:table>
            </div>
        </div>
    </main>

    <!-- Create/Edit Modal -->
    <flux:modal wire:model="isOpen" class="min-w-sm md:min-w-2xl lg:min-w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $projectId ? 'Edit Project' : 'Add New Project' }}</flux:heading>
                <flux:text class="mt-2">Manage projects easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title -->
                    <flux:field>
                        <flux:label>Title</flux:label>

                        <flux:input wire:model="title" placeholder="Enter project title" />

                        <flux:error name="title" />
                    </flux:field>

                    <!-- Category -->
                    <flux:field>
                        <flux:label>Category</flux:label>

                        <flux:input wire:model="category" placeholder="Enter project category" />

                        <flux:error name="category" />
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

                    <!-- Client -->
                    <flux:field>
                        <flux:label>Client</flux:label>

                        <flux:input wire:model="client" placeholder="Enter client name" />

                        <flux:error name="client" />
                    </flux:field>

                    <!-- Date -->
                    <flux:field>
                        <flux:label>Start Date</flux:label>

                        <flux:input type="date" wire:model="date" />

                        <flux:error name="date" />
                    </flux:field>

                    <!-- Duration -->
                    <flux:field>
                        <flux:label>Duration</flux:label>

                        <flux:input wire:model="duration" placeholder="e.g. Two Months" />

                        <flux:error name="duration" />
                    </flux:field>

                    <!-- Cost -->
                    <flux:field>
                        <flux:label>Cost</flux:label>

                        <flux:input wire:model="cost" placeholder="e.g. Rp 2.000.000" />

                        <flux:error name="cost" />
                    </flux:field>

                    <!-- Description -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Description</flux:label>

                        <flux:textarea wire:model="description" placeholder="Enter project description" />

                        <flux:error name="description" />
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

                <!-- Project Steps -->
                <flux:separator class="md:col-span-2" />

                <flux:fieldset class="md:col-span-2">
                    <flux:legend>Project Steps</flux:legend>

                    <div class="space-y-4 mt-2">
                        <!-- Content Image -->
                        <flux:field class="md:col-span-2">
                            <flux:label badge="456x736">Content Image</flux:label>

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

                        <!-- Add New Step -->
                        <flux:field>
                            <flux:label>Step Title</flux:label>
                            <flux:input wire:model="new_step_title" placeholder="Enter step title" />
                        </flux:field>

                        <flux:field>
                            <flux:label>Step Description</flux:label>
                            <flux:textarea wire:model="new_step_description" placeholder="Enter step description" />
                        </flux:field>

                        <div class="flex justify-end">
                            <flux:button type="button" wire:click="addStep" size="sm" variant="outline" icon="plus" class="w-full!">Add Step</flux:button>
                        </div>

                        <!-- Steps List -->
                        <div class="space-y-2 max-h-60 overflow-y-auto">
                            @forelse ($steps as $index => $step)
                                <div class="flex items-start justify-between p-3 rounded-md border border-zinc-200 dark:border-zinc-700">
                                    <div class="flex-grow">
                                        <h4 class="font-medium">{{ $step['title'] }}</h4>
                                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $step['description'] }}</p>
                                    </div>
                                    <flux:button type="button" icon="x-mark" variant="danger" size="xs" wire:click="removeStep({{ $index }})" />
                                </div>
                            @empty
                                <div class="text-center py-4 text-zinc-500">
                                    No steps added yet
                                </div>
                            @endforelse
                        </div>
                    </div>
                </flux:fieldset>

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">{{ $projectId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingProjectDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Project?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this project.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteProject" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
