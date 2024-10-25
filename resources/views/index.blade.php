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
    <meta property="twitter:domain" content="recodex.id">
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
    <section class="h-screen pt-[100px]">
        <div class="container-main flex items-center justify-center h-full">
            <div class="grid grid-cols-2 items-center">
                <div class="flex flex-col space-y-2">
                    <span class="text-xl font-semibold">Jasa Multimedia Terbaik</span>
                    <h2 class="text-7xl font-bold leading-tight uppercase">Solusi <span
                            class="text-recodex underline">Multimedia</span> untuk Inovasi Tanpa Batas</h2>
                    <a class="border border-recodex px-4 py-1 text-recodex rounded-lg text-lg w-[200px] text-center"
                        href="#">
                        Tentang Kami
                    </a>
                </div>
                <img src="{{ asset('images/illustration.png') }}" alt="" class="h-full w-auto">
            </div>
        </div>
    </section>

    <!-- Point Section -->
    <div class="container-main">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-recodex">

            <!-- Harga Terjangkau -->
            <div
                class="bg-white-recodex h-auto rounded-lg flex flex-col justify-center items-center text-center p-8 space-y-4">
                <i class="text-6xl fa-solid fa-coins"></i>
                <h3 class="text-2xl font-semibold">Harga Terjangkau</h3>
                <p class="text-lg text-shark-500">
                    Kami menawarkan layanan berkualitas tinggi dengan harga yang sangat terjangkau.
                </p>
            </div>

            <!-- Proses Cepat -->
            <div
                class="bg-white-recodex h-auto rounded-lg flex flex-col justify-center items-center text-center p-8 space-y-4">
                <i class="text-6xl fa-solid fa-gauge-high"></i>
                <h3 class="text-2xl font-semibold">Proses Cepat</h3>
                <p class="text-lg text-shark-500">
                    Proses pengerjaan yang efisien, menjamin proyek selesai tepat waktu.
                </p>
            </div>

            <!-- Tim Profesional -->
            <div
                class="bg-white-recodex h-auto rounded-lg flex flex-col justify-center items-center text-center p-8 space-y-4">
                <i class="text-6xl fa-solid fa-people-group"></i>
                <h3 class="text-2xl font-semibold">Tim Profesional</h3>
                <p class="text-lg text-shark-500">
                    Tim profesional kami memiliki pengalaman luas dalam berbagai bidang multimedia.
                </p>
            </div>

        </div>
    </div>

    <!-- Service Section -->
    <section class="py-main">
        <div class="container-main flex flex-col space-y-8 items-center justify-center">
            <!-- Title -->
            <div class="flex self-start">
                <h2 class="text-4xl font-bold bg-recodex px-4 py-1">
                    LAYANAN KAMI
                </h2>
            </div>

            <!-- Service Cards -->
            <div id="serviceCards" class="flex gap-8 overflow-x-auto w-full">
                <!-- Card 1: Pembuatan Website -->
                <a href="#"
                    class="flex flex-col space-y-4 justify-between h-auto min-w-[426.67px] p-8 bg-shark-900 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Website
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-lg">
                        Pembuatan website responsif dan modern, disesuaikan dengan kebutuhan bisnis Anda.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/service/web.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href="#"
                    class="flex flex-col space-y-4 justify-between h-auto min-w-[426.67px] p-8 bg-shark-900 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="text-4xl font-bold tracking-tight text-recodex">
                            Desain<br>Grafis
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-lg">
                        Desain elemen visual untuk menciptakan branding yang kuat dan menarik.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/service/graphic.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href="#"
                    class="flex flex-col space-y-4 justify-between h-auto min-w-[426.67px] p-8 bg-shark-900 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Desain<br>UI/UX
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-lg">
                        Antarmuka pengguna dan pengalaman pengguna yang intuitif dan menarik untuk digunakan.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/service/ui_ux.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href="#"
                    class="flex flex-col space-y-4 justify-between h-auto min-w-[426.67px] p-8 bg-shark-900 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pengembangan<br>Game
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-lg">
                        Pengembangan game interaktif dengan grafis memukau dan gameplay yang sangat seru.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/service/game.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href="#"
                    class="flex flex-col space-y-4 justify-between h-auto min-w-[426.67px] p-8 bg-shark-900 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Pembuatan<br>Aplikasi
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-lg">
                        Aplikasi mobile dan desktop yang inovatif serta fungsional untuk kebutuhan Anda.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/service/app.jpg') }}"
                        alt="Pembuatan Website">
                </a>

                <a href="#"
                    class="flex flex-col space-y-4 justify-between h-auto min-w-[426.67px] p-8 bg-shark-900 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-recodex">
                            Fotografi &<br>Videografi
                        </h5>
                        <div class="h-12 w-12 p-2 rounded-full bg-recodex text-center flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-lg">
                        Fotografi dan videografi berkualitas tinggi untuk berbagai acara dan kebutuhan bisnis.
                    </p>
                    <img class="rounded-lg object-cover w-full h-[200px]" src="{{ asset('images/service/photo.jpg') }}"
                        alt="Pembuatan Website">
                </a>
            </div>

            <!-- Arrow Service Cards -->
            <div class="flex items-center justify-between w-full mt-4">
                <div class="w-1/2">
                    <p>
                        Di Recodex, berbagai layanan multimedia profesional ditawarkan untuk memenuhi kebutuhan bisnis dan
                        kreatif Anda, memastikan solusi inovatif dan berkualitas tinggi.
                    </p>
                </div>
                <div class="flex gap-10">
                    <button id="prevButton" class="h-14 w-14 border border-recodex text-recodex rounded-lg">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button id="nextButton" class="h-14 w-14 border border-recodex text-recodex rounded-lg">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="border-2 border-recodex h-1 w-full"></div>

            <div class="grid grid-cols-2 items-center gap-20">
                <!-- Kolom Kiri -->
                <h4 class="text-6xl uppercase font-bold">
                    Fokus Kami Adalah Menghasilkan Karya <span class="text-recodex underline">Berkualitas</span> Tinggi
                    yang Mendorong <span class="text-recodex underline">Pertumbuhan</span> dan Kesuksesan Bisnis
                    Klien
                </h4>

                <!-- Kolom Kanan -->
                <div class="flex flex-col justify-between h-full">
                    <div class="flex flex-col text-end">
                        <p class="flex flex-col text-2xl font-semibold mb-2">
                            <span class="text-recodex text-6xl">127+</span> Proyek Selesai
                        </p>
                        <p class="text-lg text-shark-200">
                            Setiap proyek yang kami kerjakan selesai tepat waktu dan sesuai spesifikasi yang ditentukan.
                        </p>
                    </div>

                    <div class="border-2 border-recodex h-1 w-full my-4"></div>

                    <div class="flex flex-col">
                        <p class="flex flex-col text-2xl font-semibold mb-2">
                            <span class="text-recodex text-6xl">74+</span> Klien Puas
                        </p>
                        <p class="text-lg text-shark-200">
                            Kepuasan klien adalah prioritas utama kami, dan kami berusaha memenuhi harapan mereka.
                        </p>
                    </div>

                    <div class="border-2 border-recodex h-1 w-full my-4"></div>

                    <div class="flex flex-col text-end">
                        <p class="flex flex-col text-2xl font-semibold mb-2">
                            <span class="text-recodex text-6xl">127+</span> Pengalaman
                        </p>
                        <p class="text-lg text-shark-200">
                            Dengan pengalaman bertahun-tahun, kami memahami kebutuhan klien dan memberikan solusi yang
                            tepat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-main">
        <div class="container-main flex flex-col items-center justify-center gap-8">
            <div class="grid grid-cols-2 gap-20">
                <!-- Left Content -->
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/about-home.jpg') }}" alt="About Image" class="w-full h-auto rounded-lg">
                </div>

                <!-- Right Content -->
                <div class="flex flex-col justify-center space-y-4">
                    <h3 class="text-xl font-semibold bg-recodex px-4 py-1 w-fit">TENTANG KAMI</h3>
                    <h2 class="text-6xl font-bold leading-tight uppercase">
                        Mitra Anda Dalam <span class="text-recodex underline">Inovasi</span> Digital
                    </h2>
                    <p class="text-md text-justify">
                        Recodex adalah perusahaan jasa multimedia yang berdedikasi untuk memberikan solusi inovatif di era
                        digital. Dengan pengalaman dan keahlian di berbagai bidang, kami siap membantu klien mencapai tujuan
                        bisnis mereka melalui pembuatan website, desain grafis, aplikasi mobile, dan banyak lagi. Kami
                        percaya bahwa setiap proyek adalah kesempatan untuk menciptakan dampak positif dan meningkatkan
                        pengalaman pengguna.
                    </p>
                    <p class="text-md text-justify">
                        Tim profesional kami bekerja sama dengan klien untuk memahami kebutuhan unik mereka dan menghadirkan
                        hasil yang memuaskan. Di Recodex, kami berkomitmen untuk selalu berinovasi, sehingga klien kami
                        tetap kompetitif di pasar yang terus berkembang. Mari bersama-sama menciptakan masa depan digital
                        yang lebih baik!
                    </p>
                    <!-- Call to Action Button -->
                    <div>
                        <a href="#services"
                            class="inline-block border text-recodex border-recodex px-6 py-3 rounded-lg font-semibold">
                            Lihat Layanan Kami
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="py-main">
        <div class="container-main flex flex-col space-y-8 items-center justify-center">
            <!-- Title -->
            <div class="flex self-start">
                <h2 class="text-4xl font-bold bg-recodex px-4 py-1">
                    PORTFOLIO
                </h2>
            </div>

            <!-- Portfolio Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full">
                <!-- Card 1 -->
                <div class="relative group h-80 rounded-lg overflow-hidden bg-gray-200">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        style="background-image: url('{{ asset('images/service/web.jpg') }}');"></div>
                    <a href=""
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="text-center">
                            <h3 class="text-4xl font-semibold">Pembuatan Website</h3>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="relative group h-80 rounded-lg overflow-hidden bg-gray-200">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        style="background-image: url('{{ asset('images/service/graphic.jpg') }}');"></div>
                    <a href=""
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="text-center">
                            <h3 class="text-4xl font-semibold">Desain Grafis</h3>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="relative group h-80 rounded-lg overflow-hidden bg-gray-200">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        style="background-image: url('{{ asset('images/service/ui_ux.jpg') }}');"></div>
                    <a href=""
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="text-center">
                            <h3 class="text-4xl font-semibold">Desain UI/UX</h3>
                        </div>
                    </a>
                </div>

                <div class="relative group h-80 rounded-lg overflow-hidden bg-gray-200">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        style="background-image: url('{{ asset('images/service/game.jpg') }}');"></div>
                    <a href="{{ route('about') }}"
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="text-center">
                            <h3 class="text-4xl font-semibold">Pengembangan Game</h3>
                        </div>
                    </a>
                </div>

                <div class="relative group h-80 rounded-lg overflow-hidden bg-gray-200">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        style="background-image: url('{{ asset('images/service/app.jpg') }}');"></div>
                    <a href=""
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="text-center">
                            <h3 class="text-4xl font-semibold">Pembuatan Aplikasi</h3>
                        </div>
                    </a>
                </div>

                <div class="relative group h-80 rounded-lg overflow-hidden bg-gray-200">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        style="background-image: url('{{ asset('images/service/photo.jpg') }}');"></div>
                    <a href=""
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="text-center">
                            <h3 class="text-4xl font-semibold">Fotografi & Videografi</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-main">
        <div class="container-main">

            <!-- Grid for Contact Form and Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-20">

                <!-- Contact Information -->
                <div class="flex flex-col justify-center text-white-recodex p-8">
                    <h3 class="text-2xl font-semibold text-recodex mb-4">Hubungi Kami</h3>
                    <p class="mb-8">Ingin tahu lebih lanjut tentang layanan kami? Jangan ragu untuk
                        menghubungi tim Recodex. Kami siap membantu mewujudkan ide dan kebutuhan digital Anda!</p>

                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fa-solid fa-phone text-recodex text-xl mr-4"></i>
                            <span class="text-lg">+62 822 9814 1490</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-envelope text-recodex text-xl mr-4"></i>
                            <span class="text-lg">info@recodex.id</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-location-dot text-recodex text-xl mr-4"></i>
                            <span class="text-lg">Jakarta Selatan, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-clock text-recodex text-xl mr-4"></i>
                            <span class="text-lg">Senin - Jum'at, 09.00 - 17.00</span>
                        </li>
                    </ul>
                </div>

                <!-- Contact Form -->
                <div class="p-8 text-black-recodex rounded-lg shadow-lg bg-cover bg-center"
                    style="background-image: url({{ asset('images/bg-joss.png') }})">
                    <form action="#" method="POST">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <input type="text" id="name" name="name"
                                    class="w-full p-4 border border-gray-300 rounded-lg" placeholder="Nama Lengkap"
                                    required>
                            </div>
                            <div>
                                <input type="email" id="email" name="email"
                                    class="w-full p-4 border border-gray-300 rounded-lg" placeholder="Alamat Email"
                                    required>
                            </div>
                            <div>
                                <textarea id="message" name="message" rows="6" class="w-full p-4 border border-gray-300 rounded-lg"
                                    placeholder="Tulis pesan anda" required></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full py-3 shadow text-recodex border border-recodex  font-bold rounded-lg bg-black-recodex">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>

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
        const scrollAmount = 458.67;

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
