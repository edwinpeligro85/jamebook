<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Livewire\Component;

class Orders extends Component
{
    public bool $active = false;

    public function render()
    {
        return view('livewire.ecommerce.my-account.orders');
    }
}
