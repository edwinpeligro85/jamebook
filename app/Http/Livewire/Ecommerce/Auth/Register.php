<?php

namespace App\Http\Livewire\Ecommerce\Auth;

use Livewire\Component;

class Register extends Component
{

    protected $rules = [
        'name' => 'required|min:6|max:100',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'confirmpassword' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.ecommerce.auth.register');
    }
}
