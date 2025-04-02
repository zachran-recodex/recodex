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
                        Buat Bisnis Anda Makin Menarik!
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