<?php

namespace App\Livewire;

use App\Models\Counter;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageCounters extends Component
{
    use WithNotification, WithPagination;

    // Form Properties
    public $counter_id;
    public $title;
    public $number;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'number' => 'required|integer|min:0',
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
            $this->counter_id = $id;
            $this->title = $counter->title;
            $this->number = $counter->number;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->counter_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $counter = Counter::findOrFail($this->counter_id);

        if ($counter) {
            $counter->delete();
            $this->notifySuccess('Counter deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['counter_id', 'title', 'number']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $counter = Counter::findOrFail($this->counter_id);

                $counter->update([
                    'title' => $this->title,
                    'number' => $this->number,
                ]);
                $this->notifySuccess('Counter updated successfully');
            } else {
                Counter::create([
                    'title' => $this->title,
                    'number' => $this->number,
                ]);
                $this->notifySuccess('Counter created successfully');
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
        $counters = Counter::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-counters', [
            'counters' => $counters
        ]);
    }
}
