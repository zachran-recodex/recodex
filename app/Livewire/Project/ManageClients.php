<?php

namespace App\Livewire\Project;

use App\Models\Client;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageClients extends Component
{
    use WithPagination;
    use WithNotification;
    use WithFileUploads;

    // Form Properties
    public $client_id;
    public $name;
    public $email;
    public $phone;
    public $company;
    public $logo;
    public $existing_logo;

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
            'name' => 'required|string|min:3|max:100',
            'email' => ['nullable', 'email', Rule::unique('clients', 'email')->ignore($this->client_id)],
            'phone' => 'nullable|string|max:20',
            'company' => 'required|string|min:2|max:100',
            'logo' => 'nullable|image|mimes:png|max:2048',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->client_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->company = '';
        $this->logo = null;
        $this->existing_logo = null;
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
     * Initialize create client form
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
     * Load client data for editing
     * Populates form fields with existing client data
     *
     * @param int $id Client ID to edit
     * @return void
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $this->client_id = $id;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->phone = $client->phone;
        $this->company = $client->company;
        $this->existing_logo = $client->logo;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the client ID for deletion and opens confirmation modal
     *
     * @param int $id Client ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->client_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update client data
     * Validates input and saves client information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'company' => $this->company,
            ];

            // Handle file upload if present
            if ($this->logo) {
                try {
                    // Delete old file if editing
                    if ($this->client_id && $this->existing_logo) {
                        Storage::delete('public/' . $this->existing_logo);
                    }

                    $logoPath = $this->logo->store('clients', 'public');
                    $data['logo'] = str_replace('public/', '', $logoPath);
                } catch (\Exception $e) {
                    $this->notifyError('Error uploading logo: ' . $e->getMessage());
                    return;
                }
            }

            if ($this->client_id) {
                // Update existing client
                $client = Client::find($this->client_id);
                $client->update($data);
                $this->notifySuccess('Client updated successfully.');
            } else {
                // Create new client
                Client::create($data);
                $this->notifySuccess('Client created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete client record
     * Removes client and associated logo file from storage
     *
     * @return void
     */
    public function deleteClient()
    {
        try {
            $client = Client::find($this->client_id);

            if ($client) {
                // Delete image file if exists
                if ($client->logo) {
                    try {
                        Storage::delete('public/' . $client->logo);
                    } catch (\Exception $e) {
                        // Log error but continue with deletion
                        Log::error('Failed to delete client logo: ' . $e->getMessage());
                    }
                }

                $client->delete();
                $this->notifySuccess('Client deleted successfully.');
            }

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated clients and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $clients = Client::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.project.manage-clients', compact('clients'));
    }
}
