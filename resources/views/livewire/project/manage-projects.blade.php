<flux:container class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <flux:heading size="xl" class="font-bold!">Manage Projects</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}">Project</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Manage Project</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @if (session()->has('error'))
        <flux:callout variant="danger" icon="x-circle" heading="{{ session('error') }}" />
    @endif

    <flux:card>
        <flux:card.header>
            <div class="flex justify-between items-center">
                <flux:heading size="lg" class="semi-bold!">List Project</flux:heading>

                <flux:modal.trigger name="form">
                    <flux:button type="button" variant="primary" class="w-fit" icon="plus" wire:click="create">
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

                                <flux:table.cell>{{ $project->start_date->format('d M Y') }}</flux:table.cell>

                                <flux:table.cell>{{ $project->duration }} hari</flux:table.cell>

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

    <flux:modal name="form" class="min-w-4xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $project_id ? 'Edit Project' : 'Add New Project' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-6">

                        <flux:field>
                            <flux:label for="client_id">Client</flux:label>
                            <flux:select wire:model="client_id" id="client_id">
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </flux:select>
                            <flux:error name="client_id" />
                        </flux:field>

                        <flux:field>
                            <flux:label badge="516x390">Image</flux:label>
                            @if ($existing_image)
                                <img
                                    src="{{ Storage::url($existing_image) }}"
                                    alt="Current Image"
                                    class="h-32 w-auto"
                                >
                                <flux:button type="button" variant="danger" wire:click="$set('existing_image', null)" class="w-fit">
                                    Hapus
                                </flux:button>
                            @endif
                            <flux:input
                                type="file"
                                wire:model="image"
                                accept="image/jpeg,image/png,image/jpg,image/gif"
                            />
                            <flux:description>Max size: 2MB. Formats: JPEG, PNG, GIF</flux:description>
                            <flux:error name="image" />
                        </flux:field>

                        <div class="grid grid-cols-2 gap-6 items-start">
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

                        <div class="grid grid-cols-2 gap-6 items-start">
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

                        <div class="flex">
                            <flux:spacer />
                            <flux:button type="submit" variant="primary" class="w-fit">
                                {{ $project_id ? 'Update' : 'Save' }}
                            </flux:button>
                        </div>
                    </div>
                </flux:fieldset>
            </form>
        </div>
    </flux:modal>

    <flux:modal name="delete" class="min-w-sm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete project?</flux:heading>

                <flux:text class="mt-2">
                    <p>Are you sure you want to delete this project?</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button type="button" variant="danger" wire:click="deleteProject">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</flux:container>
