<?php

namespace App\Livewire\Hosting;

use Livewire\Component;
use App\WithNotification;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Hosting\EmailClient;
use App\Models\Hosting\DomainClient;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmailClient;

class ManageEmailClients extends Component
{
    use WithPagination, WithNotification;

    public $clientId;
    public $domain_client_id;
    public $email;
    public $password;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'domain_client_id' => 'required|exists:domain_clients,id',
            'email' => 'required|max:255|unique:email_clients,email,' . ($this->clientId ?? ''),
            'password' => $this->isEditing ? 'nullable|string|min:6' : 'required|string|min:6',
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
        $client = EmailClient::findOrFail($id);

        if ($client) {
            $this->isEditing = true;
            $this->clientId = $id;
            $this->domain_client_id = $client->domain_client_id;
            $this->email = explode('@', $client->email)[0]; // Get username part only
            $this->password = '';

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
        $client = EmailClient::findOrFail($this->clientId);

        if ($client) {
            $client->delete();
            $this->notifySuccess('Email client deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['clientId', 'domain_client_id', 'email', 'password']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $domain = DomainClient::findOrFail($this->domain_client_id);
            $fullEmail = $this->email . '@' . $domain->domain;

            if ($this->isEditing) {
                $client = EmailClient::findOrFail($this->clientId);
                $data = [
                    'domain_client_id' => $this->domain_client_id,
                    'email' => $fullEmail,
                ];

                if ($this->password) {
                    $data['password'] = $this->password;
                    $data['password_updated_at'] = now();
                }

                $client->update($data);
                $this->notifySuccess('Email client updated successfully.');
            } else {
                EmailClient::create([
                    'domain_client_id' => $this->domain_client_id,
                    'email' => $fullEmail,
                    'password' => $this->password,
                    'password_updated_at' => now(),
                ]);

                $this->notifySuccess('Email client created successfully.');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function sendResetPasswordLink($id)
    {
        $client = EmailClient::findOrFail($id);

        $token = Str::random(64);

        $client->update([
            'reset_token' => $token,
            'reset_token_expires_at' => now()->addHour(),
        ]);

        $resetUrl = route('hosting.reset-password', $token);

        Mail::to($client->email)->send(new ResetPasswordEmailClient($resetUrl));

        $this->notifySuccess('Password reset link has been sent to the email client.');
    }

    public function render()
    {
        $clients = EmailClient::with('domainClient')
            ->when($this->searchTerm, function($query) {
                $query->where('email', 'like', '%' . $this->searchTerm . '%')
                    ->orWhereHas('domainClient', function($query) {
                        $query->where('domain', 'like', '%' . $this->searchTerm . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.hosting.manage-email-clients', [
            'clients' => $clients,
            'domains' => DomainClient::all()
        ]);
    }
}
