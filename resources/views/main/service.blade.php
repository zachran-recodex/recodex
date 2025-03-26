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

    <title>Service - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>Our Services</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>Our Services</li>
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

    <!-- ...::: Text Slider Section Start :::... -->
    <x-text-slider />
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
