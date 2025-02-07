<x-dashboard-layout>
    <div
        class="relative z-10 flex flex-col items-center justify-center min-h-fit py-16 rounded-lg bg-white border border-shark-200">
        <div class="w-full text-center sm:mb-0 mb-16 lg:relative fixed top-0 z-30">
            <p
                class="inline-flex px-4 h-10 lg:h-8 flex items-center justify-center text-xs sm:text-sm font-medium bg-gradient-to-br from-primary-500 lg:w-auto w-full justify-center to-primary-600 text-white lg:rounded-full">
                🤙 The coolest way to build awesome apps!</p>
        </div>
        <div class="relative mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="max-w-4xl mx-auto sm:text-center">
                <h1
                    class="mt-5 text-4xl font-bold leading-tight text-shark-900 sm:text-5xl sm:leading-tight lg:text-6xl lg:leading-tight">
                    Modern Laravel Dashboard <br class="hidden sm:block">built with the <span
                        class="bg-gradient-to-r bg-clip-text text-transparent bg-gradient-to-br from-primary-500 to-primary-600">TALL
                        stack</span></h1>
                <p class="sm:max-w-xl mx-auto mt-6 text-base leading-7 text-shark-600">Open-source dashboard
                    template
                    powered by Tailwind CSS, Alpine.js, Laravel, and Livewire. Perfect for building modern admin
                    panels and data-driven applications.</p>
                <div class="relative inline-flex mt-10 group sm:w-auto w-full">
                    <div
                        class="absolute transition-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600 rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                    </div>
                    <a href="https://github.com/zachran-recodex/dashboard.git" target="_blank"
                       class="relative sm:w-auto w-full hover:-rotate-3 transition-all ease-out duration-300 inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white duration-200 bg-shark-900 hover:bg-primary-500 hover:scale-[1.01] rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                       role="button"><span class="sm:hidden block mr-2">View</span><span
                            class="sm:block hidden mr-2">Get Started with</span> the TALL stack Dashboard</a>
                </div>
            </div>
        </div>
        <div class="mt-8 md:mt-10 w-full">
            <div class="pb-5 flex items-center justify-start px-4 sm:justify-center">
                <p class="text-center w-auto mb-10 px-4 py-2 text-sm text-shark-500 rounded-md">The TALL stack
                    consists of these <span class="sm:inline hidden">awesome</span> technologies <span
                        class="sm:inline hidden">👇</span></p>
            </div>
            <div class="w-full flex max-w-xl mx-auto">
                <div class="w-full grid grid-cols-2 gap-y-10 sm:gap-y-0 sm:grid-cols-4">
                    <a href="https://tailwindcss.com" target="_blank"
                       class="w-full h-16 relative hover:-rotate-3 group hover:scale-105 transition-all ease-out duration-300 text-center flex flex-col font-bold items-center justify-center">
                        <div class="h-12 w-full mb-2 flex items-center justify-center">
                            <x-icon-tailwind-css class="h-24 w-auto" />
                        </div>
                        <p class="group-hover:scale-100 scale-0 transition-all ease-out duration-300">Tailwind CSS
                        </p>
                    </a>
                    <a href="https://alpinejs.dev" target="_blank"
                       class="w-full h-16 hover:-rotate-3 group hover:scale-105 transition-all ease-out duration-300 text-center flex flex-col font-bold items-center justify-center">
                        <div class="h-10 w-full mb-2 flex items-center justify-center">
                            <x-icon-alpine-js class="h-24 w-auto" />
                        </div>
                        <p class="group-hover:scale-100 scale-0 transition-all ease-out duration-300">AlpineJS</p>
                    </a>
                    <a href="https://laravel.com" target="_blank"
                       class="w-full h-16 hover:-rotate-3 group hover:scale-105 transition-all ease-out duration-300 text-center flex flex-col font-bold items-center justify-center">
                        <div class="h-16 w-full mb-2 flex items-center justify-center">
                            <x-icon-laravel class="h-24 w-auto" />
                        </div>
                        <p class="group-hover:scale-100 scale-0 transition-all ease-out duration-300">Laravel</p>
                    </a>
                    <a href="https://laravel-livewire.com" target="_blank"
                       class="w-full h-16 hover:-rotate-3 group hover:scale-105 transition-all ease-out duration-300 text-center flex flex-col font-bold items-center justify-center">
                        <div class="h-16 w-full mb-2 flex items-center justify-center">
                            <x-icon-livewire class="h-24 w-auto" />
                        </div>
                        <p class="group-hover:scale-100 scale-0 transition-all ease-out duration-300">Livewire</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
