<div>
    <header class="mb-6">
        <flux:heading level="2" class="text-2xl! font-semibold! mb-4">Manage Team Members</flux:heading>
        <div class="flex items-center justify-between gap-4">
            <div class="w-72">
                <flux:input class="w-full" wire:model.live.debounce.300ms="search" placeholder="Search members..." icon="magnifying-glass" />
            </div>

            <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
        </div>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        <!-- Members Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Photo
                        </flux:table.column>
                        <flux:table.column>
                            Name
                        </flux:table.column>
                        <flux:table.column>
                            Position
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
                        @forelse ($members as $member)
                            <flux:table.row>
                                <flux:table.cell>
                                    @if ($member->photo_path)
                                        <img src="{{ Storage::url($member->photo_path) }}" alt="{{ $member->name }}" class="w-16 h-16 rounded-lg object-cover" />
                                    @else
                                        <div class="w-16 h-16 rounded-lg bg-zinc-200 dark:bg-zinc-700 flex items-center justify-center">
                                            <flux:icon name="user" class="w-8 h-8 text-zinc-500 dark:text-zinc-400" />
                                        </div>
                                    @endif
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $member->name }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $member->position ?? '—' }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge :color="$member->is_active ? 'green' : 'red'">
                                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $member->sort_order }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $member->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmMemberDeletion({{ $member->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No team members found</p>
                                        @if ($search)
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400">Try adjusting your search criteria</p>
                                        @else
                                            <flux:button wire:click="create" size="sm" variant="primary">
                                                Add Your First Team Member
                                            </flux:button>
                                        @endif
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="6">
                            {{ $members->links() }}
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
                <flux:heading size="lg">{{ $memberId ? 'Edit Team Member' : 'Add New Team Member' }}</flux:heading>
                <flux:text class="mt-2">Manage team members easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Name -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Name</flux:label>

                        <flux:input wire:model="name" placeholder="Enter name" />

                        <flux:error name="name" />
                    </flux:field>

                    <!-- Position -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Position</flux:label>

                        <flux:input wire:model="position" placeholder="Enter position" />

                        <flux:error name="position" />
                    </flux:field>

                    <!-- Photo -->
                    <flux:field class="md:col-span-2">
                        <flux:label badge="484x489">Photo</flux:label>

                        <flux:input type="file" wire:model="photo" accept="image/*" />

                        @if ($photo)
                            <div class="mt-2 flex items-center space-x-2">
                                <img src="{{ $photo->temporaryUrl() }}" alt="Photo preview" class="h-16 w-16 rounded-lg object-cover border" />
                                <span class="text-xs text-zinc-500">Photo Preview</span>
                            </div>
                        @elseif ($current_photo)
                            <div class="mt-2 flex items-center space-x-2">
                                <img src="{{ Storage::url($current_photo) }}" alt="Current photo" class="h-16 w-16 rounded-lg object-cover border" />
                                <span class="text-xs text-zinc-500">Current photo</span>
                            </div>
                        @endif

                        <flux:error name="photo" />
                    </flux:field>

                    <!-- Description -->
                    <flux:field class="md:col-span-2">
                        <flux:label>Description</flux:label>

                        <flux:textarea wire:model="description" placeholder="Enter description" />

                        <flux:error name="description" />
                    </flux:field>

                    <flux:separator class="md:col-span-2" />

                    <!-- Social Links -->
                    <flux:fieldset class="md:col-span-2">
                        <flux:legend>Social Links</flux:legend>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                            <!-- Twitter -->
                            <flux:field>
                                <flux:label>Twitter</flux:label>

                                <flux:input wire:model="social_links.twitter" placeholder="https://twitter.com/username" />

                                <flux:error name="social_links.twitter" />
                            </flux:field>

                            <!-- Facebook -->
                            <flux:field>
                                <flux:label>Facebook</flux:label>

                                <flux:input wire:model="social_links.facebook" placeholder="https://facebook.com/username" />

                                <flux:error name="social_links.facebook" />
                            </flux:field>

                            <!-- Instagram -->
                            <flux:field>
                                <flux:label>Instagram</flux:label>

                                <flux:input wire:model="social_links.instagram" placeholder="https://instagram.com/username" />

                                <flux:error name="social_links.instagram" />
                            </flux:field>

                            <!-- LinkedIn -->
                            <flux:field>
                                <flux:label>LinkedIn</flux:label>

                                <flux:input wire:model="social_links.linkedin" placeholder="https://linkedin.com/in/username" />

                                <flux:error name="social_links.linkedin" />
                            </flux:field>
                        </div>
                    </flux:fieldset>

                    <flux:separator class="md:col-span-2" />

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
                    <flux:button type="submit" variant="primary">{{ $memberId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingMemberDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Team Member?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this team member.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteMember" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
