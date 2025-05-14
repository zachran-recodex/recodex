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

    <title>Manage Users | Administrator</title>
@endsection

<div>
    <header class="mb-6 flex items-center justify-between">
        <flux:heading level="2" class="text-2xl! font-semibold!">Manage Users</flux:heading>
    </header>

    <main class="space-y-6">
        <!-- Teams Table -->
        <div>
            <flux:heading level="3" class="text-xl! font-semibold! mb-4">Recodex ID Team</flux:heading>
            <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <div class="overflow-x-auto">
                    <flux:table>
                        <flux:table.columns>
                            <flux:table.column>
                                Profile
                            </flux:table.column>
                            <flux:table.column>
                                Username
                            </flux:table.column>
                            <flux:table.column>
                                Email
                            </flux:table.column>
                            <flux:table.column>
                                Email Verified At
                            </flux:table.column>
                            <flux:table.column>
                                Status
                            </flux:table.column>
                        </flux:table.columns>
                        <flux:table.rows>
                            @forelse ($teams as $team)
                                <flux:table.row>
                                    <flux:table.cell>
                                        <div class="flex items-center gap-2">
                                            @if ($team->photo_path)
                                                <img src="{{ Storage::url($team->photo_path) }}" alt="{{ $team->name }}" class="w-16 h-16 rounded-lg object-cover" />
                                            @else
                                                <div class="w-16 h-16 rounded-lg bg-zinc-200 dark:bg-zinc-700 text-zinc-500 dark:text-zinc-400 font-semibold text-xl flex items-center justify-center">
                                                    {{ $team->initials() }}
                                                </div>
                                            @endif
                                            <div>
                                                <flux:heading>{{ $team->name }}</flux:heading>
                                                {{ $team->position ?? '—' }}
                                            </div>
                                        </div>
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        {{ $team->username }}
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        {{ $team->email }}
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        {{ $team->email_verified_at ? $team->email_verified_at->format('d F Y') : '—' }}
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        <div class="flex items-center gap-2">
                                            <flux:badge :color="$team->is_active ? 'green' : 'red'">
                                                {{ $team->is_active ? 'Active' : 'Inactive' }}
                                            </flux:badge>
                                            <flux:switch wire:click="toggleStatus({{ $team->id }})" :checked="$team->is_active" align="left" />
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @empty
                                <flux:table.row>
                                    <flux:table.cell colspan="5" class="text-center py-8">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                            <p class="text-zinc-500 dark:text-zinc-400">No teams found</p>
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforelse
                        </flux:table.rows>
                        <flux:table.columns class="border-none">
                            <flux:table.column colspan="5">
                                {{ $teams->links() }}
                            </flux:table.column>
                        </flux:table.columns>
                    </flux:table>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div>
            <flux:heading level="3" class="text-xl! font-semibold! mb-4">Other Users</flux:heading>
            <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <div class="overflow-x-auto">
                    <flux:table>
                        <flux:table.columns>
                            <flux:table.column>
                                Profile
                            </flux:table.column>
                            <flux:table.column>
                                Username
                            </flux:table.column>
                            <flux:table.column>
                                Email
                            </flux:table.column>
                            <flux:table.column>
                                Email Verified At
                            </flux:table.column>
                            <flux:table.column>
                                Status
                            </flux:table.column>
                        </flux:table.columns>
                        <flux:table.rows>
                            @forelse ($users as $user)
                                <flux:table.row>
                                    <flux:table.cell>
                                        <div class="flex items-center gap-2">
                                            @if ($user->photo_path)
                                                <img src="{{ Storage::url($user->photo_path) }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-lg object-cover" />
                                            @else
                                                <div class="w-16 h-16 rounded-lg bg-zinc-200 dark:bg-zinc-700 text-zinc-500 dark:text-zinc-400 font-semibold text-xl flex items-center justify-center">
                                                    {{ $user->initials() }}
                                                </div>
                                            @endif
                                            <div>
                                                <flux:heading>{{ $user->name }}</flux:heading>
                                            </div>
                                        </div>
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        {{ $user->username }}
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        {{ $user->email }}
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        {{ $user->email_verified_at ? $user->email_verified_at->format('d F Y') : '—' }}
                                    </flux:table.cell>
                                    <flux:table.cell>
                                        <div class="flex items-center gap-2">
                                            <flux:badge :color="$user->is_active ? 'green' : 'red'">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </flux:badge>
                                            <flux:switch wire:click="toggleStatus({{ $user->id }})" :checked="$user->is_active" align="left" />
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @empty
                                <flux:table.row>
                                    <flux:table.cell colspan="5" class="text-center py-8">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <flux:icon.inbox class="w-10 h-10 text-zinc-400" />
                                            <p class="text-zinc-500 dark:text-zinc-400">No users found</p>
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforelse
                        </flux:table.rows>
                        <flux:table.columns class="border-none">
                            <flux:table.column colspan="5">
                                {{ $users->links() }}
                            </flux:table.column>
                        </flux:table.columns>
                    </flux:table>
                </div>
            </div>
        </div>
    </main>
</div>
