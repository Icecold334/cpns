<?php

namespace App\Livewire;

use App\Models\Paket;
use Livewire\Component;
use App\Models\BaseKategori;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class PaketForm extends Component
{
    public $id;
    #[Validate]
    public $nama;
    public $bases;
    #[Validate]
    public $base_id;
    #[Validate]
    public $flat;
    #[Validate]
    public $durasi;

    public function mount()
    {
        $this->bases = BaseKategori::all();
    }

    // Tambahkan rules validasi
    public function rules()
    {
        return [
            'nama' => 'required|min:3',
            'base_id' => 'required|exists:base_kategoris,id',
            'flat' => 'required|boolean',
            'durasi' => ['required', 'regex:/^\d+$|^\d{1,2}:\d{2}$/']
            // Validasi angka atau format waktu (HH:MM)
        ];
    }

    // Tambahkan pesan error yang lebih kasual
    public function messages()
    {
        return [
            'nama.required' => 'Nama paket wajib diisi!',
            'nama.min' => 'Nama paket terlalu singkat!',
            'base_id.required' => 'Kategori wajib dipilih!',
            'base_id.exists' => 'Kategori yang dipilih tidak valid!',
            'flat.required' => 'Flat wajib diisi!',
            'flat.boolean' => 'Flat harus berupa nilai boolean!',
            'durasi.required' => 'Durasi wajib diisi!',
            'durasi.regex' => 'Durasi harus dalam format angka (detik) atau waktu (HH:MM)!',
        ];
    }

    public function save()
    {
        // Validasi data
        $this->validate();

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
        $paket->flat = $this->flat;
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
