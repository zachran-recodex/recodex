@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Recodex - Your Trusted Multimedia Partner">
    <meta name="keywords"
        content="Multimedia Company, Web Development, UI/UX Design, Photography, Videography, 3D Design, Game Development, App Development">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Recodex - Contact</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="z-0 pt-[106px] h-[350px]">
        <div class="h-full bg-white-recodex flex flex-col justify-center items-center">
            <h3 class="text-4xl text-recodex">
                KONTAK
            </h3>
            <p class="text-recodex">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            <nav class="flex text-recodex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#" class="ms-1 text-sm font-medium md:ms-2">Projects</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium md:ms-2">Flowbite</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Section: Contact Us -->
    <section class="py-main">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-recodex mb-4">Contact Us</h1>
                <p class="text-gray-600">We would love to hear from you. Please reach out using the form below or contact us
                    directly.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-2xl font-bold text-recodex mb-2">Our Office</h2>
                        <p class="text-gray-700">Jl. Example No. 12, Jakarta, Indonesia</p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-recodex mb-2">Phone Numbers</h2>
                        <p class="text-gray-700">Phone 1: +62 822-9814-1940</p>
                        <p class="text-gray-700">Phone 2: +62 812-3456-7890</p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-recodex mb-2">Emails</h2>
                        <p class="text-gray-700">Email 1: info@recodex.id</p>
                        <p class="text-gray-700">Email 2: support@recodex.id</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div>
                    <h2 class="text-2xl font-bold text-recodex mb-4">Send us a message</h2>
                    <form action="" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-recodex">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" name="email" id="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-recodex">
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                            <textarea name="message" id="message" rows="5" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-recodex"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="px-6 py-2 bg-recodex text-white font-bold rounded-lg shadow hover:bg-[#1f5d7e]">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @stack('before-scripts')
    @stack('after-scripts')
@endsection
