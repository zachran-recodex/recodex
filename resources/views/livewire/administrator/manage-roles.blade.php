<flux:container class="space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <flux:heading size="xl" class="font-bold!">Manage Role</flux:heading>

            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Admin</flux:breadcrumbs.item>
                <flux:breadcrumbs.item separator="slash">Manage Role</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>

        <flux:card>

            <flux:card.header class="flex justify-between items-center">

                <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search roles..." />

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
                            <flux:table.column>Name</flux:table.column>
                            <flux:table.column>Permissions</flux:table.column>
                            <flux:table.column>Actions</flux:table.column>
                        </flux:table.columns>

                        <flux:table.rows>
                            @forelse ($roles as $role)
                                <flux:table.row>

                                    <flux:table.cell>
                                        {{ Str::title(str_replace('-', ' ', $role->name)) }}
                                    </flux:table.cell>

                                    <flux:table.cell>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($role->permissions as $permission)
                                                <flux:badge>
                                                    {{ Str::title(str_replace('-', ' ', $permission->name)) }}
                                                </flux:badge>
                                            @endforeach
                                        </div>
                                    </flux:table.cell>

                                    <flux:table.cell>
                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" wire:click="edit({{ $role->id }})"
                                                icon="pencil"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $role->id }})"
                                                icon="trash"></flux:button>
                                        </flux:modal.trigger>
                                    </flux:table.cell>
                                </flux:table.row>
                            @empty
                                <flux:table.row>
                                    <flux:table.cell colspan="2" class="text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <flux:icon.users class="size-12 mb-2" />
                                            <flux:heading size="lg">No roles found</flux:heading>
                                            <flux:subheading>
                                                Start by creating a new role.
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
                {{ $roles->links() }}
            </flux:card.footer>

            <flux:modal name="form" class="w-7xl">
                <div class="space-y-6">

                    <flux:heading size="lg" class="font-semibold mb-6">
                        {{ $isEditing ? 'Edit Role' : 'Add New Role' }}
                    </flux:heading>

                    <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                        <flux:fieldset>
                            <div class="space-y-6">

                                <flux:input
                                    label="Name"
                                    wire:model="name"
                                    :disabled="in_array($name, ['admin', 'super-admin'])"
                                />

                                <div>
                                    <flux:label>Permissions</flux:label>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach($permissions as $permission)
                                            <flux:checkbox
                                                wire:model="selectedPermissions"
                                                :value="$permission->id"
                                                :label="$permission->name"
                                            />
                                        @endforeach
                                    </div>
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
                        <flux:heading size="lg">Delete role?</flux:heading>

                        <flux:subheading>
                            <p>Are you sure you want to delete this role?</p>
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
