<div class="card mb-3 flex-grow-1 h-100">
    <div class="card-body d-flex justify-content-center align-items-center">
        <div class="fs-1 py-3 text-center font-weight-bold">
            {{ gmdate('H:i:s', $timeRemaining) }}
        </div>
    </div>
    @push('scripts')
        <script>
            let saveInterval = 1000; // Save time every 5 seconds
            let decrementInterval = 1000; // Decrement time every second

            // Set interval to decrement time
            setInterval(function() {
                @this.call('decrementTime');
            }, decrementInterval);

            // Set interval to save time every 5 seconds
            setInterval(function() {
                @this.call('saveTime');
            }, saveInterval);
        </script>
    @endpush
</div>
