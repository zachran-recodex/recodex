<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List FAQ</flux:heading>

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
                    <flux:table.column>Question</flux:table.column>
                    <flux:table.column>Answer</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($faqs as $faq)
                        <flux:table.row>
                            <flux:table.cell>
                                {{ $faq->question }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $faq->answer }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $faq->id }})"
                                        icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $faq->id }})"
                                        icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="3" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.question-mark-circle class="size-12 mb-2" />
                                    <flux:heading size="lg">No FAQs found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new FAQ.
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
        {{ $faqs->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit FAQ' : 'Add New FAQ' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- Question --}}
                        <flux:textarea label="Question" wire:model="question" rows="3" />

                        {{-- Answer --}}
                        <flux:textarea label="Answer" wire:model="answer" rows="5" />
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
                <flux:heading size="lg">Delete FAQ?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this FAQ?</p>
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
