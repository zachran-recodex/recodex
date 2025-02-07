<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-background-dark">
        <div x-data="{ isScrolled: false }"
             x-init="window.addEventListener('scroll', () => isScrolled = window.pageYOffset > 20)">

            <nav class="fixed top-0 w-full transition-all duration-300 z-50"
                 :class="{ 'bg-background-dark shadow-lg': isScrolled, 'bg-transparent': !isScrolled }">
                <div class="container mx-auto px-8 py-4 bg-background-dark rounded-b-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <h1 class="text-primary font-mono text-2xl font-bold">RECODEX ID</h1>
                        </div>
                        <div class="hidden md:flex space-x-8">
                            <a href="#services" class="text-white hover:text-primary transition">Services</a>
                            <a href="#portfolio" class="text-white hover:text-primary transition">Portfolio</a>
                            <a href="#contact" class="text-white hover:text-primary transition">Contact</a>
                        </div>
                    </div>
                </div>
            </nav>

            {{ $slot }}

            <!-- Footer -->
            <footer class="bg-background-dark text-white">
                <!-- Top Footer Section -->
                <div class="container mx-auto px-4 pt-16 pb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Company Info -->
                        <div class="space-y-4">
                            <h1 class="text-primary font-mono text-2xl font-bold">RECODEX ID</h1>
                            <p class="text-white">
                                Transforming ideas into powerful digital solutions. We create websites that drive results and deliver exceptional user experiences.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="text-white hover:text-primary transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="text-white hover:text-primary transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="text-white hover:text-primary transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="text-white hover:text-primary transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div>
                            <h4 class="text-lg text-primary font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#services" class="text-white hover:text-primary transition">Services</a>
                                </li>
                                <li>
                                    <a href="#portfolio" class="text-white hover:text-primary transition">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#contact" class="text-white hover:text-primary transition">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Services -->
                        <div>
                            <h4 class="text-lg text-primary font-semibold mb-4">Our Services</h4>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-white hover:text-primary transition">Website Development</a>
                                </li>
                                <li>
                                    <a href="#" class="text-white hover:text-primary transition">E-Commerce Solutions</a>
                                </li>
                                <li>
                                    <a href="#" class="text-white hover:text-primary transition">Web Application</a>
                                </li>
                                <li>
                                    <a href="#" class="text-white hover:text-primary transition">UI/UX Design</a>
                                </li>
                                <li>
                                    <a href="#" class="text-white hover:text-primary transition">SEO Services</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Contact Info -->
                        <div>
                            <h4 class="text-lg text-primary font-semibold mb-4">Contact Us</h4>
                            <ul class="space-y-4">
                                <li class="flex items-start space-x-3">
                                    <i class="fas fa-map-marker-alt mt-1 text-primary"></i>
                                    <span class="text-white">
                                Jl. Adhyaksa Raya No.33, Sukapura, Kec. Dayeuhkolot, Kota Bandung, Jawa Barat 40267
                            </span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-phone-alt text-primary"></i>
                                    <span class="text-white">+62 822 9814 1940</span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-primary"></i>
                                    <span class="text-white">info@recodex.id</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Bottom Footer -->
                <div class="border-t border-shark-800">
                    <div class="container mx-auto px-4 py-6">
                        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                            <p class="text-shark-400 text-sm">
                                © 2025 Recodex ID. All rights reserved.
                            </p>
                            <div class="flex space-x-6 text-sm">
                                <a href="#" class="text-shark-400 hover:text-primary transition">Privacy Policy</a>
                                <a href="#" class="text-shark-400 hover:text-primary transition">Terms of Service</a>
                                <a href="#" class="text-shark-400 hover:text-primary transition">Sitemap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
