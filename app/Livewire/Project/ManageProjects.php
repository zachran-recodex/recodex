<?php

namespace App\Livewire\Project;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use App\WithNotification;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageProjects extends Component
{
    use WithPagination, WithNotification, WithFileUploads;

    public $client_id;
    public $project_id;
    public $title = '';
    public $category = '';
    public $description = '';
    public $image;
    public $newImage;
    public $start_date = '';
    public $end_date = '';
    public $cost = '';
    public $status = '';

    public bool $isEditing = false;
    public $projectToDelete = '';

    /**
     * Validation rules for project form.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'newImage' => 'nullable|image|max:1024',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'cost' => 'required|numeric|min:0',
            'status' => 'required|in:' . implode(',', Project::getStatusList()),
        ];
    }

    /**
     * Validate only the changed property.
     *
     * @param string $propertyName
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Prepare for creating a new project.
     */
    public function create(): void
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    /**
     * Prepare for editing an existing project.
     *
     * @param int $id
     */
    public function edit(int $id): void
    {
        $project = Project::findOrFail($id);

        $this->isEditing = true;
        $this->client_id = $project->client_id;
        $this->project_id = $id;
        $this->title = $project->title;
        $this->category = $project->category;
        $this->description = $project->description;
        $this->image = $project->image;
        $this->start_date = $project->start_date ? $project->start_date->format('Y-m-d') : null;
        $this->end_date = $project->end_date ? $project->end_date->format('Y-m-d') : null;
        $this->cost = $project->cost;
        $this->status = $project->status;

        $this->modal('form')->show();
    }

    /**
     * Confirm deletion of a project.
     *
     * @param int $id
     */
    public function confirmDelete(int $id): void
    {
        $project = Project::findOrFail($id);
        $this->project_id = $id;
        $this->projectToDelete = $project->title;
        $this->modal('delete')->show();
    }

    /**
     * Delete the selected project.
     */
    public function delete(): void
    {
        $project = Project::findOrFail($this->project_id);
        $project->delete();
        $this->notifySuccess('Project deleted successfully');
        $this->modal('delete')->close();
    }

    /**
     * Reset form to initial state.
     */
    public function resetForm(): void
    {
        $this->reset([
            'client_id',
            'project_id',
            'title',
            'category',
            'description',
            'image',
            'newImage',
            'start_date',
            'end_date',
            'cost',
            'status',
            'isEditing',
            'projectToDelete',
        ]);
        $this->resetValidation();
    }

    /**
     * Handle modal close event
     */
    public function closeModal(): void
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->projectToDelete = '';
    }

    /**
     * Save or update project.
     */
    public function save(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $imagePath = $this->image;
            if ($this->newImage) {
                // Delete old image if exists
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }

                // Create a safe filename
                $filename = Str::slug($this->title) . '-' . time() . '.' . $this->newImage->getClientOriginalExtension();
                $imagePath = $this->newImage->storeAs('projects', $filename, 'public');
            }

            if ($this->isEditing) {
                $project = Project::findOrFail($this->project_id);
                $project->update([
                    'title' => $this->title,
                    'category' => $this->category,
                    'description' => $this->description,
                    'image' => $imagePath,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'cost' => $this->cost,
                    'status' => $this->status,
                ]);

                $this->notifySuccess('Project updated successfully.');
            } else {
                $project = Project::create([
                    'client_id' => $this->client_id,
                    'title' => $this->title,
                    'category' => $this->category,
                    'description' => $this->description,
                    'image' => $imagePath,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'cost' => $this->cost,
                    'status' => $this->status,
                ]);

                $this->notifySuccess('Project created successfully.');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Render the Livewire component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $projects = Project::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.project.manage-projects', [
            'projects' => $projects,
            'clients' => Client::orderBy('name')->get()
        ]);
    }
}
