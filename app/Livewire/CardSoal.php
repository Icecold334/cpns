<?php

namespace App\Livewire;

use App\Models\Respon;
use App\Models\Soal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;

class CardSoal extends Component
{
    public $soals;
    public $soal;
    public $jawaban;
    public $soal_last;
    public $nomor = 1;

    // mount 
    public function mount()
    {

        $nomor = (Session::get('last_no') == null ? 0 : Session::get('last_no')) - 1;
        $this->soal = $this->soals[$nomor];
        $this->nomor = $nomor + 1;
        if (Respon::where('soal_id', $this->soal->id)->where('user_id', Auth::user()->id)->count() != 0) {
            $this->jawaban = Respon::where('soal_id', $this->soal->id)->where('user_id', Auth::user()->id)->first()->jawaban_id;
        }
    }
    #[On('soal-pick')]
    public function fillSoal($id, $nomor)
    {
        $this->soal = Soal::where('id', $id)->first();
        $this->nomor = $nomor;
    }
    public function before($no)
    {

        $this->soal = $this->soals[$no - 2];
        $this->nomor = $no - 1;
        Session::put('last_no', $this->nomor);
        $this->dispatch('active', id: $this->soals[$no - 2]->id);
    }
    public function after($no)
    {
        $this->soal = $this->soals[$no];
        $this->nomor = $no + 1;
        Session::put('last_no', $this->nomor);
        $this->dispatch('active', id: $this->soals[$no]->id);
    }

    public function updated($name, $value)
    {
        if (Respon::where('soal_id', $this->soal->id)->where('user_id', Auth::user()->id)->count() != 0) {
            // dd(Respon::where('soal_id', $this->soal->id)->where('user_id', Auth::user()->id)->count());
            Respon::where('soal_id', $this->soal->id)->where('user_id', Auth::user()->id)->update([
                'jawaban_id' => $value,
            ]);
        } else {
            Respon::create([
                'user_id' => Auth::user()->id,
                'soal_id' => $this->soal->id,
                'jawaban_id' => $value,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.card-soal');
    }
}
