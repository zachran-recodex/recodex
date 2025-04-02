<flux:container class="space-y-4 sm:space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage About</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">CMS</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage About</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">About Content</flux:heading>
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
                                <flux:label>Description</flux:label>
                                <flux:textarea wire:model="description" rows="4" placeholder="Enter description"></flux:textarea>
                                <flux:error name="description" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Vision</flux:label>
                                <flux:textarea wire:model="vision" rows="3" placeholder="Enter vision"></flux:textarea>
                                <flux:error name="description" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Mission</flux:label>
                                <flux:input.group>
                                    <flux:input placeholder="Add mission item" wire:model="missionItem" wire:keydown.enter.prevent="addMissionItem" />

                                    <flux:button type="button" variant="primary" wire:click="addMissionItem" icon="plus" class="w-fit">Add</flux:button>
                                </flux:input.group>
                                <flux:error name="missionItem" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Mission Item</flux:label>
                                @foreach($mission as $index => $item)
                                    <flux:input.group>
                                        <flux:input placeholder="{{ $item }}" readonly />

                                        <flux:button type="button" variant="danger" wire:click="removeMissionItem({{ $index }})" icon="trash"></flux:button>
                                    </flux:input.group>
                                @endforeach
                            </flux:field>

                            <div class="flex justify-end">
                                <flux:button type="submit" variant="primary" class="w-full md:w-fit">
                                    {{ $about_id ? 'Update' : 'Create' }}
                                </flux:button>
                            </div>
                        </div>
                    </flux:fieldset>
                </form>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>
