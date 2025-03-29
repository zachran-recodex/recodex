<?php

namespace App\Livewire\Project;

use App\Models\Email;
use App\Models\Domain;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmailClient;

class ManageEmails extends Component
{
    use WithPagination, WithNotification;

    public $domain_id;
    public $email_id;
    public $email;
    public $password;

    public $isEditing = false;
    public $emailToDelete = '';

    /**
     * Validation rules for email form.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'domain_id' => 'required|exists:domains,id',
            'email' => 'required|max:255|unique:emails,email,' . ($this->email_id ?? ''),
            'password' => $this->isEditing ? 'nullable|string|min:6' : 'required|string|min:6',
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
     * Prepare for creating a new email.
     */
    public function create(): void
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    /**
     * Prepare for editing an existing email.
     *
     * @param int $id
     */
    public function edit($id): void
    {
        $email = Email::findOrFail($id);

        $this->isEditing = true;
        $this->domain_id = $email->domain_id;
        $this->email_id = $id;
        $this->email = explode('@', $email->email)[0]; // Get username part only
        $this->password = '';

        $this->modal('form')->show();
    }

    /**
     * Confirm deletion of a email.
     *
     * @param int $id
     */
    public function confirmDelete($id): void
    {
        $email = Email::findOrFail($id);
        $this->email_id = $id;
        $this->emailToDelete = $email->email;
        $this->modal('delete')->show();
    }

    /**
     * Delete the selected email.
     */
    public function delete(): void
    {
        $email = Email::findOrFail($this->email_id);
        $email->delete();
        $this->notifySuccess('Email deleted successfully');
        $this->modal('delete')->close();
    }

    /**
     * Reset form to initial state.
     */
    public function resetForm(): void
    {
        $this->reset([
            'domain_id',
            'email_id',
            'email',
            'password',
            'isEditing',
            'emailToDelete',
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
        $this->emailToDelete = '';
    }

    /**
     * Save or update email.
     */
    public function save(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $domain = Domain::findOrFail($this->domain_id);
            $fullEmail = $this->email . '@' . $domain->name;

            if ($this->isEditing) {
                $email = Email::findOrFail($this->email_id);
                $data = [
                    'domain_id' => $this->domain_id,
                    'email' => $fullEmail,
                ];

                if ($this->password) {
                    $data['password'] = $this->password;
                    $data['password_updated_at'] = now();
                }

                $email->update($data);
                $this->notifySuccess('Email updated successfully.');
            } else {
                $email = Email::create([
                    'domain_id' => $this->domain_id,
                    'email' => $fullEmail,
                    'password' => $this->password,
                    'password_updated_at' => now(),
                ]);

                $this->notifySuccess('Email created successfully.');
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
     * Send a password reset link to the email.
     */
    public function sendResetPasswordLink($id)
    {
        $email = Email::findOrFail($id);

        $token = Str::random(64);

        $email->update([
            'reset_token' => $token,
            'reset_token_expires_at' => now()->addHour(),
        ]);

        $resetUrl = route('project.reset-password', $token);

        Mail::to($email->email)->send(new ResetPasswordEmailClient($resetUrl));

        $this->notifySuccess('Password reset link has been sent to the email client.');
    }

    /**
     * Render the Livewire component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $emails = Email::with('domain')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.project.manage-emails', [
            'emails' => $emails,
            'domains' => Domain::all()
        ]);
    }
}
