<div class="card shadow">
    <div class="card-header text-center bg-white">
        <h1>Paket Soal C</h1>
        <div class="badge bg-primary fs-1">{{ $durasi }}</div>
    </div>
    <div class="card-body">
        <p class="font-weight-bold text-center">{{ $soal->soal }}</p>

        <div class="row justify-content-center">
            <form class="text-center col-xl-8 col-md-10 col-sm-12">
                @foreach ($shuffledJawaban as $jawab)
                    <div class="form-check mb-2">
                        <input class="btn-check" wire:loading.attr="disabled" type="radio" name="jawab"
                            value="{{ $jawab->id }}" id="jawaban{{ intToAlphabet($jawab->row, true) }}"
                            wire:model.live="jawaban" wire:key="jawab-{{ $jawab->id }}">
                        <label class="btn btn-outline-primary w-100"
                            for="jawaban{{ intToAlphabet($jawab->row, true) }}">
                            {{ $jawab->jawaban }}
                        </label>
                    </div>
                @endforeach
                @if ($nomor == $soals->count() && $jawaban)
                    <button class="btn btn-primary mt-3 ms-3" type="button" wire:click="selesai"
                        wire:loading.class="disabled">Selesai</button>
                @endif
                @if ($jawaban && $nomor != $soals->count())
                    <button class="btn btn-primary mt-3 ms-3 {{ $nomor == $soals->count() ? 'disabled' : '' }}"
                        type="button" wire:click="after({{ $nomor }})" wire:loading.class="disabled">Soal
                        Berikutnya</button>
                @endif
            </form>
        </div>

        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" style="height: 2rem"
            aria-valuemin="0" aria-valuemax="100">

            <div class="progress-bar" style="width: {{ $persen }}%">
                <span class="fs-5 font-weight-bold">{{ $persen }}%</span>
            </div>
        </div>
    </div>

    @if (!($durasi == 0 && $nomor == $paket->soal->count()))
        <div wire:poll.1000ms="decrement"></div>
    @else
        <div wire:init="decrement"></div>
    @endif

    @push('scripts')
        <script></script>
        <script>
            document.addEventListener('redirect-with-delay', function(event) {

                // Ambil URL dan delay dari event yang dikirim oleh Livewire
                let url = event.detail[0].url;
                // Set delay untuk redirect
                setTimeout(function() {
                    window.location.href = url;
                }, 1000);
            });
        </script>
    @endpush
</div>
