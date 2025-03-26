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

    <title>FAQs - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>FAQs</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>FAQs</li>
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

    <!-- ...::: FAQ Section Start :::... -->
    <section class="section-faq">
        <!-- Section Space -->
        <div class="section-space">
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

                <!-- Accordion List -->
                <ul class="jos flex flex-col gap-y-6">
                    @forelse ($faqs as $faq)
                        <!-- Accordion Item -->
                        <li class="accordion-item-style-1 accordion-item {{ $loop->first ? 'active' : '' }}">
                            <!-- Accordion Header -->
                            <div class="accordion-header text-ColorBlack flex items-center justify-between gap-6 text-xl font-semibold">
                                <button class="flex-1 text-left font-syne text-2xl font-bold leading-[1.4] md:text-3xl">
                                    {{ $faq->question }}
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('img/icons/icon-black-arrow-less-down.svg') }}"
                                        alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Header -->
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[1162px] opacity-80">
                                <p class="pt-5">
                                    {{ $faq->answer }}
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
                                    No FAQs Available
                                </button>
                                <div class="accordion-icon">
                                    <img src="{{ asset('img/icons/icon-black-arrow-less-down.svg') }}"
                                        alt="icon-black-arrow-less-down" />
                                </div>
                            </div>
                            <!-- Accordion Header -->
                            <!-- Accordion Body -->
                            <div class="accordion-body max-w-[1162px] opacity-80">
                                <p class="pt-5">
                                    Currently, there are no FAQs available.
                                </p>
                            </div>
                            <!-- Accordion Body -->
                        </li>
                        <!-- Accordion Item -->
                    @endforelse
                </ul>
                <!-- Accordion List -->

                <div class="mt-10 flex justify-center md:mt-[60px] lg:mt-20">
                    <a href="{{ route('contact') }}" class="btn-primary relative justify-start bg-black pr-20 text-white">
                        Still, have any questions? Contact us
                        <span
                            class="absolute right-[5px] inline-flex h-[50px] w-[50px] items-center justify-center rounded-[50%] bg-colorLightLime"><img
                                src="{{ asset('') }}img/icons/icon-black-arrow-right.svg"
                                alt="icon-black-arrow-right" width="34" height="28" /></span></a>
                </div>
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: FAQ Section End :::... -->
</x-layouts.main>
