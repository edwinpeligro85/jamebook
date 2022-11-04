<?php

namespace App\Http\Livewire\Ecommerce\Shop;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['updatedItemsPerPage', 'updatedSortSelect'];

    public $filters = array();
    public $itemsPerPage = 6;
    public $orderBy = [
        'key' => 'publication_date',
        'direction' => 'desc'
    ];

    public function render()
    {
        return view('livewire.ecommerce.shop.index', [
            'books' => Book::filter($this->filters)
                ->orderBy($this->orderBy['key'], $this->orderBy['direction'])
                ->paginate($this->itemsPerPage),
        ]);
    }

    public function updatedItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
        $this->resetPage();
    }

    public function updatedSortSelect($sort)
    {
        $this->orderBy['key'] = $sort[0];
        $this->orderBy['direction'] = $sort[1];
    }
}
