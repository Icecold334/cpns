<?php

namespace App\Livewire;

use App\Models\Soal;
use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class PanelGuru extends Component
{
    public $pakets;
    public $soals;
    public $kategoris;
    public function mount()
    {
        $this->pakets = $this->pakets->where('user_id', Auth::user()->id);
        $this->soals = Soal::whereHas('paket', function ($query) {
            $query->where('user_id', Auth::user()->id); // Ganti dengan ID pengguna yang relevan
        })->get();
        $this->kategoris = Kategori::all();
    }
    public function render()
    {
        return view('livewire.panel-guru');
    }
}
