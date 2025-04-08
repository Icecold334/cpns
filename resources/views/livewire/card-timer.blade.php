<div class="font-bold text-3xl text-center " wire:poll.1000='decrementTime'>
    {{ gmdate('H:i:s', $timeRemaining) }}
</div>
