<?php

namespace App\Livewire;

use App\Models\BaseKategori;
use Livewire\Component;
use Livewire\Attributes\Validate;

class KategoriForm extends Component
{
    public $id;
    #[Validate]
    public $nama;
    public $deskripsi;


    public function rules()
    {
        if ($this->id) {
            $id = $this->id;
            $ruleSet = $this->nama == BaseKategori::find($id)->nama ? 'required|min:3' : 'required|min:3|unique:base_kategoris';
            return [
                'nama' => $ruleSet,
            ];
        }
        return
            [
                'nama' => 'required|min:3|unique:base_kategoris',
            ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Kategori wajib diisi!',
            'nama.min' => 'Nama Kategori terlalu singkat!',
            'nama.unique' => 'Kategori sudah terdaftar!',
        ];
    }


    public function mount()
    {
        if ($this->id != null) {
            $this->nama = BaseKategori::find($this->id)->nama;
            $this->deskripsi = BaseKategori::find($this->id)->deskripsi;
        }
    }

    public function save()
    {
        $this->validate();
        BaseKategori::create(['nama' => $this->nama, 'deskripsi' => $this->deskripsi]);
        return redirect()->to('/kategori')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil ditambahkan!');
    }

    public function update()
    {
        $id = $this->id;
        $this->validate();
        BaseKategori::find($id)->update(['nama' => $this->nama, 'deskripsi' => $this->deskripsi]);
        return redirect()->to('/kategori')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil diubah!');
    }
    public function render()
    {
        return view('livewire.kategori-form');
    }
}
