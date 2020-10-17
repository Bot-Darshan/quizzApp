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

    protected $rules = [
        'username' => 'required|min:6|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:9',
        'passwordConfirm' => 'required|same:password',
    ];

    protected $messages = [
        'username.required' => 'Le champ Pseudo est obligatoire',
        'username.min' => 'Votre pseudo doit avoir au minimum 6 caractères',
        'username.unique' => 'Ce pseudo est déjà utilisé :(',
        'email.required' => 'Le champ Email est obligatoire',
        'email.email' => 'L\'email semble invalide :o',
        'email.unique' => 'Cette adresse mail est déjà utilisée',
        'password.required' => 'Le champ Mot de passe est obligatoire',
        'password.min' => 'Votre mot de passe doit contenir au minimum 9 caractères',
        'passwordConfirm.required' => 'Le champ Mot de passe est obligatoire',
        'passwordConfirm.same' => 'Les mots de passe ne sont pas identiques',
    ];

    public function updatedEmail($value)
    {
        $this->validateOnly('email');
    }

    public function updatedUsername($value)
    {
        $this->validateOnly('username');
    }

    public function register()
    {
        $validatedData = $this->validate();

        $user = User::create($validatedData);

        auth()->login($user);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
