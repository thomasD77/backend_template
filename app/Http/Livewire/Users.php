<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $roles = ['superAdmin', 'admin', 'employee'];

        $users = User::whereHas('roles', function($q) use($roles) {
            $q->whereIn('name', $roles);})
            ->latest()
            ->paginate(10);

        return view('livewire.users', compact('users'));
    }
}
