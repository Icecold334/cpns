<?php

namespace App\Livewire;

use App\Models\BaseKategori;
use Livewire\Component;
use Livewire\Attributes\Validate;

class KategoriForm extends Component
{
    #[Validate('required', message: 'Nama Kategori wajib diisi!')]
    #[Validate('min:3', message: 'Nama Kategori terlalu singkat!')]
    #[Validate('unique:base_kategoris', message: 'Kategori sudah terdaftar!')]
    public $nama;
    // #[Validate('required', message: 'Nama Kategori wajib diisi!')]
    // #[Validate('min:3', message: 'Nama Kategori terlalu singkat!')]
    public $deskripsi;

    public function save()
    {
        $this->validate();
        BaseKategori::create(['nama' => $this->nama, 'deskripsi' => $this->deskripsi]);
        return redirect()->to('/kategori')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil ditambahkan!');
    }
    public function render()
    {
        return view('livewire.kategori-form');
    }
}
