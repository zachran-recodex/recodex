<div>
    <header class="mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold! mb-4">Manage FAQs</flux:heading>
        <div class="flex items-center justify-between gap-4">
            <div class="w-72">
                <flux:input class="w-full" wire:model.live.debounce.300ms="search" placeholder="Search faqs..." icon="magnifying-glass" />
            </div>

            <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
        </div>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Faqs Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Question
                        </flux:table.column>
                        <flux:table.column>
                            Answer
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
                        @forelse ($faqs as $faq)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ Str::limit($faq->question, 50) }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ Str::limit($faq->answer, 50) }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$faq->is_active ? 'green' : 'red'">
                                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $faq->sort_order }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $faq->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmFaqDeletion({{ $faq->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No FAQs found</p>
                                        @if ($search)
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search criteria</p>
                                        @else
                                            <flux:button wire:click="create" size="sm" variant="primary">
                                                Add Your First FAQ
                                            </flux:button>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="6">
                            {{ $faqs->links() }}
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
                <flux:heading size="lg">{{ $faqId ? 'Edit FAQ' : 'Create New FAQ' }}</flux:heading>
                <flux:text class="mt-2">Manage frequently asked questions easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <!-- Question -->
                <flux:field>
                    <flux:label>Question</flux:label>

                    <flux:textarea wire:model="question" placeholder="Enter question" />

                    <flux:error name="question" />
                </flux:field>

                <!-- Answer -->
                <flux:field>
                    <flux:label>Answer</flux:label>

                    <flux:textarea wire:model="answer" placeholder="Enter answer" />

                    <flux:error name="answer" />
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
                    <flux:button type="submit" variant="primary">{{ $faqId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingFaqDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Faq?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this faq.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteFaq" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
