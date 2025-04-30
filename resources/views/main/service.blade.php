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
                        <h1>Layanan</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li>Layanan</li>
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

    <!-- ...::: Service Section Start :::... -->
    <section class="section-service">
        <!-- Section Background -->
        <div class="bg-colorIvory">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container">
                    <!-- Section Block -->
                    <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                        <h2 class="jos">
                            Layanan Profesional Jasa Pembuatan Website
                            <span>
                                <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px] animate-spin animate-infinite" />
                            </span>
                        </h2>
                    </div>
                    <!-- Section Block -->

                    <!-- Service List -->
                    <ul class="grid grid-cols-1 gap-[30px] lg:grid-cols-2">
                        @forelse($services as $index => $service)
                            <!-- Service Item -->
                            <li class="{{ $index === 0 ? 'jos group/team-item' : 'jos' }}" data-jos_delay="{{ number_format($index * 0.3, 1) }}">
                                <div class="shadow-bg group h-full">
                                    <div class="flex h-full flex-col items-start overflow-hidden rounded-[20px] border-2 border-black bg-colorIvory p-[30px] transition duration-300 group-hover:bg-colorLightLime">
                                        <flux:icon name="{{ $service->icon }}" width="64" height="70" class="h-[70px]! w-auto!" />
                                        <h4 class="mb-[15px] mt-[30px]">{{ $service->title }}</h4>
                                        <p class="mb-7">
                                            {{ $service->description }}
                                        </p>
                                        <a href="{{ route('services.show', $service->slug) }}" class="mt-auto inline-block translate-x-0 transition-all duration-300 group-hover:translate-x-5">
                                            <img src="{{ asset('assets/img/icons/icon-black-arrow-right.svg') }}" alt="icon-black-arrow-right" width="34" height="28" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="col-span-2 text-center py-10">
                                <p>No services available at the moment.</p>
                            </li>
                        @endforelse
                    </ul>
                    <!-- Service List -->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </div>
        <!-- Section Background -->
    </section>
    <!-- ...::: Service Section end :::... -->

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

    <!-- ...::: Process Section Start :::... -->
    <section class="section-process">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Process Area -->
                <div class="grid grid-cols-1 items-center gap-y-10 lg:grid-cols-2 lg:gap-x-8 xl:grid-cols-[1fr_minmax(0,0.67fr)] xxl:gap-x-[72px]">
                    <!-- Process Area Left Block - Section Block -->
                    <div class="section-block text-center lg:text-start">
                        <h2 class="jos">
                            Proses Kerja Unggulan Kami
                            <span>
                                <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
                        </h2>
                        <div class="jos mt-6">
                            <p class="section-para">
                                Kami fokus pada komunikasi efektif dan kolaborasi intensif dengan klien di setiap tahap, memastikan hasil akhir tidak hanya memenuhi, tetapi melampaui tujuan dan ekspektasi bisnis Anda.
                            </p>

                            <p class="section-para">
                                Proses ini dapat disesuaikan dengan kompleksitas proyek, karena kami memahami setiap kebutuhan bisnis bersifat unik.
                            </p>
                        </div>
                    </div>
                    <!-- Process Area Left Block - Section Block -->

                    <!-- Process Area Right Block - Accordion -->
                    <!-- Accordion List -->
                    <ul class="jos flex flex-col gap-y-6">
                        @forelse($works as $index => $work)
                            <!-- Accordion Item -->
                            <li class="{{ $index === 0 ? 'accordion-item-style-1 accordion-item active' : 'accordion-item-style-1 accordion-item' }}">
                                <!-- Accordion Header -->
                                <div class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                    <button class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                        {{ $index + 1 }}/ {{ $work->title }}
                                    </button>
                                    <div class="accordion-icon">
                                        <img src="{{ asset('assets/img/icons/icon-black-arrow-less-down.svg') }}" alt="icon-black-arrow-less-down" />
                                    </div>
                                </div>
                                <!-- Accordion Header -->
                                <!-- Accordion Body -->
                                <div class="accordion-body max-w-[826px] opacity-80">
                                    <p class="pt-5">
                                        {{ $work->description }}
                                    </p>
                                </div>
                                <!-- Accordion Body -->
                            </li>
                            <!-- Accordion Item -->
                        @empty
                            <!-- Accordion Item -->
                            <li class="accordion-item-style-1 accordion-item active">
                                <!-- Accordion Header -->
                                <div class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                    <button class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                        0/ No Data
                                    </button>
                                    <div class="accordion-icon">
                                        <img src="{{ asset('assets/img/icons/icon-black-arrow-less-down.svg') }}" alt="icon-black-arrow-less-down" />
                                    </div>
                                </div>
                                <!-- Accordion Header -->
                                <!-- Accordion Body -->
                                <div class="accordion-body max-w-[826px] opacity-80">
                                    <p class="pt-5">
                                        No Data
                                    </p>
                                </div>
                                <!-- Accordion Body -->
                            </li>
                            <!-- Accordion Item -->
                        @endforelse
                    </ul>
                    <!-- Accordion List -->
                    <!-- Process Area Right Block - Accordion -->
                </div>
                <!-- Process Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Process Section End :::... -->

    <!-- ...::: FAQ Section Start :::... -->
    <section class="section-faq">
        <!-- Section Space -->
        <div class="section-space-bottom">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Pertanyaan yang Sering Diajukan
                        <span>
                            <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- FAQ Area -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-2">
                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        @foreach($faqs->take(5) as $faq)
                            <!-- FAQ Item -->
                            <li class="jos flex flex-col gap-y-4">
                                <!-- FAQ Header Block -->
                                <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                    {{ $faq->question }}
                                </h4>
                                <!-- FAQ Header Block -->
                                <!-- FAQ Body -->
                                <div class="ml-10 text-[#0C0C0C]">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                                <!-- FAQ Body -->
                            </li>
                            <!-- FAQ Item -->
                        @endforeach
                    </ul>
                    <!-- FAQ List -->

                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        @foreach($faqs->skip(5)->take(5) as $faq)
                            <!-- FAQ Item -->
                            <li class="jos flex flex-col gap-y-4">
                                <!-- FAQ Header Block -->
                                <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                    {{ $faq->question }}
                                </h4>
                                <!-- FAQ Header Block -->
                                <!-- FAQ Body -->
                                <div class="ml-10 text-[#0C0C0C]">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                                <!-- FAQ Body -->
                            </li>
                            <!-- FAQ Item -->
                        @endforeach
                    </ul>
                    <!-- FAQ List -->
                </div>
                <!-- FAQ Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: FAQ Section End :::... -->
</x-layouts.main>
