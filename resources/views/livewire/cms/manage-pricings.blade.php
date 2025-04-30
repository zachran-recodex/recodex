<div>
    <header class="mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold! mb-4">Manage Pricings</flux:heading>
        <div class="flex items-center justify-between gap-4">
            <div class="w-72">
                <flux:input class="w-full" wire:model.live.debounce.300ms="search" placeholder="Search pricings..." icon="magnifying-glass" />
            </div>

            <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
        </div>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Pricings Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Title
                        </flux:table.column>
                        <flux:table.column>
                            Monthly Price
                        </flux:table.column>
                        <flux:table.column>
                            Quarterly Price
                        </flux:table.column>
                        <flux:table.column>
                            Semi-Annually Price
                        </flux:table.column>
                        <flux:table.column>
                            Annually Price
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
                        @forelse ($pricings as $pricing)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $pricing->title }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    Rp {{ number_format($pricing->monthly_price, 0, ',', '.') }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    Rp {{ number_format($pricing->quarterly_price, 0, ',', '.') }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    Rp {{ number_format($pricing->semi_annually_price, 0, ',', '.') }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    Rp {{ number_format($pricing->annually_price, 0, ',', '.') }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$pricing->is_active ? 'green' : 'red'">
                                        {{ $pricing->is_active ? 'Active' : 'Inactive' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $pricing->sort_order }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $pricing->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmPricingDeletion({{ $pricing->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="8" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No pricings found</p>
                                        @if ($search)
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search criteria</p>
                                        @else
                                            <flux:button wire:click="create" size="sm" variant="primary">
                                                Add Your First Pricing
                                            </flux:button>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="8">
                            {{ $pricings->links() }}
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
                <flux:heading size="lg">{{ $pricingId ? 'Edit Pricing' : 'Add New Pricing' }}</flux:heading>
                <flux:text class="mt-2">Manage pricings easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Title -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Title</flux:label>

                        <flux:input wire:model="title" placeholder="Enter pricing title" />

                        <flux:error name="title" />
                    </flux:field>

                    <!-- Description -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Description</flux:label>

                        <flux:textarea wire:model="description" placeholder="Enter pricing description" />

                        <flux:error name="description" />
                    </flux:field>

                    <!-- Monthly Price -->
                    <flux:field>
                        <flux:label>Monthly Price</flux:label>

                        <flux:input wire:model="monthly_price" type="number" min="0" step="1" placeholder="0" />

                        <flux:error name="monthly_price" />
                    </flux:field>

                    <!-- Quarterly Price -->
                    <flux:field>
                        <flux:label>Quarterly Price</flux:label>

                        <flux:input wire:model="quarterly_price" type="number" min="0" step="1" placeholder="0" />

                        <flux:error name="quarterly_price" />
                    </flux:field>

                    <!-- Semi-Annually Price -->
                    <flux:field>
                        <flux:label>Semi-Annually Price</flux:label>

                        <flux:input wire:model="semi_annually_price" type="number" min="0" step="1" placeholder="0" />

                        <flux:error name="semi_annually_price" />
                    </flux:field>

                    <!-- Yearly Price -->
                    <flux:field>
                        <flux:label>Yearly Price</flux:label>

                        <flux:input wire:model="annually_price" type="number" min="0" step="1" placeholder="0" />

                        <flux:error name="annually_price" />
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

                <!-- Features -->
                <flux:separator class="md:col-span-2" />

                <flux:fieldset class="md:col-span-2">
                    <flux:legend>Features</flux:legend>

                    <div class="grid grid-cols-1 gap-4 mt-2">
                        <div>
                            <div class="flex items-center mb-2">
                                <flux:input wire:model="new_feature" placeholder="Add new feature" class="mr-2" />
                                <flux:button size="sm" wire:click="addFeature" icon="plus" variant="outline" />
                            </div>

                            <div class="space-y-2 max-h-60 overflow-y-auto">
                                @foreach ($features as $index => $feature)
                                    <div class="flex items-center justify-between p-2 rounded-md hover:bg-zinc-50 dark:hover:bg-zinc-700">
                                        <span class="flex-grow truncate">{{ $feature }}</span>
                                        <flux:button type="button" icon="x-mark" variant="danger" size="xs" wire:click="removeFeature({{ $index }})" />
                                    </div>
                                @endforeach

                                @if (empty($features))
                                    <div class="text-center py-4 text-zinc-500">
                                        No feature yet
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
                    <flux:button type="submit" variant="primary">{{ $pricingId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingPricingDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Pricing?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this pricing.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deletePricing" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
