<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddressEdit extends Component
{
    protected $listeners = ['savedAddress' => '$refresh'];

    public bool $active = false;
    public $addresses;

    public function mount()
    {
        $this->addresses = Auth::user()->addresses;
    }

    public function render()
    {
        return view('livewire.ecommerce.my-account.address-edit');
    }
}
