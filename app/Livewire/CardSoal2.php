<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Respon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CardSoal2 extends Component
{
    public $paket;
    public $total;
    public $terjawab;
    public $belum;
    public $persen;

    public $soals;
    public $soal;
    public $jawaban = null;
    public $shuffledJawaban = [];
    public $nomor = 1;
    public function mount()
    {
        $this->loadCurrentSoal();
        $this->loadStatus();
    }

    private function loadCurrentSoal()
    {
        $index = 0;

        $this->setSoalData($this->soals[$index], $index + 1);
    }

    private function setSoalData(Soal $soal, $nomor)
    {
        $this->soal = $soal;
        $this->nomor = $nomor;
        $this->shuffledJawaban = $soal->jawaban()->get()->shuffle();
        $this->jawaban = $this->getResponJawaban($soal->id);
    }

    private function getResponJawaban($soalId)
    {
        return Respon::where('soal_id', $soalId)->where('user_id', Auth::id())->value('jawaban_id');
    }

    public function updated($name, $value)
    {
        $this->saveRespon($value);
    }

    private function saveRespon($jawabanId)
    {
        Respon::updateOrCreate(
            [
                'soal_id' => $this->soal->id,
                'user_id' => Auth::id(),
            ],
            [
                'jawaban_id' => $jawabanId,
            ]
        );
        $this->loadStatus();
    }
    public function loadStatus()
    {
        // Menghitung total soal dalam paket
        $this->total = $this->paket->soal->count();

        // Mendapatkan array ID soal yang telah dijawab oleh user
        $this->terjawab = count(Respon::where('user_id', Auth::user()->id)
            ->whereIn('soal_id', $this->paket->soal->pluck('id')->toArray())
            ->pluck('soal_id')
            ->toArray());

        // Menghitung soal yang belum dijawab
        $this->belum = $this->total - $this->terjawab;
        $this->persen = ($this->terjawab / $this->total) * 100;
    }

    public function after($no)
    {
        $this->navigateSoal($no, $no + 1);
    }

    private function navigateSoal($index, $nomor)
    {
        $soal = $this->soals[$index];
        $this->setSoalData($soal, $nomor);
        $this->loadStatus();
    }
    public function render()
    {
        return view('livewire.card-soal2');
    }
}
