<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            {{-- <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a> --}}
            <div class=" font-semibold text-slate-800">Daftar Paket Ujian</div>
        </div>
        {{-- @can('create', App\Models\Paket::class) --}}
        <div class="hidden xl:flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            <x-button :button="true" data-modal-target="paketModal" data-modal-toggle="paketModal">
                <i class="fa-solid fa-circle-plus"></i> Tambah Paket Ujian
            </x-button>
            <x-modal title='Tambah Guru' id='paketModal'>
                <livewire:paket-form />
            </x-modal>
        </div>
        {{-- @endcan --}}
    </div>
    <x-table id="paket">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakets as $paket)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paket->nama }}</td>
                    <td>{{ $paket->base->nama }}</td>
                    <td>{{ $paket->user->name }}</td>
                    @if (Auth::user()->role != 3)
                        <td class="text-center">
                            <x-badge :badge="true" color="{{ $paket->status ? 'success' : 'secondary' }}">
                                <i class="fa-solid {{ $paket->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </x-badge>
                        </td>
                        <td>
                            <x-badge :badge="false" href="/paket/{{ $paket->uuid }}/soal" color="info"
                                class="inline me-3">
                                Rincian
                            </x-badge>
                            <x-badge :badge="true" color="danger" id="delete{{ $paket->id }}">Hapus</x-badge>
                            <form id="delete-form-{{ $paket->id }}"
                                action="{{ route('paket.destroy', ['paket' => $paket->uuid]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @push('scripts')
                                <script type="module">
                                    $(document).ready(function() {
                                        $('#delete{{ $paket->id }}').click(() => {
                                            Swal.fire({
                                                title: 'Apa Anda Yakin?',
                                                text: "Anda akan menghapus paket {{ $paket->nama }}!",
                                                icon: 'question',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Hapus',
                                                cancelButtonText: 'Batal'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('delete-form-{{ $paket->id }}').submit();
                                                }
                                            });
                                        });
                                    });
                                </script>
                            @endpush
                        </td>
                    @else
                        @if ($paket->hasil->where('user_id', Auth::user()->id)->first() === null)
                            <td>
                                <a href="/paket/test/{{ $paket->uuid }}" class="btn badge bg-success text-white">
                                    <i class="fa-solid fa-play"></i> Kerjakan Ujian
                                </a>
                            </td>
                        @else
                            @if ($paket->hasil->where('user_id', Auth::user()->id)->first()->nilai === null)
                                <td>
                                    <a href="/paket/test/{{ $paket->uuid }}{{ $paket->hasil->where('user_id', Auth::user()->id)->first()->start_time != null ? '/play' : '' }}"
                                        class="btn badge bg-success text-white">
                                        <i class="fa-solid fa-play"></i>
                                        {{ $paket->hasil->where('user_id', Auth::user()->id)->first()->start_time === null ? 'Kerjakan Ujian' : 'Lanjutkan Ujian' }}
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="/paket/hasil/{{ $paket->uuid }}" class="btn badge bg-info text-white">
                                        <i class="fa-solid fa-circle-info"></i> Hasil Ujian
                                    </a>
                                </td>
                            @endif
                        @endif
                    @endif
                </tr>
            @endforeach
        </tbody>
    </x-table>
    @push('scripts')
        <script type="module">
            table('#paket')
        </script>
    @endpush
</x-body>
