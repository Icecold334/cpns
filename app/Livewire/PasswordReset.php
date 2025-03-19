<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordReset extends Component
{

    public $user, $oldpassword, $newpassword, $confirmpassword;

    public function mount()
    {
        // Ambil data user yang sedang login
        $this->user = User::find(Auth::id());
    }

    public function save()
    {
        $this->validate([
            'oldpassword' => ['required', 'string'],
            'newpassword' => ['required', 'string'],
            'confirmpassword' => ['required', 'same:newpassword'],
        ], [
            'oldpassword.required' => 'Password lama wajib diisi.',
            'newpassword.required' => 'Password baru wajib diisi.',
            // 'newpassword.min' => 'Password baru harus memiliki minimal 8 karakter.',
            'confirmpassword.required' => 'Konfirmasi password wajib diisi.',
            'confirmpassword.same' => 'Konfirmasi password harus sama dengan password baru.',
        ]);




        // Periksa apakah password lama cocok dengan password yang tersimpan
        if (!Hash::check($this->oldpassword, $this->user->password)) {
            throw ValidationException::withMessages([
                'oldpassword' => 'Password lama salah.',
            ]);
        }

        // Update password baru
        $this->user->update([
            'password' => Hash::make($this->newpassword),
        ]);

        // Kosongkan input setelah berhasil menyimpan
        $this->reset(['oldpassword', 'newpassword', 'confirmpassword']);

        return redirect()->to('password-reset')
            ->with('icon', 'success')
            ->with('title', 'Berhasil')
            ->with('message', 'Password berhasil diubah!');
    }
    public function render()
    {
        return view('livewire.password-reset');
    }
}
