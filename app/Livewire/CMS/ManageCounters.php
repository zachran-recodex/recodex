<?php

namespace App\Livewire\CMS;

use App\Models\Counter;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageCounters extends Component
{
    use WithPagination, WithNotification;

    public $counterId;
    public $title;
    public $number;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'number' => 'required|numeric|min:0',
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
        $counter = Counter::findOrFail($id);

        if ($counter) {
            $this->isEditing = true;
            $this->counterId = $id;
            $this->title = $counter->title;
            $this->number = $counter->number;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->counterId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $counter = Counter::findOrFail($this->counterId);

        if ($counter) {
            $counter->delete();
            $this->notifySuccess('Counter deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['counterId', 'title', 'number']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $counter = Counter::findOrFail($this->counterId);
                $counter->update([
                    'title' => $this->title,
                    'number' => $this->number,
                ]);

                $this->notifySuccess('Counter updated successfully.');
            } else {
                Counter::create([
                    'title' => $this->title,
                    'number' => $this->number,
                ]);

                $this->notifySuccess('Counter created successfully.');
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
        $counters = Counter::when($this->searchTerm, function($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-counters', [
            'counters' => $counters
        ]);
    }
}