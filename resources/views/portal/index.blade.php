<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portal {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Portal {{ config('app.name') }}
                    </h2>
                    <div class="space-x-4">
                        <a href="{{ route('portal.login') }}" class="text-sm text-gray-700 hover:text-gray-900">Login</a>
                        <a href="{{ route('portal.register') }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Register</a>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="text-3xl font-bold mb-6">Selamat Datang di Portal {{ config('app.name') }}</h1>

                            <p class="mb-4">Portal ini menyediakan akses ke berbagai layanan dan informasi penting untuk klien kami.</p>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                    <h3 class="text-xl font-semibold mb-3">Akses Cepat</h3>
                                    <p>Dapatkan akses cepat ke semua layanan dan fitur yang Anda butuhkan.</p>
                                </div>

                                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                    <h3 class="text-xl font-semibold mb-3">Manajemen Proyek</h3>
                                    <p>Pantau dan kelola semua proyek Anda dalam satu tempat.</p>
                                </div>

                                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                    <h3 class="text-xl font-semibold mb-3">Dukungan Pelanggan</h3>
                                    <p>Dapatkan bantuan dan dukungan dari tim kami kapan saja.</p>
                                </div>
                            </div>

                            <div class="mt-10">
                                <a href="{{ route('portal.register') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg font-medium">Mulai Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white shadow mt-auto py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Hak Cipta Dilindungi.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
