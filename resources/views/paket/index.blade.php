<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1>Daftar Soal <a href="{{ route('paket.create') }}"><i class="fa-solid fa-circle-plus"></i></a></h1>
    <div class="table-responsive">
        <table class="table" id="soals">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%">#</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Penulis</th>
                    <th class="text-center">Jumlah Soal</th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soals as $soal)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $soal->nama }}</td>
                        <td>{{ $soal->user->name }}</td>
                        <td class="text-center">{{ $soal->soal->count() }}</td>
                        <td class="text-center">
                            <a href="/paket/{{ $soal->id }}" class="btn badge bg-info text-white px-1">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="/paket/{{ $soal->id }}/edit" class="btn badge bg-warning text-white px-1">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form class="d-inline" action="/paket/{{ $soal->id }}" method="POST"
                                id="formDel{{ $soal->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn badge bg-danger text-white px-1" id="delete{{ $soal->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @push('scripts')
                                <script>
                                    $('#delete{{ $soal->id }}').click(() => {
                                        Swal.fire({
                                            title: "Apa Kamu Yakin?",
                                            text: "Yakin Hapus Guru {{ $soal->name }}?",
                                            icon: "question",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Ya",
                                            cancelButtonText: "Tidak"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                let form = $('#formDel{{ $soal->id }}')
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
