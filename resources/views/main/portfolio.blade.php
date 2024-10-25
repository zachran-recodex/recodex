@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Recodex">
    <meta name="keywords" content="Multimedia Company">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <title>Recodex</title>
@endsection

@section('content')
    <div class="container-main flex gap-8 pt-[200px] text-black-recodex">

        <!-- Sidebar -->
        <aside class="bg-white-recodex rounded-3xl p-8 w-[700px] h-fit">
            <div class="flex flex-col justify-center items-center gap-3">
                <figure class="flex h-[150px] w-[150px] items-center border rounded-3xl overflow-hidden">
                    <img class="object-cover h-full w-full" src="{{ asset('images/team/orang.jpg') }}" alt="">
                </figure>
                <div class="flex flex-col justify-center space-y-2 items-center">
                    <p class="px-4 py-1 border rounded">Direktur</p>
                    <h2 class="text-2xl font-bold">Zachran Razendra</h2>
                </div>
            </div>

            <hr class="my-4">

            <div class="flex flex-col space-y-8">
                <ul class="grid grid-cols-1 gap-4">
                    <li class="flex items-center gap-4">
                        <div class="border p-2">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="w-full">
                            <p class="mb-1">Email</p>
                            <a href="">zachranraze@recodex.id</a>
                        </div>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="border p-2">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="w-full">
                            <p class="mb-1">Phone</p>
                            <a href="">+62 822 9814 1940</a>
                        </div>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="border p-2">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="w-full">
                            <p class="mb-1">Birthdate</p>
                            <a href="">15 Oktober 2001</a>
                        </div>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="border p-2">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="w-full">
                            <p class="mb-1">Location</p>
                            <a href="">Jakarta Selatan, Indonesia</a>
                        </div>
                    </li>
                </ul>
                <ul class="flex justify-center items-center gap-4">
                    <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="relative bg-white-recodex rounded-3xl p-8">
            <!-- Bottom Navigation -->
            <nav class="bg-black-recodex absolute top-0 right-0 w-2/3 border rounded-tr-3xl rounded-bl-3xl">
                <ul class="text-recodex flex flex-row justify-between items-center px-16">
                    <li><button class="py-5 px-2" data-nav-link>About</button></li>
                    <li><button class="py-5 px-2" data-nav-link>Resume</button></li>
                    <li><button class="py-5 px-2" data-nav-link>Portfolio</button></li>
                    <li><button class="py-5 px-2" data-nav-link>Contact</button></li>
                </ul>
            </nav>

            <!-- About Section -->
            <article data-page="about">
                <header class="mb-8">
                    <h2 class="text-4xl">About Me</h2>
                </header>
                <div class="flex flex-col space-y-8">
                    <section class="">
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor non quam nostrum. Perspiciatis,
                            rerum
                            necessitatibus. Commodi, soluta modi molestias cum pariatur, id cupiditate in voluptates ad odio
                            dolorem debitis ex.
                        </p>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sit libero eum
                            nemo consequatur.
                            Voluptas
                            fugiat nihil dignissimos repudiandae, cum qui aliquid quod assumenda corrupti dicta accusantium
                            velit
                            sed labore.</p>
                    </section>
                    <section>
                        <h3 class="text-2xl mb-4">What I'm Doing</h3>
                        <ul class="grid grid-cols-2 gap-5">
                            <li class="relative p-5 rounded-lg shadow z-[1]">
                                <div><img src="" alt=""></div>
                                <div>
                                    <h4>Web Design</h4>
                                    <p>The most modern and high-quality design made at a professional level.</p>
                                </div>
                            </li>
                            <li class="relative p-5 rounded-lg shadow z-[1]">
                                <div><img src="" alt=""></div>
                                <div>
                                    <h4>Web Design</h4>
                                    <p>The most modern and high-quality design made at a professional level.</p>
                                </div>
                            </li>
                            <li class="relative p-5 rounded-lg shadow z-[1]">
                                <div><img src="" alt=""></div>
                                <div>
                                    <h4>Web Design</h4>
                                    <p>The most modern and high-quality design made at a professional level.</p>
                                </div>
                            </li>
                            <li class="relative p-5 rounded-lg shadow z-[1]">
                                <div><img src="" alt=""></div>
                                <div>
                                    <h4>Web Design</h4>
                                    <p>The most modern and high-quality design made at a professional level.</p>
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
            </article>
        </div>
    </div>

    @stack('before-scripts')
    @stack('after-scripts')
@endsection
