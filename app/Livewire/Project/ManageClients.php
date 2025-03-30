<?php

namespace App\Livewire\Project;

use App\Models\Client;
use App\Models\Domain;
use Livewire\Component;
use App\WithNotification;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageClients extends Component
{
    use WithPagination, WithNotification, WithFileUploads;

    public $client_id;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $company = '';
    public $logo;
    public $newLogo;
    public $primary_domain_id;
    public $primaryDomain;
    public $domains;

    public $isEditing = false;
    public $clientToDelete = '';

    /**
     * Validation rules for client form.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'required|string|max:255',
            'newLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'primary_domain_id' => 'required|exists:domains,id'
        ];
    }

    /**
     * Validate only the changed property.
     *
     * @param string $propertyName
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Prepare for creating a new client.
     */
    public function create(): void
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    /**
     * Prepare for editing an existing client.
     *
     * @param int $id
     */
    public function edit(int $id): void
    {
        $client = Client::findOrFail($id);

        $this->isEditing = true;
        $this->client_id = $id;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->phone = $client->phone;
        $this->company = $client->company;
        $this->logo = $client->logo;
        $this->primary_domain_id = $client->primary_domain_id;

        $this->modal('form')->show();
    }

    /**
     * Show client details.
     *
     * @param int $id
     */
    public function show(int $id): void
    {
        $client = Client::with(['primaryDomain', 'domains'])->findOrFail($id);
        $this->client_id = $id;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->phone = $client->phone;
        $this->company = $client->company;
        $this->logo = $client->logo;
        $this->primary_domain_id = $client->primary_domain_id;
        $this->primaryDomain = $client->primaryDomain;
        $this->domains = $client->domains;

        $this->modal('show')->show();
    }

    /**
     * Confirm deletion of a client.
     *
     * @param int $id
     */
    public function confirmDelete(int $id): void
    {
        $client = Client::findOrFail($id);
        $this->client_id = $id;
        $this->clientToDelete = $client->name;
        $this->modal('delete')->show();
    }

    /**
     * Delete the selected client.
     */
    public function delete(): void
    {
        $client = Client::findOrFail($this->client_id);
        $client->delete();
        $this->notifySuccess('Client deleted successfully');
        $this->modal('delete')->close();
    }

    /**
     * Reset form to initial state.
     */
    public function resetForm(): void
    {
        $this->reset([
            'client_id',
            'name',
            'email',
            'phone',
            'company',
            'logo',
            'newLogo',
            'primary_domain_id',
            'primaryDomain',
            'domains',
            'isEditing',
            'clientToDelete',
        ]);
        $this->resetValidation();
    }

    /**
     * Handle modal close event
     */
    public function closeModal(): void
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->clientToDelete = '';
    }

    /**
     * Save or update client.
     */
    public function save(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $logoPath = $this->logo;
            if ($this->newLogo) {
                // Delete old logo if exists
                if ($logoPath && Storage::disk('public')->exists($logoPath)) {
                    Storage::disk('public')->delete($logoPath);
                }

                // Create a safe filename
                $filename = Str::slug($this->name) . '-' . time() . '.' . $this->newLogo->getClientOriginalExtension();
                $logoPath = $this->newLogo->storeAs('clients', $filename, 'public');
            }

            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'company' => $this->company,
                'logo' => $logoPath,
                'primary_domain_id' => $this->primary_domain_id,
            ];

            if ($this->isEditing) {
                $client = Client::findOrFail($this->client_id);
                $client->update($data);

                $this->notifySuccess('Client updated successfully.');
            } else {
                Client::create($data);

                $this->notifySuccess('Client created successfully.');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Render the Livewire component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $clients = Client::orderBy('created_at', 'desc')
            ->paginate(10);

        $domains = Domain::orderBy('name')->get();

        return view('livewire.project.manage-clients', [
            'clients' => $clients,
            'domains' => $domains,
        ]);
    }
}
