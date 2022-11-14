<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AccountInfo extends Component
{
    public bool $active = false;

    public $user;
    public $new_password;
    public $current_password;
    public $new_password_confirmation;

    protected $validationAttributes = [
        'new_password' => 'contraseña',
    ];

    protected function rules()
    {
        return [
            'user.name' => 'sometimes|min:6|max:100',
            'user.email' => 'sometimes|unique:users,email,' . $this->user->id,
            'current_password' => 'nullable|current_password',
            'new_password' => 'nullable|min:6|confirmed',
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.ecommerce.my-account.account-info');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $data = $this->validate();

        if (isset($data['new_password'])) {
            $this->user->password = Hash::make($data['new_password']);
        }

        $this->user->save();
        session()->flash('success_message', _('Changes Successfully'));
    }
}
