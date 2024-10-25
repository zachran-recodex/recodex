<!DOCTYPE html>
<html lang="en">

<head>

    @yield('meta_tag')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="512x512"
        href="{{ asset('images/favicon/android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('images/favicon/android-chrome-192x192.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">

    <script src="https://kit.fontawesome.com/ddb90eabf1.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black-recodex">

    <header class="absolute w-full">
        <!-- Topbar -->
        <div class="border-b-2 border-recodex py-5">
            <div class="container-main flex items-center justify-between text-white-recodex">
                <!-- Logo Section -->
                <a href="{{ route('home') }}" class="flex">
                    <h2 class="text-recodex font-bold text-5xl">RECODEX</h2>
                </a>

                <!-- Info Section -->
                <div class="flex items-center space-x-10">
                    <ul class="flex items-center space-x-8">

                        <!-- Time Info -->
                        <li>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-clock text-lg text-recodex"></i>
                                <div class="flex flex-col">
                                    <span class="text-sm text-recodex">Jam Kerja</span>
                                    <h6 class="font-medium">09.00 - 17.00</h6>
                                </div>
                            </div>
                        </li>

                        <li class="border-e-2 h-16"></li>

                        <!-- Location Info -->
                        <li>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-location-dot text-lg text-recodex"></i>
                                <div class="flex flex-col">
                                    <span class="text-sm text-recodex">Lokasi</span>
                                    <h6 class="font-medium">Jakarta Selatan</h6>
                                </div>
                            </div>
                        </li>

                        <li class="border-e-2 h-16"></li>

                        <!-- Phone Info -->
                        <li>
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-phone text-lg text-recodex"></i>
                                <div class="flex flex-col">
                                    <span class="text-sm text-recodex">Hubungi</span>
                                    <h6 class="font-medium">
                                        <a href="tel:+">+62 822 9814 1490</a>
                                    </h6>
                                </div>
                            </div>
                        </li>

                        <li class="border-e-2 h-16"></li>
                    </ul>

                    <!-- User & Menu Icons -->
                    <ul class="flex items-center space-x-4">
                        <li class="w-10 h-10 flex justify-center items-center border rounded-full">
                            <a href="{{ route('login') }}">
                                <i class="fa-solid fa-user text-lg text-recodex"></i>
                            </a>
                        </li>
                        <li class="w-10 h-10 flex justify-center items-center border rounded-full">
                            <button>
                                <i class="fa-solid fa-bars text-lg text-recodex"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="text-white-recodex">
        @yield('content')
    </main>

    <footer class="mt-16 py-main bg-black-recodex border-t-2 border-recodex">
        <div class="container-main mx-auto px-4">
            <div class="flex flex-col lg:flex-row space-y-8 lg:space-y-0 lg:space-x-16">

                <!-- Logo & Description -->
                <div class="lg:w-2/5 space-y-4">
                    <a href="{{ route('home') }}">
                        <h2 class="text-recodex font-bold text-5xl">RECODEX</h2>
                    </a>
                    <p class="text-white-recodex">
                        Di Recodex, kami berkomitmen untuk selalu berinovasi, sehingga klien kami tetap kompetitif di
                        pasar yang terus berkembang.
                    </p>
                </div>

                <!-- Navigation Links -->
                <div class="flex flex-col lg:w-1/5">
                    <h6 class="text-recodex text-lg font-semibold mb-4">Navigasi</h6>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Beranda</a></li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Tentang Kami</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Layanan</a></li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Portfolio</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Useful Links -->
                <div class="flex flex-col lg:w-1/5">
                    <h6 class="text-recodex text-lg font-semibold mb-4">Useful Links</h6>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Privacy
                                Policy</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Terms of
                                Service</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">FAQ</a></li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Support</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Help Center</a>
                        </li>
                    </ul>
                </div>

                <!-- Information Links -->
                <div class="flex flex-col lg:w-1/5">
                    <h6 class="text-recodex text-lg font-semibold mb-4">Informasi</h6>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Company
                                Info</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Careers</a>
                        </li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Press</a></li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">News</a></li>
                        <li><a href="#" class="text-white-recodex hover:text-recodex transition">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bottom Navigation -->
    <nav class="z-50 sticky bottom-2 w-fit bg-white-recodex text-recodex py-4 px-10 rounded-lg mx-auto shadow-lg">
        <ol class="flex gap-16">
            <li>
                <a href="{{ route('home') }}" class="flex flex-col justify-center items-center">
                    <i class="fa-solid fa-house text-xl"></i>
                    <span class="text-sm">BERANDA</span>
                </a>
            </li>
            <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                    class="flex flex-col justify-center items-center">
                    <i class="fa-solid fa-bars text-xl"></i>
                    <span class="text-sm">MENU</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-[500px]">
                    <ul class="flex justify-center items-center py-2 text-sm text-gray-700"
                        aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Layanan</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Portofolio</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="" class="flex flex-col justify-center items-center">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    <span class="text-sm">WHATSAPP</span>
                </a>
            </li>
        </ol>
    </nav>

    @stack('before-scripts')
    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>

    @stack('after-scripts')

</body>

</html>
