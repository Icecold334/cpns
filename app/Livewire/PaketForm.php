<?php

namespace App\Livewire;

use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PaketForm extends Component
{
    public $paket;
    public $nama;

    public function save()
    {
        $paket = new Paket();
        $paket->nama = $this->nama;
        $paket->user_id = Auth::user()->id;
        $paket->save();

        return redirect()->to('/paket')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.paket-form');
    }
}
