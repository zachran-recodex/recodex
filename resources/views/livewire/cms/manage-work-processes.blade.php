<div>
    <header class="mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold! mb-4">Manage Work Processes</flux:heading>
        <div class="flex items-center justify-between gap-4">
            <div class="w-72">
                <flux:input class="w-full" wire:model.live.debounce.300ms="search" placeholder="Search work processes..." icon="magnifying-glass" />
            </div>

            <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
        </div>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Work Processes Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Title
                        </flux:table.column>
                        <flux:table.column>
                            Description
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
                        @forelse ($processes as $process)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $process->title }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ Str::limit($process->description, 50) }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$process->is_active ? 'green' : 'red'">
                                        {{ $process->is_active ? 'Active' : 'Inactive' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $process->sort_order }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $process->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmProcessDeletion({{ $process->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="5" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No work processes found</p>
                                        @if ($search)
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search criteria</p>
                                        @else
                                            <flux:button wire:click="create" size="sm" variant="primary">
                                                Add Your First Work Process
                                            </flux:button>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="5">
                            {{ $processes->links() }}
                        </flux:table.column>
                    </flux:table.columns>
                </flux:table>
            </div>
        </div>
    </main>

    <!-- Modal Form -->
    <flux:modal wire:model="isOpen" class="max-w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $processId ? 'Edit Work Process' : 'Create New Work Process' }}</flux:heading>
                <flux:text class="mt-2">Manage work processes easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <!-- Title -->
                <flux:field>
                    <flux:label>Title</flux:label>

                    <flux:input wire:model="title" placeholder="Enter title" />

                    <flux:error name="title" />
                </flux:field>

                <!-- Description -->
                <flux:field>
                    <flux:label>Description</flux:label>

                    <flux:textarea wire:model="description" placeholder="Enter description" />

                    <flux:error name="description" />
                </flux:field>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">{{ $processId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingProcessDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Work Process?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this work process.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteProcess" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
