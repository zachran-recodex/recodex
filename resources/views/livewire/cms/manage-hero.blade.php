<div>
    <header class="flex justify-between items-center mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold!">Manage Hero Section</flux:heading>
        <flux:button variant="primary" icon="pencil-square" wire:click="openModal">Edit</flux:button>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Hero Information Card -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 p-6">
            <div class="space-y-6">
                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Title</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $title }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Subtitle</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $subtitle }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Motto</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $motto }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Button Text</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $button_text }}</p>
                </div>

                @if ($current_image)
                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Hero Image</h4>
                    <div class="mt-2">
                        <img src="{{ Storage::url($current_image) }}" alt="Hero Image" class="max-w-md rounded-lg border border-zinc-200 dark:border-zinc-700">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Edit Modal -->
    <flux:modal wire:model="isOpen" class="max-w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Hero Information</flux:heading>
                <flux:text class="mt-2">Update your hero section information displayed on the homepage.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="update" class="space-y-4">
                <!-- Title -->
                <flux:field>
                    <flux:label>Title</flux:label>

                    <flux:input wire:model="title" placeholder="Enter title" />

                    <flux:error name="title" />
                </flux:field>

                <!-- Subtitle -->
                <flux:field>
                    <flux:label>Subtitle</flux:label>

                    <flux:textarea wire:model="subtitle" placeholder="Enter subtitle" rows="3" />

                    <flux:error name="subtitle" />
                </flux:field>

                <!-- Motto -->
                <flux:field>
                    <flux:label>Motto</flux:label>

                    <flux:input wire:model="motto" placeholder="Enter motto" />

                    <flux:error name="motto" />
                </flux:field>

                <!-- Button Text -->
                <flux:field>
                    <flux:label>Button Text</flux:label>

                    <flux:input wire:model="button_text" placeholder="Enter button text" />

                    <flux:error name="button_text" />
                </flux:field>

                <!-- Hero Image -->
                <flux:field>
                    <flux:label badge="485x540">Hero Image</flux:label>

                    <flux:input type="file" wire:model="image" accept="image/*" />

                    @if ($image)
                        <div class="mt-2 flex items-center space-x-2">
                            <img src="{{ $image->temporaryUrl() }}" alt="Image preview" class="h-20 w-auto rounded border" />
                            <span class="text-xs text-zinc-500">Image Preview</span>
                        </div>
                    @elseif ($current_image)
                        <div class="mt-2 flex items-center space-x-2">
                            <img src="{{ Storage::url($current_image) }}" alt="Current image" class="h-20 w-auto rounded border" />
                            <span class="text-xs text-zinc-500">Current image</span>
                        </div>
                    @endif

                    <flux:error name="image" />
                </flux:field>

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">Update</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
