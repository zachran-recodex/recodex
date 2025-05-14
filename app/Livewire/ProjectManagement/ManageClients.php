<?php

namespace App\Livewire\ProjectManagement;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ManageClients extends Component
{
    use WithPagination;

    // Form properties
    public $clientId;
    public $company;
    public $name;
    public $email;
    public $phone;
    public $address;

    // UI state
    public $isOpen = false;
    public $confirmingClientDeletion = false;
    public $clientIdBeingDeleted;

    protected $rules = [
        'company' => 'required|min:3|max:255',
        'name' => 'required|min:3|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|max:20',
        'address' => 'nullable',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'clientId',
            'company',
            'name',
            'email',
            'phone',
            'address',
        ]);

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $this->clientId = $id;
        $this->company = $client->company;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->phone = $client->phone;
        $this->address = $client->address;

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'company' => $this->company,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ];

        // Create or update client
        if ($this->clientId) {
            $client = Client::findOrFail($this->clientId);
            $client->update($data);
            flash()->success('Client updated successfully.');
        } else {
            Client::create($data);
            flash()->success('Client created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmClientDeletion($id)
    {
        $this->confirmingClientDeletion = true;
        $this->clientIdBeingDeleted = $id;
    }

    public function deleteClient()
    {
        $client = Client::findOrFail($this->clientIdBeingDeleted);

        // Check if client has related projects
        if ($client->projects()->count() > 0) {
            session()->flash('error', 'Client cannot be deleted because it has associated projects.');
            $this->confirmingClientDeletion = false;
            return;
        }

        $client->delete();
        $this->confirmingClientDeletion = false;
        flash()->success('Client deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingClientDeletion = false;
        $this->clientIdBeingDeleted = null;
    }

    public function render()
    {
        $clients = Client::orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.project-management.manage-clients', [
            'clients' => $clients
        ]);
    }
}
