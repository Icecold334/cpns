<?php

namespace App\Livewire;

use Livewire\Component;

class PerPaket extends Component
{
    public $paket;
    public $result;
    public $soals;
    public function render()
    {
        return view('livewire.per-paket');
    }
}
