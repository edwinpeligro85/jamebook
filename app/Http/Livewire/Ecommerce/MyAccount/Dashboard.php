<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Livewire\Component;

class Dashboard extends Component
{
    public $username;
    public bool $active = false;

    public function mount() {
        $this->username = auth()->user()->name;
    }
    public function render()
    {
        return view('livewire.ecommerce.my-account.dashboard');
    }
}
