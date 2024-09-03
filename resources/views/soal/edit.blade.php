<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1><a href="{{ route('paket.soal.index', ['paket' => $paket->uuid]) }}"><i
                class="fa-solid fa-circle-chevron-left"></i></a> Ubah Soal
    </h1>
    <div class="row">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <livewire:create-soal :paket="$paket" :uuid="$soal->uuid" :soal_array="$soal" />
                </div>
            </div>
        </div>
    </div>
</x-body>
