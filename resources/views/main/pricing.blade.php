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
                        <h1>Pricing Plans</h1>
                        <!-- Breadcrumb Nav -->
                        <ul class="breadcrumb-nav">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Pricing Plans</li>
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

    <!--...::: Pricing Section Start :::... -->
    <section class="section-pricing">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Clients are always satisfied with
                        <span>
                            us
                            <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Pricing Area -->
                <div>
                    <!-- Pricing Button Block -->
                    <div class="my-[50px] flex flex-row items-center justify-center gap-6">
                        <span class="font-bold">Billed Monthly</span>

                        <!-- Toggle Button -->
                        <label for="toggle" class="flex cursor-pointer items-center">
                            <!-- toggle -->
                            <span class="relative inline-block h-[35px] w-[70px] rounded-[35px] border border-black">
                                <!-- hidden input -->
                                <input id="toggle" type="checkbox" class="peer hidden" onclick="toggleSwitch()" />
                                <!-- dot -->
                                <span
                                    class="toggle_dot absolute left-[5px] top-1/2 h-[25px] w-[25px] -translate-y-1/2 rounded-full bg-black transition-all duration-300 peer-checked:translate-x-[33px]"></span>
                            </span>
                        </label>
                        <!-- Toggle Button -->
                        <span class="font-bold">Billed Yearly</span>
                    </div>
                    <!-- Pricing Button Block -->

                    <!-- Pricing List -->
                    <ul class="grid grid-cols-1 gap-x-6 gap-y-10 md:grid-cols-2 xl:grid-cols-3">
                        <!-- Pricing Item -->
                        <li class="jos flex flex-col rounded-[20px] border-2 border-black p-[30px]"
                            data-jos_animation="flip-left">
                            <!-- Price Top Block -->
                            <div class="flex flex-col gap-y-6">
                                <h5>Web Design Package</h5>
                                <div>
                                    <span class="month display-heading display-heading-2">$299</span>
                                    <span class="annual display-heading display-heading-2 hidden">$3200</span>
                                </div>
                                <p>
                                    Web design packages offered a range of services and
                                    features to create websites
                                </p>
                            </div>
                            <!-- Price Top Block -->
                            <div class="horizontal-line my-6 bg-[#E6E6E6]"></div>
                            <!-- Price Info -->
                            <ul
                                class="mb-[30px] flex flex-col gap-y-4 text-lg font-semibold leading-[1.42] lg:text-[21px]">
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Consultation & Discovery
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Responsive Design
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    E-commerce Integration
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Custom Web Design
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Testing and Quality Assurance
                                </li>
                            </ul>
                            <!-- Price Info -->
                            <a href="#" class="btn-outline-black mt-auto block text-center">Select the package</a>
                        </li>
                        <!-- Pricing Item -->
                        <!-- Pricing Item -->
                        <li class="jos flex flex-col rounded-[20px] border-2 border-black p-[30px]"
                            data-jos_animation="flip-left">
                            <!-- Price Top Block -->
                            <div class="flex flex-col gap-y-6">
                                <h5>UX/UI Package</h5>
                                <div>
                                    <span class="month display-heading display-heading-2">$499</span>
                                    <span class="annual display-heading display-heading-2 hidden">$5000</span>
                                </div>
                                <p>
                                    UX/UI package offered a set of services aimed at
                                    designing user-friendly UI/UX
                                </p>
                            </div>
                            <!-- Price Top Block -->
                            <div class="horizontal-line my-6 bg-[#E6E6E6]"></div>
                            <!-- Price Info -->
                            <ul
                                class="mb-[30px] flex flex-col gap-y-4 text-lg font-semibold leading-[1.42] lg:text-[21px]">
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Information Architecture
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Wireframing & Prototyping
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Usability Testing
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Visual Design &
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    User Interface (UI) Design
                                </li>
                            </ul>
                            <!-- Price Info -->
                            <a href="#" class="btn-outline-black mt-auto block text-center">Select the package</a>
                        </li>
                        <!-- Pricing Item -->
                        <!-- Pricing Item -->
                        <li class="jos flex flex-col rounded-[20px] border-2 border-black p-[30px]"
                            data-jos_animation="flip-left">
                            <!-- Price Top Block -->
                            <div class="flex flex-col gap-y-6">
                                <h5>Branding Package</h5>
                                <div>
                                    <span class="month display-heading display-heading-2">$299</span>
                                    <span class="annual display-heading display-heading-2 hidden">$3200</span>
                                </div>
                                <p>
                                    Branding package typically includes a comprehensive set
                                    of brand's identity
                                </p>
                            </div>
                            <!-- Price Top Block -->
                            <div class="horizontal-line my-6 bg-[#E6E6E6]"></div>
                            <!-- Price Info -->
                            <ul
                                class="mb-[30px] flex flex-col gap-y-4 text-lg font-semibold leading-[1.42] lg:text-[21px]">
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Brand Guidelines
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Stationery & Website Design
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    E-commerce Integration
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Social Media Assets
                                </li>
                                <li
                                    class="relative pl-11 before:absolute before:left-0 before:top-0 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lime-lemon-round-check.svg)]">
                                    Signage & Packaging Design
                                </li>
                            </ul>
                            <!-- Price Info -->
                            <a href="#" class="btn-outline-black mt-auto block text-center">Select the package</a>
                        </li>
                        <!-- Pricing Item -->
                    </ul>
                    <!-- Pricing List -->
                </div>
                <!-- Pricing Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!--...::: Pricing Section End :::... -->

    <!-- ...::: Text Slider Section Start :::... -->
    <div class="section-text-slider">
        <div class="bg-black py-5">
            <div class="horizontal-slide-from-right-to-left flex items-center gap-x-6">
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
                <!-- Text Slider Item Text-->
                <div
                    class="whitespace-nowrap font-syne text-[35px] font-bold leading-none tracking-[1px] text-colorLightLime">
                    Let's create new experiences
                </div>
                <!-- Text Slider Item Text -->
                <!-- Text Slider Separator Icon -->
                <div class="h-10 min-w-[42px]">
                    <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                        alt="shape-light-lime-5-arms-star" width="74" height="70" class="h-10 w-auto" />
                </div>
                <!-- Text Slider Separator Icon -->
            </div>
        </div>
    </div>
    <!-- ...::: Text Slider Section End :::... -->

    <!-- ...::: FAQ Section Start :::... -->
    <section class="section-faq">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Process Area -->
                <div class="grid grid-cols-1 items-center gap-x-6 gap-y-10 lg:grid-cols-2">
                    <!-- Process Area Left Block - Section Block -->
                    <div class="section-block text-center lg:text-start">
                        <h2 class="jos">
                            Read our FAQ
                            <span>
                                <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                    alt="shape-light-lime-5-arms-star" width="74" height="70"
                                    class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
                            for clarification
                        </h2>
                        <div class="jos mb-16 mt-6">
                            <p class="section-para">
                                We understand that you considering our services, that's
                                why we’ve curated a collection of frequently asked
                                questions.
                            </p>
                        </div>
                        <a href="contact.html" class="btn-primary relative justify-start bg-black pr-20 text-white">
                            Contact us
                            <span
                                class="absolute right-[5px] inline-flex h-[50px] w-[50px] items-center justify-center rounded-[50%] bg-colorLightLime"><img
                                    src="{{ asset('') }}img/icons/icon-black-arrow-right.svg"
                                    alt="icon-black-arrow-right" width="34" height="28" /></span></a>
                    </div>
                    <!-- Process Area Left Block - Section Block -->

                    <!-- FAQ List -->
                    <ul class="flex flex-col gap-y-10">
                        <!-- FAQ Item -->
                        <li class="jos flex flex-col gap-y-4">
                            <!-- FAQ Header Block -->
                            <h4
                                class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                Can I buy multiple plans?
                            </h4>
                            <!-- FAQ Header Block -->
                            <!-- FAQ Body -->
                            <div class="ml-10 text-[#0C0C0C]">
                                <p>
                                    Yes, you can try us for free for 30 days. Our friendly
                                    team will work with you to get you up and running as
                                    soon as possible.
                                </p>
                            </div>
                            <!-- FAQ Body -->
                        </li>
                        <!-- FAQ Item -->
                        <!-- FAQ Item -->
                        <li class="jos flex flex-col gap-y-4">
                            <!-- FAQ Header Block -->
                            <h4
                                class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                What is the cancelation policy?
                            </h4>
                            <!-- FAQ Header Block -->
                            <!-- FAQ Body -->
                            <div class="ml-10 text-[#0C0C0C]">
                                <p>
                                    The cancellation policy refers to the rules and
                                    guidelines established by a business regarding the
                                    cancellation of services, products.
                                </p>
                            </div>
                            <!-- FAQ Body -->
                        </li>
                        <!-- FAQ Item -->
                        <!-- FAQ Item -->
                        <li class="jos flex flex-col gap-y-4">
                            <!-- FAQ Header Block -->
                            <h4
                                class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url(../img/icons/icon-lightlime-question.svg)]">
                                How much does design work cost?
                            </h4>
                            <!-- FAQ Header Block -->
                            <!-- FAQ Body -->
                            <div class="ml-10 text-[#0C0C0C]">
                                <p>
                                    The cost of our design services varies depending on the
                                    scope of the project. We provide customized quotes after
                                    discussing requirements.
                                </p>
                            </div>
                            <!-- FAQ Body -->
                        </li>
                        <!-- FAQ Item -->
                    </ul>
                    <!-- FAQ List -->
                </div>
                <!-- Process Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: FAQ Section End :::... -->

    <!-- Horizontal Line -->
    <div class="horizontal-line bg-[#e6e6e6]"></div>
    <!-- Horizontal Line -->

    <!-- ...::: Testimonial Section Start :::... -->
    <section class="section-testimonial">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container">
                <!-- Section Block -->
                <div
                    class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                    <h2 class="jos">
                        Clients are always satisfied with
                        <span>
                            us
                            <img src="{{ asset('') }}img/elemnts/shape-light-lime-5-arms-star.svg"
                                alt="shape-light-lime-5-arms-star" width="74" height="70"
                                class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                        </span>
                    </h2>
                </div>
                <!-- Section Block -->

                <!-- Testimonial List -->
                <ul class="grid grid-cols-1 gap-x-6 gap-y-[30px] md:grid-cols-2">
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Super customer service!</h4>
                            <p class="mb-[30px]">
                                Excellent customer service and I was really impressed and
                                happy with my purchase especially as it was a last minute
                                order which got to me in time, and when it arrived I was
                                very happy with the design and size and so was the
                                recipient.
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-1.png"
                                        alt="testimonial-user-img-1" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                    William Jack
                                    <span class="font-normal">Founder@XYZ</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0.3">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Exceptional creativity and vision</h4>
                            <p class="mb-[30px]">
                                Working with Mthemeus was a game-changer for our brand.
                                Their exceptional creativity & vision breathed new life
                                into our visual. The logo they designed perfectly captures
                                our essence & has become instantly recognizable. We
                                couldn't be happier with the results!
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-2.png"
                                        alt="testimonial-user-img-2" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                    Smith Align
                                    <span class="font-normal">Businessman</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0.6">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Innovative and professional</h4>
                            <p class="mb-[30px]">
                                I can't say enough good things about them. Their team is
                                not only incredibly talented but also highly professional.
                                They listened to our ideas and brought them to life in
                                ways we couldn't have imagined. Their innovative approach
                                and dedication to our project.
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-3.png"
                                        alt="testimonial-user-img-3" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="text- leading-nonelg flex-1 font-syne font-bold -tracking-[0.5px] lg:text-[21px]">
                                    Milano Joe
                                    <span class="font-normal">Creative Director</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <li class="jos" data-jos_delay="0.9">
                        <div
                            class="flex h-full flex-col rounded-[20px] border-2 border-black px-[30px] py-6 transition-all duration-300 hover:shadow-[5px_5px_0_0] hover:shadow-black">
                            <div class="mb-8 flex gap-x-2">
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                                <img src="{{ asset('') }}img/icons/icon-black-star.svg" alt="icon-black-star"
                                    width="37" height="35" />
                            </div>
                            <h4 class="mb-5">Transformed our brand</h4>
                            <p class="mb-[30px]">
                                Our partnership with Mthemeus transformed our brand from
                                ordinary to extraordinary. Their branding expertise and
                                meticulous design work elevated our marketing materials to
                                a whole new level. Our customers have taken notice, and
                                boost in brand recognition.
                            </p>
                            <div class="mt-auto flex items-center gap-3">
                                <div class="h-[70px] w-[70px] overflow-hidden rounded-[50%] border-2 border-black">
                                    <img src="{{ asset('') }}img/images/th-1/testimonial-user-img-4.png"
                                        alt="testimonial-user-img-4" width="64" height="64"
                                        class="h-full w-full object-cover" />
                                </div>

                                <div
                                    class="flex-1 font-syne text-lg font-bold leading-none -tracking-[0.5px] lg:text-[21px]">
                                    Danial Mark
                                    <span class="font-normal">Marketing Director</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Testimonial Item -->
                </ul>
                <!-- Testimonial List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </section>
    <!-- ...::: Testimonial Section End :::... -->
</x-layouts.main>
