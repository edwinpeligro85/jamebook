<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Modals extends Component
{
    protected $listeners = ['showModal', 'resetModal'];

    public $alias;
    public $params = [];

    public function render()
    {
        return view('livewire.partials.modals');
    }

    public function showModal($alias, ...$params)
    {
        $this->alias = $alias;
        $this->params = $params;

        $this->emit('showBootstrapModal');
    }

    public function resetModal()
    {
        $this->reset();
    }
}
