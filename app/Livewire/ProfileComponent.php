<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $gender, $img;

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->img = $user->img ?? 'img/undraw_profile.svg';
    }

    public function save()
    {
        // Validasi input (gambar tidak wajib diisi)
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::id()), // Email unik, kecuali milik sendiri
            ],
            'gender' => 'required|in:0,1',
            'img' => $this->img == 'img/undraw_profile.svg' ? 'image|max:2048|mimes:jpg,jpeg,png' : '',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan, coba email lain.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin tidak valid.',
            'img.image' => 'File yang diunggah harus berupa gambar.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'img.mimes' => 'Format gambar yang diperbolehkan adalah .jpg, .jpeg, .png.',
        ]);

        $user = User::find(Auth::id());

        // Jika ada gambar baru yang diunggah → maka update
        if ($this->img && !is_string($this->img)) {
            // Hapus gambar lama jika bukan gambar default
            if ($user->img && $user->img !== 'img/undraw_profile.svg') {
                Storage::delete(str_replace('storage', 'public', $user->img));
            }

            // Simpan gambar baru ke direktori public/user
            $img = str_replace('public', 'storage', $this->img->store('public/user'));
        } else {
            // Jika tidak ada file yang diunggah, gunakan gambar lama
            $img = $user->img;
        }

        // Update data user (hanya gambar baru jika ada)
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $img,
        ]);

        // Kosongkan input file setelah menyimpan
        $this->reset('img');

        // Tampilkan notifikasi sukses
        session()->flash('message', 'Profil berhasil diperbarui!');
        return redirect()->to('profil')
            ->with('icon', 'success')
            ->with('title', 'Berhasil!')
            ->with('message', 'Profil berhasil diperbarui!');
    }

    public function resetImg()
    {
        $user = User::find(Auth::id());

        // Hapus gambar lama jika ada (kecuali gambar default)
        if ($user->img && $user->img !== 'img/undraw_profile.svg') {
            Storage::delete(str_replace('storage', 'public', $user->img));
        }

        // Set gambar ke default
        $this->img = 'img/undraw_profile.svg';

        // Update ke database
        $user->update([
            'img' => null
        ]);
    }

    public function render()
    {
        return view('livewire.profile-component');
    }
}
