<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $username = '';
    public $email = '';
    public $password = '';
    public $passwordConfirm = '';

    public function register()
    {
        User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
