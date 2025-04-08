@section('meta_tag')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Pelajari lebih lanjut tentang Recodex ID - Perusahaan jasa pembuatan website profesional dengan visi dan misi yang jelas untuk membantu digitalisasi bisnis Anda.">
    <meta name="keywords" content="tentang recodex, profil perusahaan, visi misi, jasa pembuatan website, web developer profesional, digitalisasi bisnis">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Tentang Recodex ID - Jasa Pembuatan Website Profesional">
    <meta property="og:description" content="Pelajari lebih lanjut tentang Recodex ID - Perusahaan jasa pembuatan website profesional yang berkomitmen untuk membantu digitalisasi bisnis Anda.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tentang Recodex ID - Jasa Pembuatan Website Profesional">
    <meta name="twitter:description" content="Pelajari lebih lanjut tentang Recodex ID - Perusahaan jasa pembuatan website profesional yang berkomitmen untuk membantu digitalisasi bisnis Anda.">
    <meta name="twitter:image" content="{{ asset('images/hero.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>About Us - Jasa Pembuatan Website Recodex ID</title>
@endsection

<x-layouts.main>

    <!-- ...::: Breadcrumb Section Start :::... -->
    <section class="section-breadcrumb">
        <!-- Breadcrumb Background -->
        <div class="bg-black">
            <!-- Breadcrumb Space -->
            <div class="breadcrumb-space">
                <!-- Section Container -->
                <div class="container">
                    <div class="breadcrumb-block">
                        <h1>Tentang Kami</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li>Tentang Kami</li>
                        </ul>
                        <!-- Breadcrumb Nav -->
                    </div>
                </div>
                <!-- Section Container -->
            </div>
            <!-- Breadcrumb Space -->
        </div>
        <!-- Breadcrumb Background -->
    </section>
    <!-- ...::: Breadcrumb Section End :::... -->

    <!-- ...::: About Section Start :::... -->
    <x-about-section :counters="$counters" />
    <!-- ...::: About Section End :::... -->

    <!-- ...::: About Gallery Section Start :::... -->
    <section class="section-about-gallery">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mb-10 md:mb-[60px] xl:mb-20">
                    <h2 class="jos mx-auto max-w-[966px] text-center">
                        {{ $about->title }}
                    </h2>
                    <div class="mx-auto mt-6 max-w-[813px] text-center">
                        <p class="jos section-para">
                            {{ $about->description }}
                        </p>
                    </div>
                </div>
                <!-- Section Block -->

                <div class="mt-10 grid grid-cols-1 gap-x-5 gap-y-10 lg:grid-cols-2">
                    <div class="rich-text">
                        <h4 class="mb-4">Visi</h4>
                        <p>
                            {{ $about->vision }}
                        </p>
                    </div>
                    <div class="rich-text">
                        <h4 class="mb-4">Misi</h4>
                        <ul>
                            @foreach ($about->mission as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: About Gallery Section End :::... -->

    <!-- ...::: Text Slider Section Start :::... -->
    <x-text-slider />
    <!-- ...::: Text Slider Section End :::... -->
</x-layouts.main>
