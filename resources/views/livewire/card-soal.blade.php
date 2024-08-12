<div class="card-body">
    <h5 class="font-weight-bold">Soal No.1</h5>
    @if ($soal->img)
        <div class="row mb-3 justify-content-center">
            <div class="col-3"><img src="{{ asset($soal->img) }}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endif
    <p>{{ $soal->soal }}</p>
    @foreach (App\Models\Jawaban::where('soal_id', $soal->id)->get()->shuffle() as $jawaban)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jawab"
                id="jawaban{{ intToAlphabet($jawaban->row, true) }}" wire:click="test">
            <label class="form-check-label" for="jawaban{{ intToAlphabet($jawaban->row, true) }}">
                {{ intToAlphabet($loop->iteration, true) }}. {{ $jawaban->jawaban }}
            </label>
        </div>
    @endforeach
    @push('scripts')
        <script>
            document.addEventListener('eventWithData', event => {
                console.log('Data received:', event.detail[0].message); // Outputs: "Hello, World!"
            });
        </script>
    @endpush
</div>
