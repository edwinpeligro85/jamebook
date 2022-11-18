<?php

namespace App\Http\Livewire\Ecommerce\Home;

use App\Models\Book;
use Livewire\Component;

class SliderTab extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.home.slider-tab', [
            'features' => Book::newBooks()->get(),
        ]);
    }
}
