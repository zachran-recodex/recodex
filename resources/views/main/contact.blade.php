@section('meta_tag')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Konsultasikan kebutuhan website Anda dengan tim profesional Recodex ID. Kami siap membantu mewujudkan website impian untuk bisnis Anda.">
    <meta name="keywords" content="konsultasi website, jasa pembuatan website, web development, kontak recodex, bantuan website, konsultasi online">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Konsultasi Website - Recodex ID">
    <meta property="og:description" content="Konsultasikan kebutuhan website Anda dengan tim profesional Recodex ID. Kami siap membantu mewujudkan website impian untuk bisnis Anda.">
    <meta property="og:image" content="{{ asset('images/hero.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Konsultasi Website - Recodex ID">
    <meta name="twitter:description" content="Konsultasikan kebutuhan website Anda dengan tim profesional Recodex ID. Kami siap membantu mewujudkan website impian untuk bisnis Anda.">
    <meta name="twitter:image" content="{{ asset('images/hero.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Konsultasi - Jasa Pembuatan Website Recodex ID</title>
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
                        <h1>Konsultasi</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li>Konsultasi</li>
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

    <!-- ...::: Contact From Section Start :::... -->
    <section class="section-contact-form">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Contact Form Area -->
                <div class="grid grid-cols-1 items-end gap-x-20 gap-y-10 lg:grid-cols-[1fr_minmax(0,420px)]">
                    <!-- Contact Form Left Block - Form-->
                    <div class="jos" data-jos_animation="fade-left">
                        <!-- Section Block -->
                        <div class="section-block mb-10 md:mb-[60px] xl:mb-20">
                            <h2>
                                Konsultasikan Pembuatan Website
                            </h2>
                        </div>
                        <!-- Section Block -->

                        <!-- Contact Form -->
                        <form action="{{ route('contact.store') }}" method="post"
                            class="flex flex-col gap-y-6 rounded-[30px] border border-black p-[30px]">
                            @csrf
                            <!-- Form Group -->
                            <div>
                                <label for="contact-name" class="mb-3 block pl-6 text-base font-bold">Your name</label>
                                <input type="text" name="contact-name" id="contact-name"
                                    class="w-full rounded-[50px] border border-black bg-colorIvory px-8 py-4 text-base font-bold"
                                    required />
                            </div>
                            <!-- Form Group -->
                            <!-- Form Group -->
                            <div>
                                <label for="contact-email" class="mb-3 block pl-6 text-base font-bold">Email
                                    Address</label>
                                <input type="email" name="contact-email" id="contact-email"
                                    class="w-full rounded-[50px] border border-black bg-colorIvory px-8 py-4 text-base font-bold"
                                    required />
                            </div>
                            <!-- Form Group -->
                            <!-- Form Group -->
                            <div>
                                <label for="contact-phone" class="mb-3 block pl-6 text-base font-bold">Phone No</label>
                                <input type="tel" name="contact-phone" id="contact-phone"
                                    class="w-full rounded-[50px] border border-black bg-colorIvory px-8 py-4 text-base font-bold"
                                    required />
                            </div>
                            <!-- Form Group -->
                            <!-- Form Group -->
                            <div>
                                <label for="contact-massage" class="mb-3 block pl-6 text-base font-bold">Write your
                                    message here...</label>
                                <textarea name="contact-massage" id="contact-massage"
                                    class="min-h-52 w-full rounded-[20px] border border-black bg-colorIvory px-8 py-4 text-base font-bold"></textarea>
                            </div>
                            <!-- Form Group -->
                            <!-- Form Group -->
                            <div>
                                <button type="submit" class="btn-black">
                                    Send Message
                                </button>
                            </div>
                            <!-- Form Group -->
                        </form>
                        <!-- Contact Form -->
                    </div>
                    <!-- Contact Form Left Block - Form-->

                    <!-- Contact Form Right Block - Image-->
                    <div class="jos hidden overflow-hidden rounded-[20px] border-2 border-black lg:block lg:border-[5px]"
                        data-jos_animation="fade-right">
                        <img src="{{ asset('images/konsultasi.png') }}" alt="contact-img" width="456"
                            height="731" class="h-full w-full object-cover" />
                    </div>
                    <!-- Contact Form Right Block - Image-->
                </div>
                <!-- Contact Form Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Contact From Section End :::... -->

    <!-- ...::: Contact Info Section Start :::... -->
    <section class="section-contact-info">
        <!-- Section Space -->
        <div class="section-space-bottom">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[866px]">
                    <h2 class="jos">
                        Contact Information
                        <span>
                            <img src="{{ asset('img/elemnts/shape-light-lime-5-arms-star.svg') }}"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Contact Info List -->
                <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                    <!-- Contact Info Item -->
                    <li class="jos flex gap-x-6 rounded-[10px] bg-black px-5 py-[30px] xl:px-8 xxl:px-[70px]">
                        <div class="h-auto w-10">
                            <img src="{{ asset('img/icons/icon-buttery-white-phone.svg') }}"
                                alt="icon-buttery-white-phone" width="30" height="30" class="h-auto w-10" />
                        </div>
                        <div class="flex-1">
                            <span class="mb-3 block text-xl font-bold text-colorButteryWhite xl:text-2xl">Call us</span>
                            <div class="flex flex-col text-lg leading-[1.42] lg:text-[21px]">
                                <a href="tel:+6282298141940"
                                    class="text-colorButteryWhite hover:text-colorLightLime">+62 822-9814-1940</a>
                            </div>
                        </div>
                    </li>
                    <!-- Contact Info Item -->
                    <!-- Contact Info Item -->
                    <li class="jos flex gap-x-6 rounded-[10px] bg-black px-5 py-[30px] xl:px-8 xxl:px-[70px]">
                        <div class="h-auto w-10">
                            <img src="{{ asset('img/icons/icon-buttery-white-mail.svg') }}"
                                alt="icon-buttery-white-mail" width="40" height="40" class="h-auto w-10" />
                        </div>
                        <div class="flex-1">
                            <span class="mb-3 block text-xl font-bold text-colorButteryWhite xl:text-2xl">Email
                                us</span>
                            <div class="flex flex-col text-lg leading-[1.42] lg:text-[21px]">
                                <a href="mailto:info@recodex.id"
                                    class="text-colorButteryWhite hover:text-colorLightLime">info@recodex.id</a>
                            </div>
                        </div>
                    </li>
                    <!-- Contact Info Item -->
                    <!-- Contact Info Item -->
                    <li class="jos flex gap-x-6 rounded-[10px] bg-black px-5 py-[30px] xl:px-8 xxl:px-[70px]">
                        <div class="h-auto w-10">
                            <img src="{{ asset('img/icons/icon-buttery-white-location-marker.svg') }}"
                                alt="icon-buttery-white-location-marker" width="40" height="40"
                                class="h-auto w-10" />
                        </div>
                        <div class="flex-1">
                            <span class="mb-3 block text-xl font-bold text-colorButteryWhite xl:text-2xl">Office
                                address</span>
                            <div class="flex flex-col text-lg leading-[1.42] lg:text-[21px]">
                                <address class="not-italic text-colorButteryWhite">
                                    Buah Batu, Bandung
                                </address>
                            </div>
                        </div>
                    </li>
                    <!-- Contact Info Item -->
                </ul>
                <!-- Contact Info List -->

                <!-- Location Map Block -->
                <!--
                <div class="jos mt-10 md:mt-[60px] lg:mt-20">
                    <div
                        class="h-96 w-full overflow-hidden rounded-[20px] border-2 border-black lg:h-[600px] lg:rounded-[30px] lg:border-[5px]">
                        <iframe class="h-full w-full"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
                -->
                <!-- Location Map Block -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Contact Info Section End :::... -->

    <!-- ...::: FAQ Section Start :::... -->
    <section class="section-faq">
        <!-- Section Space -->
        <div class="section-space-bottom">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        These FAQs help clients learn about us
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- FAQ Area -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-2">
                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        @forelse ($faqs->take(3) as $faq)
                            <!-- FAQ Item -->
                            <li class="jos flex flex-col gap-y-4">
                                <!-- FAQ Header Block -->
                                <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                    {{ $faq->question }}
                                </h4>
                                <!-- FAQ Header Block -->
                                <!-- FAQ Body -->
                                <div class="ml-10 text-[#0C0C0C]">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                                <!-- FAQ Body -->
                            </li>
                            <!-- FAQ Item -->
                        @empty
                            <!-- FAQ Item -->
                            <li class="jos flex flex-col gap-y-4">
                                <!-- FAQ Header Block -->
                                <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                    No FAQ Available
                                </h4>
                                <!-- FAQ Header Block -->
                                <!-- FAQ Body -->
                                <div class="ml-10 text-[#0C0C0C]">
                                    <p>
                                        Currently, there are no FAQs available.
                                    </p>
                                </div>
                                <!-- FAQ Body -->
                            </li>
                            <!-- FAQ Item -->
                        @endforelse
                    </ul>
                    <!-- FAQ List -->

                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        @forelse ($faqs->skip(3)->take(3) as $faq)
                            <!-- FAQ Item -->
                            <li class="jos flex flex-col gap-y-4">
                                <!-- FAQ Header Block -->
                                <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                    {{ $faq->question }}
                                </h4>
                                <!-- FAQ Header Block -->
                                <!-- FAQ Body -->
                                <div class="ml-10 text-[#0C0C0C]">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                                <!-- FAQ Body -->
                            </li>
                            <!-- FAQ Item -->
                        @empty
                            <!-- No empty state needed for the second column -->
                        @endforelse
                    </ul>
                    <!-- FAQ List -->
                </div>
                <!-- FAQ Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: FAQ Section End :::... -->
</x-layouts.main>
