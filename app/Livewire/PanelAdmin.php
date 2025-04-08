<?php

namespace App\Livewire;

use App\Models\Soal;
use Livewire\Component;
use App\Models\Kategori;
use App\Models\User;

class PanelAdmin extends Component
{
    public $pakets;
    public $soals;
    public $users;
    public $kategoris;
    public function mount()
    {
        $this->users = User::where('role', '!=', 1)->get();
        $this->soals = Soal::all();
        $this->kategoris = Kategori::all();
    }
    public function render()
    {
        return view('livewire.panel-admin');
    }
}
