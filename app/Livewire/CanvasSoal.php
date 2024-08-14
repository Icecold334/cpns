<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Respon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CanvasSoal extends Component
{
    public $soals;
    public $show = false;
    public $activeSoalId;
    public $soal_last;
    public $jawaban;

    public function mount()
    {
        $nomor = Session::get('last_no') == null ? (0) : (Session::get('last_no') - 1);
        $this->activeSoalId = $this->soals[$nomor]->id;
        $this->loadJawaban();
    }

    public function pilihSoal($id, $nomor)
    {

        $this->activeSoalId = $id;
        $this->show = true;
        $this->soal_last = Session::put('last_no', $nomor);
        $this->dispatch('soal-pick', id: $id, nomor: $nomor);
    }

    #[On('active')]
    public function lewatiCanvas($id = 1)
    {
        $this->activeSoalId = $id;
        $this->loadJawaban();
        $this->show = false;
    }

    private function loadJawaban()
    {
        // Ambil jawaban dari database
        $this->jawaban = Respon::where('user_id', Auth::user()->id)
            ->pluck('soal_id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.canvas-soal');
    }
}
