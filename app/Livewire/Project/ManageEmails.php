<?php

namespace App\Livewire\Project;

use App\Models\Email;
use App\Models\Domain;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmailClient;

class ManageEmails extends Component
{
    use WithPagination;
    use WithNotification;

    // Form Properties
    public $domain_id;
    public $email_id;
    public $email;
    public $password;

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
            'domain_id' => 'required|exists:domains,id',
            'email' => 'required|max:255|unique:emails,email,' . ($this->email_id ?? ''),
            'password' => $this->email_id ? 'nullable|string|min:6' : 'required|string|min:6',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->email_id = null;
        $this->domain_id = '';
        $this->email = '';
        $this->password = '';
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
     * Initialize create email form
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
     * Load email data for editing
     * Populates form fields with existing email data
     *
     * @param int $id Email ID to edit
     * @return void
     */
    public function edit($id)
    {
        $email = Email::findOrFail($id);
        $this->email_id = $id;
        $this->domain_id = $email->domain_id;
        $this->email = explode('@', $email->email)[0]; // Get username part only
        $this->password = $email->password;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the email ID for deletion and opens confirmation modal
     *
     * @param int $id Email ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->email_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update email data
     * Validates input and saves email information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $domain = Domain::findOrFail($this->domain_id);
            $fullEmail = $this->email . '@' . $domain->name;

            if ($this->email_id) {
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

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete email record
     *
     * @return void
     */
    public function deleteEmail()
    {
        try{
            $email = Email::find($this->email_id);

            $email->delete();
            $this->notifySuccess('Email deleted successfully.');

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
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
     * Render component view
     * Fetches paginated projects and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $emails = Email::with('domain')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $domains = Domain::orderBy('name')->get();

        return view('livewire.project.manage-emails', compact('emails', 'domains'));
    }
}
