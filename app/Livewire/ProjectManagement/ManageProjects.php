<?php

namespace App\Livewire\ProjectManagement;

use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ManageProjects extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Form properties
    public $projectId;
    public $title;
    public $date;
    public $duration;
    public $cost;
    public $description;
    public $image;
    public $content_image;
    public $current_image;
    public $current_content_image;
    public $steps = [];
    public $is_active = true;
    public $sort_order = 0;
    public $client_id;
    public $service_id;

    // UI state
    public $isOpen = false;
    public $confirmingProjectDeletion = false;
    public $projectIdBeingDeleted;

    // Step management
    public $new_step_title = '';
    public $new_step_description = '';

    // Search and filter
    public $search = '';
    public $sortField = 'sort_order';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'sort_order'],
        'sortDirection' => ['except' => 'asc'],
    ];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'date' => 'nullable|date',
        'duration' => 'nullable|max:255',
        'cost' => 'nullable|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image|max:1024',
        'content_image' => 'nullable|image|max:1024',
        'is_active' => 'boolean',
        'sort_order' => 'integer|min:0',
        'client_id' => 'required|exists:clients,id',
        'service_id' => 'required|exists:services,id',
    ];

    protected $imageService;

    public function boot(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'projectId',
            'title',
            'date',
            'duration',
            'cost',
            'description',
            'image',
            'current_image',
            'content_image',
            'current_content_image',
            'steps',
            'is_active',
            'sort_order',
            'client_id',
            'service_id',
            'new_step_title',
            'new_step_description'
        ]);

        $this->is_active = true;
        $this->sort_order = Project::max('sort_order') + 1 ?? 0;
        $this->steps = [];

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->projectId = $id;
        $this->title = $project->title;
        $this->date = $project->date ? $project->date->format('Y-m-d') : null;
        $this->duration = $project->duration;
        $this->cost = $project->cost;
        $this->description = $project->description;
        $this->current_image = $project->image_path;
        $this->current_content_image = $project->content_image_path;
        $this->is_active = $project->is_active;
        $this->sort_order = $project->sort_order;
        $this->client_id = $project->client_id;
        $this->service_id = $project->service_id;

        // Handle steps
        if (is_array($project->steps)) {
            $this->steps = $project->steps;
        } else {
            $this->steps = [];
        }

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        // Jika status inactive, set sort_order ke 0
        if (!$this->is_active) {
            $this->sort_order = 0;
        }

        $data = [
            'title' => $this->title,
            'date' => $this->date,
            'duration' => $this->duration,
            'cost' => $this->cost,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'client_id' => $this->client_id,
            'service_id' => $this->service_id,
        ];

        // Handle image upload using the ImageService
        if ($this->image) {
            $imagePath = $this->imageService->storeProjectImage($this->image);
            $data['image_path'] = $imagePath;

            // Remove old image if exists
            if ($this->projectId && $this->current_image) {
                $this->imageService->deleteImage($this->current_image);
            }
        }

        // Handle content image upload
        if ($this->content_image) {
            $contentImagePath = $this->imageService->storeProjectImage($this->content_image);
            $data['content_image_path'] = $contentImagePath;

            // Remove old content image if exists
            if ($this->projectId && $this->current_content_image) {
                $this->imageService->deleteImage($this->current_content_image);
            }
        }

        // Process steps
        if (!empty($this->steps)) {
            $data['steps'] = $this->steps;
        } else {
            $data['steps'] = null;
        }

        // Create or update project
        if ($this->projectId) {
            $project = Project::findOrFail($this->projectId);
            $oldIsActive = $project->is_active;
            $oldSortOrder = $project->sort_order;

            $project->update($data);

            // Jika status berubah dari active ke inactive, sesuaikan sort_order proyek lain
            if ($oldIsActive && !$this->is_active) {
                $this->adjustProjectOrders($oldSortOrder);
            }

            session()->flash('message', 'Project updated successfully.');
        } else {
            Project::create($data);
            session()->flash('message', 'Project created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmProjectDeletion($id)
    {
        $this->confirmingProjectDeletion = true;
        $this->projectIdBeingDeleted = $id;
    }

    public function deleteProject()
    {
        $project = Project::findOrFail($this->projectIdBeingDeleted);

        // Delete associated images using the ImageService
        if ($project->image_path) {
            $this->imageService->deleteImage($project->image_path);
        }

        if ($project->content_image_path) {
            $this->imageService->deleteImage($project->content_image_path);
        }

        $project->delete();
        $this->confirmingProjectDeletion = false;
        session()->flash('message', 'Project deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingProjectDeletion = false;
        $this->projectIdBeingDeleted = null;
    }

    // Step management
    public function addStep()
    {
        if (empty($this->new_step_title) || empty($this->new_step_description)) {
            return;
        }

        $this->steps[] = [
            'title' => $this->new_step_title,
            'description' => $this->new_step_description,
        ];

        $this->new_step_title = '';
        $this->new_step_description = '';
    }

    public function removeStep($index)
    {
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
    }

    /**
     * Menyesuaikan urutan proyek ketika sebuah proyek dinonaktifkan
     *
     * @param int $oldSortOrder Sort order lama dari proyek yang dinonaktifkan
     * @return void
     */
    private function adjustProjectOrders($oldSortOrder)
    {
        // Dapatkan semua proyek aktif dengan sort_order lebih besar dari proyek yang dinonaktifkan
        $projectsToUpdate = Project::where('is_active', true)
            ->where('sort_order', '>', $oldSortOrder)
            ->orderBy('sort_order')
            ->get();

        // Kurangi sort_order masing-masing proyek sebanyak 1
        foreach ($projectsToUpdate as $projectToUpdate) {
            $projectToUpdate->update([
                'sort_order' => $projectToUpdate->sort_order - 1
            ]);
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = Project::query()
            ->with(['client', 'service'])
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        $clients = Client::orderBy('created_at')->get();
        $services = Service::orderBy('created_at')->get();

        return view('livewire.project-management.manage-projects', [
            'projects' => $projects,
            'clients' => $clients,
            'services' => $services,
        ]);
    }
}
