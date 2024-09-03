<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row">

        <div class="col-xl-6 col-md-12 col-sm-12">
            <h1 class=""><a href="{{ route('paket.index') }}"><i class="fa-solid fa-circle-chevron-left"></i></a>
                {{ $title }}

            </h1>
        </div>
        <div
            class="col-xl-6 col-md-12 col-sm-12  d-flex justify-content-xl-end justify-content-md-center justify-content-sm-center align-items-center">
            @if (!$paket->status)
                @can('create', [App\Models\Soal::class, $paket])
                    <a href="{{ route('paket.soal.create', ['paket' => $paket->uuid]) }}" class="btn btn-primary me-3"><i
                            class="fa-solid fa-circle-plus"></i> Tambah Soal</a>
                    @if ($paket->soal->count() > 0)
                        <button type="button" class="btn btn-primary me-3" id="publish">
                            <i class="fa-solid fa-angles-up"></i> Publikasikan Paket Soal
                        </button>
                        @push('scripts')
                            <script>
                                $('#publish').click(() => {
                                    Swal.fire({
                                        title: "Apa Kamu Yakin?",
                                        text: "Paket soal yang sudah dipublikasikan tidak bisa diubah",
                                        icon: "question",
                                        confirmButtonText: 'Ya',
                                        confirmButtonColor: "{{ App\Models\Pengaturan::first()->primary }}",
                                        cancelButtonText: 'Tidak',
                                        showCancelButton: true,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "{{ route('publish', ['paket' => $paket->uuid]) }}";
                                        }
                                    });
                                });
                            </script>
                        @endpush
                    @endif
                @endcan
            @endif
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info-soal">
                <i class="fa-solid fa-circle-info"></i> Informasi Paket Soal
            </button>
            @push('html')
                <div class="modal fade" id="info-soal" tabindex="-1" aria-labelledby="info-soalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 font-weight-bold text-black" id="info-soalLabel">Informasi Paket
                                    Soal</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('paket.update', ['paket' => $paket->uuid]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <table class="table table-responsive-md">
                                        <tr>
                                            <th>Nama Paket</th>
                                            <td colspan="2">{{ $paket->nama }}</td>
                                        </tr>
                                        @if (Auth::user()->role != 2)
                                            <tr>
                                                <th>Penulis</th>
                                                <td colspan="2">{{ $paket->user->name }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Jumlah Soal</th>
                                            <td colspan="2">{{ $paket->soal->count() }} Soal</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-center">Kategori : {{ $paket->base->nama }}</th>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table width="100%" class="table">
                                                    <tr>
                                                        @foreach ($paket->base->kategori as $kategori)
                                                            <th class="text-center">{{ $kategori->deskripsi }}</th>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        @foreach ($paket->base->kategori as $kategori)
                                                            <th class="text-center">{{ $kategori->soal->count() }}</th>
                                                        @endforeach
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Durasi {{ $paket->base->id == 2 ? '/ soal' : '' }}</th>
                                            <td colspan="2">
                                                @if ($paket->base->id == 2)
                                                    {{ $paket->durasi }} detik
                                                @else
                                                    {{ floor($paket->durasi / 60) }} menit
                                                @endif
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endpush
        </div>
    </div>
    <div class="table-responsive">
        <table class="table" id="soals">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%">#</th>
                    <th class="text-center">Soal</th>
                    <th class="text-center" style="width: 30%">Jawaban</th>
                    <th class="text-center" style="width: 30%">Kategori</th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soals as $soal)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ Str::words($soal->soal, 4, '...') }}</td>
                        <td class="{{ $soal->kategori->id == 3 ? 'text-center' : '' }}">
                            {{ $soal->kategori->id != 3 ? Str::words($soal->jawaban->where('benar', true)->first()->jawaban, 4, '...') : '-' }}
                        </td>
                        <td>{{ $soal->kategori->deskripsi }}</td>
                        <td class="text-center">
                            <a href="{{ route('paket.soal.edit', ['paket' => $paket->uuid, 'soal' => $soal->uuid]) }}"
                                class="btn badge bg-warning text-white px-1">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form class="d-inline"
                                action="{{ route('paket.soal.destroy', ['paket' => $paket->uuid, 'soal' => $soal->uuid]) }}"
                                method="POST" id="formDel{{ $soal->uuid }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn badge bg-danger text-white px-1" id="delete{{ $soal->uuid }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @push('scripts')
                                <script>
                                    $('#delete{{ $soal->uuid }}').click(() => {
                                        Swal.fire({
                                            title: "Apa Kamu Yakin?",
                                            text: "Yakin hapus soal?",
                                            icon: "question",
                                            showCancelButton: true,
                                            confirmButtonColor: "{{ App\Models\Pengaturan::first()->primary }}",
                                            confirmButtonText: "Ya",
                                            cancelButtonText: "Tidak"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                let form = $('#formDel{{ $soal->uuid }}')
                                                form.submit();
                                            }
                                        });
                                    });
                                </script>
                            @endpush
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script>
            $("#soals").DataTable({
                "responsive": true,
                columnDefs: [{
                    orderable: false,
                    targets: 4
                }],
                paging: true,
                lengthMenu: [5, 10, 20, {
                    label: "Semua",
                    value: -1
                }],
                pageLength: 10,
                language: {
                    decimal: "",
                    searchPlaceholder: "Cari Data",
                    emptyTable: "Tabel kosong",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Tampilkan _MENU_ data",
                    loadingRecords: "Loading...",
                    processing: "",
                    search: "Cari:",
                    zeroRecords: "Data tidak ditemukan",
                    paginate: {
                        first: "<<",
                        last: ">>",
                        next: ">",
                        previous: "<",
                    },
                    aria: {
                        orderable: "Order by this column",
                        orderableReverse: "Reverse order this column",
                    },
                },
            });
        </script>
    @endpush
</x-body>
