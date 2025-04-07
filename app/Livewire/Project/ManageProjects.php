<?php

namespace App\Livewire\Project;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
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
     * Define validation rules for project form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
     * Unified modal control method with event dispatching
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
            $this->dispatch('openModal', $modalName);
        } else {
            $this->activeModal = null;
            $this->modal($modalName)->close();
            $this->dispatch('closeModal', $modalName);
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
        try {
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
        } catch (\Exception $e) {
            $this->notifyError('Project not found or cannot be edited.');
        }
    }

    /**
     * Show project details
     * Loads and displays project information in a modal
     *
     * @param int $id Project ID to show
     * @return void
     */
    public function show($id)
    {
        try {
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

            $this->toggleModal('show');
        } catch (\Exception $e) {
            $this->notifyError('Project not found.');
        }
    }

    /**
     * Handle image upload
     *
     * @param string|null $existingImage Path to existing image
     * @return string|null Path to new image or null on failure
     */
    private function handleImageUpload($existingImage = null)
    {
        if (!$this->image) {
            return $existingImage;
        }

        try {
            // Delete old file if it exists
            if ($existingImage) {
                Storage::delete('public/' . $existingImage);
            }

            $imagePath = $this->image->store('projects', 'public');
            return str_replace('public/', '', $imagePath);
        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            throw new \Exception('Image upload failed: ' . $e->getMessage());
        }
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

        DB::beginTransaction();

        try {
            // Handle new client creation if needed
            if (!$this->project_id && $this->client_type === 'new') {
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

            // Handle image clearing if the user removed it
            if ($this->project_id && $this->existing_image === null && isset($data['image'])) {
                $project = Project::find($this->project_id);
                if ($project && $project->image) {
                    Storage::delete('public/' . $project->image);
                }
                $data['image'] = null;
            }
            // Handle file upload if present
            else if ($this->image) {
                $currentImage = $this->project_id ? Project::find($this->project_id)->image : null;
                $data['image'] = $this->handleImageUpload($currentImage);
            }

            if ($this->project_id) {
                // Update existing project
                $project = Project::find($this->project_id);
                if (!$project) {
                    throw new \Exception('Project not found.');
                }
                $project->update($data);
                $this->notifySuccess('Project updated successfully.');
            } else {
                // Create new project
                Project::create($data);
                $this->notifySuccess('Project created successfully.');
            }

            DB::commit();
            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
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
        try {
            // Verify project exists before showing delete modal
            $project = Project::findOrFail($id);
            $this->project_id = $id;
            $this->toggleModal('delete');
        } catch (\Exception $e) {
            $this->notifyError('Project not found.');
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
        DB::beginTransaction();

        try {
            $project = Project::find($this->project_id);

            if (!$project) {
                throw new \Exception('Project not found.');
            }

            // Delete image file if exists
            if ($project->image) {
                Storage::delete('public/' . $project->image);
            }

            $project->delete();

            DB::commit();
            $this->notifySuccess('Project deleted successfully.');
            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            DB::rollBack();
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
        $projects = Project::with('client')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $clients = Client::orderBy('name')->get();
        $statusOptions = Project::getStatusOptions();

        return view('livewire.project.manage-projects', compact('projects', 'clients', 'statusOptions'));
    }
}
