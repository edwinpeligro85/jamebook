<?php

namespace App\Http\Livewire\Ecommerce\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|min:6|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];

    public function render()
    {
        return view('livewire.ecommerce.auth.register');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $data = $this->validate();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        session()->flash('success_message', _('Register Successfully'));
    }
}
