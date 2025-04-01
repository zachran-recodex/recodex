<?php

namespace App\Livewire\Project;

use App\Models\Domain;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;

class ManageDomains extends Component
{
    use WithPagination;
    use WithNotification;

    // Form Properties
    public $domain_id;
    public $name;
    public $registration_date;
    public $expiration_date;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for client form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'registration_date' => 'nullable|date',
            'expiration_date' => 'nullable|date|after:registration_date',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->domain_id = null;
        $this->name = '';
        $this->registration_date = null;
        $this->expiration_date = null;
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
     * Initialize create domain form
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
     * Load domain data for editing
     * Populates form fields with existing domain data
     *
     * @param int $id Domain ID to edit
     * @return void
     */
    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        $this->domain_id = $id;
        $this->name = $domain->name;
        $this->registration_date = $domain->registration_date->format('Y-m-d');
        $this->expiration_date = $domain->expiration_date->format('Y-m-d');

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the domain ID for deletion and opens confirmation modal
     *
     * @param int $id Domain ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->domain_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update domain data
     * Validates input and saves domain information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'name' => $this->name,
                'registration_date' => $this->registration_date,
                'expiration_date' => $this->expiration_date,
            ];

            if ($this->domain_id) {
                // Update existing domain
                $domain = Domain::findOrFail($this->domain_id);
                $domain->update($data);
                $this->notifySuccess('Domain updated successfully.');
            } else {
                // Create new domain
                $domain = Domain::create($data);
                $this->notifySuccess('Domain created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete domain record
     *
     * @return void
     */
    public function deleteDomain()
    {
        try{
            $domain = Domain::find($this->domain_id);

            $domain->delete();
            $this->notifySuccess('Domain deleted successfully.');

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated domains and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $domains = Domain::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.project.manage-domains', compact('domains'));
    }
}
