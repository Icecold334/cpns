<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CardTimer extends Component
{
    public $timeRemaining; // Timer in seconds
    public $durasi;
    public $paket;
    public $interval = 60;
    public $selesai;
    protected $listeners = ['saveProgress'];

    public function mount()
    {
        $user = $this->paket->hasil->where('user_id', Auth::id())->first();
        $startTime = $user->start_time;
        $lastTime = $user->last_activity;
        if ($startTime && $lastTime) {
            // Buat dua instance Carbon
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $startTime);
            $last = Carbon::createFromFormat('Y-m-d H:i:s', $lastTime);
            $selisih = (int)$start->diffInSeconds($last);
            $durasi = $this->durasi - $selisih;
            $this->timeRemaining = $durasi;
        } else {
            $this->timeRemaining == $this->durasi;
        }

        if ($this->timeRemaining < 0) {

            return redirect()->route('ujian.selesai', ['paket' => $this->paket->uuid]);
        }
    }

    public function decrementTime()
    {
        if ($this->timeRemaining > 0) {
            $this->timeRemaining--;

            // Simpan waktu tersisa ke database setiap interval tertentu
            if ($this->timeRemaining % $this->interval === 0) {
                $this->saveTime();
            }
        } else {
            return redirect()->route('ujian.selesai', ['paket' => $this->paket->uuid]);
        }
    }

    public function saveTime()
    {
        $user = $this->paket->hasil->where('user_id', Auth::id())->first();
        $user->update([
            'last_activity' => now()
        ]);
    }

    public function render()
    {
        return view('livewire.card-timer');
    }
}
