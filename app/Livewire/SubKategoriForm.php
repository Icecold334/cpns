<?php

namespace App\Livewire;

use App\Models\BaseKategori;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SubKategoriForm extends Component
{

    public $id;
    #[Validate]
    public $nama;
    public $deskripsi;
    #[Validate]
    public $poin;
    #[Validate]
    public $base_id;
    public $base;

    public function rules()
    {
        if ($this->id) {
            $id = $this->id;
            $ruleSet = $this->nama == Kategori::find($id)->nama ? 'required|min:3' : 'required|min:3|unique:kategoris';
            return [
                'nama' => $ruleSet,
                'poin' => 'required',
                'base_id' => 'required'
            ];
        } else {
            return
                [
                    'nama' => 'required|min:3|unique:kategoris',
                    'poin' => 'required',
                    'base_id' => 'required'
                ];
        }
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Kategori wajib diisi!',
            'poin.required' => 'Konsep jawaban wajib dipilih!',
            'base_id.required' => 'Kategori wajib dipilih!',
            'nama.min' => 'Nama Kategori terlalu singkat!',
            'nama.unique' => 'Kategori sudah terdaftar!',
        ];
    }

    public function mount()
    {
        $this->base = BaseKategori::all();
        if ($this->id != null) {
            $this->nama = Kategori::find($this->id)->nama;
            $this->deskripsi = Kategori::find($this->id)->deskripsi;
            $this->poin = Kategori::find($this->id)->byPoin;
            $this->base_id = Kategori::find($this->id)->base_id;
        }
    }

    public function save()
    {
        $this->validate();
        Kategori::create(['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'byPoin' => $this->poin, 'base_id' => $this->base_id]);
        return redirect()->to('/kategori')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->nama . ' berhasil ditambahkan!');
    }

    public function update()
    {
        $this->validate();
        $id = $this->id;
        $ruleSet = $this->nama == Kategori::find($id)->nama ? 'required|min:3' : 'required|min:3|unique:kategoris';
        $this->validate([
            'nama' => $ruleSet,
        ], [
            'nama.required' => 'Nama Kategori wajib diisi!',
            'nama.min' => 'Nama Kategori terlalu singkat!',
            'nama.unique' => 'Kategori sudah terdaftar!',
        ]);
        Kategori::find($this->id)->update(['nama' => $this->nama, 'deskripsi' => $this->deskripsi, 'byPoin' => $this->poin, 'base_id' => $this->base_id]);
        return redirect()->to('/kategori')->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Kategori berhasil diubah!');
    }
    public function render()
    {
        return view('livewire.sub-kategori-form');
    }
}
