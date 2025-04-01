<?php

namespace App\Livewire\Project;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageProjects extends Component
{
    use WithPagination;
    use WithNotification;
    use WithFileUploads;

    // Form Properties
    public $project_id;
    public $title;
    public $category;
    public $description;
    public $image;
    public $existing_image;
    public $start_date;
    public $end_date;
    public $cost;
    public $status;

    // Client Form Properties
    public $client_id;
    public $client_type = 'existing';
    public $new_client_name;
    public $new_client_company;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for client form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'cost' => 'required|numeric|min:0',
            'status' => ['required', Rule::in(array_keys(Project::getStatusOptions()))],
        ];

        if (!$this->project_id) {
            $rules['client_type'] = 'required|in:existing,new';

            if ($this->client_type === 'existing') {
                $rules['client_id'] = 'required|exists:clients,id';
            } else {
                $rules['new_client_name'] = 'required|string|max:255';
                $rules['new_client_company'] = 'required|string|max:255';
            }
        }

        return $rules;
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->project_id = null;
        $this->client_type = 'existing';
        $this->client_id = '';
        $this->new_client_name = '';
        $this->new_client_company = '';
        $this->title = '';
        $this->category = '';
        $this->description = '';
        $this->image = null;
        $this->existing_image = null;
        $this->start_date = null;
        $this->end_date = null;
        $this->cost = '';
        $this->status = Project::STATUS_PENDING;
        $this->resetValidation();
    }

    /**
     * Unified modal control method
     *
     * @param string $modalName The name of the modal to show
     * @param bool $show Whether to show or hide the modal
     * @return void
     */
    public function toggleModal(string $modalName, bool $show = true)
    {
        if ($show) {
            $this->activeModal = $modalName;
            $this->modal($modalName)->show();
        } else {
            $this->activeModal = null;
            $this->modal($modalName)->close();
        }
    }

    /**
     * Initialize create project form
     * Resets form fields and opens the form modal
     *
     * @return void
     */
    public function create()
    {
        $this->resetInputFields();
        $this->toggleModal('form');
    }

    /**
     * Load project data for editing
     * Populates form fields with existing project data
     *
     * @param int $id Project ID to edit
     * @return void
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->project_id = $id;
        $this->client_id = $project->client_id;
        $this->title = $project->title;
        $this->category = $project->category;
        $this->description = $project->description;
        $this->existing_image = $project->image;
        $this->start_date = $project->start_date->format('Y-m-d');
        $this->end_date = $project->end_date ? $project->end_date->format('Y-m-d') : null;
        $this->cost = $project->cost;
        $this->status = $project->status;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the project ID for deletion and opens confirmation modal
     *
     * @param int $id Project ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->project_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update project data
     * Validates input and saves project information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            // Handle new client creation if needed
            if ($this->client_type === 'new') {
                $client = Client::create([
                    'name' => $this->new_client_name,
                    'company' => $this->new_client_company,
                ]);
                $this->client_id = $client->id;
            }

            $data = [
                'client_id' => $this->client_id,
                'title' => $this->title,
                'category' => $this->category,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'cost' => $this->cost,
                'status' => $this->status,
            ];

            // Handle file upload if present
            if ($this->image) {
                try {
                    // Delete old file if editing
                    if ($this->project_id && $this->existing_image) {
                        Storage::delete('public/' . $this->existing_image);
                    }

                    $imagePath = $this->image->store('projects', 'public');
                    $data['image'] = str_replace('public/', '', $imagePath);
                } catch (\Exception $e) {
                    $this->notifyError('Error uploading image: ' . $e->getMessage());
                    return;
                }
            }

            if ($this->project_id) {
                // Update existing project
                $project = Project::find($this->project_id);
                $project->update($data);
                $this->notifySuccess('Project updated successfully.');
            } else {
                // Create new project
                Project::create($data);
                $this->notifySuccess('Project created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete project record
     * Removes project and associated logo file from storage
     *
     * @return void
     */
    public function deleteProject()
    {
        try{
            $project = Project::find($this->project_id);

            if ($project) {
                // Delete image file if exists
                if ($project->image) {
                    try {
                        Storage::delete('public/' . $project->image);
                    } catch (\Exception $e) {
                        // Log error but continue with deletion
                        Log::error('Failed to delete project image: ' . $e->getMessage());
                    }
                }

                $project->delete();
                $this->notifySuccess('Project deleted successfully.');
            }

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated projects and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $projects = Project::orderBy('created_at', 'desc')
            ->paginate(10);

        $clients = Client::orderBy('name')->get();
        $statusOptions = Project::getStatusOptions();

        return view('livewire.project.manage-projects', compact('projects', 'clients', 'statusOptions'));
    }
}
