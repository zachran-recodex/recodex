<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading level="1" size="xl">Manage Users</flux:heading>

        <flux:modal.trigger name="form">
            <flux:button type="button" variant="primary" class="w-fit" icon="plus">
                Add New
            </flux:button>
        </flux:modal.trigger>
    </div>

    <flux:input icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search users..." />

    <div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                <thead class="bg-zinc-50 dark:bg-zinc-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-300 uppercase tracking-wider">
                            Photo
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-300 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-300 uppercase tracking-wider">
                            Roles
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-zinc-500 dark:text-zinc-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-zinc-900 divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400">
                            @if ($user->photo)
                                <img src="{{ Storage::url($user->photo) }}" alt="Photo Profile" class="w-20 h-20 rounded-lg object-cover" />
                            @else
                                <div class="w-20 h-20 rounded-lg bg-zinc-200 flex items-center justify-center text-zinc-600 font-semibold text-xl">
                                    {{ $user->initials() }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-zinc-900 dark:text-white">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400">
                            @foreach ($user->roles as $role)
                                <flux:badge color="{{ match($role->name) {
                                    'super-admin' => 'blue',
                                    'admin' => 'green',
                                    default => 'zinc'
                                } }}" class="mr-1">
                                    {{ Str::title(str_replace('-', ' ', $role->name)) }}
                                </flux:badge>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-2">
                                {{-- Edit Button --}}
                                <flux:modal.trigger name="form" wire:click="editUser({{ $user->id }})">
                                    <flux:button icon="pencil" variant="filled" size="sm"></flux:button>
                                </flux:modal.trigger>

                                {{-- Delete Button --}}
                                <flux:modal.trigger name="delete" wire:click="confirmDelete({{ $user->id }})">
                                    <flux:button icon="trash" variant="danger" size="sm"></flux:button>
                                </flux:modal.trigger>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-zinc-500 dark:text-zinc-400">
                            No users found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-zinc-50 dark:bg-zinc-800">
                    <tr>
                        <td colspan="5" class="px-4 py-3">
                            {{ $users->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

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
</flux:container>
