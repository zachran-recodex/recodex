<flux:container class="space-y-6">
    <div class="flex flex-col space-y-4 sm:space-y-6 md:space-y-0 md:flex-row md:items-center md:justify-between">
        <div class="w-full md:w-auto">
            <flux:heading size="xl" class="font-bold! text-center md:text-left">Manage Projects</flux:heading>
        </div>

        <div class="w-full md:w-auto">
            <flux:breadcrumbs class="justify-center md:justify-start">
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}">Project</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Manage Projects</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-0 items-center justify-between">
                <flux:heading size="lg" class="font-semibold! text-center sm:text-left">List Project</flux:heading>

                <flux:modal.trigger name="form">
                    <flux:button type="button" variant="primary" class="w-full sm:w-fit" icon="plus" wire:click="create">
                        Add New
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Title</flux:table.column>
                        <flux:table.column>Start Date</flux:table.column>
                        <flux:table.column>Duration</flux:table.column>
                        <flux:table.column>Category</flux:table.column>
                        <flux:table.column>Cost</flux:table.column>
                        <flux:table.column>Status</flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($projects as $project)
                            <flux:table.row>
                                <flux:table.cell>
                                    <div class="space-y-2">
                                        <flux:heading class="font-semibold">{{ $project->client->name }}</flux:heading>
                                        <flux:text class="mt-2">{{ $project->title }}</flux:text>
                                    </div>
                                </flux:table.cell>

                                <flux:table.cell>{{ $project->start_date->format('d F Y') }}</flux:table.cell>

                                <flux:table.cell>{{ $project->duration }} days</flux:table.cell>

                                <flux:table.cell>{{ $project->category }}</flux:table.cell>

                                <flux:table.cell>{{ $project->formatted_cost }}</flux:table.cell>

                                <flux:table.cell>
                                    <flux:badge
                                        variant="solid"
                                        :color="match($project->status) {
                                            'pending' => 'yellow',
                                            'in_progress' => 'blue',
                                            'completed' => 'green',
                                            'cancelled' => 'red',
                                            'on_hold' => 'orange',
                                            default => 'zinc'
                                        }"
                                    >
                                        {{ str_replace('_', ' ', ucfirst($project->status)) }}
                                    </flux:badge>
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $project->id }})" icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $project->id }})" icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="7" class="text-center py-8">
                                    <flux:heading size="lg">No data found.</flux:heading>
                                    <flux:subheading>Start by creating new project.</flux:subheading>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </flux:card.body>

        <flux:card.footer>
            {{ $projects->links() }}
        </flux:card.footer>
    </flux:card>

    <flux:modal name="form" class="min-w-sm md:min-w-2xl lg:min-w-4xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $project_id ? 'Edit Project' : 'Add New Project' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-6">
                        <flux:radio.group wire:model="client_type" label="Client Type" variant="segmented">
                            <flux:radio value="existing" label="Existing Client" />
                            <flux:radio value="new" label="New Client" />
                        </flux:radio.group>

                        <div x-show="$wire.client_type === 'existing'">
                            <flux:field>
                                <flux:label>Select Client</flux:label>
                                <flux:select wire:model="client_id" id="client_id">
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="client_id" />
                            </flux:field>
                        </div>

                        <div x-show="$wire.client_type === 'new'">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                <flux:field>
                                    <flux:label>Client Name</flux:label>
                                    <flux:input wire:model="new_client_name" id="new_client_name" placeholder="Enter client name" />
                                    <flux:error name="new_client_name" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Company</flux:label>
                                    <flux:input wire:model="new_client_company" id="new_client_company" placeholder="Enter company name" />
                                    <flux:error name="new_client_company" />
                                </flux:field>
                            </div>
                        </div>

                        <flux:separator />

                        <flux:field>
                            <flux:label badge="516x390">Image</flux:label>
                            @if ($existing_image)
                                <div class="flex flex-col sm:flex-row gap-4 items-start">
                                    <img
                                        src="{{ Storage::url($existing_image) }}"
                                        alt="Current Image"
                                        class="h-32 w-auto"
                                    >
                                    <flux:button type="button" variant="danger" wire:click="$set('existing_image', null)" class="w-fit">
                                        Hapus
                                    </flux:button>
                                </div>
                            @endif
                            <flux:input
                                type="file"
                                wire:model="image"
                                accept="image/jpeg,image/png,image/jpg"
                            />
                            <flux:description>Max size: 2MB. Formats: JPG, JPEG, PNG</flux:description>
                            <flux:error name="image" />
                        </flux:field>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <flux:field>
                                <flux:label>Title</flux:label>
                                <flux:input wire:model="title" />
                                <flux:error name="title" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Category</flux:label>
                                <flux:input wire:model="category" />
                                <flux:error name="category" />
                            </flux:field>
                        </div>

                        <flux:field>
                            <flux:label>Description</flux:label>
                            <flux:textarea wire:model="description" rows="4"></flux:textarea>
                            <flux:error name="description" />
                        </flux:field>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <flux:field>
                                <flux:label>Start Date</flux:label>
                                <flux:input type="date" wire:model="start_date" />
                                <flux:error name="start_date" />
                            </flux:field>

                            <flux:field>
                                <flux:label>End Date</flux:label>
                                <flux:input type="date" wire:model="end_date" />
                                <flux:error name="end_date" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Cost (Rp)</flux:label>
                                <flux:input type="number" wire:model="cost" step="0.01" />
                                <flux:error name="cost" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Status</flux:label>
                                <flux:select wire:model="status">
                                    <option value="">Select Status</option>
                                    @foreach($statusOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="status" />
                            </flux:field>
                        </div>

                        <div class="flex justify-end">
                            <flux:button type="submit" variant="primary" class="w-full md:w-fit">
                                {{ $project_id ? 'Update' : 'Create' }}
                            </flux:button>
                        </div>
                    </div>
                </flux:fieldset>
            </form>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-[280px] sm:min-w-sm">
        <div class="space-y-4 sm:space-y-6">
            <div class="text-center sm:text-left">
                <flux:heading size="lg" class="font-semibold">Delete project?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this project?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex justify-end">
                <flux:button type="button" variant="danger" wire:click="deleteProject" class="w-full sm:w-fit">
                    Delete
                </flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
