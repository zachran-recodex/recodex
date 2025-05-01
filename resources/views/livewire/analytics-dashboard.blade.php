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

    <title>Analytics Dashboard</title>
@endsection

<div>
    <header class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
        <div>
            <flux:heading level="2" class="text-2xl! font-semibold!">Google Analytics</flux:heading>
            <flux:subheading>Fetch data from Google Analytics</flux:subheading>
        </div>

        <div class="w-full md:w-64">
            <flux:select wire:model.live="period" label="Periode">
                @foreach ($periodOptions as $value => $label)
                    <flux:select.option value="{{ $value }}">{{ $label }}</flux:select.option>
                @endforeach
            </flux:select>
        </div>
    </header>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{!! session('error') !!}" class="mb-4" />
    @endif

    <main class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Visitors & Page Views -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 dark:border-zinc-700 py-3 px-6">
                <flux:heading size="lg">Visitors & Page Views</flux:heading>
            </div>
            <div class="py-3 px-6">
                @if (count($visitorsAndPageViews))
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Tanggal</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Pengunjung</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Tampilan Halaman</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                                @foreach ($visitorsAndPageViews as $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['date']->format('d M Y') }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['visitors'] }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['pageViews'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-4 text-center text-zinc-500 dark:text-zinc-400">
                        No data available.
                    </div>
                @endif
            </div>
        </div>

        <!-- Top Countries -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 dark:border-zinc-700 py-3 px-6">
                <flux:heading size="lg">Top Countries</flux:heading>
            </div>
            <div class="py-3 px-6">
                @if (count($topCountries))
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Negara</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Tampilan Halaman</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                                @foreach ($topCountries as $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['country'] }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['screenPageViews'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-4 text-center text-zinc-500 dark:text-zinc-400">
                        No data available.
                    </div>
                @endif
            </div>
        </div>

        <!-- Top Operating Systems -->
        <div class="rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 dark:border-zinc-700 py-3 px-6">
                <flux:heading size="lg">Top Operating Systems</flux:heading>
            </div>
            <div class="py-3 px-6">
                @if (count($topOperatingSystems))
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Sistem Operasi</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-zinc-500 dark:text-zinc-400">Tampilan Halaman</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                                @foreach ($topOperatingSystems as $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['operatingSystem'] }}</td>
                                        <td class="whitespace-nowrap px-4 py-3 text-sm">{{ $item['screenPageViews'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-4 text-center text-zinc-500 dark:text-zinc-400">
                        No data available.
                    </div>
                @endif
            </div>
        </div>
    </main>
</div>
