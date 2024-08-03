<?php

namespace App\Livewire;

use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Paket;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateSoal extends Component
{

    use WithFileUploads;
    public $soal_array;
    #[Validate('required', message: 'Nama wajib diisi!')]
    public $soal;
    public $uuid;
    public $paket_id;
    public $kategori_id;
    public $img;
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

    public function mount()
    {
        $this->kategoris = Kategori::all();
        $this->soal = $this->soal_array->soal;
        $this->img = $this->soal_array->img;
        $this->kategori_id = $this->soal_array->kategori_id;
        $this->a = Jawaban::where('soal_id', $this->soal_array->id)->skip(0)->take(1)->first()->jawaban;
        $this->b = Jawaban::where('soal_id', $this->soal_array->id)->skip(1)->take(1)->first()->jawaban;
        $this->c = Jawaban::where('soal_id', $this->soal_array->id)->skip(2)->take(1)->first()->jawaban;
        $this->d = Jawaban::where('soal_id', $this->soal_array->id)->skip(3)->take(1)->first()->jawaban;
        $this->e = Jawaban::where('soal_id', $this->soal_array->id)->skip(4)->take(1)->first()->jawaban;
    }

    // save
    public function update()
    {
        $this->validate();
        $this->soal_array->update([
            'soal' => $this->soal,
            'kategori_id' => $this->kategori_id
        ]);

        $jawabanA = Jawaban::where('soal_id', $this->soal_array->id)->get()[0];
        $jawabanA->update(['jawaban' => $this->a]);
        $jawabanB = Jawaban::where('soal_id', $this->soal_array->id)->get()[1];
        $jawabanB->update(['jawaban' => $this->b]);
        $jawabanC = Jawaban::where('soal_id', $this->soal_array->id)->get()[2];
        $jawabanC->update(['jawaban' => $this->c]);
        $jawabanD = Jawaban::where('soal_id', $this->soal_array->id)->get()[3];
        $jawabanD->update(['jawaban' => $this->d]);
        $jawabanE = Jawaban::where('soal_id', $this->soal_array->id)->get()[4];
        $jawabanE->update(['jawaban' => $this->e]);
        // dd($jawaban);
        return redirect()->route('paket.soal.index', ['paket' => Paket::where('id', $this->soal_array->paket_id)->first()->uuid])->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Soal berhasil diubah!');
    }
    public function render()
    {
        return view('livewire.create-soal');
    }
}
