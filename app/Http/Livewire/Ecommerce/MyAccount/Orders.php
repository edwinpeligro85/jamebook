<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Orders extends Component
{
    use LivewireAlert;

    protected $listeners = ['confirmedOrderCancel'];

    public bool $active = false;
    public $cancelOrderId;

    public function render()
    {
        $user = auth()->user();

        return view('livewire.ecommerce.my-account.orders', [
            'orders' => $user->orders
        ]);
    }

    public function cancel($orderId)
    {
        $this->cancelOrderId = $orderId;

        $this->alert('warning', 'Are you sure?', [
            'text' => "You won't be able to revert this!",
            'timer' => false,
            'toast' => false,
            'position' => 'center',
            'onConfirmed' => 'confirmedOrderCancel',
            'showCancelButton' => true,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, cancel it!',
            'cancelButtonColor' => '#d33',
            'confirmButtonColor' => '#3085d6',
        ]);
    }

    public function confirmedOrderCancel()
    {
        Order::whereId($this->cancelOrderId)
            ->update(['canceld_at' => Carbon::now()]);

        $this->alert('success', 'Success is approaching!');
    }
}
