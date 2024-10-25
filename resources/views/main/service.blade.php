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

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Recodex</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="h-screen pt-[100px]">
        <div class="container-main flex items-center justify-center h-full">
            <div class="grid grid-cols-2 items-center">
                <div class="flex flex-col space-y-2">
                    <span class="text-xl font-semibold">Layanan</span>
                    <h2 class="text-7xl font-bold leading-tight uppercase">Solusi <span
                            class="text-recodex underline">Multimedia</span> untuk Inovasi Tanpa Batas</h2>
                    <a class="border border-recodex px-4 py-1 text-recodex rounded-lg text-lg w-[200px] text-center"
                        href="#">
                        Tentang Kami
                    </a>
                </div>
                <img src="{{ asset('images/illustration.png') }}" alt="" class="h-full w-auto">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-main">
        <div class="container-main flex flex-col space-y-8 justify-center">
            <h3 class="text-recodex text-4xl text-center font-semibold px-4 py-1">Tim Terbaik</h3>
            <div class="grid grid-cols-4 gap-8">
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/orang.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Fullstack Developer</span>
                        <h5 class="text-2xl">Zachran Razendra</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover object-top"
                        src="{{ asset('images/team/orang.jpg') }}" alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Sales & Marketing</span>
                        <h5 class="text-2xl">Hafizh Pandu</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/orang.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Graphic Designer</span>
                        <h5 class="text-2xl">John Duey Subade</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/orang.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">3D Designer</span>
                        <h5 class="text-2xl">Sultan Abe</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/rai.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">UI/UX Designer</span>
                        <h5 class="text-2xl">Raista Firdaus</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/orang.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Front-End Developer</span>
                        <h5 class="text-2xl">Dicki Hernawan</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/adnin.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Quality Assurance</span>
                        <h5 class="text-2xl">Adnin Farizie</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/orang.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Graphic Designer</span>
                        <h5 class="text-2xl">Duta Tangkoh</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/orang.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Photograper</span>
                        <h5 class="text-2xl">Rizky Abimanyu</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/fabian.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">UI/UX Designer</span>
                        <h5 class="text-2xl">Ahmad Fabiansyah</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center space-y-4 bg-white-recodex text-black-recodex h-auto w-full rounded-lg">
                    <img class="w-full h-[270px] rounded-t-lg object-cover" src="{{ asset('images/team/oky.jpg') }}"
                        alt="">
                    <div class="px-8 pb-8 flex flex-col space-y-4 justify-center items-center">
                        <span class="text-recodex">Architecture Drafter</span>
                        <h5 class="text-2xl">Oky Sulaeman</h5>
                        <ul class="flex gap-4 text-recodex">
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </li>
                            <li class="flex justify-center items-center bg-recodex/10 h-10 w-10 rounded-lg">
                                <a href="">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @stack('before-scripts')

    @stack('after-scripts')
@endsection
