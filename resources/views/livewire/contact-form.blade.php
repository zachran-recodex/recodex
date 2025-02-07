<section id="contact" class="py-20 bg-background-dark text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Get In Touch</h2>

            <form wire:submit.prevent="submit" class="space-y-6">
                @if($success)
                    <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6">
                        Thank you for your message! We'll get back to you soon.
                    </div>
                @endif

                <div>
                    <label for="name" class="block text-sm font-medium text-shark-200 mb-2">Name</label>
                    <input type="text" id="name" wire:model.lazy="name"
                           class="w-full px-4 py-3 rounded-lg border border-shark-200 focus:ring-2
                                  focus:ring-primary focus:border-primary">
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-shark-200 mb-2">Email</label>
                    <input type="email" id="email" wire:model.lazy="email"
                           class="w-full px-4 py-3 rounded-lg border border-shark-200 focus:ring-2
                                  focus:ring-primary focus:border-primary">
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-shark-200 mb-2">Message</label>
                    <textarea id="message" wire:model.lazy="message" rows="5"
                              class="w-full px-4 py-3 rounded-lg border border-shark-200 focus:ring-2
                                     focus:ring-primary focus:border-primary"></textarea>
                    @error('message')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-4
                               rounded-lg transition transform hover:scale-105">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>
