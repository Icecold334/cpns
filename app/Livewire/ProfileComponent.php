<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileComponent extends Component
{
    public $name, $email, $gender, $img;

    public function mount() {}
    public function render()
    {
        return view('livewire.profile-component');
    }
}
