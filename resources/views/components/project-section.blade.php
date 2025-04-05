<section class="section-project">
    <!-- Section Background -->
    <div class="bg-black">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos text-colorButteryWhite">
                        Portfolio Proyek Kami
                    </h2>
                </div>
            </div>

            <!-- Project Slider Area -->
            <div class="relative group/nav">
                <div class="swiper projectSliderOne slider-center-inline">
                    <div class="swiper-wrapper">
                        @forelse ($projects as $project)
                            <!-- Single Slide Item -->
                            <div class="swiper-slide">
                                <div class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ Storage::url( $project->image ) }}"
                                        alt="project-img-1" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
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
                        @empty
                            <div class="swiper-slide">
                                <div class="group relative overflow-hidden rounded-[20px] border-[5px] border-colorButteryWhite">
                                    <img src="{{ asset('img/images/th-1/project-img-2.jpg') }}"
                                        alt="project-img-2" width="516" height="390"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />

                                    <div class="w-[calc(100%-48px) absolute bottom-0 flex flex-col items-start gap-x-10 gap-y-8 p-6 sm:flex-row sm:items-center">
                                        <div class="max-w-[380px] flex-1 text-colorButteryWhite">
                                            <a href="#" class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] group-hover:text-colorLightLime md:text-3xl">
                                                No Data
                                            </a>
                                            <p class="line-clamp-2">
                                                No Data
                                            </p>
                                        </div>
                                        <a href="#" class="relative inline-flex items-start justify-center overflow-hidden">
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
                        @endforelse
                    </div>
                </div>

                <div class="static xl:absolute w-full mt-16 xl:mt-0 z-20 flex justify-center xl:justify-between top-1/2 -translate-y-1/2 gap-x-10 px-10">
                    <div class="project-button-prev inline-flex h-14 w-14 rounded-[50%] items-center justify-center border-b-2 border-white bg-colorLightLime xl:opacity-0 group-hover/nav:opacity-100 xl:invisible group-hover/nav:visible xl:translate-x-10 group-hover/nav:translate-x-0 transition-all duration-300">
                        <img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}" alt="icon-black-arrow-right" width="34" height="28" class="rotate-180" />
                    </div>
                    <div class="project-button-next inline-flex h-14 w-14 rounded-[50%] items-center justify-center border-b-2 border-white bg-colorLightLime xl:opacity-0 group-hover/nav:opacity-100 xl:invisible group-hover/nav:visible xl:-translate-x-10 group-hover/nav:translate-x-0 transition-all duration-300">
                        <img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}" alt="icon-black-arrow-right" width="34" height="28" />
                    </div>
                </div>
            </div>

            <div class="container mt-10 md:mt-16 lg:mt-20">
                <div class="swiper-pagination progressbar-green"></div>
            </div>
            <!-- Project Slider Area -->
        </div>
        <!-- Section Space -->
    </div>
    <!-- Section Background -->
</section>
