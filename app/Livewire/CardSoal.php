<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Respon;
use App\Models\Jawaban;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CardSoal extends Component
{
    public $soals;
    public $soal;
    public $jawaban = null;
    public $shuffledJawaban = [];
    public $nomor = 1;

    public function mount()
    {
        $this->loadCurrentSoal();
    }

    private function loadCurrentSoal()
    {
        $lastNo = Session::get('last_no');
        $index = is_array($lastNo) && $lastNo[1] === $this->soals[0]->paket->uuid
            ? max(0, $lastNo[0] - 1)
            : 0;

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

    #[On('soal-pick')]
    public function fillSoal($id, $nomor)
    {
        $soal = Soal::find($id);
        $this->setSoalData($soal, $nomor);
    }

    public function before()
    {
        $no = $this->nomor;
        $this->navigateSoal($no - 2, $no - 1);
    }

    public function after()
    {
        $no = $this->nomor;
        $this->navigateSoal($no, $no + 1);
    }

    private function navigateSoal($index, $nomor)
    {
        $soal = $this->soals[$index];
        $this->setSoalData($soal, $nomor);
        Session::put('last_no', [$this->nomor, $soal->paket->uuid]);
        $this->dispatch('active', id: $soal->id);
    }

    public function updated($name, $value)
    {
        $this->saveRespon($value);
        $this->dispatch('active', id: $this->soal->id);
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
    }

    public function render()
    {
        return view('livewire.card-soal');
    }
}
