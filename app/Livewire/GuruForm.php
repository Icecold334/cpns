<?php


namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Component;

class GuruForm extends Component
{
    use WithFileUploads;
    #[Validate('required', message: 'Nama tidak boleh kosong!')]
    #[Validate('min:6', message: 'Nama minimal :min karakter')]
    public $name;
    #[Validate('required', message: 'Jenis kelamin tidak boleh kosong!')]
    public $gender;
    #[Validate('required', message: 'Email tidak boleh kosong!')]
    #[Validate('email', message: 'Format email salah!')]
    public $email;
    #[Validate('image', message: 'Format file harus jpeg/png/jpg/gif!')]
    #[Validate('max:2048', message: 'Ukuran file maksimal 2MB!')]
    #[Validate('mimes:jpeg,png,jpg,gif', message: 'Format file harus jpeg/png/jpg/gif!')]
    public $img;
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
