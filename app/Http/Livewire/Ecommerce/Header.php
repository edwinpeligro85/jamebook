<?php

namespace App\Http\Livewire\Ecommerce;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.header', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ]);
    }
}
