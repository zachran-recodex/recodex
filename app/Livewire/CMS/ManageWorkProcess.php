<?php

namespace App\Livewire\CMS;

use App\Models\WorkProcess;
use App\WithNotification;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ManageWorkProcess extends Component
{
    use WithNotification, WithPagination;

    // Form Properties
    public $process_id;
    public $title;
    public $description;

    // UI State Properties
    public $isEditing = false;

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
            $this->process_id = $id;
            $this->title = $process->title;
            $this->description = $process->description;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->process_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $process = WorkProcess::findOrFail($this->process_id);

        if ($process) {
            $process->delete();
            $this->notifySuccess('Work process deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['process_id', 'title', 'description']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $process = WorkProcess::findOrFail($this->process_id);
                $process->update([
                    'title' => $this->title,
                    'description' => $this->description,
                ]);
                $this->notifySuccess('Work process updated successfully');
            } else {
                WorkProcess::create([
                    'title' => $this->title,
                    'description' => $this->description,
                ]);
                $this->notifySuccess('Work process created successfully');
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
        $processes = WorkProcess::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-work-process', [
            'processes' => $processes
        ]);
    }
}
