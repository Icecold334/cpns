<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Paket;
use App\Models\Jawaban;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateSoal extends Component
{
    use WithFileUploads;

    public $paket;
    public $soal_array;

    #[Validate('required', message: 'Soal tidak boleh kosong!')]
    public $soal;

    #[Validate('required', message: 'Kategori soal harus dipilih!')]
    public $kategori_id;
    public $kategori;

    #[Validate('required', message: 'Kategori wajib diisi!')]
    public $kategoris;

    #[Validate('required', message: 'Pilihan jawaban A tidak boleh kosong!')]
    public $a;

    #[Validate('required', message: 'Pilihan jawaban B tidak boleh kosong!')]
    public $b;

    #[Validate('required', message: 'Pilihan jawaban C tidak boleh kosong!')]
    public $c;

    #[Validate('required', message: 'Pilihan jawaban D tidak boleh kosong!')]
    public $d;

    #[Validate('required', message: 'Pilihan jawaban E tidak boleh kosong!')]
    public $e;

    #[Validate('nullable')]
    #[Validate('image', message: 'Format file gambar harus jpeg/png/jpg/gif!')]
    #[Validate('max:2048', message: 'Ukuran file maksimal 2MB!')]
    #[Validate('mimes:jpeg,png,jpg,gif', message: 'Format file gambar harus jpeg/png/jpg/gif!')]
    public $img;

    public $benar;
    public $jawaban_array;


    public function mount()
    {
        $this->kategoris = Kategori::where('base_id', $this->paket->base->id)->get();
        if ($this->soal_array != null) {
            $this->soal = $this->soal_array->soal;
            $this->img = $this->soal_array->img;
            $this->kategori_id = $this->soal_array->kategori_id;
            $this->isi();
            $this->jawaban_array = Jawaban::where('soal_id', $this->soal_array->id)->get();
            $this->a = $this->jawaban_array[0]->jawaban;
            $this->b = $this->jawaban_array[1]->jawaban;
            $this->c = $this->jawaban_array[2]->jawaban;
            $this->d = $this->jawaban_array[3]->jawaban;
            $this->e = $this->jawaban_array[4]->jawaban;
            $this->benar = $this->jawaban_array->where('benar', 1)->first()->row;
        }
    }

    public function update()
    {
        $this->validate();
        if ($this->img != null && !is_string($this->img)) {
            Storage::delete(str_replace('storage', 'public', $this->soal_array->img));
            $img =  str_replace('public', 'storage', $this->img->store('public/soal'));
        } else {
            $img = $this->soal_array->img;
        }
        $this->soal_array->update([
            'soal' => $this->soal,
            'kategori_id' => $this->kategori_id,
            'img' => $img
        ]);
        if (!$this->kategori->byPoin) {
            Jawaban::where('soal_id', $this->soal_array->id)->where('row', '=', $this->benar)->update(['benar' => 1]);
            Jawaban::where('soal_id', $this->soal_array->id)->where('row', '!=', $this->benar)->update(['benar' => 0]);
            $jawabanArray = [$this->a, $this->b, $this->c, $this->d, $this->e];
            foreach ($this->jawaban_array as $index => $jawaban) {
                $jawaban->update([
                    'jawaban' => $jawabanArray[$index],
                    'poin' => 0,
                ]);
            }
        } else {
            Jawaban::where('soal_id', $this->soal_array->id)->update(['benar' => 1]);
            $jawabanArray = [$this->a, $this->b, $this->c, $this->d, $this->e];
            foreach ($this->jawaban_array as $index => $jawaban) {
                $jawaban->update([
                    'jawaban' => $jawabanArray[$index],
                    'poin' => $index + 1,
                ]);
            }
        }
        $this->dispatch('berhasil', icon: 'success', message: 'Soal berhasil diubah!');
        // return redirect()->route('paket.soal.index', ['paket' => $this->paket->uuid])
        //     ->with('icon', 'success')
        //     ->with('title', 'Berhasil')
        //     ->with('message', 'Soal berhasil diubah!');

        // return redirect()->route('paket.soal.edit', ['paket' => Paket::where('id', $this->soal_array->paket_id)->first()->uuid, 'soal' => $this->soal_array->uuid])->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Soal berhasil diubah!');
    }

    public function save()
    {
        $this->validate();
        $soal = new Soal();
        $soal->paket_id = $this->paket->id;
        $soal->kategori_id = $this->kategori_id;
        $soal->soal = $this->soal;
        $soal->img = $this->img != null ? str_replace('public', 'storage', $this->img->store('public/soal')) : null;
        $soal->save();
        $jawabanData = [
            1 => $this->a,
            2 => $this->b,
            3 => $this->c,
            4 => $this->d,
            5 => $this->e,
        ];
        foreach ($jawabanData as $row => $jawaban) {
            $data = [
                'soal_id' => $soal->id,
                'row' => $row,
                'jawaban' => $jawaban,
            ];
            if (!$this->kategori->byPoin) {
                $data['benar'] = $this->benar == $row ? 1 : 0;
            } else {
                $data['benar'] = 1;
                $data['poin'] = $row;
            }
            Jawaban::create($data);
        }
        // $this->dispatch('berhasil', icon: 'success', message: 'Soal berhasil ditambahkan!');
        $this->reset(['kategori_id', 'img', 'benar', 'soal', 'a', 'b', 'c', 'd', 'e']);
        return redirect()->route('paket.soal.index', ['paket' => $this->paket->uuid])
            ->with('icon', 'success')
            ->with('title', 'Berhasil')
            ->with('message', 'Soal berhasil ditambahkan!');
    }

    public function resetInputFields()
    {
        // dd('pepek');
        $this->soal = '';
        $this->img = null;
        $this->kategori_id = '';
        $this->a = '';
        $this->b = '';
        $this->c = '';
        $this->d = '';
        $this->e = '';
        $this->benar = '';
    }

    public function updatedKategoriId()
    {

        if ($this->kategori_id != null) {
            $this->isi();
        } else {
            $this->reset(['kategori_id', 'img', 'benar', 'soal', 'a', 'b', 'c', 'd', 'e']);
        }
    }

    public function isi()
    {
        return $this->kategori = $this->kategori_id != null ? Kategori::find($this->kategori_id) : null;
    }

    public function render()
    {
        return view('livewire.create-soal');
    }
}
