<?php

namespace App\Livewire\CMS;

use App\Models\Project;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ManageProjects extends Component
{
    use WithPagination, WithNotification, WithFileUploads;

    public $projectId;
    public $title;
    public $description;
    public $image;
    public $newImage;
    public $project_date;
    public $duration;
    public $cost;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => $this->isEditing ? 'nullable|string' : 'required|string',
            'newImage' => $this->isEditing ? 'nullable|image|max:1024' : 'required|image|max:1024',
            'project_date' => 'required|date',
            'duration' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0'
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
            $this->projectId = $id;
            $this->title = $project->title;
            $this->description = $project->description;
            $this->image = $project->image;
            $this->project_date = $project->project_date->format('Y-m-d');
            $this->duration = $project->duration;
            $this->cost = $project->cost;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->projectId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $project = Project::findOrFail($this->projectId);

        if ($project) {
            $project->delete();
            $this->notifySuccess('Project deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['projectId', 'title', 'description', 'image', 'newImage', 'project_date', 'duration', 'cost']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->newImage) {
                $imagePath = $this->newImage->store('projects', 'public');
            }

            if ($this->isEditing) {
                $project = Project::findOrFail($this->projectId);
                $project->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $this->newImage ? $imagePath : $this->image,
                    'project_date' => $this->project_date,
                    'duration' => $this->duration,
                    'cost' => $this->cost,
                ]);

                $this->notifySuccess('Project updated successfully.');
            } else {
                Project::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath,
                    'project_date' => $this->project_date,
                    'duration' => $this->duration,
                    'cost' => $this->cost,
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

    public function render()
    {
        $projects = Project::when($this->searchTerm, function($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-projects', [
            'projects' => $projects
        ]);
    }
}
