<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1><a href="/paket"><i class="fa-solid fa-circle-chevron-left"></i></a> Hasil
        {{ $hasil->paket->nama }}
    </h1>
    <div class="row ">
        <div class="col-xl-12 col-md-12 col-sm-12">
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
                                <tr>
                                    <td style="width: 20%">Nilai TWK</td>
                                    <td>{{ $hasil->twk }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Nilai TIU</td>
                                    <td>{{ $hasil->tiu }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Nilai TKP</td>
                                    <td>{{ $hasil->tkp }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Nilai Total</td>
                                    <td>{{ $hasil->total_skor }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-body>