<?php

namespace App\Livewire;

use App\Models\Hasil;
use App\Models\Paket;
use App\Models\Result;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PanelSiswa extends Component
{
    public $pakets;
    public $results;
    public $hasils;
    public $test;
    public function mount()
    {
        $this->results = Result::where('user_id', Auth::user()->id)->get();
        $this->hasils = Hasil::whereIn('paket_id', $this->pakets->pluck('id')->toArray())->groupBy('paket_id')->get();
        $this->test = Hasil::whereIn('paket_id', $this->pakets->pluck('id')->toArray())->get()->map(function ($group) {
            return $group->nilai;
        })->values();
        // dd($this->test);
    }
    public function render()
    {
        return view('livewire.panel-siswa');
    }
}
