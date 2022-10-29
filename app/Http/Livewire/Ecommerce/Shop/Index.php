<?php

namespace App\Http\Livewire\Ecommerce\Shop;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['updatedItemsPerPage'];

    public $itemsPerPage = 6;

    public function render()
    {
        return view('livewire.ecommerce.shop.index', [
            'books' => Book::paginate($this->itemsPerPage),
        ]);
    }

    public function updatedItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }
}
