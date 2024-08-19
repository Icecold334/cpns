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


    public function mount()
    {
        $user = $this->paket->hasil->where('user_id', Auth::id())->first();
        $startTime = $user->start_time;
        $endTime = $user->end_time;
        if ($startTime && $endTime) {
            $start = Carbon::parse($startTime);
            $end = Carbon::parse($endTime);
            $current = Carbon::now();
            if ($current->between($start, $end)) {
                $remainingTime = abs((int)$end->diffInSeconds($current));
                $this->timeRemaining = $remainingTime;
            } else {
                dd('waktu abis');
            }
        } else {
            $this->timeRemaining = $this->durasi;
            $user = $this->paket->hasil->where('user_id', Auth::id())->first();
            $user->update([
                'start_time' => now(),
                'end_time' => Carbon::parse(now())->addSeconds($this->durasi)
            ]);
        }
    }

    public function decrementTime()
    {
        if ($this->timeRemaining > 0) {
            $this->timeRemaining--;
        } else {
            dd('waktu abis');
        }
    }



    public function render()
    {
        return view('livewire.card-timer');
    }
}
