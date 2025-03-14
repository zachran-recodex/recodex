<?php

namespace App\Livewire;

use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageClients extends Component
{
    use WithNotification, WithFileUploads, WithPagination;

    // Form Properties
    public $client_id;
    public $name;
    public $email;
    public $phone;
    public $company;
    public $photo;
    public $temp_photo;
    public $photoPreview;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'temp_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
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
            $this->client_id = $id;
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
        $this->client_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $client = Client::findOrFail($this->client_id);

        if ($client) {
            if ($client->photo && Storage::disk('public')->exists($client->photo)) {
                Storage::disk('public')->delete($client->photo);
            }

            $client->delete();
            $this->notifySuccess('Client deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function updatedTempPhoto()
    {
        try {
            if ($this->temp_photo) {
                $this->photoPreview = $this->temp_photo->temporaryUrl();
            }
        } catch (\Exception $e) {
            // Handle the error if needed
        }
    }

    public function resetForm()
    {
        $this->reset(['client_id', 'name', 'email', 'phone', 'company', 'temp_photo', 'photoPreview']);
        $this->resetValidation();
    }

    private function handlePhotoUpload()
    {
        if (!$this->temp_photo) {
            return null;
        }

        return $this->temp_photo->store('clients', 'public');
    }

    private function deleteOldPhoto($client)
    {
        if ($client->photo && Storage::disk('public')->exists($client->photo)) {
            Storage::disk('public')->delete($client->photo);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $photoPath = $this->handlePhotoUpload();

            if ($this->isEditing) {
                $client = Client::findOrFail($this->client_id);

                if ($this->temp_photo) {
                    $this->deleteOldPhoto($client);
                }

                $client->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'company' => $this->company,
                    'photo' => $photoPath ?? $this->photo,
                ]);
                $this->notifySuccess('Client updated successfully');
            } else {
                Client::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'company' => $this->company,
                    'photo' => $photoPath,
                ]);
                $this->notifySuccess('Client created successfully');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->notifyError('Database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $clients = Client::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-clients', [
            'clients' => $clients
        ]);
    }
}
