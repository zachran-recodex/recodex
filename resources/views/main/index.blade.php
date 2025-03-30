@section('meta_tag')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Recodex ID - Jasa Pembuatan Website</title>
@endsection

<x-layouts.main>
    <!-- ...::: Hero Section Start :::... -->
    <section class="section-hero">
        <div class="bg-black">
            <!-- Hero Space -->
            <div class="pb-20 pt-[150px] lg:pb-[100px] lg:pt-[196px] xl:pb-[130px]">
                <!-- Section Container -->
                <div class="container">
                    <!-- Hero Area -->
                    <div
                        class="relative z-10 grid grid-cols-1 items-center justify-center gap-x-[90px] gap-y-16 lg:grid-cols-[1fr_minmax(0,0.6fr)]">
                        <!-- Hero Left Block -->
                        <div class="text-center text-colorButteryWhite lg:text-start">
                            <h1>
                                {{ $hero->title }}
                            </h1>
                            <p class="mb-10 mt-6 text-lg leading-[1.4] md:mb-14 lg:text-[21px]">
                                {{ $hero->subtitle }}
                            </p>

                            <div class="mb-[50px] flex flex-wrap items-center justify-center gap-4 lg:justify-start">
                                <div class="flex -space-x-3">
                                    <img src="{{ asset('img/images/th-1/hero-user-1.png') }}" alt="hero-user-1"
                                        width="60" height="60"
                                        class="z-0 h-[66px] w-[66px] rounded-[50%] border-[6px] border-black" />
                                    <img src="{{ asset('img/images/th-1/hero-user-2.png') }}" alt="hero-user-2"
                                        width="60" height="60"
                                        class="z-[2] h-[66px] w-[66px] rounded-[50%] border-[6px] border-black" />
                                    <img src="{{ asset('img/images/th-1/hero-user-3.png') }}" alt="hero-user-3"
                                        width="60" height="60"
                                        class="z-[3] h-[66px] w-[66px] rounded-[50%] border-[6px] border-black" />
                                </div>
                                <span class="text-base font-semibold">{{ $hero->motto }}</span>
                            </div>

                            <a href="{{ route('contact') }}" class="btn-primary relative pr-20 md:pr-[118px]">
                                {{ $hero->button_text }}
                                <span class="absolute right-[5px] inline-flex h-[50px] w-[50px] items-center justify-center rounded-[50%] bg-black">
                                    <img src="{{ asset('img/icons/icon-buttery-white-phone.svg') }}" alt="icon-buttery-white-phone" width="30" height="30" />
                                </span>
                            </a>
                        </div>
                        <!-- Hero Left Block -->
                        <!-- Hero Right Block -->
                        <div
                            class="mx-auto inline-block max-w-[495px] overflow-hidden rounded-[25px] bg-colorButteryWhite p-[5px] lg:mx-0">
                            <img src="{{ Storage::url($hero->image) }}" alt="hero-img" width="485"
                                height="540" class="h-full w-full rounded-[20px] object-cover" />
                        </div>
                        <!-- Hero Right Block -->

                        <!-- Hero Elements -->
                        <img src="{{ asset('img/elemnts/element-light-lime-curve-arrow.svg') }}"
                            alt="element-light-lime-curve-arrow" width="284" height="153"
                            class="absolute bottom-0 left-1/2 -z-10 hidden h-auto max-w-52 -translate-x-1/2 lg:inline-block xl:max-w-full" />
                        <!-- Hero Elements -->
                    </div>
                    <!-- Hero Area -->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Hero Space -->
        </div>
    </section>
    <!-- ...::: Hero Section End :::... -->

    <!-- ...::: Service Section Start :::... -->
    <section class="section-service">
        <!-- Section Background -->
        <div class="bg-colorIvory">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container">
                    <!-- Section Block -->
                    <div
                        class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                        <h2 class="jos">
                            We provide effective business solutions
                        </h2>
                    </div>
                    <!-- Section Block -->

                    <!-- Service List -->
                    <ul class="grid grid-cols-1 gap-[30px] lg:grid-cols-2">
                        @forelse ($services as $service)
                            <!-- Service Item -->
                            <li class="jos" data-jos_delay="0.9">
                                <div class="shadow-bg group h-full">
                                    <div
                                        class="flex h-full flex-col items-start overflow-hidden rounded-[20px] border-2 border-black bg-colorIvory p-[30px] transition duration-300 group-hover:bg-colorLightLime">
                                        <flux:icon :icon="$service->icon" class="h-[70px] w-auto" />

                                        <h4 class="mb-[15px] mt-[30px]">{{ $service->title }}</h4>
                                        <p class="mb-7">
                                            {{ $service->description }}
                                        </p>
                                        <a href=" class="mt-auto inline-block translate-x-0 transition-all duration-300 group-hover:translate-x-5">
                                            <img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}" alt="icon-black-arrow-right" width="34" height="28" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Service Item -->
                        @empty
                            <!-- Service Item -->
                            <li class="jos" data-jos_delay="0.3">
                                <div class="shadow-bg group h-full">
                                    <div class="flex h-full flex-col items-start overflow-hidden rounded-[20px] border-2 border-black bg-colorIvory p-[30px] transition duration-300 group-hover:bg-colorLightLime">
                                        <img src="{{ asset('img/icons/th-1-service-icon-2.svg') }}" alt="th-1-service-icon-2" width="77" height="70" class="h-[70px] w-auto" />

                                        <h4 class="mb-[15px] mt-[30px]">No Data</h4>
                                        <p class="mb-7">
                                            No Data Available
                                        </p>
                                        <a href="/login" class="mt-auto inline-block translate-x-0 transition-all duration-300 group-hover:translate-x-5">
                                            <img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}" alt="icon-black-arrow-right" width="34" height="28" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Service Item -->
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

    <!-- Horizontal Line -->
    <div class="horizontal-line bg-[#e6e6e6]"></div>
    <!-- Horizontal Line -->

    <!-- ...::: About Section Start :::... -->
    <section class="section-about">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mb-10 md:mb-[60px] xl:mb-20">
                    <div
                        class="grid items-center gap-x-6 gap-y-10 text-center lg:grid-cols-[1fr_minmax(0,0.55fr)] lg:text-start xl:gap-x-[134px]">
                        <h2 class="jos">
                            We make your business stand out
                        </h2>
                        <p class="jos section-para">
                            We work closely with our clients to know their objectives,
                            target audience, unique needs, and practical business
                            solutions.
                        </p>
                    </div>
                </div>
                <!-- Section Block -->

                <!-- About Area -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 md:grid-cols-2 lg:grid-cols-[0.8fr_0.4fr]">
                    <!-- About Left Block - Video -->
                    <div
                        class="jos relative flex items-center justify-center overflow-hidden rounded-[25px] border-[5px] border-black">
                        <img src="{{ asset('images/about.jpg') }}" alt="about-img" width="846"
                            height="476" loading="lazy" class="h-full w-full object-cover" />
                    </div>
                    <!-- About Left Block - Video -->

                    <!-- About Right Block - Counter Up -->
                    <div class="jos rounded-[25px] bg-black p-[30px]">
                        <ul class="divide-y divide-[#333333]">
                            @forelse ($counters as $counter)
                                <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                    <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]"
                                        data-module="countup">
                                        <span class="start-number" data-countup-number="{{ $counter->number }}">{{ $counter->number }}</span>+
                                    </div>
                                    <span class="mt-2 inline-block text-colorButteryWhite">{{ $counter->title }}</span>
                                </li>
                            @empty
                                <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                    <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]"
                                        data-module="countup">
                                        <span class="start-number" data-countup-number="0">0</span>+
                                    </div>
                                    <span class="mt-2 inline-block text-colorButteryWhite">No Data</span>
                                </li>
                            @endforelse
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

    <!-- ...::: Project Section Start :::... -->
    <section class="section-project">
        <!-- Section Background -->
        <div class="bg-black">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container">
                    <!-- Section Block -->
                    <div
                        class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                        <h2 class="jos text-colorButteryWhite">
                            Have a wide range of creative projects
                        </h2>
                    </div>
                    <!-- Section Block -->
                </div>

                <!-- Project Slider Area -->
                <div class="relative group/nav">
                    <div class="swiper projectSliderOne slider-center-inline">
                        <div class="swiper-wrapper">
                            @forelse ($projects as $project)
                                <!-- Single Slide Item -->
                                <div class="swiper-slide">
                                    <div
                                        class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                        <img src="{{ Storage::url( $project->image ) }}"
                                            alt="project-img-1" width="516" height="390"
                                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                        <div
                                            class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                            <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                                <a href="" class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">
                                                    {{ $project->title }}
                                                </a>
                                                <p class="line-clamp-2">
                                                    {{ $project->category }}
                                                </p>
                                            </div>
                                            <a href="" class="relative inline-flex items-start justify-center overflow-hidden">
                                                <img src="{{ asset('img/icons/icon-buttery-white-arrow-right.svg') }}"
                                                    alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                    class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                                <img src="{{ asset('img/icons/icon-light-lime-arrow-right.svg') }}"
                                                    alt="light-lime-arrow-right" width="34" height="28"
                                                    class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Item -->
                            @empty
                                <!-- Single Slide Item -->
                                <div class="swiper-slide">
                                    <div
                                        class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                        <img src="{{ asset('img/images/th-1/project-img-2.jpg') }}"
                                            alt="project-img-2" width="516" height="390"
                                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                        <div
                                            class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                            <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                                <a href="#"
                                                    class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">
                                                    No Data
                                                </a>
                                                <p class="line-clamp-2">
                                                    No Data
                                                </p>
                                            </div>
                                            <a href="#"
                                                class="relative inline-flex items-start justify-center overflow-hidden">
                                                <img src="{{ asset('img/icons/icon-buttery-white-arrow-right.svg') }}"
                                                    alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                    class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                                <img src="{{ asset('img/icons/icon-light-lime-arrow-right.svg') }}"
                                                    alt="light-lime-arrow-right" width="34" height="28"
                                                    class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Slide Item -->
                            @endforelse
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div
                        class="static xl:absolute w-full mt-16 xl:mt-0 z-20 flex justify-center xl:justify-between top-1/2 -translate-y-1/2 gap-x-10 px-10">
                        <div
                            class="project-button-prev inline-flex h-14 w-14 rounded-[50%] items-center justify-center border-b-2 border-white bg-colorLightLime xl:opacity-0 group-hover/nav:opacity-100 xl:invisible group-hover/nav:visible xl:translate-x-10 group-hover/nav:translate-x-0 transition-all duration-300">
                            <img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}"
                                alt="icon-black-arrow-right" width="34" height="28" class="rotate-180" />
                        </div>
                        <div
                            class="project-button-next inline-flex h-14 w-14 rounded-[50%] items-center justify-center border-b-2 border-white bg-colorLightLime xl:opacity-0 group-hover/nav:opacity-100 xl:invisible group-hover/nav:visible xl:-translate-x-10 group-hover/nav:translate-x-0 transition-all duration-300">
                            <img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}"
                                alt="icon-black-arrow-right" width="34" height="28" />
                        </div>
                    </div>
                </div>

                <div class="container mt-10 md:mt-16 lg:mt-20">
                    <div class="swiper-pagination progressbar-green"></div>
                </div>
                <!-- Project Slider Area -->
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </div>
        <!-- Section Background -->
    </section>
    <!-- ...::: Project Section End :::... -->

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
                            Our high-quality working processes
                        </h2>
                        <div class="jos mt-6">
                            <p class="section-para">
                                We focus at every stage on effective communication and
                                collaboration between the client and ensuring that the
                                final design meets the client's objectives and
                                expectations.
                            </p>

                            <p class="section-para">
                                It is important to note that these are simplified steps,
                                and the actual work process may vary depending on the
                                complexity of the project.
                            </p>
                        </div>
                    </div>
                    <!-- Process Area Left Block - Section Block -->

                    <!-- Process Area Right Block - Accordion -->
                    <!-- Accordion List -->
                    <ul class="jos flex flex-col gap-y-6">
                        @forelse ($workProcesses as $workProcess)
                            <!-- Accordion Item -->
                            <li class="accordion-item-style-1 accordion-item {{ $loop->first ? 'active' : '' }}">                                <!-- Accordion Header -->
                                <div
                                    class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                    <button
                                        class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                        0{{ $loop->iteration }}/ {{ $workProcess->title }}
                                    </button>
                                    <div class="accordion-icon">
                                        <img src="{{ asset('img/icons/icon-black-arrow-less-down.svg') }}"
                                            alt="icon-black-arrow-less-down" />
                                    </div>
                                </div>
                                <!-- Accordion Header -->
                                <!-- Accordion Body -->
                                <div class="accordion-body max-w-[826px] opacity-80">
                                    <p class="pt-5">
                                        {{ $workProcess->description  }}
                                    </p>
                                </div>
                                <!-- Accordion Body -->
                            </li>
                            <!-- Accordion Item -->
                        @empty
                            <!-- Accordion Item -->
                            <li class="accordion-item-style-1 accordion-item active">
                                <!-- Accordion Header -->
                                <div
                                    class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                    <button
                                        class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                        00/ No Data
                                    </button>
                                    <div class="accordion-icon">
                                        <img src="{{ asset('img/icons/icon-black-arrow-less-down.svg') }}"
                                            alt="icon-black-arrow-less-down" />
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

    <!-- Horizontal Line -->
    <div class="horizontal-line bg-[#e6e6e6]"></div>
    <!-- Horizontal Line -->

    <!-- ...::: Text Slider Section Start :::... -->
    <x-text-slider />
    <!-- ...::: Text Slider Section End :::... -->
</x-layouts.main>
