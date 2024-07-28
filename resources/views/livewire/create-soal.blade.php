<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1><a href="{{ route('soal.index') }}"><i class="fa-solid fa-circle-chevron-left"></i></a> Taasmbah Soal</h1>

    <div class="row">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" wire:click="test" class="btn btn-primary">sd</button>

                </div>
            </div>
        </div>
    </div>

</x-body>
