<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage About</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">CMS</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage About</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">
                About Page Content
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
                                label="Description"
                                wire:model="description"
                                placeholder="Enter description"
                                rows="4"
                            />

                            <flux:textarea
                                label="Vision"
                                wire:model="vision"
                                placeholder="Enter vision"
                                rows="4"
                            />

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <flux:label>Mission Points</flux:label>
                                    <flux:button type="button" variant="primary" wire:click="addMission" icon="plus">
                                        Add Mission
                                    </flux:button>
                                </div>

                                @foreach($mission as $index => $point)
                                    <div class="flex gap-2">
                                        <flux:textarea
                                            wire:model="mission.{{ $index }}"
                                            placeholder="Enter mission point"
                                            rows="2"
                                        />
                                        <flux:button type="button" variant="danger" wire:click="removeMission({{ $index }})" icon="trash">
                                        </flux:button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $aboutId ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>