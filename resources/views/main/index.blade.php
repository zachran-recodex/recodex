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
                            We provide effective design
                            <span>
                                solutions
                                <img src="{{ asset('img/elemnts/shape-light-lime-5-arms-star.svg') }}"
                                    alt="shape-light-lime-5-arms-star" width="74" height="70"
                                    class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
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
                                        <a href="service-details.html" class="mt-auto inline-block translate-x-0 transition-all duration-300 group-hover:translate-x-5">
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
                            We make
                            <span>
                                your
                                <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                    alt="shape-light-lime-5-arms-star" width="74" height="70"
                                    class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
                            business stand out
                        </h2>
                        <p class="jos section-para">
                            We work closely with our clients to know their objectives,
                            target audience, unique needs, and practical design
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
                        <img src="{{ asset('') }}img/images/th-1/about-img.jpg" alt="about-img" width="846"
                            height="476" loading="lazy" class="h-full w-full object-cover" />

                        <div class="absolute inline-block">
                            <a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=3nQNiWdeH2Q"
                                class="btn-primary relative pr-16" aria-label="video-play">
                                Play
                                <span
                                    class="rounded-[50% absolute right-[0px] inline-flex items-center justify-center"><img
                                        src="{{ asset('') }}img/icons/icon-buttery-white-black-play.svg"
                                        alt="icon-buttery-white-black-play" width="50" height="50" /></span>
                            </a>
                        </div>
                    </div>
                    <!-- About Left Block - Video -->

                    <!-- About Right Block - Counter Up -->
                    <div class="jos rounded-[25px] bg-black p-[30px]">
                        <ul class="divide-y divide-[#333333]">
                            <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]"
                                    data-module="countup">
                                    <span class="start-number" data-countup-number="15">15</span>+
                                </div>
                                <span class="mt-2 inline-block text-colorButteryWhite">Years of experience</span>
                            </li>
                            <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]"
                                    data-module="countup">
                                    <span class="start-number" data-countup-number="120">120</span>k
                                </div>
                                <span class="mt-2 inline-block text-colorButteryWhite">Successful projects</span>
                            </li>
                            <li class="py-6 text-center first-of-type:pt-0 last-of-type:pb-0">
                                <div class="font-syne text-4xl font-bold leading-[1.07] -tracking-[1%] text-colorLightLime md:text-5xl xl:text-[70px]"
                                    data-module="countup">
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
                            Have a wide range of creative
                            <span>
                                projects
                                <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                    alt="shape-light-lime-5-arms-star" width="74" height="70"
                                    class="inline-block h-auto w-8 md:w-10 lg:w-[57px]" />
                            </span>
                        </h2>
                    </div>
                    <!-- Section Block -->
                </div>

                <!-- Project Slider Area -->
                <div class="relative group/nav">
                    <div class="swiper projectSliderOne slider-center-inline">
                        <div class="swiper-wrapper">
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-1.jpg"
                                        alt="project-img-1" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">Product
                                                Design</a>
                                            <p class="line-clamp-2">
                                                Developing the look and feel of physical products,
                                                aesthetics, and functionality.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-2.jpg"
                                        alt="project-img-2" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">Logo
                                                and Branding</a>
                                            <p class="line-clamp-2">
                                                Creating or refreshing a company's logo and
                                                developing a cohesive visual identity.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-3.jpg"
                                        alt="project-img-3" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">App
                                                UI/UX Design</a>
                                            <p class="line-clamp-2">
                                                Designing the UI/UXe for mobile apps and web
                                                applications to ensure usability & engagement.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-4.jpg"
                                        alt="project-img-4" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">Packaging
                                                Design</a>
                                            <p class="line-clamp-2">
                                                Creating packaging solutions for products that not
                                                only protect attract customers on store.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-1.jpg"
                                        alt="project-img-1" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">Product
                                                Design</a>
                                            <p class="line-clamp-2">
                                                Developing the look and feel of physical products,
                                                aesthetics, and functionality.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-2.jpg"
                                        alt="project-img-2" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">Logo
                                                and Branding</a>
                                            <p class="line-clamp-2">
                                                Creating or refreshing a company's logo and
                                                developing a cohesive visual identity.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-3.jpg"
                                        alt="project-img-3" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">App
                                                UI/UX Design</a>
                                            <p class="line-clamp-2">
                                                Designing the UI/UXe for mobile apps and web
                                                applications to ensure usability & engagement.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div
                                    class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('') }}img/images/th-1/project-img-4.jpg"
                                        alt="project-img-4" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div
                                        class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="project-details.html"
                                                class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">Packaging
                                                Design</a>
                                            <p class="line-clamp-2">
                                                Creating packaging solutions for products that not
                                                only protect attract customers on store.
                                            </p>
                                        </div>
                                        <a href="project-details.html"
                                            class="relative inline-flex items-start justify-center overflow-hidden">
                                            <img src="{{ asset('') }}img/icons/icon-buttery-white-arrow-right.svg"
                                                alt="icon-buttery-white-arrow-right" width="34" height="28"
                                                class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                            <img src="{{ asset('') }}img/icons/icon-light-lime-arrow-right.svg"
                                                alt="light-lime-arrow-right" width="34" height="28"
                                                class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Item -->
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div
                        class="static xl:absolute w-full mt-16 xl:mt-0 z-20 flex justify-center xl:justify-between top-1/2 -translate-y-1/2 gap-x-10 px-10">
                        <div
                            class="project-button-prev inline-flex h-14 w-14 rounded-[50%] items-center justify-center border-b-2 border-white bg-colorLightLime xl:opacity-0 group-hover/nav:opacity-100 xl:invisible group-hover/nav:visible xl:translate-x-10 group-hover/nav:translate-x-0 transition-all duration-300">
                            <img src="{{ asset('') }}img/icons/icon-black-arrow-right.svg"
                                alt="icon-black-arrow-right" width="34" height="28" class="rotate-180" />
                        </div>
                        <div
                            class="project-button-next inline-flex h-14 w-14 rounded-[50%] items-center justify-center border-b-2 border-white bg-colorLightLime xl:opacity-0 group-hover/nav:opacity-100 xl:invisible group-hover/nav:visible xl:-translate-x-10 group-hover/nav:translate-x-0 transition-all duration-300">
                            <img src="{{ asset('') }}img/icons/icon-black-arrow-right.svg"
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
                <div
                    class="grid grid-cols-1 items-center gap-y-10 lg:grid-cols-2 lg:gap-x-8 xl:grid-cols-[1fr_minmax(0,0.67fr)] xxl:gap-x-[72px]">
                    <!-- Process Area Left Block - Section Block -->
                    <div class="section-block text-center lg:text-start">
                        <h2 class="jos">
                            Our
                            <span>
                                high-quality
                                <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                    alt="shape-light-lime-5-arms-star" width="74" height="70"
                                    class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
                            working processes
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
                        <!-- Accordion Item -->
                        <li class="accordion-item-style-1 accordion-item active">
                            <!-- Accordion Header -->
                            <div
                                class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                <button
                                    class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                    01/ Project idea
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('') }}img/icons/icon-black-arrow-less-down.svg"
                                        alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Header -->
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[826px] opacity-80">
                                <p class="pt-5">
                                    The process starts with a detailed discussion with the
                                    client to understand their idea & goals.
                                </p>
                            </div>
                            <!-- Accordion Body -->
                        </li>
                        <!-- Accordion Item -->
                        <!-- Accordion Item -->
                        <li class="accordion-item-style-1 accordion-item">
                            <!-- Accordion Header -->
                            <div
                                class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                <button
                                    class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                    02/ Brainstorming
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('') }}img/icons/icon-black-arrow-less-down.svg"
                                        alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Header -->
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[826px] opacity-80">
                                <p class="pt-5">
                                    The process starts with a detailed discussion with the
                                    client to understand their idea & goals.
                                </p>
                            </div>
                            <!-- Accordion Body -->
                        </li>
                        <!-- Accordion Item -->
                        <!-- Accordion Item -->
                        <li class="accordion-item-style-1 accordion-item">
                            <!-- Accordion Header -->
                            <div
                                class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                <button
                                    class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                    03/ Launch
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('') }}img/icons/icon-black-arrow-less-down.svg"
                                        alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Header -->
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[826px] opacity-80">
                                <p class="pt-5">
                                    The process starts with a detailed discussion with the
                                    client to understand their idea & goals.
                                </p>
                            </div>
                            <!-- Accordion Body -->
                        </li>
                        <!-- Accordion Item -->
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

    <!-- ...::: Testimonial Section Start :::... -->
    <section class="section-testimonial">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Clients are always satisfied with
                        <span>
                            us
                            <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Testimonial List -->
                <ul class="grid grid-cols-1 gap-x-6 gap-y-[30px] md:grid-cols-2">
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Super customer service!</h4>
                            <p class="mb-[30px]">
                                Excellent customer service and I was really impressed and
                                happy with my purchase especially as it was a last minute
                                order which got to me in time, and when it arrived I was
                                very happy with the design and size and so was the
                                recipient.
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-1.png"
                                        alt="testimonial-user-img-1" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                    William Jack
                                    <span class="font-normal">Founder@XYZ</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0.3">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Exceptional creativity and vision</h4>
                            <p class="mb-[30px]">
                                Working with Mthemeus was a game-changer for our brand.
                                Their exceptional creativity & vision breathed new life
                                into our visual. The logo they designed perfectly captures
                                our essence & has become instantly recognizable. We
                                couldn't be happier with the results!
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-2.png"
                                        alt="testimonial-user-img-2" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                    Smith Align
                                    <span class="font-normal">Businessman</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0.6">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Innovative and professional</h4>
                            <p class="mb-[30px]">
                                I can't say enough good things about them. Their team is
                                not only incredibly talented but also highly professional.
                                They listened to our ideas and brought them to life in
                                ways we couldn't have imagined. Their innovative approach
                                and dedication to our project.
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-3.png"
                                        alt="testimonial-user-img-3" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="text- leading-nonelg flex-1 font-syne font-bold -tracking-[0.5px] lg:text-[21px]">
                                    Milano Joe
                                    <span class="font-normal">Creative Director</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0.9">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Transformed our brand</h4>
                            <p class="mb-[30px]">
                                Our partnership with Mthemeus transformed our brand from
                                ordinary to extraordinary. Their branding expertise and
                                meticulous design work elevated our marketing materials to
                                a whole new level. Our customers have taken notice, and
                                boost in brand recognition.
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-4.png"
                                        alt="testimonial-user-img-4" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                    Danial Mark
                                    <span class="font-normal">Marketing Director</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                </ul>
                <!-- Testimonial List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Testimonial Section End :::... -->

    <!-- ...::: Text Slider Section Start :::... -->
    <div class="section-text-slider">
        <div class="bg-black py-5">
            <div class="horizontal-slide-from-right-to-left flex items-center gap-x-6">
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
            </div>
        </div>
    </div>
    <!-- ...::: Text Slider Section End :::... -->

    <!-- ...::: Team Section Start :::... -->
    <section class="section-team">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        We have a team of creative
                        <span>
                            people
                            <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Team List -->
                <ul class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-1.jpg" alt="team-img-1"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Zachran
                                Razendra</a>
                            <span class="text-lg md:text-[21px]">CEO & Founder</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-2.jpg" alt="team-img-2"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">M. Raista
                                Firdaus</a>
                            <span class="text-lg md:text-[21px]">UI/UX Designer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-4.jpg" alt="team-img-4"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Adnin
                                Farizie Miradi</a>
                            <span class="text-lg md:text-[21px]">Quality Assurance</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-3.jpg" alt="team-img-3"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Taufan
                                Rahmatdani</a>
                            <span class="text-lg md:text-[21px]">Digital Marketing</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                </ul>
                <!-- Team List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Team Section End :::... -->
</x-layouts.main>
