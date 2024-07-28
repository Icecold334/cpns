<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class CreateSoal extends Component
{
    public $title;
    public function test()
    {
        return redirect()->to('/guru');
    }
    // #[Layout('layouts.body')]
    public function render()
    {
        return view('livewire.create-soal');
    }
}
