<?php

namespace App\Livewire;

use App\Models\BaseKategori;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PaketForm extends Component
{
    public $paket;
    public $nama;
    public $bases;
    public $base_id;
    public $durasi;

    public function mount()
    {
        $this->bases = BaseKategori::all();
    }

    public function save()
    {
        if (str_contains($this->durasi, ':')) {
            // Retrieve the time from the request
            $time = $this->durasi;

            // Split the time into hours and minutes
            list($hours, $minutes) = explode(':', $time);

            // Convert hours and minutes to integers
            $hours = (int)$hours;
            $minutes = (int)$minutes;
        }
        $paket = new Paket();
        $paket->nama = $this->nama;
        $paket->base_id = $this->base_id;
        $paket->durasi = str_contains($this->durasi, ':') ? ($hours * 3600) + ($minutes * 60) : $this->durasi;
        $paket->user_id = Auth::user()->id;
        $paket->save();

        return redirect()->to('/paket')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.paket-form');
    }
}
