<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Livewire\Component;

class Orders extends Component
{
    public bool $active = false;
    public $orders = [];

    public function mount()
    {
        $user = auth()->user();
        // dd($user);
        $this->orders = $user->orders;
    }

    public function render()
    {
        return view('livewire.ecommerce.my-account.orders');
    }
}
