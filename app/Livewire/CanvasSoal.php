<?php

namespace App\Livewire;

use App\Models\Soal;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class CanvasSoal extends Component
{
    // public $paket;
    public $soals;
    public $show = false;
    public $activeSoalId;
    public $soal_last;


    // mount
    public function mount()
    {
        $nomor = (Session::get('last_no') == null ? 0 : Session::get('last_no')) - 1;
        $this->activeSoalId = $this->soals[$nomor]->id;
    }

    public function pilihSoal($id, $nomor)
    {

        $this->activeSoalId = $id;
        $this->show = true;
        $this->soal_last = Session::put('last_no', $nomor);
        $this->dispatch('soal-pick', id: $id, nomor: $nomor);
    }

    #[On('active')]
    public function lewatiCanvas($id)
    {
        $this->activeSoalId = $id;
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.canvas-soal');
    }
}
