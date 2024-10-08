@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Recodex">
    <meta name="keywords" content="Multimedia Company">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Recodex">
    <meta property="og:description" content="Multimedia Company">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Recodex">
    <meta property="og:locale" content="en_US">
    <meta property="og:logo" content="{{ asset('images/logo.png') }}" />
    <meta property="og:locale:alternate" content="id_ID">
    <meta property="og:updated_time" content="{{ now()->toIso8601String() }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="alfa5aviation.com">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Recodex">
    <meta name="twitter:description" content="Multimedia Company">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">

    <meta name="DC.title" content="Recodex">
    <meta name="DC.creator" content="Zachran Razendra">
    <meta name="DC.description" content="Multimedia Company">
    <meta name="DC.publisher" content="Recodex">
    <meta name="DC.contributor" content="Zachran Razendra">
    <meta name="DC.date" content="{{ now()->toIso8601String() }}">
    <meta name="DC.type" content="text">
    <meta name="DC.format" content="text/html">
    <meta name="DC.identifier" content="{{ url()->current() }}">
    <meta name="DC.language" content="en">
    <meta name="DC.coverage" content="Worldwide">
    <meta name="DC.rights" content="© Recodex">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Recodex</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="h-[95vh] bg-white-recodex rounded-b-[10rem]">
        <div class="container-main flex items-center justify-center h-full">

            <img class="absolute bottom-[39.5px] h-full z-10" src="{{ asset('images/orang.png') }}" alt="">
            <div class="absolute bottom-[39.5px] bg-recodex h-[375px] w-[750px] rounded-t-full z-0"></div>

            <div class="grid grid-cols-2 z-10">
                <div class="w-full">
                    <h2>AWOKOAKW</h2>
                </div>
                <div class="w-full">
                    <h2>MOMOK</h2>
                </div>
            </div>

        </div>
    </section>

    <!-- Service Section -->
    <section class="bg-white-recodex py-main mx-8 mt-[100px] rounded-[5rem]">
        <div class="container-main flex flex-col space-y-8 items-center justify-center">
            <!-- Title and Description -->
            <div class="flex items-center justify-between">
                <h2 class="text-4xl font-bold text-white-recodex bg-recodex px-4 py-1">
                    Layanan Kami
                </h2>
                <p class="text-lg text-black-recodex w-1/2 text-justify">
                    Kami siap menjadi partner terpercaya dalam mewujudkan transformasi digital bisnis Anda. Dengan solusi
                    yang inovatif, tim kami berkomitmen untuk menghadirkan layanan digital terbaik yang disesuaikan dengan
                    kebutuhan bisnis Anda.
                </p>
            </div>

            <div class="border-2 border-recodex h-1 w-full"></div>

            <!-- Service Cards -->
            <div id="serviceCards" class="flex flex-row gap-8 overflow-x-auto w-full">
                <!-- Card 1: Pembuatan Website -->
                <a href=""
                    class="flex flex-col justify-between h-[500px] min-w-[384px] p-8 bg-black-recodex border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="text-white fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-3 font-normal text-recodex">
                        Bangun kehadiran digital yang mengesankan dengan desain website profesional yang user-friendly dan
                        fungsional.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/about-home.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <!-- Add more cards here -->
                <a href=""
                    class="flex flex-col justify-between h-[500px] min-w-[384px] p-8 bg-black-recodex border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="text-white fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-3 font-normal text-recodex">
                        Bangun kehadiran digital yang mengesankan dengan desain website profesional yang user-friendly dan
                        fungsional.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/about-home.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href=""
                    class="flex flex-col justify-between h-[500px] min-w-[384px] p-8 bg-black-recodex border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="text-white fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-3 font-normal text-recodex">
                        Bangun kehadiran digital yang mengesankan dengan desain website profesional yang user-friendly dan
                        fungsional.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/about-home.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href=""
                    class="flex flex-col justify-between h-[500px] min-w-[384px] p-8 bg-black-recodex border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="text-white fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-3 font-normal text-recodex">
                        Bangun kehadiran digital yang mengesankan dengan desain website profesional yang user-friendly dan
                        fungsional.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/about-home.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href=""
                    class="flex flex-col justify-between h-[500px] min-w-[384px] p-8 bg-black-recodex border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="text-white fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-3 font-normal text-recodex">
                        Bangun kehadiran digital yang mengesankan dengan desain website profesional yang user-friendly dan
                        fungsional.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/about-home.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href=""
                    class="flex flex-col justify-between h-[500px] min-w-[384px] p-8 bg-black-recodex border border-gray-200 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="text-white fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="mb-3 font-normal text-recodex">
                        Bangun kehadiran digital yang mengesankan dengan desain website profesional yang user-friendly dan
                        fungsional.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/about-home.jpg') }}"
                        alt="Pembuatan Website">
                </a>
            </div>

            <!-- Arrow Service Cards -->
            <div class="flex flex-row justify-between w-full mt-4">
                <div class="w-1/2">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi excepturi ad, id repudiandae animi
                        perferendis magni facere unde esse, suscipit amet facilis dolorum fugiat alias dolor nisi hic labore
                        tempore!</p>
                </div>
                <div class="flex flex-row gap-10">
                    <button id="prevButton" class="h-14 w-14 border border-recodex text-recodex">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button id="nextButton" class="h-14 w-14 border border-recodex text-recodex">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="border-2 border-recodex h-1 w-full"></div>

            <div class="grid grid-cols-2 items-center gap-8">
                <!-- Kolom Kiri -->
                <h4 class="text-6xl font-bold">
                    WE CREATE IMPACTFUL EXPERIENCES FOR OUR CLIENTS' CUSTOMERS EVERY TIME THEY ENGAGE WITH A BRAND
                </h4>

                <!-- Kolom Kanan -->
                <div class="flex flex-col justify-between h-full">
                    <div class="flex flex-col text-end">
                        <p class="flex flex-col text-2xl font-semibold mb-2">
                            <span class="text-recodex text-6xl">127+</span> Project Completed
                        </p>
                        <p class="text-lg text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, maiores voluptas. In
                            consequatur, quas.
                        </p>
                    </div>

                    <div class="border-2 border-recodex h-1 w-full my-4"></div>

                    <div class="flex flex-col">
                        <p class="flex flex-col text-2xl font-semibold mb-2">
                            <span class="text-recodex text-6xl">74+</span> Client Completed
                        </p>
                        <p class="text-lg text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, maiores voluptas. In
                            consequatur, quas.
                        </p>
                    </div>

                    <div class="border-2 border-recodex h-1 w-full my-4"></div>

                    <div class="flex flex-col text-end">
                        <p class="flex flex-col text-2xl font-semibold mb-2">
                            <span class="text-recodex text-6xl">127+</span> Project Completed
                        </p>
                        <p class="text-lg text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, maiores voluptas. In
                            consequatur, quas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-main">
        <div class="container-main flex flex-col items-center justify-center gap-8">
            <div class="grid grid-cols-2 gap-8">
                <!-- Left Content -->
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/about-home.jpg') }}" alt="About Image" class="w-full h-auto rounded-lg">
                </div>

                <!-- Right Content -->
                <div class="flex flex-col justify-center space-y-4">
                    <h3 class="text-white-recodex text-xl font-semibold">Tentang Kami</h3>
                    <h2 class="text-recodex text-6xl font-bold">Mitra Anda Dalam Inovasi Digital</h2>
                    <p class="text-white-recodex text-justify">
                        Recodex.id lahir dari semangat untuk menggabungkan seni dan teknologi. Kami adalah tim kreatif yang
                        berdedikasi memberikan solusi multimedia terdepan, mulai dari desain website, UI/UX, fotografi,
                        videografi, hingga pengembangan game dan aplikasi. Dengan pengalaman dan passion kami, kami membawa
                        ide-ide besar Anda menjadi kenyataan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Porto Section -->
    <section class="bg-white-recodex py-main mx-8 rounded-t-[5rem]">
        <div class="container-main flex flex-col space-y-8 items-center justify-center">
            <h2 class="text-black-recodex text-4xl font-bold text-center">
                Karya Terbaik <span class="text-white-recodex bg-recodex px-2">Portofolio</span> Kami
            </h2>

            <div class="border-2 border-recodex h-1 w-full"></div>

            <!-- Pembuatan Website -->
            <div class="w-full">
                <h3 class="text-2xl font-semibold mb-4">Pembuatan Website</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <a href="https://alfa5aviation.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/alfa5.png') }}" alt="Alfa 5 Aviation">
                    </a>
                    <a href="https://privatejetcharter.id/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/pjci.png') }}" alt="Private Jet Charter">
                    </a>
                    <a href="https://sagalapro.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/sagala.png') }}" alt="Sagala Pro">
                    </a>
                    <a href="https://berlianflightsupport.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/bgs.png') }}" alt="Berlian Flight Support">
                    </a>
                    <a href="https://desamarongge.id/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/marongge.png') }}" alt="Desa Marongge">
                    </a>
                    <a href="https://www.pt-narazelberkahselamat.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/narazel.png') }}" alt="Narazel Berkah Selamat">
                    </a>
                </div>
                <a href="#"
                    class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-recodex rounded-lg focus:ring-4 focus:outline-none">
                    Lainnya
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <div class="border-2 border-recodex h-1 w-full"></div>

            <!-- Desain UI/UX -->
            <div class="w-full">
                <h3 class="text-2xl font-semibold mb-4">Desain UI/UX</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <a href="https://alfa5aviation.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/alfa5.png') }}" alt="Alfa 5 Aviation">
                    </a>
                    <a href="https://privatejetcharter.id/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/pjci.png') }}" alt="Private Jet Charter">
                    </a>
                    <a href="https://sagalapro.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/sagala.png') }}" alt="Sagala Pro">
                    </a>
                    <a href="https://berlianflightsupport.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/bgs.png') }}" alt="Berlian Flight Support">
                    </a>
                    <a href="https://desamarongge.id/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/marongge.png') }}" alt="Desa Marongge">
                    </a>
                    <a href="https://www.pt-narazelberkahselamat.com/">
                        <img class="rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl"
                            src="{{ asset('images/porto/narazel.png') }}" alt="Narazel Berkah Selamat">
                    </a>
                </div>
                <a href="#"
                    class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-recodex rounded-lg focus:ring-4 focus:outline-none">
                    Lainnya
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    @stack('before-scripts')

    <script>
        // Select the container and buttons
        const serviceCards = document.getElementById('serviceCards');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        // Define the scroll amount
        const scrollAmount = 416;

        // Add event listener for the next button
        nextButton.addEventListener('click', () => {
            serviceCards.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        // Add event listener for the prev button
        prevButton.addEventListener('click', () => {
            serviceCards.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
    </script>

    @stack('after-scripts')
@endsection
