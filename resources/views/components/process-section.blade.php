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
                        Proses Kerja Berkualitas Tinggi Kami
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

                <!-- Process Area Right Block - Accordion -->
                <ul class="jos flex flex-col gap-y-6">
                    @forelse ($workProcesses as $workProcess)
                        <!-- Accordion Item -->
                        <li class="accordion-item-style-1 accordion-item {{ $loop->first ? 'active' : '' }}">
                            <!-- Accordion Header -->
                            <div class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                <button class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                    0{{ $loop->iteration }}/ {{ $workProcess->title }}
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('img/icons/icon-black-arrow-less-down.svg') }}" alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[826px] opacity-80">
                                <p class="pt-5">
                                    {{ $workProcess->description }}
                                </p>
                            </div>
                        </li>
                    @empty
                        <!-- Accordion Item -->
                        <li class="accordion-item-style-1 accordion-item active">
                            <!-- Accordion Header -->
                            <div class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                <button class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                    00/ No Data
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('img/icons/icon-black-arrow-less-down.svg') }}" alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[826px] opacity-80">
                                <p class="pt-5">
                                    No Data
                                </p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
            <!-- Process Area -->
        </div>
        <!-- Section Container -->
    </div>
    <!-- Section Space -->
</section>
