<?php

namespace App\Livewire\Layout\Components;

use Livewire\Component;

class NavLink extends Component
{
    public $title;
    public $href;
    public function render()
    {
        return view('livewire.layout.components.nav-link');
    }
}
