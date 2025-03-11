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
                        <h1>About Us</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>About Us</li>
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

                <!-- About Gallery Image List -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('') }}img/images/th-1/about-gallery-img-1.jpg" data-fslightbox="gallery"
                        class="group block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black md:col-span-1 lg:col-span-2">
                        <img src="{{ asset('') }}img/images/th-1/about-gallery-img-1.jpg" alt="about-gallery-img-1"
                            width="846" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('') }}img/images/th-1/about-gallery-img-2.jpg" data-fslightbox="gallery"
                        class="group col-span-1 block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black">
                        <img src="{{ asset('') }}img/images/th-1/about-gallery-img-2.jpg" alt="about-gallery-img-2"
                            width="408" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('') }}img/images/th-1/about-gallery-img-3.jpg" data-fslightbox="gallery"
                        class="group col-span-1 block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black">
                        <img src="{{ asset('') }}img/images/th-1/about-gallery-img-3.jpg" alt="about-gallery-img-3"
                            width="408" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('') }}img/images/th-1/about-gallery-img-4.jpg" data-fslightbox="gallery"
                        class="group block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black md:col-span-1 lg:col-span-2">
                        <img src="{{ asset('') }}img/images/th-1/about-gallery-img-4.jpg" alt="about-gallery-img-4"
                            width="846" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                </div>
                <!-- About Gallery Image List -->

                <div class="mt-10 grid grid-cols-1 gap-x-5 gap-y-10 lg:grid-cols-2">
                    <div class="rich-text">
                        <h4 class="mb-4">Our core vision</h4>
                        <p>
                            {{ $about->vision }}
                        </p>
                    </div>
                    <div class="rich-text">
                        <h4 class="mb-4">Our main mission</h4>
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
                    <li class="jos group/team-item" data-jos_animation="flip-left">
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Andrew
                                Mark</a>
                            <span class="text-lg md:text-[21px]">CEO & Founder</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Jack
                                Taylor</a>
                            <span class="text-lg md:text-[21px]">Senior Designer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Martine
                                Joy</a>
                            <span class="text-lg md:text-[21px]">Project Manager</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Adam
                                Straw</a>
                            <span class="text-lg md:text-[21px]">Web Developer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-5.jpg" alt="team-img-5.jpg"
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">William
                                Jack</a>
                            <span class="text-lg md:text-[21px]">Creative Director</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-6.jpg" alt="team-img-6.jpg"
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Alex
                                Tom</a>
                            <span class="text-lg md:text-[21px]">UI/UX Designer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-7.jpg" alt="team-img-7.jpg"
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Robin
                                Lesser</a>
                            <span class="text-lg md:text-[21px]">Chief Executive Officer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-7.jpg" alt="team-img-7.jpg"
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
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Sheikh
                                David</a>
                            <span class="text-lg md:text-[21px]">HR Director</span>
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
