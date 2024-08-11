<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row mb-3">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless m-0">
                        <tr>
                            <td style="width: 15%">Nama Peserta</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 15%">E-mail</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="fs-1 py-3  text-center ">
                        01:59:32
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="font-weight-bold">Soal No.1</h5>
                    <p>{{ $soals[0]->soal }}</p>
                    @foreach (App\Models\Jawaban::where('soal_id', $soals[0]->id)->get()->shuffle() as $jawaban)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawab"
                                id="jawaban{{ intToAlphabet($jawaban->row, true) }}">
                            <label class="form-check-label" for="jawaban{{ intToAlphabet($jawaban->row, true) }}">
                                {{ intToAlphabet($loop->iteration, true) }}. {{ $jawaban->jawaban }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        @for ($i = 1; $i <= $paket->soal->count(); $i++)
                            <div class="col-2 mb-2">
                                <a href="#" class="btn btn-outline-primary w-100" role="button"
                                    data-bs-toggle="button">{{ $i }}</a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-body>
