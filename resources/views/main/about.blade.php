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

    @if(false)
        <!-- ...::: About Section Start :::... -->
        <section class="section-about">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container">
                    <!-- Section Block -->
                    <div class="section-block mb-10 md:mb-[60px] xl:mb-20">
                        <div class="grid items-center gap-x-6 gap-y-10 text-center lg:grid-cols-[1fr_minmax(0,0.55fr)] lg:text-start xl:gap-x-[134px]">
                            <h2 class="jos">
                                Buat Bisnis Anda
                                <span>
                                <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
                                Makin Menarik!
                            </h2>
                            <p class="jos section-para">
                                Kami berkolaborasi penuh dengan Anda untuk memahami tujuan bisnis, audiens target, dan kebutuhan unik—lalu menciptakan website yang tidak hanya menarik, tapi juga mendongkrak performa bisnis.
                            </p>
                        </div>
                    </div>
                    <!-- Section Block -->

                    <!-- About Area -->
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 md:grid-cols-2 lg:grid-cols-[0.8fr_0.4fr]">
                        <!-- About Left Block - Video -->
                        <div class="jos relative flex items-center justify-center overflow-hidden rounded-[25px] border-[5px] border-black">
                            <img src="{{ asset('assets/img/images/th-1/about-img.jpg') }}" alt="about-img" width="846" height="476" loading="lazy" class="h-full w-full object-cover" />

                            <div class="absolute inline-block">
                                <a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=3nQNiWdeH2Q" class="btn-primary relative pr-16" aria-label="video-play">
                                    Play
                                    <span class="rounded-[50% absolute right-[0px] inline-flex items-center justify-center">
                                    <img src="{{ asset('assets/img/icons/icon-buttery-white-black-play.svg') }}" alt="icon-buttery-white-black-play" width="50" height="50" />
                                </span>
                                </a>
                            </div>
                        </div>
                        <!-- About Left Block - Video -->

                        <!-- About Right Block - Counter Up -->
                        <div class="jos rounded-[25px] bg-black p-[30px]">
                            <ul class="divide-y divide-[#333333]">
                                <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                    <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]" data-module="countup">
                                        <span class="start-number" data-countup-number="15">15</span>+
                                    </div>
                                    <span class="mt-2 inline-block text-colorButteryWhite">Years of experience</span>
                                </li>
                                <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                    <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]" data-module="countup">
                                        <span class="start-number" data-countup-number="120">120</span>k
                                    </div>
                                    <span class="mt-2 inline-block text-colorButteryWhite">Successful projects</span>
                                </li>
                                <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                    <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]" data-module="countup">
                                        <span class="start-number" data-countup-number="100">100</span>%
                                    </div>
                                    <span class="mt-2 inline-block text-colorButteryWhite">Client satisfaction rate</span>
                                </li>
                            </ul>
                        </div>
                        <!-- About Right Block - Counter Up -->
                    </div>
                    <!-- About Area -->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </section>
        <!-- ...::: About Section End :::... -->
    @endif

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
                        <span>
                            <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                    <div class="mx-auto mt-6 max-w-[813px] text-center">
                        <p class="jos section-para">
                            {{ $about->description }}
                        </p>
                    </div>
                </div>
                <!-- Section Block -->

                @if(false)
                    <!-- About Gallery Image List -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- About Galley Image Item -->
                        <a href="{{ asset('assets/img/images/th-1/about-gallery-img-1.jpg') }}" data-fslightbox="gallery" class="group block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black md:col-span-1 lg:col-span-2">
                            <img src="{{ asset('assets/img/images/th-1/about-gallery-img-1.jpg') }}" alt="about-gallery-img-1" width="846" height="392" class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                        </a>
                        <!-- About Galley Image Item -->
                        <!-- About Galley Image Item -->
                        <a href="{{ asset('assets/img/images/th-1/about-gallery-img-2.jpg') }}" data-fslightbox="gallery" class="group col-span-1 block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black">
                            <img src="{{ asset('assets/img/images/th-1/about-gallery-img-2.jpg') }}" alt="about-gallery-img-2" width="408" height="392" class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                        </a>
                        <!-- About Galley Image Item -->
                        <!-- About Galley Image Item -->
                        <a href="{{ asset('assets/img/images/th-1/about-gallery-img-3.jpg') }}" data-fslightbox="gallery" class="group col-span-1 block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black">
                            <img src="{{ asset('assets/img/images/th-1/about-gallery-img-3.jpg') }}" alt="about-gallery-img-3" width="408" height="392" class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                        </a>
                        <!-- About Galley Image Item -->
                        <!-- About Galley Image Item -->
                        <a href="{{ asset('assets/img/images/th-1/about-gallery-img-4.jpg') }}" data-fslightbox="gallery" class="group block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black md:col-span-1 lg:col-span-2">
                            <img src="{{ asset('assets/img/images/th-1/about-gallery-img-4.jpg') }}" alt="about-gallery-img-4" width="846" height="392" class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                        </a>
                        <!-- About Galley Image Item -->
                    </div>
                    <!-- About Gallery Image List -->
                @endif

                <div class="mt-10 grid grid-cols-1 gap-x-5 gap-y-10 lg:grid-cols-2">
                    <div class="rich-text">
                        <h4 class="mb-4">Visi</h4>
                        <p>
                            {{ $about->vision }}
                        </p>
                    </div>
                    <div class="rich-text">
                        <h4 class="mb-4">Misi</h4>
                        @foreach ($about->mission as $index => $item)
                            <p>{{ $index + 1 }}. {{ $item }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: About Gallery Section End :::... -->

    <!-- ...::: Text Slider Section Start :::... -->
    <x-text-slider :items="[
        ['text' => 'Recodex ID', 'icon' => 'assets/img/elemnts/shape-light-lime-5-arms-star.svg'],
        ['text' => 'We Build Website', 'icon' => 'assets/img/elemnts/shape-light-lime-5-arms-star.svg'],
        ['text' => 'Crafting Digital Experiences', 'icon' => 'assets/img/elemnts/shape-light-lime-5-arms-star.svg'],
        ['text' => 'Recodex ID', 'icon' => 'assets/img/elemnts/shape-light-lime-5-arms-star.svg'],
        ['text' => 'We Build Website', 'icon' => 'assets/img/elemnts/shape-light-lime-5-arms-star.svg'],
        ['text' => 'Crafting Digital Experiences', 'icon' => 'assets/img/elemnts/shape-light-lime-5-arms-star.svg'],
    ]" />
    <!-- ...::: Text Slider Section End :::... -->

    <!-- ...::: Team Section Start :::... -->
    <section class="section-team">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Kami Memiliki Tim yang Profesional
                        <span>
                            <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Team List -->
                <ul class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($members as $member)
                        <!-- Team Item -->
                        <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                            <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                                <img src="{{ $member->photo_path ? Storage::url($member->photo_path) : asset('assets/img/images/th-1/team-img-1.jpg') }}" alt="{{ $member->name }}" width="296" height="300" loading="lazy" class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />

                                <!-- Social Link -->
                                @if (!empty($member->social_links))
                                    <div class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                        @foreach ($member->social_links as $platform => $url)
                                            @php
                                                // Mapping icon file names
                                                $icons = [
                                                    'twitter' => ['buttery' => 'icon-logo-buttery-white-twitter.svg', 'black' => 'icon-logo-black-twitter.svg'],
                                                    'facebook' => ['buttery' => 'icon-logo-buttery-white-facebook.svg', 'black' => 'icon-logo-black-facebook.svg'],
                                                    'instagram' => ['buttery' => 'icon-logo-buttery-white-instagram.svg', 'black' => 'icon-logo-black-instagram.svg'],
                                                    'linkedin' => ['buttery' => 'icon-logo-buttery-white-linkedin.svg', 'black' => 'icon-logo-black-linkedin.svg'],
                                                ];
                                            @endphp

                                            @if (isset($icons[$platform]))
                                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                                    <img src="{{ asset('assets/img/icons/' . $icons[$platform]['buttery']) }}" alt="icon-{{ $platform }}-buttery" width="19" height="19" class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                                    <img src="{{ asset('assets/img/icons/' . $icons[$platform]['black']) }}" alt="icon-{{ $platform }}-black" width="19" height="19" class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Social Link -->
                            </div>

                            <div class="mt-5 text-center">
                                <a href="#" class="display-heading display-heading-4 mb-4 block">{{ $member->name }}</a>
                                <span class="text-lg md:text-[21px]">{{ $member->position }}</span>
                            </div>
                        </li>
                        <!-- Team Item -->
                    @endforeach
                </ul>
                <!-- Team List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Team Section End :::... -->
</x-layouts.main>
