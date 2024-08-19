<div class="card mb-3 flex-grow-1 h-100">
    <div class="card-body d-flex justify-content-center align-items-center">
        <div class="fs-1 py-3 text-center font-weight-bold">
            {{ gmdate('H:i:s', $timeRemaining) }}
        </div>
    </div>
    @push('scripts')
        <script>
            setInterval(function() {
                @this.call('decrementTime');
            }, 1000);
        </script>
    @endpush
</div>
