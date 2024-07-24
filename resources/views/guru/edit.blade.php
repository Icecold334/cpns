<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1><a href="{{ route('guru.index') }}"><i class="fa-solid fa-circle-chevron-left"></i></a> Tambah Guru
    </h1>
    <div class="row">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <livewire:guru-form :id="$user->id" :name="$user->name" :gender="$user->gender" :email="$user->email"
                        :oldEmail="$user->email" />
                </div>
            </div>
        </div>
    </div>
</x-body>
