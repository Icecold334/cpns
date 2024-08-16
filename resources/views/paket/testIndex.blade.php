<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-10 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            Informasi Ujian
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td style="width: 20%">Nama Peserta</td>
                                    <td>{{ $paket->nama }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Jumlah Soal</td>
                                    <td>{{ $paket->soal->count() }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Durasi</td>
                                    <td>{{ floor($paket->durasi / 60) }} menit</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            Informasi Peserta
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td style="width: 20%">Nama Peserta</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/paket/test/{{ $paket->uuid }}/play" class="btn btn-primary">Mulai Ujian</a>
                    <a href="/paket" class="btn btn-primary">Batal Ujian</a>
                </div>
            </div>
        </div>
    </div>
</x-body>
