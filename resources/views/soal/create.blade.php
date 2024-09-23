<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1><a href="{{ route('paket.soal.index', ['paket' => $paket->uuid]) }}"><i
                class="fa-solid fa-circle-chevron-left"></i></a> Tambah Soal
    </h1>
    <div class="row">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    {{-- @if ($paket->base->id == 1) --}}
                    <livewire:create-soal :paket="$paket" />
                    {{-- @else --}}
                    {{-- <h1>blum ada</h1> --}}
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</x-body>
