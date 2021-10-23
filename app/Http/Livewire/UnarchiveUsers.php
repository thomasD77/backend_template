<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UnarchiveUsers extends Component
{
    public function unArchiveUser($id)
    {
        $user = User::findOrFail($id);
        $user->archived = 0;
        $user->update();
    }

    public function render()
    {
        $roles = ['superAdmin', 'admin', 'employee'];

        $users = User::whereHas('roles', function($q) use($roles) {
            $q->whereIn('name', $roles);})
            ->where('archived', 1)
            ->latest()
            ->paginate(10);

        return view('livewire.unarchive-users', compact('users'));
    }
}