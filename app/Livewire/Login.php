<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username; // either email or username
    public $password;

    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        $fieldType = filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $this->username, 'password' => $this->password])) {
            session()->regenerate();

            return redirect()->intended('/dashboard');
        } else {
            $this->addError('username', 'The provided credentials do not match our records.');
        }
    }

    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.app');
    }
}
