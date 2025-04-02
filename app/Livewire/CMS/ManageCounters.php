<?php

namespace App\Livewire\CMS;

use App\Models\Counter;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;

class ManageCounters extends Component
{
    use WithPagination;
    use WithNotification;

    // Form Properties
    public $counter_id;
    public $title;
    public $number;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for counter form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'number' => 'required|numeric|min:0',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->counter_id = null;
        $this->title = '';
        $this->number = '';
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
     * Initialize create counter form
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
     * Load counter data for editing
     * Populates form fields with existing counter data
     *
     * @param int $id Counter ID to edit
     * @return void
     */
    public function edit($id)
    {
        $counter = Counter::findOrFail($id);
        $this->counter_id = $id;
        $this->title = $counter->title;
        $this->number = $counter->number;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the counter ID for deletion and opens confirmation modal
     *
     * @param int $id Counter ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->counter_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update counter data
     * Validates input and saves counter information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'title' => $this->title,
                'number' => $this->number,
            ];

            if ($this->counter_id) {
                // Update existing counter
                $counter = Counter::find($this->counter_id);
                $counter->update($data);
                $this->notifySuccess('Counter updated successfully.');
            } else {
                // Create new counter
                Counter::create($data);
                $this->notifySuccess('Counter created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete counter record
     *
     * @return void
     */
    public function deleteCounter()
    {
        try {
            $counter = Counter::find($this->counter_id);

            $counter->delete();
            $this->notifySuccess('Counter deleted successfully.');

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated counters and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $counters = Counter::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-counters', compact('counters'));
    }
}
