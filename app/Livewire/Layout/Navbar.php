<?php

namespace App\Livewire\Layout;

use App\Models\Paket;
use Livewire\Component;

class Navbar extends Component
{
    public $paket;
    public function mount()
    {
        $this->paket = collect(json_decode($this->paket, true));
    }
    public function render()
    {
        return view('livewire.layout.navbar');
    }
}
