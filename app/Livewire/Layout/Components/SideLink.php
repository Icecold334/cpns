<?php

namespace App\Livewire\Layout\Components;

use Livewire\Component;

class SideLink extends Component
{
    public $title;
    public $active;
    public $icon;
    public $href;
    public function render()
    {
        return view('livewire.layout.components.side-link');
    }
}
