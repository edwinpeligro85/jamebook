<?php

namespace App\Http\Livewire\Ecommerce\Shop\BookDetail;

use App\Models\Book;
use Livewire\Component;

class Index extends Component
{
    public Book $book;

    public function mount(Book $book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.ecommerce.shop.book-detail.index');
    }
}
