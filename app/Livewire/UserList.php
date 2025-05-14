<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class UserList extends Component
{
    public $users;

    public function mount() : void
    {
        $this->users = User::with('details')->get();
    }

    public function render() : View
    {
        return view('livewire.user-list');
    }
}

