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

    <title>Content Management System</title>
@endsection

<div>
    <header class="mb-6">
        <flux:heading size="xl" level="1">Content Management System</flux:heading>
        <flux:subheading size="lg" class="mb-6">Overview of your content management system</flux:subheading>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- FAQs Stats -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-white">FAQs</h3>
                    <a href="{{ route('cms.faqs') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">Manage</a>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-zinc-100 dark:bg-zinc-700 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-zinc-800 dark:text-white">{{ $stats['faqs']['total'] }}</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Total</span>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['faqs']['active'] }}</span>
                        <span class="text-xs text-green-600 dark:text-green-400">Active</span>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-red-600 dark:text-red-400">{{ $stats['faqs']['inactive'] }}</span>
                        <span class="text-xs text-red-600 dark:text-red-400">Inactive</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Stats -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-white">Services</h3>
                    <a href="{{ route('cms.services') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">Manage</a>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-zinc-100 dark:bg-zinc-700 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-zinc-800 dark:text-white">{{ $stats['services']['total'] }}</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Total</span>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['services']['active'] }}</span>
                        <span class="text-xs text-green-600 dark:text-green-400">Active</span>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-red-600 dark:text-red-400">{{ $stats['services']['inactive'] }}</span>
                        <span class="text-xs text-red-600 dark:text-red-400">Inactive</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members Stats -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-white">Team Members</h3>
                    <a href="{{ route('cms.members') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">Manage</a>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-zinc-100 dark:bg-zinc-700 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-zinc-800 dark:text-white">{{ $stats['members']['total'] }}</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Total</span>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['members']['active'] }}</span>
                        <span class="text-xs text-green-600 dark:text-green-400">Active</span>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-red-600 dark:text-red-400">{{ $stats['members']['inactive'] }}</span>
                        <span class="text-xs text-red-600 dark:text-red-400">Inactive</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pricings Stats -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-white">Pricings</h3>
                    <a href="{{ route('cms.pricings') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">Manage</a>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-zinc-100 dark:bg-zinc-700 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-zinc-800 dark:text-white">{{ $stats['pricings']['total'] }}</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Total</span>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['pricings']['active'] }}</span>
                        <span class="text-xs text-green-600 dark:text-green-400">Active</span>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-red-600 dark:text-red-400">{{ $stats['pricings']['inactive'] }}</span>
                        <span class="text-xs text-red-600 dark:text-red-400">Inactive</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Stats -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-white">Projects</h3>
                    <a href="{{ route('cms.projects') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">Manage</a>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-zinc-100 dark:bg-zinc-700 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-zinc-800 dark:text-white">{{ $stats['projects']['total'] }}</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Total</span>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['projects']['active'] }}</span>
                        <span class="text-xs text-green-600 dark:text-green-400">Active</span>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-red-600 dark:text-red-400">{{ $stats['projects']['inactive'] }}</span>
                        <span class="text-xs text-red-600 dark:text-red-400">Inactive</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Work Processes Stats -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-zinc-200 dark:border-zinc-700 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-white">Work Processes</h3>
                    <a href="{{ route('cms.work-processes') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">Manage</a>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-zinc-100 dark:bg-zinc-700 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-zinc-800 dark:text-white">{{ $stats['work_processes']['total'] }}</span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Total</span>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['work_processes']['active'] }}</span>
                        <span class="text-xs text-green-600 dark:text-green-400">Active</span>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                        <span class="block text-2xl font-bold text-red-600 dark:text-red-400">{{ $stats['work_processes']['inactive'] }}</span>
                        <span class="text-xs text-red-600 dark:text-red-400">Inactive</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
