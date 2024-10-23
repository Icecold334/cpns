<?php

namespace App\Livewire;

use App\Models\Respon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class CardDetailTest extends Component
{
    public $paket;
    public $result;
    public $total;
    public $terjawab;
    public $belum;
    public function mount()
    {
        // Menghitung total soal dalam paket
        $this->total = $this->paket->soal->count();

        // Mendapatkan array ID soal yang telah dijawab oleh user
        $this->terjawab = count(Respon::where('user_id', Auth::user()->id)->where('result_id', $this->result->id)
            ->whereIn('soal_id', $this->paket->soal->pluck('id')->toArray())
            ->pluck('soal_id')
            ->toArray());

        // Menghitung soal yang belum dijawab
        $this->belum = $this->total - $this->terjawab;
    }
    #[On('active')]
    public function loadStatus()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.card-detail-test');
    }
}
