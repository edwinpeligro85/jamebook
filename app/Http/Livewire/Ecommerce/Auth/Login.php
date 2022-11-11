<?php

namespace App\Http\Livewire\Ecommerce\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.ecommerce.auth.login');
    }
}
