<div class="offcanvas px-0 offcanvas-start {{ $show ? 'show' : '' }}" data-bs-scroll="true" tabindex="-1" id="canvas"
    aria-labelledby="canvasLabel">

    <div class="offcanvas-header bg-primary">
        <h3 class="offcanvas-title text-white px-3" id="canvasLabel" data-bs-backdrop="false">Daftar Soal</h3>

        <button type="button" class="btn-close me-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row px-3">
            @foreach ($soals as $soal)
                <div class="col-3 col-xl-3 col-md-2 mb-3">
                    <a href="#"
                        class="btn btn-outline-primary {{ $activeSoalId === $soal->id ? 'active' : '' }} w-100"
                        wire:click="pilihSoal({{ $soal->id }},{{ $loop->iteration }})" role="button"
                        data-bs-toggle="button">{{ $loop->iteration }}</a>
                </div>
            @endforeach
        </div>
    </div>

</div>
