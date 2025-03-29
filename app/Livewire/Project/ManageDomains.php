<?php

namespace App\Livewire\Project;

use App\Models\Client;
use App\Models\Domain;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageDomains extends Component
{
    use WithPagination, WithNotification;

    public $domain_id;
    public $client_id;
    public $name = '';
    public $registration_date;
    public $expiration_date;

    public $isEditing = false;
    public $domainToDelete = '';

    /**
     * Validation rules for domain form.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'expiration_date' => 'required|date|after:registration_date',
        ];
    }

    /**
     * Validate only the changed property.
     *
     * @param string $propertyName
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Prepare for creating a new domain.
     */
    public function create(): void
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    /**
     * Prepare for editing an existing domain.
     *
     * @param int $id
     */
    public function edit($id): void
    {
        $domain = Domain::findOrFail($id);

        $this->isEditing = true;
        $this->client_id = $domain->client_id;
        $this->domain_id = $id;
        $this->name = $domain->name;
        $this->registration_date = $domain->registration_date;
        $this->expiration_date = $domain->expiration_date;

        $this->modal('form')->show();
    }

    /**
     * Confirm deletion of a domain.
     *
     * @param int $id
     */
    public function confirmDelete($id): void
    {
        $domain = Domain::findOrFail($id);
        $this->domain_id = $id;
        $this->domainToDelete = $domain->name;
        $this->modal('delete')->show();
    }

    /**
     * Delete the selected domain.
     */
    public function delete(): void
    {
        $domain = Domain::findOrFail($this->domain_id);
        $domain->delete();
        $this->notifySuccess('Domain deleted successfully');
        $this->modal('delete')->close();
    }

    /**
     * Reset form to initial state.
     */
    public function resetForm(): void
    {
        $this->reset([
            'client_id',
            'domain_id',
            'name',
            'registration_date',
            'expiration_date',
            'isEditing',
            'domainToDelete',
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
        $this->domainToDelete = '';
    }

    /**
     * Save or update domain.
     */
    public function save(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $domain = Domain::findOrFail($this->domain_id);
                $domain->update([
                    'client_id' => $this->client_id,
                    'name' => $this->name,
                    'registration_date' => $this->registration_date,
                    'expiration_date' => $this->expiration_date,
                ]);

                $this->notifySuccess('Domain updated successfully.');
            } else {
                $domain = Domain::create([
                    'client_id' => $this->client_id,
                    'name' => $this->name,
                    'registration_date' => $this->registration_date,
                    'expiration_date' => $this->expiration_date,
                ]);

                $this->notifySuccess('Domain created successfully.');
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
        $domains = Domain::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.project.manage-domains', [
            'domains' => $domains,
            'clients' => Client::orderBy('name')->get()
        ]);
    }
}
