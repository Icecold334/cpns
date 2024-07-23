<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <h1><a href="{{ route('guru.index') }}"><i class="fa-solid fa-circle-chevron-left"></i></a> Detail Guru
    </h1>
    <div class="row">
        <div class="col-xl-6 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Guru</h6>
                    <div class="card-text">
                        <table class="table">
                            <tr>
                                <th colspan="3">
                                    <div class="row justify-content-center">
                                        <div class="col-6">
                                            <img src="{{ $user->img ? asset('storage/guru') . '/' . $user->img : asset('img/undraw_profile.svg') }}"
                                                alt="" class="img-thumbnail">
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th>{{ $user->name }}</th>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>:</th>
                                <th>{{ $user->gender ? 'Perempuan' : 'Laki-laki' }}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <th>{{ $user->email }}</th>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-body>
