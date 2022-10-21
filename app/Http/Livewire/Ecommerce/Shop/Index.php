<?php

namespace App\Http\Livewire\Ecommerce\Shop;

use App\Models\Book;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.shop.index', [
            'books' => Book::paginate(10),
        ]);
    }
}
