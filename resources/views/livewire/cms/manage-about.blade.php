<div>
    <header class="flex justify-between items-center mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold!">Manage About Us Information</flux:heading>
        <flux:button variant="primary" icon="pencil-square" wire:click="openModal">Edit</flux:button>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- About Information Card -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 p-6">
            <div class="space-y-6">
                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Title</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $title }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Description</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $description }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Vision</h4>
                    <p class="text-zinc-900 dark:text-zinc-100">{{ $vision }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mb-1">Mission</h4>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($mission as $point)
                            <li class="text-zinc-900 dark:text-zinc-100">{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Modal -->
    <flux:modal wire:model="isOpen" class="max-w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit About Us Information</flux:heading>
                <flux:text class="mt-2">Update your company information displayed on the about page.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="update" class="space-y-4">
                <!-- Title -->
                <flux:field>
                    <flux:label>Title</flux:label>

                    <flux:input wire:model="title" placeholder="Enter title" />

                    <flux:error name="title" />
                </flux:field>

                <!-- Description -->
                <flux:field>
                    <flux:label>Description</flux:label>

                    <flux:textarea wire:model="description" placeholder="Enter description" rows="4" />

                    <flux:error name="description" />
                </flux:field>

                <!-- Vision -->
                <flux:field>
                    <flux:label>Vision</flux:label>

                    <flux:textarea wire:model="vision" placeholder="Enter vision" rows="3" />

                    <flux:error name="vision" />
                </flux:field>

                <!-- Mission Points -->
                <flux:fieldset>
                    <flux:legend>Mission Points</flux:legend>

                    <div class="mt-2 space-y-4">
                        <!-- Add New Mission Point -->
                        <div class="flex items-center gap-2">
                            <flux:input wire:model="newMissionPoint" placeholder="Add new mission point" class="flex-grow" />
                            <flux:button type="button" wire:click="addMissionPoint" variant="outline" icon="plus">Add</flux:button>
                        </div>

                        <flux:error name="mission" />

                        <!-- Mission Points List -->
                        <div class="space-y-2 max-h-60 overflow-y-auto">
                            @foreach ($mission as $index => $point)
                                <div class="flex items-center justify-between p-2 rounded-md hover:bg-zinc-50 dark:hover:bg-zinc-700">
                                    <span class="flex-grow">{{ $point }}</span>
                                    <flux:button type="button" icon="x-mark" variant="danger" size="xs" wire:click="removeMissionPoint({{ $index }})" />
                                </div>
                            @endforeach

                            @if (empty($mission))
                                <div class="text-center py-4 text-zinc-500">
                                    No mission points added yet
                                </div>
                            @endif
                        </div>
                    </div>
                </flux:fieldset>

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
