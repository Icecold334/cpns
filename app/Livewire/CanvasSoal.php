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
    public $result;
    public $show = false;
    public $activeSoalId;
    public $soal_last;
    public $jawaban;

    public function mount()
    {
        $this->setActiveSoal();
        $this->loadJawaban();
    }

    private function setActiveSoal()
    {
        $lastNo = Session::get('last_no');

        if (is_array($lastNo) && $lastNo[1] === $this->soals[0]->paket->uuid) {
            $nomor = max(0, $lastNo[0] - 1);  // Ensure $nomor is not negative
        } else {
            $nomor = 0;
        }

        $this->activeSoalId = $this->soals[$nomor]->id ?? $this->soals[0]->id;
    }

    public function pilihSoal($id, $nomor)
    {
        $this->activeSoalId = $id;
        $this->show = true;
        $this->updateLastSoal($nomor);
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
        $this->jawaban = Respon::where('user_id', Auth::id())->where('result_id', $this->result->id)
            ->pluck('soal_id')
            ->toArray();
    }

    private function updateLastSoal($nomor)
    {
        Session::put('last_no', [$nomor, $this->soals[0]->paket->uuid]);
    }

    public function render()
    {
        return view('livewire.canvas-soal');
    }
}
