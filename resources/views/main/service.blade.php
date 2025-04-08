@section('meta_tag')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Layanan jasa pembuatan website profesional dari Recodex ID. Kami menawarkan solusi web development lengkap mulai dari website company profile, toko online, hingga sistem informasi custom.">
    <meta name="keywords" content="jasa pembuatan website, web development, website company profile, website toko online, sistem informasi, website custom, web developer profesional">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Layanan - Jasa Pembuatan Website Profesional | Recodex ID">
    <meta property="og:description" content="Layanan jasa pembuatan website profesional dari Recodex ID. Solusi web development lengkap untuk kebutuhan bisnis Anda.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Layanan - Jasa Pembuatan Website Profesional | Recodex ID">
    <meta name="twitter:description" content="Layanan jasa pembuatan website profesional dari Recodex ID. Solusi web development lengkap untuk kebutuhan bisnis Anda.">
    <meta name="twitter:image" content="{{ asset('images/hero.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Layanan - Jasa Pembuatan Website Recodex ID</title>
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
    <x-service-section :services="$services" />
    <!-- ...::: Service Section end :::... -->

    <!-- ...::: Text Slider Section Start :::... -->
    <x-text-slider />
    <!-- ...::: Text Slider Section End :::... -->

    <!-- ...::: Process Section Start :::... -->
    <x-process-section :workProcesses="$workProcesses" />
    <!-- ...::: Process Section End :::... -->

    <!-- ...::: FAQ Section Start :::... -->
    <section class="section-faq">
        <!-- Section Space -->
        <div class="section-space-bottom">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        These FAQs help clients learn about us
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- FAQ Area -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-2">
                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        @forelse ($faqs->take(3) as $faq)
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
                        @empty
                            <!-- FAQ Item -->
                            <li class="jos flex flex-col gap-y-4">
                                <!-- FAQ Header Block -->
                                <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                    No FAQ Available
                                </h4>
                                <!-- FAQ Header Block -->
                                <!-- FAQ Body -->
                                <div class="ml-10 text-[#0C0C0C]">
                                    <p>
                                        Currently, there are no FAQs available.
                                    </p>
                                </div>
                                <!-- FAQ Body -->
                            </li>
                            <!-- FAQ Item -->
                        @endforelse
                    </ul>
                    <!-- FAQ List -->

                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        @forelse ($faqs->skip(3)->take(3) as $faq)
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
                        @empty
                            <!-- No empty state needed for the second column -->
                        @endforelse
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
