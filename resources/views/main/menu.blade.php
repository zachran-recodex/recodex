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

    <title>Recodex - Menu</title>
@endsection

@section('content')
    <!-- Section: Menu -->
    <section class="pt-[200px]">
        <div class="container-main">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Tentang Kami</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Layanan</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Portofolio</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Klien</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Blog</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Biaya</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Testimoni Klien</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Karir</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">FAQ</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Penghargaan</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Events & Workshops</h2>
                </div>
                <div class="bg-white-recodex p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-recodex mb-2">Partner</h2>
                </div>

            </div>
        </div>
    </section>

    @stack('before-scripts')
    @stack('after-scripts')
@endsection
