<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Coming Soon</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />

    <!-- Sitefont -->
    <link rel="stylesheet" href="{{ asset('fonts/webfonts/inter/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/webfonts/syne/stylesheet.css') }}" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendors/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/jos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/menu.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    <!-- Development CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Production CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" /> -->
</head>

<body class="bg-colorIvory">
<div class="page-wrapper flex flex-col justify-between">
    <!-- ...::: Header Section Start :::... -->
    <header class="section-header site-header is-black is-black fixed top-0 z-30 w-full py-4">
        <!-- Section Container -->
        <div class="container">
            <!-- Header Area -->
            <div class="flex items-center justify-center">
                <div class="flex items-center gap-x-6">
                    <!-- Header Logo -->
                    <a href="https://instagram.com/recodex.id" class="h-auto w-auto flex gap-4 items-center">
                        <img class="h-14 w-auto" src="{{ asset('images/small-logo.png') }}" alt="logo-buttery-white" width="121" height="24" />
                        <p class="text-4xl" style="color:#86c332">RECODEX ID</p>
                    </a>
                    <!-- Header Logo -->
                </div>
            </div>
            <!-- Header Area -->
        </div>
        <!-- Section Container -->
    </header>
    <!-- ...::: Header Section End :::... -->

    <!-- Main Wrapper Start -->
    <main class="main-wrapper">
        <!-- ...::: Coming Soon Section Start :::... -->
        <section class="section-404-error">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container">
                    <!-- Section Block -->
                    <div class="section-block mx-auto mb-10 max-w-[650px] text-center xl:max-w-[870px]">
                        <h2 class="jos mb-6">
                            Exciting things are coming soon!
                            <span>
                                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg" alt="shape-light-lime-5-arms-star" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                                </span>
                        </h2>
                        <p class="section-para mx-auto max-w-[616px]">
                            Get notified when we launch something new for you! Enter your
                            email address here and stay tuned with us.
                        </p>
                    </div>
                    <!-- Section Block -->

                    <!-- Count Down Wrapper -->
                    <div class="mb-10 grid grid-cols-2 justify-center gap-6 lg:flex">
                        <div class="rounded-[20px] border-2 border-black px-10 py-5 text-center">
                            <div class="days display-heading display-heading-1 mb-2"></div>
                            <span class="text-xl font-semibold capitalize lg:text-2xl">Days</span>
                        </div>

                        <div class="rounded-[20px] border-2 border-black px-10 py-5 text-center">
                            <div class="hours display-heading display-heading-1 mb-2"></div>
                            <span class="text-xl font-semibold capitalize lg:text-2xl">Hours</span>
                        </div>

                        <div class="rounded-[20px] border-2 border-black px-10 py-5 text-center">
                            <div class="minutes display-heading display-heading-1 mb-2"></div>
                            <span class="text-xl font-semibold capitalize lg:text-2xl">Minutes</span>
                        </div>

                        <div class="rounded-[20px] border-2 border-black px-10 py-5 text-center">
                            <div class="seconds display-heading display-heading-1 mb-2"></div>
                            <span class="text-xl font-semibold capitalize lg:text-2xl">Seconds</span>
                        </div>
                    </div>
                    <!-- Count Down Wrapper -->

                    <div class="text-center">
                        <form action="#" method="post" class="mx-auto flex max-w-[500px] justify-center">
                            <div class="relative w-full">
                                <input type="email" placeholder="Enter your email" class="w-full rounded-[50px] bg-black px-6 py-5 text-base font-bold text-white placeholder:text-white sm:pr-[170px]" required />
                                <button type="submit" class="bottom-[5px] right-[5px] top-[5px] mt-5 w-full items-center rounded-[50px] bg-colorLightLime px-7 py-4 text-center text-base font-bold text-black hover:bg-white sm:absolute sm:mt-0 sm:inline-flex sm:w-auto">
                                    Get Notified
                                </button>
                            </div>
                        </form>
                        <span class="mt-3 inline-block text-sm text-[#666666]">We do not share your information with any third party & no
                                spam*</span>
                    </div>
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </section>
        <!-- ...::: Coming Soon Section End :::... -->
    </main>
    <!--  Main Wrapper End -->

    <!-- ...::: Footer Section Start :::... -->
    <footer class="section-footer">
        <div class="bg-black">
            <!-- Footer Bottom -->
            <div class="py-[35px]">
                <!-- Section Container -->
                <div class="container">
                    <div class="flex flex-wrap justify-center gap-x-[30px] gap-y-4 lg:justify-between">
                        <a href="https://instagram.com/recodex.id" class="flex gap-4 items-center">
                            <img class="h-14 w-auto" src="{{ asset('images/small-logo.png') }}" alt="logo-buttery-white" width="121" height="24" />
                            <p class="text-4xl" style="color:#86c332">RECODEX ID</p>
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
<script src="{{ asset('') }}js/vendors/counterup.js" type="module"></script>
<script src="{{ asset('') }}js/vendors/swiper-bundle.min.js"></script>
<script src="{{ asset('') }}js/vendors/fslightbox.js"></script>
<script src="{{ asset('') }}js/vendors/jos.min.js"></script>
<script src="{{ asset('') }}js/vendors/countdown.js"></script>

<!-- Main js -->
<script src="{{ asset('') }}js/main.js"></script>
</body>

</html>
