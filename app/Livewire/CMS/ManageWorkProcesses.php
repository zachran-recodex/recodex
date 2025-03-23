<?php

namespace App\Livewire\CMS;

use App\Models\WorkProcess;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageWorkProcesses extends Component
{
    use WithPagination, WithNotification;

    public $processId;
    public $title;
    public $description;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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
        $process = WorkProcess::findOrFail($id);

        if ($process) {
            $this->isEditing = true;
            $this->processId = $id;
            $this->title = $process->title;
            $this->description = $process->description;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->processId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $process = WorkProcess::findOrFail($this->processId);

        if ($process) {
            $process->delete();
            $this->notifySuccess('Work process deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['processId', 'title', 'description']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $process = WorkProcess::findOrFail($this->processId);
                $process->update([
                    'title' => $this->title,
                    'description' => $this->description,
                ]);

                $this->notifySuccess('Work process updated successfully.');
            } else {
                WorkProcess::create([
                    'title' => $this->title,
                    'description' => $this->description,
                ]);

                $this->notifySuccess('Work process created successfully.');
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
        $processes = WorkProcess::when($this->searchTerm, function($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-work-processes', [
            'processes' => $processes
        ]);
    }
}