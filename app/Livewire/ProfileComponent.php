<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ProfileComponent extends Component
{

    use WithFileUploads;
    public $name, $email, $gender, $img;

    public function mount()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->img = $user->img ?? 'img/undraw_profile.svg';
    }

    public function save()
    {
        // Jika gambar baru diupload
        if (!is_string($this->img)) {
            $img = str_replace('public', 'storage', $this->img->store('public/user'));
        } else {
            $img = $this->img;
        }

        // Update data user
        User::find(Auth::id())->update([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'img' => $img == 'img/undraw_profile.svg' ? null : $img,
        ]);

        // Tampilkan pesan sukses
        session()->flash('message', 'Profile berhasil diubah');
        return redirect()->to('profil')
            ->with('icon', 'success')
            ->with('title', 'Berhasil')
            ->with('message', 'Profil berhasil diubah!');
    }

    public function resetImg()
    {
        return $this->img = 'img/undraw_profile.svg';
    }
    public function render()
    {
        return view('livewire.profile-component');
    }
}
