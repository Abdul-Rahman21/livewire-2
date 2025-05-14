<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;

class UserForm extends Component
{
    use WithFileUploads;

    public $userId, $prefixname, $firstname, $middlename, $lastname, $suffixname, $username, $email;
    public $image;
    public $photoPreview;

    public function mount($userId = null): void
    {
        if ($userId) {
            $user = User::findOrFail($userId);
            $this->userId = $user->id;
            $this->prefixname = $user->prefixname;
            $this->firstname = $user->firstname;
            $this->middlename = $user->middlename;
            $this->lastname = $user->lastname;
            $this->suffixname = $user->suffixname;
            $this->username = $user->username;
            $this->email = $user->email;
            $this->photoPreview = $user->photo;
        }
    }

    public function save()
    {
        $validated = $this->validate([
            'prefixname' => 'required|in:Mr.,Mrs.',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'suffixname' => 'nullable|string',
            'username' => 'required|string|unique:users,username,' . $this->userId,
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'image' => 'nullable|image|max:1024',
        ]);

        if ($this->image) {
            $validated['photo'] = $this->image->store('uploads', 'public');
        }

        User::updateOrCreate(
            ['id' => $this->userId],
            $validated
        );

        session()->flash('message', 'User saved successfully!');
        return redirect()->route('user.index');
    }
    public function render(): View
    {
        return view('livewire.user-form');
    }
}
