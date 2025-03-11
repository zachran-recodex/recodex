<div class="bg-white sm:rounded-lg p-6 relative rounded-xl border border-neutral-200 dark:border-neutral-700">

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

        {{-- Submit Button --}}
        <flux:button type="submit" variant="primary" class="cursor-pointer w-fit">Update</flux:button>

    </form>

</div>
