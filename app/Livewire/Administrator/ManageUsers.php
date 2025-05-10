<?php

namespace App\Livewire\Administrator;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUsers extends Component
{
    use WithPagination;

    public function toggleStatus($userId)
    {
        $user = User::findOrFail($userId);
        $user->is_active = !$user->is_active;
        $user->save();

        session()->flash('message', 'User status updated successfully.');
    }

    public function render()
    {
        $teams = User::where('is_team', true)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $users = User::where('is_team', false)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.administrator.manage-users', [
            'teams' => $teams,
            'users' => $users
        ]);
    }
}
