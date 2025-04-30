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

    <title>Recodex ID - Jasa Pembuatan Website Profesional | Web Development Indonesia</title>
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
                        <h1>Portfolio</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li>Portfolio</li>
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

    <!-- ...::: Portfolio Section Start :::... -->
    <section class="section-portfolio">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Portfolio Proyek Terbaik Kami
                        <span>
                            <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Portfolio List -->
                <ul class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    @foreach($projects as $project)
                        <!-- Portfolio Item -->
                        <li class="jos">
                            <div class="group relative overflow-hidden rounded-[25px] border-2 border-black lg:border-[5px]">
                                <!-- Thumbnail -->
                                <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }} - {{ $project->client }}" width="626" height="390" class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                                <!-- Thumbnail -->

                                <!-- Content -->
                                <div class="absolute bottom-0 z-10 flex w-full flex-col items-start justify-between gap-x-7 gap-y-8 p-6 transition-all duration-300 sm:flex-row sm:items-center lg:translate-y-full lg:group-hover:translate-y-0">
                                    <div class="max-w-[520px] flex-1 text-colorButteryWhite">
                                        <a href="{{ route('projects.show', [$project->slug, $project->client_slug]) }}" class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] hover:text-colorLightLime md:text-3xl">
                                            {{ $project->title }}
                                        </a>
                                        <p class="line-clamp-2">
                                            {{ $project->client }}
                                        </p>
                                    </div>
                                    <a href="{{ route('projects.show', [$project->slug, $project->client_slug]) }}" class="relative hidden items-start justify-center overflow-hidden sm:inline-flex">
                                        <img src="{{ asset('assets/img/icons/icon-buttery-white-arrow-right.svg') }}" alt="icon-buttery-white-arrow-right" width="34" height="28" class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                        <img src="{{ asset('assets/img/icons/icon-light-lime-arrow-right.svg') }}" alt="light-lime-arrow-right" width="34" height="28" class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                    </a>
                                </div>
                                <!-- Content -->

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black to-black/35 transition-all ease-in-out lg:translate-y-full lg:group-hover:translate-y-0"></div>
                                <!-- Overlay -->
                            </div>
                        </li>
                        <!-- Portfolio Item -->
                    @endforeach
                </ul>
                <!-- Portfolio List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Portfolio Section End :::... -->
</x-layouts.main>
