<?php


namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class GuruForm extends Component
{
    use WithFileUploads;
    public $id;
    #[Validate('required', message: 'Nama wajib diisi!')]
    #[Validate('min:3', message: 'Nama terlalu singkat!')]
    public $name;
    #[Validate('required', message: 'Jenis kelamin wajib diisi!')]
    public $gender = 0;
    // #[Validate('required', message: 'Email wajib diisi!')]
    // #[Validate('email', message: 'Format email salah!')]
    // #[Validate('unique:users', message: 'Email sudah terdaftar!')]
    public $email = '';
    #[Validate('nullable')]
    #[Validate('image', message: 'Format file harus jpeg/png/jpg/gif!')]
    #[Validate('max:2048', message: 'Ukuran file maksimal 2MB!')]
    #[Validate('mimes:jpeg,png,jpg,gif', message: 'Format file harus jpeg/png/jpg/gif!')]
    public $img;

    public function save()
    {
        $ruleEmail = ['required', 'email', 'unique:users'];

        $this->validate([
            'email' => $ruleEmail,
            'name' => ['required', 'min:3'],
            'img' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif'],
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah terdaftar!',
            'name.required' => 'Nama wajib diisi!',
            'name.min' => 'Nama terlalu singkat!!',
            'img.nullable' => 'Foto wajib diupload!',
            'img.image' => 'Format file harus jpeg/png/jpg/gif!',
            'img.max' => 'Ukuran file maksimal 2MB!',
            'img.mimes' => 'Format file harus jpeg/png/jpg/gif!',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $this->img,
            'role' => 2,
            'password' => Hash::make('password123'),

        ]);
        return redirect()->to('/guru')->with('icon', 's`uccess')->with('title', 'Berhasil')->with('message', $this->name . ' berhasil ditambahkan!');
    }
    public function update()
    {
        $user = User::find($this->id);

        $ruleEmail = $user->email == $this->email ? ['required', 'email'] : ['required', 'email', 'unique:users'];

        $this->validate([
            'email' => $ruleEmail,
            'name' => ['required', 'min:3'],
            'img' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif'],
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah terdaftar!',
            'name.required' => 'Nama wajib diisi!',
            'name.min' => 'Nama terlalu singkat!!',
            'img.nullable' => 'Foto wajib diupload!',
            'img.image' => 'Format file harus jpeg/png/jpg/gif!',
            'img.max' => 'Ukuran file maksimal 2MB!',
            'img.mimes' => 'Format file harus jpeg/png/jpg/gif!',
        ]);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $this->img,
        ]);
        return redirect()->to('/guru')->with('icon', 'success')->with('title', 'Berhasil')->with('message', $this->name . ' berhasil diubah!');
    }

    public function render()
    {
        return view('livewire.guru-form');
    }
}
