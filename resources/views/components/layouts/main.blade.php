<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @yield('meta_tag')
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Recodex ID - Jasa Pembuatan Website Profesional</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">

        <!-- Site font -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/webfonts/inter/stylesheet.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/fonts/webfonts/syne/stylesheet.css') }}" />

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/vendors/jos.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/vendors/menu.css') }}" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

        @if (App::environment('local'))
            <!-- Development css -->
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        @elseif (App::environment('production'))
            <!-- Production css -->
            <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
        @endif
    </head>
    <body class="bg-colorIvory">
        <div class="page-wrapper">
            <!-- ...::: Header Section Start :::... -->
            <header class="section-header site-header is-black fixed top-0 z-30 w-full py-2">
                <!-- Section Container -->
                <div class="container">
                    <!-- Header Area -->
                    <div class="flex items-center justify-between">
                        <!-- Header Left Block -->
                        <div class="flex items-center gap-x-10">
                            <!-- Header Logo -->
                            <a href="{{ route('home') }}" class="h-auto w-auto flex items-center gap-4">
                                <img class="h-14 w-auto" src="{{ asset('images/small-logo.png') }}" alt="logo-recodex" width="121" height="24" />
                                <p class="text-2xl font-semibold" style="color:#86c332">RECODEX ID</p>
                            </a>
                            <!-- Header Logo -->

                            <!-- Header Navigation -->
                            <div class="menu-block-wrapper">
                                <div class="menu-overlay"></div>
                                <nav class="menu-block" id="append-menu-header">
                                    <div class="mobile-menu-head">
                                        <div class="go-back">
                                            <img src="{{ asset('assets/img/icons/icon-caret-down.svg') }}" alt="icon-caret-down" width="12" height="7" />
                                        </div>
                                        <div class="current-menu-title"></div>
                                        <div class="mobile-menu-close">&times;</div>
                                    </div>
                                    <ul class="site-menu-main">
                                        <li class="nav-link-item drop-trigger text-colorDark rounded-none border border-transparent lg:text-white">
                                            <a href="{{ route('about') }}" class="nav-link-item">Tentang Kami</a>
                                        </li>
                                        <li class="nav-item nav-item-has-children">
                                            <a href="{{ route('services') }}" class="nav-link-item drop-trigger text-colorDark rounded-none border border-transparent lg:text-white">
                                                Layanan
                                                <img src="{{ asset('assets/img/icons/icon-caret-down.svg') }}" alt="icon-caret-down" width="7" height="4" class="-rotate-90 invert-0 lg:rotate-0 lg:invert" />
                                            </a>
                                            <ul class="sub-menu" id="submenu-0">
                                                @foreach($navServices as $service)
                                                    <li class="sub-menu--item">
                                                        <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="nav-link-item drop-trigger text-colorDark rounded-none border border-transparent lg:text-white">
                                            <a href="{{ route('projects') }}" class="nav-link-item">Portfolio</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Navigation -->
                        </div>
                        <!-- Header Left Block -->

                        <!-- Header Right Block -->
                        <div class="flex items-center gap-x-6">
                            <a href="{{ route('contact') }}" class="btn-primary relative hidden px-[30px] py-[10px] sm:inline-flex">Konsultasi</a>

                            <!-- Responsive Offcanvas Menu Button -->
                            <div class="block lg:hidden">
                                <button id="openBtn" class="hamburger-menu mobile-menu-trigger">
                                    <span class="bg-white before:bg-white after:bg-white"></span>
                                </button>
                            </div>
                        </div>
                        <!-- Header Right Block -->
                    </div>
                    <!-- Header Area -->
                </div>
                <!-- Section Container -->
            </header>
            <!-- ...::: Header Section End :::... -->

            <!-- Main Wrapper Start -->
            <main class="main-wrapper">

                {{ $slot }}

            </main>
            <!--  Main Wrapper End -->

            <!-- ...::: Footer Section Start :::... -->
            <footer class="section-footer">
                <div class="bg-black">
                    <!-- Footer Top -->
                    <div class="section-space">
                        <!-- Section Container -->
                        <div class="container">
                            <!-- Footer Top Area -->
                            <div class="grid grid-cols-1 gap-x-10 gap-y-10 md:grid-cols-2 lg:grid-cols-[1fr_minmax(0,0.8fr)] lg:gap-x-20 xl:gap-x-24 xxl:gap-x-[139px]">
                                <!-- Footer Left Block -->
                                <div>
                                    <!-- Section Block -->
                                    <div class="section-block text-colorButteryWhite">
                                        <h2 class="mb-6">
                                            Yuk mulai
                                            <span>
                                                <img src="{{ asset('assets/img/elemnts/shape-light-lime-5-arms-star.svg')}}" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                                            </span>
                                            proyek bersama!
                                        </h2>

                                        <p class="section-para">
                                            Kami akan berkolaborasi penuh dengan Anda untuk memahami tujuan bisnis, target audience, dan kebutuhan khusus. Kemampuan kreatif kami akan mentransformasi semua itu menjadi solusi website yang powerful dan efektif.
                                        </p>
                                    </div>
                                    <!-- Section Block -->

                                    <div class="grid grid-cols-[1fr_auto] items-center">
                                        <div>
                                            <!-- Footer Info -->
                                            <ul class="mt-12 flex flex-col gap-y-3">
                                                <li>
                                                    <span class="block font-syne text-[21px] font-bold leading-[1.42] text-colorLightLime">Hubungi:</span>
                                                    <a href="tel:+1234567890" class="text-[21px] leading-[1.42] text-colorButteryWhite">(+62) 822-9814-1940</a>
                                                </li>
                                                <li>
                                                    <span class="block font-syne text-[21px] font-bold leading-[1.42] text-colorLightLime">Email:</span>
                                                    <a href="mailto:yourmail@email.com" class="text-[21px] leading-[1.42] text-colorButteryWhite">info@recodex.id</a>
                                                </li>
                                            </ul>
                                            <!-- Footer Info -->

                                            <!-- Social Link -->
                                            <div class="mt-11 flex w-full gap-4">
                                                <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer" class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                                    <img src="assets/img/icons/icon-logo-buttery-white-twitter.svg" alt="icon-logo-buttery-white-twitter" width="19" height="16" class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                                    <img src="assets/img/icons/icon-logo-black-twitter.svg" alt="icon-logo-black-twitter" width="19" height="16" class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                                </a>
                                                <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer" class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                                    <img src="assets/img/icons/icon-logo-buttery-white-facebook.svg" alt="icon-logo-buttery-white-facebook" width="10" height="17" class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                                    <img src="assets/img/icons/icon-logo-black-facebook.svg" alt="icon-logo-black-facebook" width="10" height="17" class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                                </a>
                                                <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer" class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                                    <img src="assets/img/icons/icon-logo-buttery-white-instagram.svg" alt="icon-logo-buttery-white-instagram" width="17" height="18" class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                                    <img src="assets/img/icons/icon-logo-black-instagram.svg" alt="icon-logo-black-instagram" width="17" height="18" class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                                </a>
                                                <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer" class="group/link relative inline-flex h-[34px] w-[34px] items-center justify-center rounded-[50%] border border-colorButteryWhite bg-black transition-all duration-300 hover:border-black hover:bg-colorLightLime hover:shadow-[0_1.5px_0_0] hover:shadow-colorButteryWhite">
                                                    <img src="assets/img/icons/icon-logo-buttery-white-linkedin.svg" alt="icon-logo-buttery-white-linkedin" width="17" height="18" class="opacity-100 transition-all duration-300 group-hover/link:opacity-0" />
                                                    <img src="assets/img/icons/icon-logo-black-linkedin.svg" alt="icon-logo-black-linkedin" width="17" height="18" class="absolute opacity-0 transition-all duration-300 group-hover/link:opacity-100" />
                                                </a>
                                            </div>
                                            <!-- Social Link -->
                                        </div>
                                        <div class="hidden lg:inline-block">
                                            <img src="assets/img/elemnts/element-light-lime-curve-arrow.svg" alt="element-light-lime-curve-arrow" width="284" height="153" class="h-auto max-w-52 lg:inline-block xl:max-w-full" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Footer Left Block -->

                                <!-- Footer Right Block -->
                                <div>
                                    <span class="display-heading display-heading-5 mb-[30px] block text-colorButteryWhite">Send us a message</span>
                                    <form action="#" method="post" class="flex flex-col gap-y-6">
                                        <input type="text" placeholder="Your name" class="w-full rounded-[50px] border border-[#cccccc] bg-transparent px-6 py-5 text-base font-bold leading-none text-white placeholder:text-[#cccccc]" required />
                                        <input type="email" placeholder="Your email address" class="w-full rounded-[50px] border border-[#cccccc] bg-transparent px-6 py-5 text-base font-bold leading-none text-white placeholder:text-[#cccccc]" required />
                                        <input type="tel" placeholder="Your phone number" class="w-full rounded-[50px] border border-[#cccccc] bg-transparent px-6 py-5 text-base font-bold leading-none text-white placeholder:text-[#cccccc]" required />
                                        <textarea placeholder="Write your message here..." class="min-h-[150px] w-full rounded-[20px] border border-[#cccccc] bg-transparent px-6 py-5 text-base font-bold leading-none text-white placeholder:text-[#cccccc]" required></textarea>

                                        <button type="submit" class="btn-primary relative justify-start pr-20 md:pr-[118px]">
                                            Send message
                                            <span class="absolute right-[5px] inline-flex h-[50px] w-[50px] items-center justify-center rounded-[50%] bg-black"><img src="assets/img/icons/icon-buttery-white-arrow-right.svg" alt="icon-buttery-white-arrow-right" width="34" height="28" /></span>
                                        </button>
                                    </form>
                                </div>
                                <!-- Footer Right Block -->
                            </div>
                            <!-- Footer Top Area -->
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Footer Top -->

                    <!-- Horizontal Line -->
                    <div class="horizontal-line bg-[#333333]"></div>
                    <!-- Horizontal Line -->

                    <!-- Footer Bottom -->
                    <div class="py-[35px]">
                        <!-- Section Container -->
                        <div class="container">
                            <div class="flex flex-wrap justify-center items-center gap-x-[30px] gap-y-4 lg:justify-between">
                                <a href="{{ route('home') }}" class="flex items-center gap-4">
                                    <img class="h-14 w-auto" src="{{ asset('images/small-logo.png') }}" alt="logo-recodex" width="121" height="24" />
                                    <p class="text-2xl font-semibold" style="color:#86c332">RECODEX ID</p>
                                </a>

                                <!-- Copyright Text -->
                                <div class="text-colorButteryWhite">
                                    &copy; Copyright 2025, All Rights Reserved by Recodex ID
                                </div>
                                <!-- Copyright Text -->
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Footer Bottom -->
                </div>
            </footer>
            <!-- ...::: Footer Section End :::... -->
        </div>

        <!--Vendor js-->
        <script src="{{ asset('assets/js/vendors/counterup.js') }}" type="module"></script>
        <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/fslightbox.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/jos.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/menu.js') }}"></script>

        <!-- Main js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
