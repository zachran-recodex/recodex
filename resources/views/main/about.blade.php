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

    <title>About Us - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>About Us</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="#">Home</a>
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
                    <a href="{{ asset('img/images/th-1/about-gallery-img-1.jpg') }}" data-fslightbox="gallery"
                        class="group block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black md:col-span-1 lg:col-span-2">
                        <img src="{{ asset('img/images/th-1/about-gallery-img-1.jpg') }}" alt="about-gallery-img-1"
                            width="846" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('img/images/th-1/about-gallery-img-2.jpg') }}" data-fslightbox="gallery"
                        class="group col-span-1 block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black">
                        <img src="{{ asset('img/images/th-1/about-gallery-img-2.jpg') }}" alt="about-gallery-img-2"
                            width="408" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('img/images/th-1/about-gallery-img-3.jpg') }}" data-fslightbox="gallery"
                        class="group col-span-1 block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black">
                        <img src="{{ asset('img/images/th-1/about-gallery-img-3.jpg') }}" alt="about-gallery-img-3"
                            width="408" height="392"
                            class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                    </a>
                    <!-- About Galley Image Item -->
                    <!-- About Galley Image Item -->
                    <a href="{{ asset('img/images/th-1/about-gallery-img-4.jpg') }}" data-fslightbox="gallery"
                        class="group block cursor-pointer overflow-hidden rounded-[25px] border-2 border-black md:col-span-1 lg:col-span-2">
                        <img src="{{ asset('img/images/th-1/about-gallery-img-4.jpg') }}" alt="about-gallery-img-4"
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
    <x-text-slider />
    <!-- ...::: Text Slider Section End :::... -->
</x-layouts.main>
