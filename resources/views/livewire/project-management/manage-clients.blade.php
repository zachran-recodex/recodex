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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4D32DGGKGQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-4D32DGGKGQ');
    </script>

    <title>Manage Clients | Project Management</title>
@endsection

<div>
    <header class="mb-6 flex items-center justify-between">
        <flux:heading level="2" class="text-2xl! font-semibold!">Manage Clients</flux:heading>
        <flux:button variant="primary" icon="plus" wire:click="create">Create</flux:button>
    </header>

    <main>
        <!-- Session Messages -->
        @if (session()->has('message'))
            <flux:callout variant="success" icon="check-circle" heading="{{ session('message') }}" class="mb-4" />
        @endif

        @if (session()->has('error'))
            <flux:callout variant="danger" icon="exclamation-circle" heading="{{ session('error') }}" class="mb-4" />
        @endif

        <!-- Clients Table -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="overflow-x-auto">
                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>
                            Company
                        </flux:table.column>
                        <flux:table.column>
                            Contact Info
                        </flux:table.column>
                        <flux:table.column>
                            Address
                        </flux:table.column>
                        <flux:table.column>
                            Total Project
                        </flux:table.column>
                        <flux:table.column>
                            Actions
                        </flux:table.column>
                    </flux:table.columns>
                    <flux:table.rows>
                        @forelse ($clients as $client)
                            <flux:table.row>
                                <flux:table.cell>
                                    {{ $client->company }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:heading>{{ $client->name }}</flux:heading>
                                    <flux:text>{{ $client->email ?? 'No Email' }} | {{ $client->phone ?? 'No Phone' }}</flux:text>
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ Str::limit($client->address ?? '', 50) ?: 'No Address' }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $client->projects->count() }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex items-center space-x-2">
                                        <flux:button wire:click="edit({{ $client->id }})" size="sm" variant="outline" icon="pencil-square" />
                                        <flux:button wire:click="confirmClientDeletion({{ $client->id }})" size="sm" variant="danger" icon="trash" />
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="5" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                        <p class="text-zinc-500 dark:text-zinc-400">No clients found</p>
                                        <flux:button wire:click="create" size="sm" variant="primary">
                                            Add Your First Client
                                        </flux:button>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                    <flux:table.columns class="border-none">
                        <flux:table.column colspan="5">
                            {{ $clients->links() }}
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
                <flux:heading size="lg">{{ $clientId ? 'Edit Client' : 'Add New Client' }}</flux:heading>
                <flux:text class="mt-2">Manage clients easily and efficiently.</flux:text>
            </div>

            <flux:separator />

            <form wire:submit="store" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Company -->
                    <flux:field class="md:col-span-3">
                        <flux:label>Company</flux:label>

                        <flux:input wire:model="company" placeholder="Enter company name" />

                        <flux:error name="company" />
                    </flux:field>

                    <!-- Name -->
                    <flux:field>
                        <flux:label>Name</flux:label>

                        <flux:input wire:model="name" placeholder="Enter contact name" />

                        <flux:error name="name" />
                    </flux:field>

                    <!-- Email -->
                    <flux:field>
                        <flux:label>Email</flux:label>

                        <flux:input wire:model="email" placeholder="Enter contact email" />

                        <flux:error name="email" />
                    </flux:field>

                    <!-- Phone -->
                    <flux:field>
                        <flux:label>Phone</flux:label>

                        <flux:input wire:model="phone" placeholder="Enter contact phone" />

                        <flux:error name="phone" />
                    </flux:field>

                    <!-- Address -->
                    <flux:field class="md:col-span-3">
                        <flux:label>Address</flux:label>

                        <flux:textarea wire:model="address" placeholder="Enter company address" />

                        <flux:error name="address" />
                    </flux:field>
                </div>

                <flux:separator />

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button wire:click="closeModal" variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">{{ $clientId ? 'Update' : 'Create' }}</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Confirmation Modal -->
    <flux:modal wire:model="confirmingClientDeletion" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Client?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this client.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button wire:click="cancelDelete" variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button wire:click="deleteClient" type="submit" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
