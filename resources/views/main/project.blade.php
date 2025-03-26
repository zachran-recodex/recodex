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

    <title>Project - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>Our Project</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>Project</li>
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

    <!-- ...::: Project Section Start :::... -->
    <section class="section-project">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Have a wide range of creative projects
                        <span>
                            <img src="{{ asset('img/elemnts/shape-light-lime-5-arms-star.svg') }}"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Project List -->
                <ul class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    @forelse ($projects as $project)
                        <!-- Project Item -->
                        <li class="jos">
                            <div class="group relative overflow-hidden rounded-[25px] border-2 border-black lg:border-[5px]">
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}" width="626" height="390"
                                    class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" />
                                <!-- Thumbnail -->

                                <!-- Content -->
                                <div class="absolute bottom-0 z-10 flex w-full flex-col items-start justify-between gap-x-7 gap-y-8 p-6 transition-all duration-300 sm:flex-row sm:items-center lg:translate-y-full lg:group-hover:translate-y-0">
                                    <div class="max-w-[520px] flex-1 text-colorButteryWhite">
                                        <a href="#"
                                            class="mb-[10px] block font-syne text-2xl font-bold leading-[1.4] hover:text-colorLightLime md:text-3xl">
                                            {{ $project->title }}
                                        </a>
                                        <p class="line-clamp-2">
                                            {{ $project->description }}
                                        </p>
                                    </div>
                                    <a href="#"
                                        class="relative hidden items-start justify-center overflow-hidden sm:inline-flex">
                                        <img src="{{ asset('img/icons/icon-buttery-white-arrow-right.svg') }}"
                                            alt="icon-buttery-white-arrow-right" width="34" height="28"
                                            class="translate-x-0 opacity-100 transition-all duration-300 group-hover:translate-x-full group-hover:opacity-0" />
                                        <img src="{{ asset('img/icons/icon-light-lime-arrow-right.svg') }}"
                                            alt="light-lime-arrow-right" width="34" height="28"
                                            class="absolute -translate-x-full opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                    </a>
                                </div>
                                <!-- Content -->

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black to-black/35 transition-all ease-in-out lg:translate-y-full lg:group-hover:translate-y-0">
                                </div>
                                <!-- Overlay -->
                            </div>
                        </li>
                        <!-- Project Item -->
                    @empty
                        <!-- Empty Project Item -->
                        <li class="jos">
                            <div class="group relative overflow-hidden rounded-[25px] border-2 border-black lg:border-[5px]">
                                <div class="p-6 text-center">
                                    <h3 class="font-syne text-2xl font-bold">No Projects Available</h3>
                                    <p class="mt-2">Currently, there are no projects to display.</p>
                                </div>
                            </div>
                        </li>
                        <!-- Empty Project Item -->
                    @endforelse
                </ul>
                <!-- Project List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Project Section End :::... -->
</x-layouts.main>
