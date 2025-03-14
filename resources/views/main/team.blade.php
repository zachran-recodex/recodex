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

    <title>Our Team - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>Our Team</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Team</li>
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

    <!-- ...::: Team Section Start :::... -->
    <section class="section-team">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        We have a team of creative
                        <span>
                            people
                            <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Team List -->
                <ul class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-1.jpg" alt="team-img-1" width="296"
                                height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Andrew
                                Mark</a>
                            <span class="text-lg md:text-[21px]">CEO & Founder</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-2.jpg" alt="team-img-2"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Jack
                                Taylor</a>
                            <span class="text-lg md:text-[21px]">Senior Designer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-4.jpg" alt="team-img-4"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Martine
                                Joy</a>
                            <span class="text-lg md:text-[21px]">Project Manager</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-3.jpg" alt="team-img-3"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Adam
                                Straw</a>
                            <span class="text-lg md:text-[21px]">Web Developer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-5.jpg" alt="team-img-5"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">William
                                Jack</a>
                            <span class="text-lg md:text-[21px]">Creative Director</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-6.jpg" alt="team-img-6"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Alex
                                Tom</a>
                            <span class="text-lg md:text-[21px]">UI/UX Designer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-7.jpg" alt="team-img-7"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Robin
                                Lesser</a>
                            <span class="text-lg md:text-[21px]">Chief Executive Officer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-8.jpg" alt="team-img-8"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Sheikh
                                David</a>
                            <span class="text-lg md:text-[21px]">HR Director</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-9.jpg" alt="team-img-9"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Mark
                                Strew</a>
                            <span class="text-lg md:text-[21px]">UI Designer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-10.jpg" alt="team-img-10"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Fradik
                                Hazbag</a>
                            <span class="text-lg md:text-[21px]">Researcher</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-11.jpg" alt="team-img-11"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Sam
                                Kainiz</a>
                            <span class="text-lg md:text-[21px]">Lead Developer</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                    <!-- Team  Item -->
                    <li class="jos group/team-item" data-jos_delay="0" data-jos_animation="flip-left">
                        <div class="relative overflow-hidden rounded-[20px] border-[5px] border-black">
                            <img src="{{ asset('') }}img/images/th-1/team-img-12.jpg" alt="team-img-12"
                                width="296" height="300" loading="lazy"
                                class="h-full w-full object-cover transition-all duration-300 group-hover/team-item:scale-110" />
                            <!-- Social Link -->
                            <div
                                class="absolute top-full flex w-full justify-center gap-3 transition-all duration-300 group-hover/team-item:-translate-y-14">
                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-twitter.svg"
                                        alt="icon-logo-buttery-white-twitter" width="19" height="16"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-twitter.svg"
                                        alt="icon-logo-black-twitter" width="19" height="16"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-facebook.svg"
                                        alt="icon-logo-buttery-white-facebook" width="10" height="17"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-facebook.svg"
                                        alt="icon-logo-black-facebook" width="10" height="17"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-instagram.svg"
                                        alt="icon-logo-buttery-white-instagram" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-instagram.svg"
                                        alt="icon-logo-black-instagram" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer"
                                    class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                    <img src="{{ asset('') }}img/icons/icon-logo-buttery-white-linkedin.svg"
                                        alt="icon-logo-buttery-white-linkedin" width="17" height="18"
                                        class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                    <img src="{{ asset('') }}img/icons/icon-logo-black-linkedin.svg"
                                        alt="icon-logo-black-linkedin" width="17" height="18"
                                        class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                </a>
                            </div>
                            <!-- Social Link -->
                        </div>

                        <div class="mt-5 text-center">
                            <a href="team-details.html" class="display-heading display-heading-4 mb-4 block">Mac
                                Jackson</a>
                            <span class="text-lg md:text-[21px]">Marketing Expert</span>
                        </div>
                    </li>
                    <!-- Team  Item -->
                </ul>
                <!-- Team List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Team Section End :::... -->
</x-layouts.main>
