<?php

namespace App\Http\Livewire\Ecommerce\Order;

use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class CheckoutCartTotal extends Component
{
    protected $cart;
    public $reservation;

    public function mount()
    {
        $this->cart = Cart::name('shopping');
    }

    public function render()
    {
        return view('livewire.ecommerce.order.checkout-cart-total', [
            'total' => $this->cart->getTotal(),
            'items' => $this->cart->getItems(),
            'subtotal' => $this->cart->getSubtotal(),
        ]);
    }

    public function hydrate()
    {
        $this->cart = Cart::name('shopping');
    }

    public function updatedReservation($value)
    {
        $this->emitTo('ecommerce.order.checkout', 'setReservation', $value);
    }
}
