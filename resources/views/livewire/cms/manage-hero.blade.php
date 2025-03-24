<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Hero</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">CMS</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Hero</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">
                Hero Section Content
            </flux:heading>
        </flux:card.header>
        <flux:card.body>
            <div class="space-y-6">
                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">
                            <flux:input
                                label="Title"
                                wire:model="title"
                                placeholder="Enter title"
                            />

                            <flux:textarea
                                label="Subtitle"
                                wire:model="subtitle"
                                placeholder="Enter subtitle"
                                rows="4"
                            />

                            <div class="grid grid-cols-2 gap-8">
                                <flux:input
                                    label="Motto"
                                    wire:model="motto"
                                    placeholder="Enter motto"
                                />

                                <flux:input
                                    label="Button Text"
                                    wire:model="button_text"
                                    placeholder="Enter button text"
                                />
                            </div>

                            <div class="space-y-2">
                                <flux:input
                                    type="file"
                                    label="Image"
                                    wire:model="temp_image"
                                    accept="image/*"
                                />

                                @if ($temp_image)
                                    <img src="{{ $temp_image->temporaryUrl() }}" class="mt-2 h-32 w-auto object-cover rounded-lg">
                                @elseif ($image)
                                    <img src="{{ Storage::url($image) }}" class="mt-2 h-32 w-auto object-cover rounded-lg">
                                @endif
                            </div>
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $heroId ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>