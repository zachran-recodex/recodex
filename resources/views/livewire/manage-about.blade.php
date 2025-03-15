<div class="grid auto-rows-min gap-6 lg:grid-cols-3">
    <flux:card class="col-span-2">
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Input Data</flux:heading>
        </flux:card.header>
        <flux:card.body>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">

                        {{-- Title --}}
                        <flux:input label="Title" wire:model.defer="title" />

                        {{-- Description --}}
                        <flux:textarea
                            label="Description"
                            wire:model.defer="description"
                        />

                        {{-- Vision --}}
                        <flux:textarea
                            label="Vision"
                            wire:model.defer="vision"
                            rows="2"
                        />

                        {{-- Mission --}}
                        <div class="gap-2 flex flex-col">
                            <flux:label>Mission</flux:label>
                            @foreach($missions as $index => $mission)
                                <div class="mb-2 flex gap-4">
                                    <flux:input wire:model.defer="missions.{{ $index }}" />

                                    <flux:button variant="danger" icon="trash" wire:click="removeMission({{ $index }})" class="cursor-pointer"></flux:button>
                                </div>
                            @endforeach
                            <flux:button icon="plus" wire:click="addMission" class="cursor-pointer text-white! bg-primary-500! hover:bg-primary-600!">Add Mission</flux:button>
                        </div>

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
                {{-- Title Preview --}}
                <div>
                    <flux:heading>Title</flux:heading>
                    <flux:subheading>{{ $title ?: 'No title available' }}</flux:subheading>
                </div>

                {{-- Description Preview --}}
                <div>
                    <flux:heading>Description</flux:heading>
                    <flux:subheading>{{ $description ?: 'No description available' }}</flux:subheading>
                </div>

                {{-- Vision Preview --}}
                <div>
                    <flux:heading>Vision</flux:heading>
                    <flux:subheading>{{ $vision ?: 'No vision available' }}</flux:subheading>
                </div>

                {{-- Missions Preview --}}
                <div>
                    <flux:heading>Mission</flux:heading>
                    @if(count($missions) > 0)
                        <ol class="list-decimal list-inside text-sm text-zinc-500 dark:text-white/70 space-y-2">
                            @foreach($missions as $mission)
                                <li>{{ $mission }}</li>
                            @endforeach
                        </ol>
                    @else
                        <flux:subheading>No missions available</flux:subheading>
                    @endif
                </div>
            </div>
        </flux:card.body>
    </flux:card>
</div>
