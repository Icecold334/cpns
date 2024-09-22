<?php

namespace App\Livewire;

use App\Models\BaseKategori;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SubKategoriForm extends Component
{

    #[Validate('required', message: 'Nama Kategori wajib diisi!')]
    #[Validate('min:3', message: 'Nama Kategori terlalu singkat!')]
    #[Validate('unique:base_kategoris', message: 'Kategori sudah terdaftar!')]
    public $nama;
    // #[Validate('required', message: 'Nama Kategori wajib diisi!')]
    // #[Validate('min:3', message: 'Nama Kategori terlalu singkat!')]
    public $deskripsi;
    public $poin;
    #[Validate('required', message: 'Kategori wajib dipilih!')]
    public $base_id;
    public $base;
    public function mount()
    {
        $this->base = BaseKategori::all();
    }

    public function save()
    {
        $this->validate();
        Kategori::create(['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'byPoin' => $this->poin, 'base_id' => $this->base_id]);
        return redirect()->to('/kategori')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil ditambahkan!');
    }
    public function render()
    {
        return view('livewire.sub-kategori-form');
    }
}
