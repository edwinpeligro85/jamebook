<?php

namespace App\Http\Livewire\Partials\Header;

use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class HeaderMiddle extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

    protected $cart;

    public function mount()
    {
        $this->cart = Cart::name('shopping');
    }

    public function render()
    {
        return view('livewire.partials.header.header-middle', [
            'total' => $this->cart->getTotal(),
            'items' => $this->cart->getItems(),
            'total_items' => $this->cart->countItems(),
        ]);
    }

    public function hydrate()
    {
        $this->cart = Cart::name('shopping');
    }

    public function removeItemFromCart($hash, $id)
    {
        $this->cart->removeItem($hash, false);
        $this->emit('cartItemRemoved', $id);
        $this->emit('cartUpdated');
    }
}
