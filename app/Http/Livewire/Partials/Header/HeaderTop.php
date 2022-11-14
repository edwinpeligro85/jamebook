<?php

namespace App\Http\Livewire\Partials\Header;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderTop extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh', 'logout'];

    public function render()
    {
        return view('livewire.partials.header.header-top');
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }
}
