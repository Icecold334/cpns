<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl">
            <a href="{{ route('paket.index') }}" class="text-primary-600 hover:text-primary-950 transition duration-200">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
            <div class="font-semibold text-slate-800">{{ $title }}</div>
        </div>
        {{-- @can('create', [App\Models\Soal::class, $paket]) --}}
        <div class="hidden xl:flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl">
            <x-button :button="false" href="{{ route('paket.soal.create', ['paket' => $paket->uuid]) }}">
                <i class="fa-solid fa-circle-plus"></i> Tambah Soal
            </x-button>

            @if ($paket->soal->count() > 0)
                <x-button :button="true" id="publish">
                    <i class="fa-solid fa-angles-up"></i> Publikasikan Paket Soal
                </x-button>
            @endif
        </div>
        {{-- @endcan --}}
    </div>

    <x-table id="soals">
        <thead>
            <tr>
                <th class="text-center"># <i class="fa-solid fa-sort"></i></th>
                <th class="text-center">Soal <i class="fa-solid fa-sort"></i></th>
                <th class="text-center">Jawaban <i class="fa-solid fa-sort"></i></th>
                <th class="text-center">Kategori <i class="fa-solid fa-sort"></i></th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($soals as $soal)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($soal->soal, 30, '...') }}</td>
                    <td class="{{ $soal->kategori->byPoin ? 'text-center' : '' }}">
                        {{ !$soal->kategori->byPoin ? Str::limit($soal->jawaban->where('benar', true)->first()->jawaban, 30, '...') : '-' }}
                    </td>
                    <td>{{ $soal->kategori->deskripsi }}</td>
                    <td class="text-center">
                        <x-badge :badge="false" class="me-3"
                            href="{{ route('paket.soal.edit', ['paket' => $soal->paket->uuid, 'soal' => $soal->uuid]) }}"
                            color="warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </x-badge>

                        <x-badge :badge="true" color="danger" id="delete{{ $soal->uuid }}">
                            <i class="fa-solid fa-trash"></i>
                        </x-badge>
                        <form id="formDel{{ $soal->uuid }}"
                            action="{{ route('paket.soal.destroy', ['paket' => $paket->uuid, 'soal' => $soal->uuid]) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>

    @push('scripts')
        <script type="module">
            table('#soals');
            $('#publish').click(() => {
                Swal.fire({
                    title: "Apa Kamu Yakin?",
                    text: "Paket soal yang sudah dipublikasikan tidak bisa diubah",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    confirmButtonColor: "{{ App\Models\Pengaturan::first()->primary }}",
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('publish', ['paket' => $paket->uuid]) }}";
                    }
                });
            });

            @foreach ($soals as $soal)
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
                            $('#formDel{{ $soal->uuid }}').submit();
                        }
                    });
                });
            @endforeach
        </script>
    @endpush
</x-body>
