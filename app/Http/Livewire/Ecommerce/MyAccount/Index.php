<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.my-account.index');
    }
}
