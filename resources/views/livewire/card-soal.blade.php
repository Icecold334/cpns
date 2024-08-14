<div class="card-body">
    <h5 class="font-weight-bold">Soal No.{{ $nomor }}</h5>
    @if ($soal->img)
        <div class="row mb-3 justify-content-center">
            <div class="col-xl-6 col-md-8 col-sm-10"><img src="{{ asset($soal->img) }}" alt=""
                    class="img-thumbnail">
            </div>
        </div>
    @endif
    <p>{{ $soal->soal }}</p>
    <div>
        @foreach ($shuffledJawaban as $jawab)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jawab" value="{{ $jawab->id }}"
                    id="jawaban{{ intToAlphabet($jawab->row, true) }}" wire:model.live="jawaban"
                    wire:key="jawab-{{ $jawab->id }}">
                <label class="form-check-label" for="jawaban{{ intToAlphabet($jawab->row, true) }}">
                    {{ intToAlphabet($loop->iteration, true) }}. {{ $jawab->jawaban }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-start gap-3">
        {{-- <button class="btn btn-primary mt-3">Simpan & Lanjut</button> --}}
        <button class="btn btn-primary mt-3 d-flex align-items-center {{ $nomor == 1 ? 'disabled' : '' }}"
            type="button" wire:click="before({{ $nomor }})" wire:loading.class="disabled">
            <span role="status"><i class="fa-solid fa-chevron-left"></i></span>
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm me-1" aria-hidden="true"></span>
            </div>
        </button>
        <button
            class="btn btn-primary mt-3 d-flex align-items-center {{ $nomor == $soals->count() ? 'disabled' : '' }}"
            type="button" wire:click="after({{ $nomor }})" wire:loading.class="disabled">
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm me-1" aria-hidden="true"></span>
            </div>
            <span role="status"><i class="fa-solid fa-chevron-right"></i></span>
        </button>
    </div>


</div>
