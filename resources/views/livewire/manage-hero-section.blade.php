<div class="grid auto-rows-min gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 bg-zinc-50 sm:rounded-lg relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div class="py-3 px-6 border-b border-neutral-200">
            <flux:heading size="lg" class="font-semibold">Input Form</flux:heading>
        </div>

        <form wire:submit.prevent="save" class="p-6 flex flex-col space-y-6">
            <flux:fieldset>
                <div class="space-y-6">

                    {{-- Title --}}
                    <flux:input label="Title" wire:model="title" />

                    {{-- Subtitle --}}
                    <flux:textarea
                        label="Subtitle"
                        wire:model="subtitle"
                        rows="3"
                    />

                    <div class="grid gap-6 sm:grid-cols-2">
                        {{-- Motto --}}
                        <flux:input label="Motto" wire:model="motto" />

                        {{-- Button Text --}}
                        <flux:input label="Button Text" wire:model="button_text" />
                    </div>

                    {{-- Image Upload --}}
                    <flux:field>
                        <flux:label>Image</flux:label>

                        <flux:input type="file" wire:model="temp_image" />

                        <flux:description>*recommended size: 485x540</flux:description>

                        <flux:error name="temp_image" />
                    </flux:field>
                </div>
            </flux:fieldset>

            {{-- Submit Button --}}
            <flux:button type="submit" variant="primary" class="cursor-pointer w-fit">Update</flux:button>
        </form>
    </div>

    <div class="bg-zinc-50 sm:rounded-lg relative rounded-xl border border-neutral-200 dark:border-neutral-700 h-fit sticky top-4">
        <div class="py-3 px-6 border-b border-neutral-200">
            <flux:heading size="lg" class="font-semibold">Preview</flux:heading>
        </div>

        <div class="p-6 flex flex-col space-y-6">
                <div>
                    <flux:heading>Image</flux:heading>
                    @if ($temp_image)
                        <img src="{{ $temp_image->temporaryUrl() }}" alt="Hero image preview" class="w-full h-auto mt-2 rounded-lg object-cover border border-neutral-200">
                    @elseif ($image)
                        <img src="{{ Storage::url($image) }}" alt="Hero image preview" class="w-full h-auto mt-2 rounded-lg object-cover border border-neutral-200">
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
    </div>
</div>
