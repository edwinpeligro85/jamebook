<?php

namespace App\Http\Livewire\Ecommerce\Order;

use App\Models\Order;
use Livewire\Component;

class Complete extends Component
{
    public Order $order;

    public function render()
    {
        return view('livewire.ecommerce.order.complete');
    }
}
