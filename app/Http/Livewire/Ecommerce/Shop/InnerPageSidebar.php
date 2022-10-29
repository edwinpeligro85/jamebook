<?php

namespace App\Http\Livewire\Ecommerce\Shop;

use App\Models\Category;
use App\Models\Editorial;
use App\Models\Language;
use Livewire\Component;

class InnerPageSidebar extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.shop.inner-page-sidebar', [
            'languages' => Language::with('books')->orderBy('name', 'ASC')->get(),
            'categories' => Category::with('books')->orderBy('name', 'ASC')->get(),
            'editorials' => Editorial::with('books')->orderBy('name', 'ASC')->get(),
        ]);
    }
}
