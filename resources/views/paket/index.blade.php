<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <h1>Daftar Paket Soal @can('create', App\Models\Paket::class)
            <a href="{{ route('paket.create') }}"><i class="fa-solid fa-circle-plus"></i></a>
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table" id="pakets">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%">#</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kategori</th>
                    @if (Auth::user()->role != 3)
                        <th class="text-center">Penulis</th>
                    @endif
                    <th class="text-center">Jumlah Soal</th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pakets as $paket)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $paket->nama }}</td>
                        <td>{{ $paket->base->nama }}</td>
                        @if (Auth::user()->role != 3)
                            <td>{{ $paket->user->name }}</td>
                        @endif
                        <td class="text-center">{{ $paket->soal->count() }}</td>
                        @if (Auth::user()->role != 3)
                            <td class="text-center">
                                <a href="/paket/{{ $paket->uuid }}/soal" class="btn badge bg-info text-white px-1">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                                {{-- <a href="/paket/{{ $paket->uuid }}/edit" class="btn badge bg-warning text-white px-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a> --}}
                                <form class="d-inline" action="/paket/{{ $paket->uuid }}" method="POST"
                                    id="formDel{{ $paket->uuid }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @can('delete', $paket)
                                    <button class="btn badge bg-danger text-white px-1" id="delete{{ $paket->uuid }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    @push('scripts')
                                        <script>
                                            $('#delete{{ $paket->uuid }}').click(() => {
                                                Swal.fire({
                                                    title: "Apa Kamu Yakin?",
                                                    text: "Yakin Hapus {{ $paket->nama }}?",
                                                    icon: "question",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Ya",
                                                    cancelButtonText: "Tidak"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        let form = $('#formDel{{ $paket->uuid }}')
                                                        form.submit();
                                                    }
                                                });
                                            });
                                        </script>
                                    @endpush
                                @endcan
                            </td>
                        @else
                            @if ($paket->hasil->where('user_id', Auth::user()->id)->first() === null)
                                <td class="text-center">
                                    <a href="/paket/test/{{ $paket->uuid }}" class="btn badge bg-success text-white">
                                        <i class="fa-solid fa-play"></i> Kerjakan Ujian
                                    </a>
                                </td>
                            @else
                                @if ($paket->hasil->where('user_id', Auth::user()->id)->first()->total_skor === null)
                                    <td class="text-center">
                                        <a href="/paket/test/{{ $paket->uuid }}{{ $paket->hasil->where('user_id', Auth::user()->id)->first()->start_time != null ? '/play' : '' }}"
                                            class="btn badge bg-success text-white">
                                            <i class="fa-solid fa-play"></i>
                                            {{ $paket->hasil->where('user_id', Auth::user()->id)->first()->start_time === null ? 'Kerjakan Ujian' : 'Lanjutkan Ujian' }}
                                        </a>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <a href="/paket/hasil/{{ $paket->uuid }}"
                                            class="btn badge bg-info text-white">
                                            <i class="fa-solid fa-circle-info"></i> Hasil Ujian
                                        </a>
                                    </td>
                                @endif
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script>
            let sort = {!! Auth::user()->role !!} != 2 ? {
                orderable: false,
                targets: 4
            } : {};
            $("#pakets").DataTable({
                "responsive": true,
                columnDefs: [sort],
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
