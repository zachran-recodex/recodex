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

    <title>Layanan - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>{{ $service->title }}</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li>
                                <a href="{{ route('service') }}">Layanan</a>
                            </li>
                            <li>{{ $service->title }}</li>
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

    <!-- ...::: Service Details Section Start :::... -->
    <section class="section-service">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Service Details Article -->
                <article>
                    <div class="mb-20 block overflow-hidden rounded-[35px] border-2 border-black lg:border-[5px]">
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" width="1286" height="590" class="h-auto w-full object-cover" />
                    </div>
                    <div class="max-w-[650px] md:mb-[60px] xl:max-w-[856px]">
                        <h2>{{ $service->title }}</h2>
                        <div class="rich-text mt-6 text-lg leading-[1.4] lg:text-[21px]">
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </article>
                <!-- Service Details Article -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Service Details Section end :::... -->
</x-layouts.main>
