<flux:container class="space-y-4 sm:space-y-6">
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
                        <flux:table.column class="min-w-[200px] md:w-auto">Title</flux:table.column>
                        <flux:table.column class="min-w-[200px] md:w-auto">Start Date</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Duration</flux:table.column>
                        <flux:table.column class="min-w-[120px] md:w-auto">Category</flux:table.column>
                        <flux:table.column class="min-w-[150px] md:w-auto">Cost</flux:table.column>
                        <flux:table.column class="min-w-[120px] md:w-auto">Status</flux:table.column>
                        <flux:table.column class="min-w-[100px] md:w-auto">Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($projects as $project)
                            <flux:table.row>
                                <flux:table.cell>
                                    <div class="space-y-2">
                                        <flux:heading class="font-semibold text-sm md:text-base">{{ $project->client->name }}</flux:heading>
                                        <flux:text class="mt-2 text-xs md:text-sm">{{ $project->title }}</flux:text>
                                    </div>
                                </flux:table.cell>

                                <flux:table.cell class="text-sm md:text-base">{{ $project->start_date->format('d F Y') }}</flux:table.cell>
                                <flux:table.cell class="text-sm md:text-base">{{ $project->duration }} days</flux:table.cell>
                                <flux:table.cell class="text-sm md:text-base">{{ $project->category }}</flux:table.cell>
                                <flux:table.cell class="text-sm md:text-base">{{ $project->formatted_cost }}</flux:table.cell>

                                <flux:table.cell>
                                    <flux:badge
                                        variant="solid"
                                        class="text-xs md:text-sm whitespace-nowrap"
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
                                    <div class="flex gap-2">
                                        <flux:modal.trigger name="show">
                                            <flux:button variant="outline" wire:click="show({{ $project->id }})" icon="eye" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" wire:click="edit({{ $project->id }})" icon="pencil" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" wire:click="confirmDelete({{ $project->id }})" icon="trash" class="!p-1.5 md:!p-2"></flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="7" class="text-center py-6 md:py-8">
                                    <flux:heading size="lg" class="text-base md:text-lg">No data found.</flux:heading>
                                    <flux:subheading class="text-sm md:text-base">Start by creating a new project.</flux:subheading>
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

    <flux:modal name="show" variant="flyout">
        <div class="space-y-4 sm:space-y-6">
            <flux:heading size="lg" class="font-semibold">
                Project Details
            </flux:heading>

            <flux:separator />

            <div class="text-center">
                <flux:heading>{{ $client_id ? $clients->find($client_id)->name : '-' }}</flux:heading>
            </div>

            <flux:separator />

            <div class="space-y-4 sm:space-y-6">
                @if ($existing_image)
                    <div class="flex justify-center">
                        <img
                            src="{{ Storage::url($existing_image) }}"
                            alt="Project Image"
                            class="h-48 w-auto object-contain"
                        >
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                    <flux:field>
                        <flux:label>Title</flux:label>
                        <flux:text>{{ $title ?? '-' }}</flux:text>
                    </flux:field>

                    <flux:field>
                        <flux:label>Category</flux:label>
                        <flux:text>{{ $category ?? '-' }}</flux:text>
                    </flux:field>

                    <flux:field>
                        <flux:label>Start Date</flux:label>
                        <flux:text>{{ $start_date ? \Carbon\Carbon::parse($start_date)->format('d F Y') : '-' }}</flux:text>
                    </flux:field>

                    <flux:field>
                        <flux:label>End Date</flux:label>
                        <flux:text>{{ $end_date ? \Carbon\Carbon::parse($end_date)->format('d F Y') : '-' }}</flux:text>
                    </flux:field>

                    <flux:field>
                        <flux:label>Cost</flux:label>
                        <flux:text>{{ $cost ? 'Rp ' . number_format($cost, 0, ',', '.') : '-' }}</flux:text>
                    </flux:field>

                    <flux:field>
                        <flux:label>Status</flux:label>
                        <flux:badge
                            variant="solid"
                            class="text-xs md:text-sm whitespace-nowrap w-fit!"
                            :color="match($status) {
                                'pending' => 'yellow',
                                'in_progress' => 'blue',
                                'completed' => 'green',
                                'cancelled' => 'red',
                                'on_hold' => 'orange',
                                default => 'zinc'
                            }"
                        >
                            {{ $status ? str_replace('_', ' ', ucfirst($status)) : '-' }}
                        </flux:badge>
                    </flux:field>
                </div>

                <flux:field>
                    <flux:label>Description</flux:label>
                    <flux:text>{!! $description ?? '-' !!}</flux:text>
                </flux:field>
            </div>
        </div>
    </flux:modal>

    <flux:modal name="form" class="min-w-sm md:min-w-2xl lg:min-w-4xl">
        <div class="space-y-4 sm:space-y-6">
            <flux:heading size="lg" class="font-semibold">
                {{ $project_id ? 'Edit Project' : 'Add New Project' }}
            </flux:heading>

            <flux:separator />

            <form wire:submit.prevent="store">
                <flux:fieldset>
                    <div class="space-y-4 sm:space-y-6">
                        @if (!$project_id)
                            <flux:radio.group wire:model.live="client_type" label="Client Type" variant="segmented">
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
                        @endif

                        <flux:field>
                            <flux:label badge="516x390">Image</flux:label>
                            @if ($image)
                                <img
                                    src="{{ $image->temporaryUrl() }}"
                                    alt="Image Preview"
                                    class="h-32 w-auto object-contain"
                                >
                            @elseif ($existing_image)
                                <div class="flex flex-col sm:flex-row gap-4 items-start">
                                    <img
                                        src="{{ Storage::url($existing_image) }}"
                                        alt="Current Image"
                                        class="h-32 w-auto object-contain"
                                    >
                                    <flux:button type="button" variant="danger" wire:click="$set('existing_image', null)" class="w-fit">
                                        Remove
                                    </flux:button>
                                </div>
                            @endif
                            <flux:input
                                type="file"
                                wire:model.live="image"
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
                            <div wire:ignore class="h-48">
                                <div id="editor">
                                    {!! $description ?? '-' !!}
                                </div>
                            </div>
                            <flux:error name="description" />
                        </flux:field>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 pt-6 md:pt-12">
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
                            <flux:button type="submit" variant="primary" class="w-full md:w-fit" wire:loading.attr="disabled" wire:target="store">
                                {{ $project_id ? 'Update' : 'Create' }}
                                <span wire:loading wire:target="store">...</span>
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
                <flux:button type="button" variant="danger" wire:click="deleteProject" wire:loading.attr="disabled" wire:target="deleteProject" class="w-full sm:w-fit">
                    Delete
                    <span wire:loading wire:target="deleteProject">...</span>
                </flux:button>
            </div>
        </div>
    </flux:modal>


    @script
        <script>
            let quill = null;

            // Initialize Quill editor
            function initQuill() {
                if (quill) {
                    quill.destroy();
                }

                quill = new Quill('#editor', {
                    theme: 'snow',
                    placeholder: 'Write your description here...',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            ['link'],
                            ['clean']
                        ]
                    }
                });

                // Add custom styles
                const style = document.createElement('style');
                style.textContent = `
                    .ql-editor {
                        min-height: 150px;
                        font-size: 14px;
                        line-height: 1.6;
                        color: #374151;
                        padding: 0.5rem 0.75rem;
                    }
                    .ql-toolbar {
                        border-radius: 0.375rem 0.375rem 0 0;
                        background-color: #f9fafb;
                        border: 1px solid #e5e7eb;
                        padding: 0.5rem;
                    }
                    .ql-container {
                        border-radius: 0 0 0.375rem 0.375rem;
                        border: 1px solid #e5e7eb;
                        background-color: white;
                    }
                    .ql-editor.ql-blank::before {
                        color: #9ca3af;
                        font-style: normal;
                    }
                    .ql-snow .ql-picker {
                        color: #374151;
                    }
                    .ql-snow .ql-stroke {
                        stroke: #374151;
                    }
                    .ql-snow .ql-fill {
                        fill: #374151;
                    }
                    .ql-snow .ql-picker-options {
                        background-color: white;
                        border: 1px solid #e5e7eb;
                        border-radius: 0.375rem;
                    }
                    .ql-snow .ql-picker.ql-expanded .ql-picker-label {
                        border-color: #e5e7eb;
                    }
                    .ql-snow .ql-tooltip {
                        background-color: white;
                        border: 1px solid #e5e7eb;
                        border-radius: 0.375rem;
                        box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
                    }
                    .ql-snow .ql-tooltip input[type=text] {
                        border: 1px solid #e5e7eb;
                        border-radius: 0.375rem;
                    }

                    /* Dark mode styles */
                    .dark .ql-editor {
                        color: #e5e7eb;
                    }
                    .dark .ql-toolbar {
                        background-color: rgba(255, 255, 255, 0.1);
                        border-color: rgba(255, 255, 255, 0.1);
                    }
                    .dark .ql-container {
                        background-color: rgba(255, 255, 255, 0.1);
                        border-color: rgba(255, 255, 255, 0.1);
                    }
                    .dark .ql-editor.ql-blank::before {
                        color: rgba(255, 255, 255, 0.4);
                    }
                    .dark .ql-snow .ql-picker {
                        color: #e5e7eb;
                    }
                    .dark .ql-snow .ql-stroke {
                        stroke: #e5e7eb;
                    }
                    .dark .ql-snow .ql-fill {
                        fill: #e5e7eb;
                    }
                    .dark .ql-snow .ql-picker-options {
                        background-color: #1f2937;
                        border-color: rgba(255, 255, 255, 0.1);
                        color: #e5e7eb;
                    }
                    .dark .ql-snow .ql-picker.ql-expanded .ql-picker-label {
                        border-color: rgba(255, 255, 255, 0.1);
                    }
                    .dark .ql-snow .ql-tooltip {
                        background-color: #1f2937;
                        border-color: rgba(255, 255, 255, 0.1);
                        color: #e5e7eb;
                    }
                    .dark .ql-snow .ql-tooltip input[type=text] {
                        background-color: #1f2937;
                        border-color: rgba(255, 255, 255, 0.1);
                        color: #e5e7eb;
                    }
                    .dark .ql-snow .ql-tooltip input[type=text]::placeholder {
                        color: rgba(255, 255, 255, 0.4);
                    }
                `;
                document.head.appendChild(style);

                // Set initial content if editing
                if (@this.description) {
                    quill.root.innerHTML = @this.description;
                }

                // Update Livewire state on content change
                quill.on('text-change', function() {
                    @this.set('description', quill.root.innerHTML);
                });
            }

            // Initialize editor when modal opens
            document.addEventListener('livewire:initialized', () => {
                if (document.querySelector('#editor')) {
                    setTimeout(() => {
                        initQuill();
                    }, 100);
                }
            });

            // Set up Livewire event listeners for modal events
            document.addEventListener('livewire:init', () => {
                Livewire.on('openModal', (modalName) => {
                    if (modalName === 'form') {
                        setTimeout(() => {
                            initQuill();
                        }, 100);
                    }
                });

                Livewire.on('closeModal', (modalName) => {
                    if (modalName === 'form' && quill) {
                        quill.destroy();
                        quill = null;
                    }
                });
            });
        </script>
    @endscript
</flux:container>
