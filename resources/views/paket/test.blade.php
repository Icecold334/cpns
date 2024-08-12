<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row">
        <div class="col-xl-8 col-md-7 col-sm-12 d-flex flex-column">
            <div class="card mb-3 flex-grow-1 h-100">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <table class="table table-borderless table-responsive m-0">
                        <tr>
                            <td class="font-weight-bold" style="width: 30%">Nama Peserta</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="width: 15%">E-mail</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-5 col-sm-12 d-flex flex-column">
            <div class="card mb-3 flex-grow-1 h-100">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="fs-1 py-3 text-center font-weight-bold">
                        01:59:32
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 d-flex">
            <div class="card mb-3 flex-fill">
                <livewire:card-soal :soal="$soals[0]"></livewire:card-soal>
            </div>
        </div>
    </div>
    <livewire:canvas-soal :paket="$paket"></livewire:canvas-soal>

</x-body>
