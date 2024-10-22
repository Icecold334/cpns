<?php

namespace App\Livewire;

use App\Models\Hasil;
use App\Models\Paket;
use Livewire\Component;

class PanelSiswa extends Component
{
    public $pakets;
    public $hasils;
    public $test;
    public function mount()
    {
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
