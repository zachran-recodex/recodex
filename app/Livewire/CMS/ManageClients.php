<?php

namespace App\Livewire\CMS;

use App\Models\Client;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ManageClients extends Component
{
    use WithPagination, WithNotification, WithFileUploads;

    public $clientId;
    public $name;
    public $email;
    public $phone;
    public $company;
    public $photo;
    public $newPhoto;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'photo' => $this->isEditing ? 'nullable|string' : 'required|string',
            'newPhoto' => $this->isEditing ? 'nullable|image|max:1024' : 'required|image|max:1024',
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
        $client = Client::findOrFail($id);

        if ($client) {
            $this->isEditing = true;
            $this->clientId = $id;
            $this->name = $client->name;
            $this->email = $client->email;
            $this->phone = $client->phone;
            $this->company = $client->company;
            $this->photo = $client->photo;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->clientId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $client = Client::findOrFail($this->clientId);

        if ($client) {
            $client->delete();
            $this->notifySuccess('Client deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['clientId', 'name', 'email', 'phone', 'company', 'photo', 'newPhoto']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->newPhoto) {
                $photoPath = $this->newPhoto->store('clients', 'public');
            }

            if ($this->isEditing) {
                $client = Client::findOrFail($this->clientId);
                $client->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'company' => $this->company,
                    'photo' => $this->newPhoto ? $photoPath : $this->photo,
                ]);

                $this->notifySuccess('Client updated successfully.');
            } else {
                Client::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'company' => $this->company,
                    'photo' => $photoPath,
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

    public function render()
    {
        $clients = Client::when($this->searchTerm, function($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('company', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-clients', [
            'clients' => $clients
        ]);
    }
}