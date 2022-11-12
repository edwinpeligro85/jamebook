<?php

namespace App\Http\Livewire\Ecommerce\MyAccount;

use Livewire\Component;

class Index extends Component
{
    protected $queryString = ['tab' => ['except' => '']];

    public $tab = 'dashboard';

    public function render()
    {
        return view('livewire.ecommerce.my-account.index');
    }

    public function changeTab($tab)
    {
        $this->tab = $tab;
    }
}
