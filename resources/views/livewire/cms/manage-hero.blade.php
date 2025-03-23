<flux:card>
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
                        @if($currentImage)
                            <div class="mb-3">
                                <img src="{{ Storage::url($currentImage) }}" alt="Current Hero Image" class="w-48 h-auto">
                            </div>
                        @endif
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
