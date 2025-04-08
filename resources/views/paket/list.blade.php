<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl">
            <a href="{{ route('paket.index') }}" class="text-primary-600 hover:text-primary-950 transition duration-200">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
            <div class="font-semibold text-slate-800">{{ $title }}</div>
        </div>
    </div>


    <x-table id="hasils">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Nama Siswa <i class="fa-solid fa-sort"></i></th>
                @foreach ($paket->base->kategori as $kategori)
                    <th>
                        {{ $kategori->nama }}
                    </th>
                @endforeach
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paket->result->whereNotNull('nilai')->unique('user_id')->pluck('user') as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    @foreach ($paket->hasil->whereNotNull('nilai')->where('nilai', '>=', 0)->where('user_id', $user->id)->groupBy('result_id')->last() as $hasil)
                        <td class="text-center">{{ $hasil->nilai }}</td>
                    @endforeach
                    <td class="text-center">
                        {{ $paket->result->whereNotNull('nilai')->where('nilai', '>=', 0)->where('user_id', $user->id)->last()->nilai }}
                    </td>
                    {{-- @can('admin')
                        <td>
                            <div class="flex">
                                <x-badge :badge="false" href="/siswa/{{ $hasil->id }}/edit" class="mx-3"
                                    color="warning">Ubah</x-badge>

                                <x-badge :badge="true" color="danger" id="delete{{ $hasil->id }}">Hapus</x-badge>
                                <form id="delete-form-{{ $hasil->id }}"
                                    action="{{ route('siswa.destroy', ['siswa' => $hasil->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @push('scripts')
                                    <script type="module">
                                        $(document).ready(function() {
                                            $('#delete{{ $hasil->id }}').click(() => {
                                                Swal.fire({
                                                    title: 'Apa Anda Yakin?',
                                                    text: "Anda akan menghapus siswa {{ $hasil->name }}!",
                                                    icon: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Hapus',
                                                    cancelButtonText: 'Batal'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('delete-form-{{ $hasil->id }}').submit();
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                @endpush
                            </div>
                        </td>
                    @endcan --}}
                </tr>
            @endforeach
        </tbody>
    </x-table>
    @push('scripts')
        <script type="module">
            table('#hasils')
        </script>
    @endpush
</x-body>
