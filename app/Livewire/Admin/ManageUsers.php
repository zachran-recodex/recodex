<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ManageUsers extends Component
{
    use WithPagination, WithNotification;

    public $userId;
    public $name;
    public $email;
    public $password;
    public $selectedRoles = [];

    public $isEditing = false;
    public $searchTerm = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8',
            'selectedRoles' => 'array',
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
        $user = User::findOrFail($id);

        if ($user) {
            $this->isEditing = true;
            $this->userId = $id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = '';
            $this->selectedRoles = $user->roles->pluck('id')->toArray();

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->userId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $user = User::findOrFail($this->userId);

        if ($user) {
            $user->delete();
            $this->notifySuccess('User deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['userId', 'name', 'email', 'password', 'selectedRoles']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                // Mode edit: Update pengguna yang ada
                $user = User::findOrFail($this->userId);

                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);

                // Update password jika diisi
                if (!empty($this->password)) {
                    $user->update([
                        'password' => Hash::make($this->password),
                    ]);
                }

                // Update role pengguna
                $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();
                $user->syncRoles($roleNames);

                $this->notifySuccess('User updated successfully');
            } else {
                // Mode create: Buat pengguna baru
                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);

                // Assign role ke pengguna baru
                $roleNames = Role::whereIn('id', $this->selectedRoles)->pluck('name')->toArray();
                $user->syncRoles($roleNames);

                $this->notifySuccess('User created successfully');
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

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $users = User::when($this->searchTerm, function($query) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('email', 'like', '%' . $this->searchTerm . '%');
        });

        // Handle role sorting separately
        if ($this->sortField === 'role') {
            $users->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->groupBy(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.email_verified_at',
                    'users.password',
                    'users.remember_token',
                    'users.created_at',
                    'users.updated_at'
                )
                ->orderBy(DB::raw('MIN(roles.name)'), $this->sortDirection)
                ->select('users.*');
        } else {
            $users->orderBy($this->sortField, $this->sortDirection);
        }

        $users = $users->paginate(10);
        $roles = Role::all();

        return view('livewire.admin.manage-users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
