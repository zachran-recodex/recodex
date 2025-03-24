<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage User</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Admin</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage User</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">

            <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search users..." />

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
                        <flux:table.column>
                            Photo
                        </flux:table.column>
                        <flux:table.column sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">
                            Name
                        </flux:table.column>
                        <flux:table.column sortable wire:click="sortBy('email')" :direction="$sortField === 'email' ? $sortDirection : null">
                            Email
                        </flux:table.column>
                        <flux:table.column sortable wire:click="sortBy('role')" :direction="$sortField === 'role' ? $sortDirection : null">
                            Role
                        </flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>


                    <flux:table.rows>
                        @forelse ($users as $user)
                            <flux:table.row>

                                <flux:table.cell>
                                    @if ($user->photo)
                                        <img src="{{ Storage::url($user->photo) }}" alt="Photo Profile" class="w-20 h-20 rounded-lg object-cover" />
                                    @else
                                        <div class="w-20 h-20 rounded-lg bg-zinc-200 flex items-center justify-center text-zinc-600 font-semibold text-xl">
                                            {{ $user->initials() }}
                                        </div>
                                    @endif
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $user->name }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $user->email }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    @foreach ($user->roles as $role)
                                        <flux:badge color="{{ match($role->name) {
                                            'super-admin' => 'blue',
                                            'admin' => 'green',
                                            default => 'zinc'
                                        } }}" class="mr-1">
                                            {{ Str::title(str_replace('-', ' ', $role->name)) }}
                                        </flux:badge>
                                    @endforeach
                                </flux:table.cell>

                                <flux:table.cell>

                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $user->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $user->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="4" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:icon.users class="size-12 mb-2" />
                                        <flux:heading size="lg">No users found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new user.
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
            {{ $users->links() }}
        </flux:card.footer>

        <flux:modal name="form" class="w-7xl">
            <div class="space-y-6">

                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit User' : 'Add New User' }}
                </flux:heading>

                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">

                            <flux:input label="Name" wire:model="name" />

                            <flux:input type="email" label="Email" wire:model="email" />

                            <flux:input type="password" label="Password" wire:model="password"
                                :hint="$isEditing ? 'Leave blank to keep current password' : 'Minimum 8 characters'" />

                            <div>
                                <flux:label>Roles</flux:label>
                                <flux:checkbox.group wire:model="selectedRoles">
                                    @foreach ($roles ?? [] as $role)
                                        <flux:checkbox
                                            :id="'role-' . $role->id"
                                            :label="$role->name"
                                            :value="$role->id"
                                        />
                                    @endforeach
                                </flux:checkbox.group>
                            </div>
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

        <flux:modal name="delete" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete user?</flux:heading>

                    <flux:subheading>
                        <p>Are you sure you want to delete this user?</p>
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
</flux:container>