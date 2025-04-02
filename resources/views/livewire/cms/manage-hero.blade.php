<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Hero</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">CMS</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Hero</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">Hero Content</flux:heading>
            </div>
        </flux:card.header>

        <flux:card.body>
            <div class="space-y-4 sm:space-y-6">

                <form wire:submit.prevent="save">
                    <flux:fieldset>
                        <div class="space-y-4 sm:space-y-6">

                            <flux:field>
                                <flux:label>Title</flux:label>
                                <flux:input wire:model="title" placeholder="Enter title" />
                                <flux:error name="name" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Subtitle</flux:label>
                                <flux:textarea wire:model="subtitle" rows="4" placeholder="Enter subtitle"></flux:textarea>
                                <flux:error name="subtitle" />
                            </flux:field>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6"><flux:field>
                                <flux:label>Motto</flux:label>
                                    <flux:input wire:model="motto" placeholder="Enter motto" />
                                    <flux:error name="motto" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Button Text</flux:label>
                                    <flux:input wire:model="button_text" placeholder="Enter button text" />
                                    <flux:error name="button_text" />
                                </flux:field>
                            </div>

                            <flux:field>
                                <flux:label>Image</flux:label>
                                @if ($image)
                                    <img
                                        src="{{ $image->temporaryUrl() }}"
                                        alt="Image Preview"
                                        class="h-32 w-auto"
                                    >
                                @elseif ($existing_image)
                                    <img
                                        src="{{ Storage::url($existing_image) }}"
                                        alt="Current Image"
                                        class="h-32 w-auto"
                                    >
                                @endif
                                <flux:input
                                    type="file"
                                    wire:model="image"
                                    accept="image/jpeg,image/png,image/jpg"
                                />
                                <flux:description>Max size: 2MB. Formats: JPG, JPEG, PNG</flux:description>
                                <flux:error name="image" />
                            </flux:field>

                            <div class="flex justify-end">
                                <flux:button type="submit" variant="primary" class="w-full md:w-fit" wire:loading.attr="disabled">
                                    {{ $hero_id ? 'Update' : 'Create' }}
                                </flux:button>
                            </div>
                        </div>
                    </flux:fieldset>
                </form>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>
