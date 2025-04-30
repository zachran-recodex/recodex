<?php

namespace App\Livewire\CMS;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageProjects extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Form properties
    public $projectId;
    public $title;
    public $client;
    public $category;
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
        'client' => 'required|min:3|max:255',
        'category' => 'required|min:3|max:255',
        'date' => 'nullable|date',
        'duration' => 'nullable|max:255',
        'cost' => 'nullable|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image|max:1024',
        'content_image' => 'nullable|image|max:1024',
        'is_active' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'projectId',
            'title',
            'client',
            'category',
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
        $this->client = $project->client;
        $this->category = $project->category;
        $this->date = $project->date ? $project->date->format('Y-m-d') : null;
        $this->duration = $project->duration;
        $this->cost = $project->cost;
        $this->description = $project->description;
        $this->current_image = $project->image_path;
        $this->current_content_image = $project->content_image_path;
        $this->is_active = $project->is_active;
        $this->sort_order = $project->sort_order;

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

        $data = [
            'title' => $this->title,
            'client' => $this->client,
            'category' => $this->category,
            'date' => $this->date,
            'duration' => $this->duration,
            'cost' => $this->cost,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Handle image upload
        if ($this->image) {
            $imagePath = $this->image->store('projects', 'public');
            $data['image_path'] = $imagePath;

            // Remove old image if exists
            if ($this->projectId && $this->current_image) {
                Storage::delete('public/' . $this->current_image);
            }
        }

        // Handle content image upload
        if ($this->content_image) {
            $contentImagePath = $this->content_image->store('projects', 'public');
            $data['content_image_path'] = $contentImagePath;

            // Remove old content image if exists
            if ($this->projectId && $this->current_content_image) {
                Storage::delete('public/' . $this->current_content_image);
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
            $project->update($data);
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

        // Delete associated image if exists
        if ($project->image_path) {
            Storage::delete('public/' . $project->image_path);
        }

        // Delete associated content image if exists
        if ($project->content_image_path) {
            Storage::delete('public/' . $project->content_image_path);
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
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('client', 'like', '%' . $this->search . '%')
                    ->orWhere('category', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.cms.manage-projects', [
            'projects' => $projects
        ]);
    }
}
