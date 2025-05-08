<?php

namespace App\Livewire\Administrator;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUsers extends Component
{
    use WithPagination;

    // Form properties
    public $userId;
    public $name;
    public $email;
    public $password;
    public $photo;
    public $current_photo;

    // UI state
    public $isOpen = false;
    public $confirmingUserDeletion = false;
    public $userIdBeingDeleted;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|min:8',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'userId',
            'name',
            'email',
            'password',
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
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        // Create or update user
        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->update($data);
            session()->flash('message', 'User updated successfully.');
        } else {
            User::create($data);
            session()->flash('message', 'User created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmUserDeletion($id)
    {
        $this->confirmingUserDeletion = true;
        $this->userIdBeingDeleted = $id;
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingDeleted);

        $user->delete();
        $this->confirmingUserDeletion = false;
        session()->flash('message', 'User deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingUserDeletion = false;
        $this->userIdBeingDeleted = null;
    }

    public function render()
    {
        $users = User::orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.administrator.manage-users', [
            'users' => $users
        ]);
    }
}
