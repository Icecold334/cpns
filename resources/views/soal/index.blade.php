<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="row">

        <div class="col-xl-6 col-md-12 col-sm-12">
            <h1 class=""><a href="{{ route('paket.index') }}"><i class="fa-solid fa-circle-chevron-left"></i></a>
                {{ $title }}

            </h1>
        </div>
        <div
            class="col-xl-6 col-md-12 col-sm-12  d-flex justify-content-xl-end justify-content-md-end justify-content-sm-start align-items-center">
            <a href="{{ route('paket.soal.create', ['paket' => $paket->uuid]) }}" class="btn btn-outline-primary mx-3"><i
                    class="fa-solid fa-circle-plus"></i> Tambah Soal</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info-soal">
                <i class="fa-solid fa-circle-info"></i> Informasi Paket Soal
            </button>
            @push('html')
                <div class="modal fade" id="info-soal" tabindex="-1" aria-labelledby="info-soalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="info-soalLabel">Informasi Paket Soal</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <td>Nama Paket</td>
                                        <td>:</td>
                                        <td>{{ $paket->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penulis</td>
                                        <td>:</td>
                                        <td>{{ $paket->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Soal</td>
                                        <td>:</td>
                                        <td>{{ $paket->soal->count() }} Soal</td>
                                    </tr>
                                    <tr>
                                        <td>Durasi</td>
                                        <td>:</td>
                                        <td>120 menit</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
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
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
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
