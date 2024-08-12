<?php

namespace App\Livewire;

use Livewire\Component;

class CardSoal extends Component
{
    public $soal;
    public function test()
    {
        $this->dispatch('eventWithData', ['message' => 'Hello, World!']);
    }
    public function render()
    {
        return view('livewire.card-soal');
    }
}
