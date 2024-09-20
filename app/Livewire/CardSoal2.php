<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Respon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CardSoal2 extends Component
{
    public $paket;
    public $total;
    public $terjawab;
    public $belum;
    public $persen;

    public $durasi;
    public $soals;
    public $soal;
    public $jawaban = null;
    public $shuffledJawaban = [];
    public $nomor = 1;
    public function mount()
    {

        $this->durasi = Session::get('time') ?? $this->paket->durasi;
        $this->loadCurrentSoal();
        $this->loadStatus();
    }

    private function loadCurrentSoal()
    {
        $lastNo = Session::get('last_no');
        $index = is_array($lastNo) && $lastNo[1] === $this->soals[0]->paket->uuid
            ? max(0, $lastNo[0] - 1)
            : 0;
        // $index = 0;
        $this->setSoalData($this->soals[$index], $index + 1);
    }

    public function selesai()
    {
        // dd('oke');
        redirect()->route('ujian.selesai', ['paket' => $this->paket->uuid]);
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
        Session::put('last_no', [$this->nomor, $soal->paket->uuid]);
        $this->loadStatus();
    }

    public function decrement()
    {
        $nomor = $this->nomor;
        if ($this->durasi > 0) {
            $this->durasi--;
            Session::put('time', $this->durasi);
        } else {
            if ($nomor < $this->soals->count()) {
                $this->durasi = $this->paket->durasi;
                $this->navigateSoal($nomor, $nomor + 1);
            } else {
                $this->selesai();
            }
        }
    }
    public function render()
    {
        return view('livewire.card-soal2');
    }
}
