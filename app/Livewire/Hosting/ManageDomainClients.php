<?php

namespace App\Livewire\Hosting;

use App\Models\Hosting\DomainClient;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageDomainClients extends Component
{
    use WithPagination, WithNotification;

    public $domainId;
    public $domain;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'domain' => 'required|string|max:255|unique:domain_clients,domain,' . ($this->domainId ?? ''),
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
        $domain = DomainClient::findOrFail($id);

        if ($domain) {
            $this->isEditing = true;
            $this->domainId = $id;
            $this->domain = $domain->domain;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->domainId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $domain = DomainClient::findOrFail($this->domainId);

        if ($domain) {
            $domain->delete();
            $this->notifySuccess('Domain client deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['domainId', 'domain']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $domain = DomainClient::findOrFail($this->domainId);
                $domain->update([
                    'domain' => $this->domain,
                ]);

                $this->notifySuccess('Domain client updated successfully.');
            } else {
                DomainClient::create([
                    'domain' => $this->domain,
                ]);

                $this->notifySuccess('Domain client created successfully.');
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
        $domains = DomainClient::when($this->searchTerm, function($query) {
                $query->where('domain', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.hosting.manage-domain-clients', [
            'domains' => $domains
        ]);
    }
}
