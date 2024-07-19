<?php


namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class GuruForm extends Component
{
    #[Validate('required', message: 'Nama tidak boleh kosong.')]
    public $name;
    public function save()
    {
        $validated = $this->validate();
        return $this->reset();
    }

    public function render()
    {
        return view('livewire.guru-form');
    }
}
