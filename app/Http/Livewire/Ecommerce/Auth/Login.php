<?php

namespace App\Http\Livewire\Ecommerce\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.ecommerce.auth.login');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
 
            session()->flash('success_message', _('Login Successfully'));
            return redirect()->intended('my-account');
        }

        $this->addError('email', _('The provided credentials do not match our records.'));
    }
}
