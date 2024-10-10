<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class SiswaForm extends Component
{
    use WithFileUploads;

    public $id;
    #[Validate]
    public $name;
    public $gender = 0;
    #[Validate]
    public $email = '';
    #[Validate]
    public $img;

    public function rules()
    {
        if ($this->id) {
            $user = User::find($this->id);
            $ruleEmail = $user->email == $this->email ? 'required|email' : 'required|email|unique:users';
            return [
                'name' => 'required|min:3',
                'email' => $ruleEmail,
                'img' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif',
            ];
        } else {
            return [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'img' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi!',
            'name.min' => 'Nama terlalu singkat!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah terdaftar!',
            'img.image' => 'Format file harus jpeg/png/jpg/gif!',
            'img.max' => 'Ukuran file maksimal 2MB!',
            'img.mimes' => 'Format file harus jpeg/png/jpg/gif!',
        ];
    }

    // mount
    public function mount()
    {
        if ($this->id != null) {
            $guru = User::find($this->id);
            $this->name = $guru->name;
            $this->email = $guru->email;
            $this->gender = $guru->gender;
            $this->img = $guru->img;
        }
    }

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $this->img != null ? str_replace('public', 'storage', $this->img->store('public/user')) : null,
            'role' => 3,
            'password' => Hash::make('password123'),
        ]);

        return redirect()->to('/siswa')
            ->with('icon', 'success')
            ->with('title', 'Berhasil')
            ->with('message', $this->name . ' berhasil ditambahkan!');
    }

    public function update()
    {
        $user = User::find($this->id);
        $this->validate();

        if ($this->img != null && !is_string($this->img)) {
            Storage::delete(str_replace('storage', 'public', $this->img));
            $img =  str_replace('public', 'storage', $this->img->store('public/user'));
        } else {
            $img = $this->img;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $img,
        ]);

        return redirect()->to('/siswa')
            ->with('icon', 'success')
            ->with('title', 'Berhasil')
            ->with('message', $this->name . ' berhasil diubah!');
    }

    #[On('delete')]
    public function delete($id)
    {
        dd('A1');
        User::destroy($id);
        return redirect()->to('/siswa')
            ->with('icon', 'success')
            ->with('title', 'Berhasil')
            ->with('message', 'Data siswa berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.siswa-form');
    }
}
