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

    <title>404 | Page Not Found</title>
@endsection

<x-layouts.main>
    <!-- ...::: 404 Section Start :::... -->
    <section class="section-404-error">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- 404 Image Block -->
                <div class="jos mb-10 flex justify-center md:mb-[60px] lg:mb-20">
                    <img src="{{ asset('img/images/th-1/404-image.svg') }}" alt="404-image" width="636" height="471" class="max-w-full" />
                </div>
                <!-- 404 Image Block -->

                <!-- Section Block -->
                <div class="section-block mx-auto mb-10 max-w-[650px] text-center xl:max-w-[870px]">
                    <h2 class="jos">
                        We can’t find the page you are looking for
                        <span>
                            <img src="{{ asset('img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <div class="flex justify-center">
                    <a href="{{ route('home') }}" class="btn-primary relative justify-start bg-black pr-20 text-white">
                        Return to homepage
                        <span class="absolute right-[5px] inline-flex h-[50px] w-[50px] items-center justify-center rounded-[50%] bg-colorLightLime"><img src="{{ asset('img/icons/icon-black-arrow-right.svg') }}" alt="icon-black-arrow-right" width="34" height="28" /></span></a>
                </div>
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: 404 Section End :::... -->
</x-layouts.main>
