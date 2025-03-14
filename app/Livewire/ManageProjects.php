<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageProjects extends Component
{
    use WithNotification, WithFileUploads, WithPagination;

    // Form Properties
    public $project_id;
    public $title;
    public $description;
    public $project_date;
    public $duration;
    public $cost;
    public $image;
    public $temp_image;
    public $imagePreview;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_date' => 'required|date',
            'duration' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'temp_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        if ($project) {
            $this->isEditing = true;
            $this->project_id = $id;
            $this->title = $project->title;
            $this->description = $project->description;
            $this->project_date = $project->project_date->format('Y-m-d');
            $this->duration = $project->duration;
            $this->cost = $project->cost;
            $this->image = $project->image;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->project_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $project = Project::findOrFail($this->project_id);

        if ($project) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $project->delete();
            $this->notifySuccess('Project deleted successfully');

            $this->modal('delete')->close();
        }
    }

    public function updatedTempImage()
    {
        try {
            if ($this->temp_image) {
                $this->imagePreview = $this->temp_image->temporaryUrl();
            }
        } catch (\Exception $e) {
            // Handle the error if needed
        }
    }

    public function resetForm()
    {
        $this->reset(['project_id', 'title', 'description', 'project_date', 'duration', 'cost', 'temp_image', 'imagePreview']);
        $this->resetValidation();
    }

    private function handleImageUpload()
    {
        if (!$this->temp_image) {
            return null;
        }

        return $this->temp_image->store('projects', 'public');
    }

    private function deleteOldImage($project)
    {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $imagePath = $this->handleImageUpload();

            if ($this->isEditing) {
                $project = Project::findOrFail($this->project_id);

                if ($this->temp_image) {
                    $this->deleteOldImage($project);
                }

                $project->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'project_date' => $this->project_date,
                    'duration' => $this->duration,
                    'cost' => $this->cost,
                    'image' => $imagePath ?? $this->image,
                ]);
                $this->notifySuccess('Project updated successfully');
            } else {
                Project::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'project_date' => $this->project_date,
                    'duration' => $this->duration,
                    'cost' => $this->cost,
                    'image' => $imagePath,
                ]);
                $this->notifySuccess('Project created successfully');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->notifyError('Database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $projects = Project::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-projects', [
            'projects' => $projects
        ]);
    }
}
