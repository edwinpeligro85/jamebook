<?php

namespace App\Http\Livewire\Ecommerce\Shop;

use Livewire\Component;

class ShopToolbar extends Component
{
    // Pagination
    public $total;
    public $perPage;
    public $lastPage;
    public $currentPage;

    public $itemsPerPage;

    public function render()
    {
        return view('livewire.ecommerce.shop.shop-toolbar');
    }
}
