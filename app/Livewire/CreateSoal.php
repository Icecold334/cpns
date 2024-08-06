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
    #[Validate('required', message: 'Nama wajib diisi!')]
    public $soal;
    #[Validate('required', message: 'Pilih Kategori!')]
    public $kategori_id;
    #[Validate('required', message: 'Nama wajib diisi!')]
    public $kategoris;
    #[Validate('required', message: 'a!')]
    public $a;
    #[Validate('required', message: 'b!')]
    public $b;
    #[Validate('required', message: 'c!')]
    public $c;
    #[Validate('required', message: 'd!')]
    public $d;
    #[Validate('required', message: 'e!')]
    public $e;
    #[Validate('nullable')]
    #[Validate('image', message: 'Format file harus jpeg/png/jpg/gif!')]
    #[Validate('max:2048', message: 'Ukuran file maksimal 2MB!')]
    #[Validate('mimes:jpeg,png,jpg,gif', message: 'Format file harus jpeg/png/jpg/gif!')]
    public $img;
    public $benar;
    public $jawaban_array;
    public $title_alert;
    public $message_alert;
    public $icon_alert;

    public function mount()
    {
        $this->kategoris = Kategori::all();
        if ($this->soal_array != null) {
            $this->soal = $this->soal_array->soal;
            $this->img = $this->soal_array->img;
            $this->kategori_id = $this->soal_array->kategori_id;
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
        if ($this->kategori_id != 3) {
            Jawaban::where('soal_id', $this->soal_array->id)->where('row', '=', $this->benar)->update(['benar' => 1]);
            Jawaban::where('soal_id', $this->soal_array->id)->where('row', '!=', $this->benar)->update(['benar' => 0]);
            $this->jawaban_array[0]->update(['jawaban' => $this->a, 'poin' => 0]);
            $this->jawaban_array[1]->update(['jawaban' => $this->b, 'poin' => 0]);
            $this->jawaban_array[2]->update(['jawaban' => $this->c, 'poin' => 0]);
            $this->jawaban_array[3]->update(['jawaban' => $this->d, 'poin' => 0]);
            $this->jawaban_array[4]->update(['jawaban' => $this->e, 'poin' => 0]);
        } else {
            Jawaban::where('soal_id', $this->soal_array->id)->update(['benar' => 1]);
            $this->jawaban_array[0]->update(['jawaban' => $this->a, 'poin' => 1]);
            $this->jawaban_array[1]->update(['jawaban' => $this->b, 'poin' => 2]);
            $this->jawaban_array[2]->update(['jawaban' => $this->c, 'poin' => 3]);
            $this->jawaban_array[3]->update(['jawaban' => $this->d, 'poin' => 4]);
            $this->jawaban_array[4]->update(['jawaban' => $this->e, 'poin' => 5]);
        }
        return redirect()->route('paket.soal.edit', ['paket' => Paket::where('id', $this->soal_array->paket_id)->first()->uuid, 'soal' => $this->soal_array->uuid])->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Soal berhasil diubah!');
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
        if ($this->kategori_id != 3) {
            // a
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 1;
            $jawaban->jawaban = $this->a;
            $jawaban->benar = $this->benar == 1 ? 1 : 0;
            $jawaban->save();
            // b
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 2;
            $jawaban->jawaban = $this->b;
            $jawaban->benar = $this->benar == 2 ? 1 : 0;
            $jawaban->save();
            // c
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 3;
            $jawaban->jawaban = $this->c;
            $jawaban->benar = $this->benar == 3 ? 1 : 0;
            $jawaban->save();
            // d
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 4;
            $jawaban->jawaban = $this->d;
            $jawaban->benar = $this->benar == 4 ? 1 : 0;
            $jawaban->save();
            // e
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 5;
            $jawaban->jawaban = $this->e;
            $jawaban->benar = $this->benar == 5 ? 1 : 0;
            $jawaban->save();
        } else {
            // a
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 1;
            $jawaban->jawaban = $this->a;
            $jawaban->benar = 1;
            $jawaban->poin = $jawaban->row;
            $jawaban->save();
            // b
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 2;
            $jawaban->jawaban = $this->b;
            $jawaban->benar = 1;
            $jawaban->poin = $jawaban->row;
            $jawaban->save();
            // c
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 3;
            $jawaban->jawaban = $this->c;
            $jawaban->benar = 1;
            $jawaban->poin = $jawaban->row;
            $jawaban->save();
            // d
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 4;
            $jawaban->jawaban = $this->d;
            $jawaban->benar = 1;
            $jawaban->poin = $jawaban->row;
            $jawaban->save();
            // e
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->row = 5;
            $jawaban->jawaban = $this->e;
            $jawaban->benar = 1;
            $jawaban->poin = $jawaban->row;
            $jawaban->save();
        }
        $this->title_alert = 'Berhasil';
        $this->message_alert = 'Soal berhasil ditambahkan!';
        $this->icon_alert = 'success';

        // $this->resetExcept(['kategoris']);
    }


    public function render()
    {
        return view('livewire.create-soal');
    }
}
