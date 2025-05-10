<?php

namespace App\Livewire\Administrator;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ManageRoles extends Component
{
    use WithPagination;

    // Form properties
    public $roleId;
    public $name;
    public $permissions = [];
    public $selectedPermissions = [];

    // UI state
    public $isOpen = false;
    public $confirmingRoleDeletion = false;
    public $roleIdBeingDeleted;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'selectedPermissions' => 'required|array|min:1',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'roleId',
            'name',
            'selectedPermissions',
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
        $role = Role::findOrFail($id);
        $this->roleId = $id;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'guard_name' => 'web', // Pastikan guard_name diatur dengan benar
        ];

        // Ambil objek Permission berdasarkan ID yang dipilih
        $permissions = Permission::whereIn('id', $this->selectedPermissions)->get();

        // Create or update role
        if ($this->roleId) {
            $role = Role::findOrFail($this->roleId);
            $role->update($data);

            // Sync permissions menggunakan objek Permission
            $role->syncPermissions($permissions);

            session()->flash('message', 'Role updated successfully.');
        } else {
            $role = Role::create($data);

            // Assign permissions menggunakan objek Permission
            $role->syncPermissions($permissions);

            session()->flash('message', 'Role created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmRoleDeletion($id)
    {
        $this->confirmingRoleDeletion = true;
        $this->roleIdBeingDeleted = $id;
    }

    public function deleteRole()
    {
        $role = Role::findOrFail($this->roleIdBeingDeleted);

        // Prevent deletion of Super Admin role
        if ($role->name === 'Super Admin') {
            session()->flash('error', 'Super Admin role cannot be deleted.');
            $this->confirmingRoleDeletion = false;
            return;
        }

        $role->delete();
        $this->confirmingRoleDeletion = false;
        session()->flash('message', 'Role deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingRoleDeletion = false;
        $this->roleIdBeingDeleted = null;
    }

    public function render()
    {
        $roles = Role::with('permissions')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $permissions = Permission::orderBy('name')->get();

        return view('livewire.administrator.manage-roles', [
            'roles' => $roles,
            'allPermissions' => $permissions,
        ]);
    }
}
