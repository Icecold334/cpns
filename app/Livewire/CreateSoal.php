<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class CreateSoal extends Component
{
    public $paket_id;
    public $kategori_id;
    public $soal;

    public function render()
    {
        return view('livewire.create-soal');
    }
}
