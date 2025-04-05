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
                        Layanan Profesional Jasa Pembuatan Website
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
                                    <a href="{{ route('service.detail', $service->slug) }}" class="mt-auto inline-block translate-x-0 transition-all duration-300 group-hover:translate-x-5">
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
