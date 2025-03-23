<div class="grid auto-rows-min gap-6 lg:grid-cols-3">
    <flux:card class="col-span-2">
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Input Data</flux:heading>
        </flux:card.header>

        <flux:card.body>
            <form wire:submit="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">

                        {{-- Title --}}
                        <flux:input label="Title" wire:model="title" />

                        {{-- Subtitle --}}
                        <flux:textarea label="Subtitle" wire:model="subtitle" rows="3" />

                        <div class="grid gap-6 sm:grid-cols-2">
                            {{-- Motto --}}
                            <flux:input label="Motto" wire:model="motto" />

                            {{-- Button Text --}}
                            <flux:input label="Button Text" wire:model="button_text" />
                        </div>

                        {{-- Image --}}
                        <flux:field>
                            <flux:label>Image</flux:label>
                            <flux:input type="file" wire:model="image" accept="image/*" />
                            <flux:error name="image" />

                            <flux:description>*recommended size: 485x540</flux:description>

                        </flux:field>

                    </div>
                </flux:fieldset>

                <div class="flex justify-end">
                    {{-- Submit Button --}}
                    <flux:button type="submit" variant="primary" class="cursor-pointer w-fit">Update</flux:button>
                </div>
            </form>
        </flux:card.body>

    </flux:card>

    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Preview</flux:heading>
        </flux:card.header>

        <flux:card.body>
            <div class="space-y-6">
                <div>
                    <flux:heading>Image</flux:heading>
                    @if ($image && is_object($image))
                        <img src="{{ $image->temporaryUrl() }}" alt="Hero image preview"
                            class="w-full h-auto mt-2 rounded-lg object-cover border border-neutral-200">
                    @elseif ($hero && $hero->image)
                        <img src="{{ Storage::url($hero->image) }}" alt="Hero image"
                            class="w-full h-auto mt-2 rounded-lg object-cover border border-neutral-200">
                    @else
                        <div class="w-full h-32 bg-gray-100 flex items-center justify-center rounded-lg border border-neutral-200">
                            <span class="text-gray-400">No image uploaded</span>
                        </div>
                    @endif
                </div>

                <div>
                    <flux:heading>Title</flux:heading>
                    <flux:subheading>{{ $title ?: 'Not set' }}</flux:subheading>
                </div>

                <div>
                    <flux:heading>Subtitle</flux:heading>
                    <flux:subheading>{{ $subtitle ?: 'Not set' }}</flux:subheading>
                </div>

                <div>
                    <flux:heading>Motto</flux:heading>
                    <flux:subheading>{{ $motto ?: 'Not set' }}</flux:subheading>
                </div>

                <div>
                    <flux:heading>Button Text</flux:heading>
                    <flux:subheading>{{ $button_text ?: 'Not set' }}</flux:subheading>
                </div>
            </div>
        </flux:card.body>
    </flux:card>
</div>
