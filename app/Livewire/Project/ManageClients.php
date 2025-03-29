<?php

namespace App\Livewire\Project;

use App\Models\Client;
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
    public $domain = '';

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
            'email' => 'required|email|unique:clients,email,' . ($this->client_id ?? 'NULL'),
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'newLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'domain' => 'required|string|max:255|regex:/^[\w\-\.]+\.[a-zA-Z]{2,}$/|unique:domains,name,' . ($this->client_id ? $this->getDomainId() : 'NULL')
        ];
    }

    /**
     * Get the domain ID for unique validation
     *
     * @return int|null
     */
    protected function getDomainId(): ?int
    {
        $client = Client::find($this->client_id);
        return $client && $client->domain ? $client->domain->id : null;
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
        $this->domain = $client->domain?->name ?? '';

        $this->modal('form')->show();
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
            'isEditing',
            'clientToDelete',
            'domain'
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

            if ($this->isEditing) {
                $client = Client::findOrFail($this->client_id);
                $client->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'company' => $this->company,
                    'logo' => $logoPath,
                ]);

                // Check if domain exists before updating
                if ($client->domain) {
                    $client->domain->update(['name' => $this->domain]);
                } else {
                    $client->domain()->create(['name' => $this->domain]);
                }

                $this->notifySuccess('Client updated successfully.');
            } else {
                $client = Client::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'company' => $this->company,
                    'logo' => $logoPath,
                ]);

                $client->domain()->create([
                    'name' => $this->domain
                ]);

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

        return view('livewire.project.manage-clients', [
            'clients' => $clients
        ]);
    }
}
