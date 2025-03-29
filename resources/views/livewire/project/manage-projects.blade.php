<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Projects</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('dashboard.project.overview') }}" separator="slash">Project</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Projects</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:heading size="lg">List Project</flux:heading>

            <flux:modal.trigger name="form">
                <flux:button type="button" variant="primary" class="w-fit" icon="plus" wire:click="create">
                    Add New
                </flux:button>
            </flux:modal.trigger>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Project Name</flux:table.column>
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
                                        <flux:text class="mt-2">
                                            {{ $project->title }}
                                        </flux:text>
                                    </div>
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $project->duration }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $project->category }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    Rp {{ number_format($project->cost) }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:badge variant="solid" :color="match($project->status) {
                                        'pending' => 'yellow',
                                        'in_progress' => 'blue',
                                        'completed' => 'green',
                                        'cancelled' => 'red',
                                        'on_hold' => 'orange',
                                        default => 'gray'
                                    }">
                                        {{ str_replace('_', ' ', ucfirst($project->status)) }}
                                    </flux:badge>
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $project->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $project->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:heading size="lg">No projects found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new project.
                                        </flux:subheading>
                                    </div>
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

        <flux:modal name="form" class="min-w-4xl" x-on:hidden="$wire.closeModal()">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Project' : 'Add New Project' }}
                </flux:heading>

                <form wire:submit.prevent="save">
                    <flux:fieldset>
                        <div class="space-y-6">

                            <flux:field>
                                <flux:label>Client</flux:label>
                                <flux:select wire:model="client_id">
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="client_id" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Image</flux:label>
                                @if ($newImage)
                                    <img
                                        src="{{ $newImage->temporaryUrl() }}"
                                        alt="Preview"
                                        class="h-32 w-32 object-cover rounded-lg"
                                    >
                                @elseif ($image)
                                    <img
                                        src="{{ Storage::disk('public')->url($image) }}"
                                        alt="Current Image"
                                        class="h-32 w-32 object-cover rounded-lg"
                                    >
                                @endif
                                <flux:input
                                    type="file"
                                    wire:model="newImage"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"
                                />
                                <flux:description>Max size: 2MB. Formats: JPEG, PNG, GIF</flux:description>
                                <flux:error name="newImage" />
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
                                <flux:textarea wire:model="description" rows="4" />
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
                                    <flux:label>Duration</flux:label>
                                    <flux:input wire:model="duration" placeholder="e.g., 3 months, 1 year" />
                                    <flux:error name="duration" />
                                </flux:field>

                                <flux:field>
                                    <flux:label>Cost</flux:label>
                                    <flux:input type="number" wire:model="cost" step="0.01" />
                                    <flux:error name="cost" />
                                </flux:field>
                            </div>

                            <flux:field>
                                <flux:label>Status</flux:label>
                                <flux:select wire:model="status">
                                    <option value="">Select Status</option>
                                    @foreach(App\Models\Project::getStatusList() as $statusValue)
                                        <option value="{{ $statusValue }}">
                                            {{ str_replace('_', ' ', ucfirst($statusValue)) }}
                                        </option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="status" />
                            </flux:field>

                            <div class="flex">
                                <flux:spacer />
                                <flux:button type="submit" variant="primary" class="w-fit">
                                    {{ $isEditing ? 'Update' : 'Create' }}
                                </flux:button>
                            </div>
                        </div>
                    </flux:fieldset>
                </form>
            </div>
        </flux:modal>

        <flux:modal name="delete" class="min-w-sm" x-on:hidden="$wire.closeModal()">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete {{ $projectToDelete }}?</flux:heading>

                    <flux:text class="mt-2">
                        <p>Are you sure you want to delete this project?</p>
                        <p>This action can be reversed from the trash.</p>
                    </flux:text>
                </div>

                <div class="flex">
                    <flux:spacer />
                    <flux:button variant="danger" wire:click="delete">Delete</flux:button>
                </div>
            </div>
        </flux:modal>
    </flux:card>
</flux:container>
