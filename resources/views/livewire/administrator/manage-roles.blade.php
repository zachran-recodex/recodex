@section('meta_tag')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Recodex ID - Jasa pembuatan website profesional dengan teknologi terkini. Kami menyediakan layanan pengembangan web yang responsif, SEO-friendly, dan disesuaikan dengan kebutuhan bisnis Anda.">
    <meta name="keywords" content="jasa pembuatan website, web development, website profesional, website bisnis, website company profile, website toko online, web developer Indonesia">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Recodex ID - Jasa Pembuatan Website Profesional">
    <meta property="og:description" content="Solusi digital terbaik untuk bisnis Anda dengan layanan pembuatan website profesional yang responsif dan SEO-friendly.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Recodex ID - Jasa Pembuatan Website Profesional">
    <meta name="twitter:description" content="Solusi digital terbaik untuk bisnis Anda dengan layanan pembuatan website profesional yang responsif dan SEO-friendly.">
    <meta name="twitter:image" content="{{ asset('images/hero.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    @production
        <x-google-analytics />
    @endproduction

    <title>Manage Roles | Administrator</title>
@endsection

<div>
    <header class="mb-6 flex items-center justify-between">
        <flux:heading level="2" class="text-2xl! font-semibold!">Manage Roles</flux:heading>
        <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
    </header>

    <main>
        @if (session()->has('error'))
            <flux:callout variant="danger" icon="exclamation-triangle" heading="{{ session('error') }}" class="mb-4" />
        @endif

        <!-- Roles Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Name
                        </flux:table.column>
                        <flux:table.column>
                            Permissions
                        </flux:table.column>
                        <flux:table.column>
                            Actions
                        </flux:table.column>
                    </flux:table.columns>
                    <flux:table.rows>
                        @forelse ($roles as $role)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $role->name }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach ($role->permissions as $permission)
                                            <flux:badge color="blue">{{ $permission->name }}</flux:badge>
                                        @endforeach
                                    </div>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $role->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmRoleDeletion({{ $role->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="3" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No roles found</p>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="3">
                            {{ $roles->links() }}
                        </flux:table.column>
                    </flux:table.columns>
                </flux:table>
            </div>
        </div>
    </main>

    <!-- Create/Edit Modal -->
    <flux:modal wire:model="isOpen" class="min-w-sm md:min-w-2xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $roleId ? 'Edit Role' : 'Add New Role' }}</flux:heading>
                <flux:text class="mt-2">Manage roles and permissions for system access.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <!-- Name -->
                <flux:field>
                    <flux:label>Role Name</flux:label>

                    <flux:input wire:model="name" placeholder="Enter role name" />

                    <flux:error name="name" />
                </flux:field>

                <!-- Permissions -->
                <flux:field>
                    <flux:label>Permissions</flux:label>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                        @foreach($allPermissions as $permission)
                            <div class="flex items-center space-x-2">
                                <flux:checkbox wire:model="selectedPermissions" value="{{ $permission->id }}" id="permission-{{ $permission->id }}" />
                                <flux:label for="permission-{{ $permission->id }}" class="cursor-pointer">{{ $permission->name }}</flux:label>
                            </div>
                        @endforeach
                    </div>

                    <flux:error name="selectedPermissions" />
                </flux:field>

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">{{ $roleId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingRoleDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Role?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this role.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteRole" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
