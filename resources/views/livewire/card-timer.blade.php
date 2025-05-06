<div class="font-bold text-3xl text-center" id="counter">
    {{ gmdate('H:i:s', $timeRemaining) }}
</div>
{{-- @push('scripts') --}}
<script>
    var timeRemaining = {!! $timeRemaining !!};
    var display = document.getElementById('counter');

    var timer = setInterval(function() {
        var hours = Math.floor(timeRemaining / 3600);
        var minutes = Math.floor((timeRemaining % 3600) / 60);
        var seconds = timeRemaining % 60;

        // Format the output
        display.textContent = [
            hours.toString().padStart(2, '0'),
            minutes.toString().padStart(2, '0'),
            seconds.toString().padStart(2, '0')
        ].join(':');

        if (timeRemaining <= 0) {
            clearInterval(timer);
            // console.log('asa');
            
            @this.call('selesai'); // Assuming you are using Livewire
        }
        timeRemaining--;
    }, 1000);
</script>
{{-- @endpush --}}