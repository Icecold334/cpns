<div class="card shadow">
    <div class="card-header text-center">
        <h1>Paket Soal C</h1>
        <div class="badge bg-primary fs-1">{{ $paket->durasi }}</div>
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
                @if ($jawaban && $nomor != $soals->count())
                    <button class="btn btn-primary mt-3 ms-3 {{ $nomor == $soals->count() ? 'disabled' : '' }}"
                        type="button" wire:click="after({{ $nomor }})" wire:loading.class="disabled">Soal
                        Berikutnya</button>
                @endif
            </form>
        </div>

        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" style="height: 2rem"
            aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{ $persen }}%">
                <span class="fs-5 font-weight-bold">{{ $persen }}%</span>
            </div>
        </div>
    </div>


</div>
