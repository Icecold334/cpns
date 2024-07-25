<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class SiswaForm extends Component
{
    use WithFileUploads;
    public $id;
    #[Validate('required', message: 'Nama wajib diisi!')]
    #[Validate('min:3', message: 'Nama terlalu singkat!')]
    public $name;
    #[Validate('required', message: 'Jenis kelamin wajib diisi!')]
    public $gender = 0;
    #[Validate('required', message: 'Email wajib diisi!')]
    #[Validate('email', message: 'Format email salah!')]
    #[Validate('unique:users', message: 'Email sudah terdaftar!')]
    public $email = '';
    #[Validate('nullable')]
    #[Validate('image', message: 'Format file harus jpeg/png/jpg/gif!')]
    #[Validate('max:2048', message: 'Ukuran file maksimal 2MB!')]
    #[Validate('mimes:jpeg,png,jpg,gif', message: 'Format file harus jpeg/png/jpg/gif!')]
    public $img;

    public function save()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $this->img,
            'role' => 3,
            'password' => Hash::make('password123'),

        ]);
        return redirect()->to('/siswa')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->name . ' berhasil ditambahkan!');
    }
    public function update()
    {
        $user = User::find($this->id);

        $ruleEmail = $user->email == $this->email ? ['required', 'email'] : ['required', 'email', 'unique:users'];

        $this->validate(['email' => $ruleEmail]);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $this->img,
        ]);
        return redirect()->to('/siswa')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->name . ' berhasil diubah!');
    }
    public function render()
    {
        return view('livewire.siswa-form');
    }
}
