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

    <header>

    </header>

    <nav class="bg-transparent fixed w-full z-20 top-0 start-0">
        <div class="container-main flex flex-wrap items-center justify-between p-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Logo">
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 md:space-x-8 md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('portfolio') }}" class="block py-2 px-3 text-recodex">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-recodex">Layanan</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-recodex">Portofolio</a>
                    </li>
                </ul>
            </div>

            <button type="button"
                class="text-recodex border border-recodex font-medium rounded-lg px-4 py-2 text-center">
                Contact Us
            </button>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="">
        <div class="container-main">

        </div>
    </footer>

    @stack('before-scripts')
    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>

    @stack('after-scripts')

</body>

</html>
