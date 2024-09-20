<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <h1>Daftar Kategori @can('admin')
            <a href="{{ route('kategori.create') }}"><i class="fa-solid fa-circle-plus"></i></a>
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table" id="bases">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%">#</th>
                    <th class="text-center">Kategori/Sub Kategori</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bases as $base)
                    <tr>
                        <td class="text-start">{{ $loop->iteration }}.</td>
                        <td class="font-weight-bold table-active">{{ $base->nama }}</td>
                        <td>{{ $base->deskripsi }}</td>
                        <td class="text-center">
                            <a href="/base/{{ $base->id }}" class="btn badge bg-info text-white px-1">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            {{-- <a href="/base/{{ $base->id }}/edit" class="btn badge bg-warning text-white px-1">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a> --}}
                            @can('admin')
                                <form class="d-inline" action="/base/{{ $base->id }}" method="POST"
                                    id="formDel{{ $base->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn badge bg-danger text-white px-1" id="delete{{ $base->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @push('scripts')
                                    <script>
                                        $('#delete{{ $base->id }}').click(() => {
                                            Swal.fire({
                                                title: "Apa Kamu Yakin?",
                                                text: "Yakin Hapus base {{ $base->name }}?",
                                                icon: "question",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Ya",
                                                cancelButtonText: "Tidak"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    let form = $('#formDel{{ $base->id }}')
                                                    form.submit();
                                                }
                                            });
                                        });
                                    </script>
                                @endpush
                            @endcan
                        </td>
                    </tr>
                    @foreach ($base->kategori as $kategori)
                        <tr>
                            <td class="text-start">{{ $loop->parent->iteration . '.' . $loop->iteration }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>{{ $kategori->deskripsi }}</td>
                            <td class="text-center">
                                <a href="/base/{{ $base->id }}" class="btn badge bg-info text-white px-1">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                                {{-- <a href="/base/{{ $base->id }}/edit" class="btn badge bg-warning text-white px-1">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a> --}}
                                @can('admin')
                                    <form class="d-inline" action="/base/{{ $kategori->id }}" method="POST"
                                        id="formDel{{ $kategori->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button class="btn badge bg-danger text-white px-1" id="delete{{ $kategori->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    @push('scripts')
                                        <script>
                                            $('#delete{{ $kategori->id }}').click(() => {
                                                Swal.fire({
                                                    title: "Apa Kamu Yakin?",
                                                    text: "Yakin Hapus base {{ $kategori->name }}?",
                                                    icon: "question",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Ya",
                                                    cancelButtonText: "Tidak"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        let form = $('#formDel{{ $kategori->id }}')
                                                        form.submit();
                                                    }
                                                });
                                            });
                                        </script>
                                    @endpush
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script>
            $("#bases").DataTable({
                "responsive": true,
                columnDefs: [{
                    orderable: false,
                    targets: 3
                }],
                paging: true,
                lengthMenu: [5, 10, 20, {
                    label: "Semua",
                    value: -1
                }],
                pageLength: 30,
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
