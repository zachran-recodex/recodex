@section('meta_tag')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Recodex ID - Jasa pembuatan website profesional dengan teknologi terkini. Kami menyediakan layanan pengembangan web yang responsif, SEO-friendly, dan disesuaikan dengan kebutuhan bisnis Anda.">
    <meta name="keywords" content="jasa pembuatan website, web development, website profesional, website bisnis, website company profile, website toko online, web developer Indonesia">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Recodex ID - Jasa Pembuatan Website Profesional">
    <meta property="og:description" content="Solusi digital terbaik untuk bisnis Anda dengan layanan pembuatan website profesional yang responsif dan SEO-friendly.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Recodex ID - Jasa Pembuatan Website Profesional">
    <meta name="twitter:description" content="Solusi digital terbaik untuk bisnis Anda dengan layanan pembuatan website profesional yang responsif dan SEO-friendly.">
    <meta name="twitter:image" content="{{ asset('images/hero.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Recodex ID - Jasa Pembuatan Website Profesional | Web Development Indonesia</title>
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
                                <a href="">Layanan</a>
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
                        <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}" width="1286" height="590" class="h-auto w-full object-cover" />
                    </div>
                    <div class="max-w-[650px] md:mb-[60px] xl:max-w-[856px]">
                        <h2>
                            {{ $service->title }}
                            <span>
                                <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="inline-block h-auto w-8 md:w-10 lg:w-[57px]" />
                            </span>
                        </h2>
                        <div class="rich-text mt-6 text-lg leading-[1.4] lg:text-[21px]">
                            {{ $service->description }}
                        </div>
                    </div>
                </article>
                <!-- Service Details Article -->

                @if(isset($service->feature_list) && count($service->feature_list) > 0)
                    <!-- Service Info Block -->
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-2">
                        @foreach ($service->feature_list as $index => $feature)
                            @if(isset($feature['title']) && isset($feature['points']) && count($feature['points']) > 0)
                                <div>
                                    <h4>{{ $index + 1 }}/ {{ $feature['title'] }}:</h4>
                                    <ul class="ml-4 mt-4 flex list-outside list-disc flex-col gap-y-[30px]">
                                        @foreach ($feature['points'] as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Service Info Block -->
                @endif
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Service Details Section end :::... -->

    <!-- ...::: Service Content Section Start :::... -->
    <section class="section-service-content">
        <!-- Section Space -->
        <div class="section-space-bottom">
            <!-- Section Container -->
            <div class="container">
                <!-- Service Content Area -->
                <div class="grid items-center gap-x-14 gap-y-10 lg:grid-cols-[1fr_minmax(0,0.6fr)] xl:gap-x-20 xxl:grid-cols-[1fr_minmax(0,0.85fr)] xxl:gap-x-[100px]">
                    <!-- Service Content Left Block -->
                    <div class="jos" data-jos_animation="fade-left">
                        <h2 class="mb-6">
                            {{ $service->subtitle }}
                            <span>
                                <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg') }}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="inline-block h-auto w-8 md:w-10 lg:w-[57px]" />
                            </span>
                        </h2>
                        <p class="text-lg leading-[1.42] lg:text-[21px]">
                            {!! $service->content !!}
                        </p>
                    </div>
                    <!-- Service Content Left Block -->

                    <!-- Service Content Right Block -->
                    <div class="jos" data-jos_animation="fade-right">
                        <div class="mx-auto max-w-[495px] overflow-hidden rounded-[25px] border-2 border-black lg:mx-0 lg:max-w-full lg:border-[5px]">
                            <img src="{{ Storage::url($service->content_image_path) }}" alt="{{ $service->subtitle }}" width="548" height="632" class="h-auto w-full object-cover" />
                        </div>
                    </div>
                    <!-- Service Content Right Block -->
                </div>
                <!-- Service Content Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Service Content Section End :::... -->

    <!-- Horizontal Line -->
    <div class="horizontal-line bg-[#e6e6e6]"></div>
    <!-- Horizontal Line -->

    @if(false)
        <!-- ...::: Testimonial Section Start :::... -->
        <section class="section-testimonial">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container">
                    <!-- Section Block -->
                    <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                        <h2 class="jos">
                            Clients are always satisfied with
                            <span>
                                    us
                                    <img src="assets/img/elemnts/shape-light-lime-5-arms-star.svg" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                                </span>
                        </h2>
                    </div>
                    <!-- Section Block -->

                    <!-- Testimonial List -->
                    <ul class="grid grid-cols-1 gap-x-6 gap-y-[30px] md:grid-cols-2">
                        <!-- Testimonial Item -->
                        <li class="jos" data-jos_delay="0">
                            <div class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                                <div class="mb-8 flex gap-x-2">
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                </div>
                                <h4 class="mb-5">Super customer service!</h4>
                                <p class="mb-[30px]">
                                    Excellent customer service and I was really impressed and
                                    happy with my purchase especially as it was a last minute
                                    order which got to me in time, and when it arrived I was
                                    very happy with the design and size and so was the
                                    recipient.
                                </p>
                                <div class="mt-auto flex items-center gap-3">
                                    <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                        <img src="assets/img/images/th-1/testimonial-user-img-1.png" alt="testimonial-user-img-1" width="64" height="64" class="h-full w-full object-cover" />
                                    </div>

                                    <div class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                        William Jack
                                        <span class="font-normal">Founder@XYZ</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Testimonial Item -->
                        <!-- Testimonial Item -->
                        <li class="jos" data-jos_delay="0.3">
                            <div class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                                <div class="mb-8 flex gap-x-2">
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                </div>
                                <h4 class="mb-5">Exceptional creativity and vision</h4>
                                <p class="mb-[30px]">
                                    Working with Mthemeus was a game-changer for our brand.
                                    Their exceptional creativity & vision breathed new life
                                    into our visual. The logo they designed perfectly captures
                                    our essence & has become instantly recognizable. We
                                    couldn't be happier with the results!
                                </p>
                                <div class="mt-auto flex items-center gap-3">
                                    <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                        <img src="assets/img/images/th-1/testimonial-user-img-2.png" alt="testimonial-user-img-2" width="64" height="64" class="h-full w-full object-cover" />
                                    </div>

                                    <div class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                        Smith Align
                                        <span class="font-normal">Businessman</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Testimonial Item -->
                        <!-- Testimonial Item -->
                        <li class="jos" data-jos_delay="0.6">
                            <div class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                                <div class="mb-8 flex gap-x-2">
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                </div>
                                <h4 class="mb-5">Innovative and professional</h4>
                                <p class="mb-[30px]">
                                    I can't say enough good things about them. Their team is
                                    not only incredibly talented but also highly professional.
                                    They listened to our ideas and brought them to life in
                                    ways we couldn't have imagined. Their innovative approach
                                    and dedication to our project.
                                </p>
                                <div class="mt-auto flex items-center gap-3">
                                    <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                        <img src="assets/img/images/th-1/testimonial-user-img-3.png" alt="testimonial-user-img-3" width="64" height="64" class="h-full w-full object-cover" />
                                    </div>

                                    <div class="text- leading-nonelg flex-1 font-syne font-bold -tracking-[0.5px] lg:text-[21px]">
                                        Milano Joe
                                        <span class="font-normal">Creative Director</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Testimonial Item -->
                        <!-- Testimonial Item -->
                        <li class="jos" data-jos_delay="0.9">
                            <div class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                                <div class="mb-8 flex gap-x-2">
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                    <img src="assets/img/icons/icon-black-star.svg" alt="icon-black-star" width="37" height="35" />
                                </div>
                                <h4 class="mb-5">Transformed our brand</h4>
                                <p class="mb-[30px]">
                                    Our partnership with Mthemeus transformed our brand from
                                    ordinary to extraordinary. Their branding expertise and
                                    meticulous design work elevated our marketing materials to
                                    a whole new level. Our customers have taken notice, and
                                    boost in brand recognition.
                                </p>
                                <div class="mt-auto flex items-center gap-3">
                                    <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                        <img src="assets/img/images/th-1/testimonial-user-img-4.png" alt="testimonial-user-img-4" width="64" height="64" class="h-full w-full object-cover" />
                                    </div>

                                    <div class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                        Danial Mark
                                        <span class="font-normal">Marketing Director</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Testimonial Item -->
                    </ul>
                    <!-- Testimonial List -->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </section>>
        <!-- ...::: Testimonial Section End :::... -->
    @endif
</x-layouts.main>
