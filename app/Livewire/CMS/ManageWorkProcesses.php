<?php

namespace App\Livewire\CMS;

use App\Models\WorkProcess;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;

class ManageWorkProcesses extends Component
{
    use WithPagination;
    use WithNotification;

    // Form Properties
    public $process_id;
    public $title;
    public $description;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for process form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->process_id = null;
        $this->title = '';
        $this->description = '';
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
     * Initialize create process form
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
     * Load process data for editing
     * Populates form fields with existing process data
     *
     * @param int $id Work Process ID to edit
     * @return void
     */
    public function edit($id)
    {
        $process = WorkProcess::findOrFail($id);
        $this->process_id = $id;
        $this->title = $process->title;
        $this->description = $process->description;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the process ID for deletion and opens confirmation modal
     *
     * @param int $id Work Process ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->process_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update process data
     * Validates input and saves process information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'title' => $this->title,
                'description' => $this->description,
            ];

            if ($this->process_id) {
                // Update existing process
                $process = WorkProcess::find($this->process_id);
                $process->update($data);
                $this->notifySuccess('Work Process updated successfully.');
            } else {
                // Create new process
                WorkProcess::create($data);
                $this->notifySuccess('Work Process created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete process record
     *
     * @return void
     */
    public function deleteProcess()
    {
        try {
            $process = WorkProcess::find($this->process_id);

            $process->delete();
            $this->notifySuccess('Work Process deleted successfully.');

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated processs and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $processes = WorkProcess::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-work-processes', compact('processes'));
    }
}
