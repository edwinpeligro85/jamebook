<?php

namespace App\Http\Livewire\Ecommerce\Shop;

use App\Models\Book;
use Livewire\Component;

class BookCard extends Component
{
    public Book $book;

    public function render()
    {
        return view('livewire.ecommerce.shop.book-card');
    }

    public function addToCart()
    {
        $this->book->addToCart('shopping', [
            'quantity' => 1
        ]);
        $this->emit('cartUpdated');
    }
}
