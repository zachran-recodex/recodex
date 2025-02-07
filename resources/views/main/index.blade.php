<x-main-layout>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Aurora Background Effect -->
        <div class="absolute inset-0 bg-background-dark">
            <!-- Multiple Aurora Layers -->
            <div class="absolute inset-0 aurora-layer-1"></div>
            <div class="absolute inset-0 aurora-layer-2"></div>
            <div class="absolute inset-0 aurora-layer-3"></div>
        </div>

        <!-- Content Overlay -->
        <div class="container mx-auto px-4 relative z-20">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Transform Your Vision Into Digital Reality
                </h1>
                <p class="text-lg text-white/90 mb-8">
                    We create modern, fast, and scalable websites that help your business grow.
                    Expert web development services tailored to your needs.
                </p>
                <a href="#contact"
                   class="inline-block bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-lg
                      text-lg font-semibold transition transform hover:scale-105">
                    Start Your Project
                </a>

                <livewire:run-optimize-command />

                <livewire:run-clear-command />
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-background-dark">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl text-white font-bold text-center mb-16">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $services = [
                        [
                            'icon' => 'fas fa-laptop-code',
                            'title' => 'Website Development',
                            'description' => 'Custom website development using modern technologies and best practices for optimal performance.',
                        ],
                        [
                            'icon' => 'fas fa-mobile-alt',
                            'title' => 'Responsive Design',
                            'description' => 'Mobile-first approach ensuring your website looks great on all devices and screen sizes.',
                        ],
                        [
                            'icon' => 'fas fa-search',
                            'title' => 'SEO Optimization',
                            'description' => 'Built-in SEO best practices to help your website rank better in search engines.',
                        ],
                        [
                            'icon' => 'fas fa-server',
                            'title' => 'Web Hosting',
                            'description' => 'Reliable and secure hosting solutions with 99.9% uptime guarantee.',
                        ],
                        [
                            'icon' => 'fas fa-shield-alt',
                            'title' => 'Security',
                            'description' => 'Implementation of security best practices to protect your website from threats.',
                        ],
                        [
                            'icon' => 'fas fa-chart-line',
                            'title' => 'Performance',
                            'description' => 'Optimization for fast loading speeds and excellent user experience.',
                        ],
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="p-6 rounded-xl bg-bg-light hover:shadow-xl transition">
                        <div class="w-16 h-16 bg-shark-50 rounded-lg flex items-center justify-center mb-4">
                            <i class="{{ $service['icon'] }} text-2xl text-primary"></i>
                        </div>
                        <h3 class="text-xl text-white font-semibold mb-3">{{ $service['title'] }}</h3>
                        <p class="text-shark-100">{{ $service['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-bg-light">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl text-white font-bold text-center mb-16">Our Portfolio</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $portfolioItems = [
                        [
                            'image' => 'images/portfolio/bgs.png',
                            'title' => 'Belian Ground Support',
                            'description' => 'Modern e-commerce solution with integrated payment gateway',
                            'link' => '#',
                            'category' => 'Company Profile',
                        ],
                        [
                            'image' => 'images/portfolio/alfa5.png',
                            'title' => 'Alfa5 Aviation',
                            'description' => 'Professional website for a manufacturing company',
                            'link' => '#',
                            'category' => 'Company Profile',
                        ],
                        [
                            'image' => 'images/portfolio/sagalapro.png',
                            'title' => 'Triwalana Sagala Pro',
                            'description' => 'Online learning platform for a private institution',
                            'link' => '#',
                            'category' => 'Company Profile',
                        ],
                        [
                            'image' => 'images/portfolio/narazel.png',
                            'title' => 'PT. Narazel Berkah Selamat',
                            'description' => 'Website with online ordering system for a restaurant chain',
                            'link' => '#',
                            'category' => 'Company Profile',
                        ],
                    ];
                @endphp

                @foreach($portfolioItems as $item)
                    <div class="group relative overflow-hidden rounded-xl">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                             class="w-full aspect-video object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-background-light/90 to-background-light/60
                                opacity-0 group-hover:opacity-100 transition">
                            <div class="absolute bottom-0 left-0 p-6">
                                <h3 class="text-xl font-semibold text-shark-950 mb-2">{{ $item['title'] }}</h3>
                                <p class="text-shark-950 mb-4">{{ $item['description'] }}</p>
                                <span class="inline-block px-3 py-1 bg-primary text-primary-100 rounded-full text-sm mb-4">
                                {{ $item['category'] }}
                            </span>
                                <a href="{{ $item['link'] }}"
                                   class="text-primary hover:text-shark-950 transition">
                                    View Project →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <livewire:contact-form />
</x-main-layout>
