<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10">
        <div class="flex items-center  text-3xl sm:text-4xl md:text-5xl ">
            {{-- <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a> --}}
            <div class=" font-semibold text-slate-800">Daftar Paket Ujian</div>
        </div>
        @can('create', App\Models\Paket::class)
            <div class="hidden xl:flex items-center  text-3xl sm:text-4xl md:text-5xl ">
                <x-button :button="true" data-modal-target="paketModal" data-modal-toggle="paketModal">
                    <i class="fa-solid fa-circle-plus"></i> Tambah Paket Ujian
                </x-button>
                <x-modal title='Tambah Guru' id='paketModal'>
                    <livewire:paket-form />
                </x-modal>
            </div>
        @endcan
    </div>
    <x-table id="paket">
        <thead>
            <tr>
                <th># <i class="fa-solid fa-sort"></i></th>
                <th>Nama <i class="fa-solid fa-sort"></i></th>
                <th class="hidden lg:table-cell">Kategori <i class="fa-solid fa-sort"></i></th>
                <th class="hidden lg:table-cell">Penulis <i class="fa-solid fa-sort"></i></th>
                @if (Auth::user()->role != 3)
                    <th>Status <i class="fa-solid fa-sort"></i></th>
                @endif
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakets as $paket)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $paket->nama }}</td>
                    <td class="hidden lg:table-cell">{{ $paket->base->nama }}</td>
                    <td class="hidden lg:table-cell">{{ $paket->user->name }}</td>
                    @if (Auth::user()->role != 3)
                        <td class="text-center">
                            <x-badge :badge="true" color="{{ $paket->status ? 'success' : 'secondary' }}">
                                <i class="fa-solid {{ $paket->status ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                            </x-badge>
                        </td>
                        <td class="text-left">
                            <x-badge :badge="false" href="/paket/{{ $paket->uuid }}/soal" color="info"
                                class="inline me-3">
                                Rincian
                            </x-badge>
                            @if ($paket->status)
                                <x-badge :badge="false" href="/paket/{{ $paket->uuid }}/list" color="secondary"
                                    class="inline me-3">
                                    Hasil Ujian
                                </x-badge>
                            @endif
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
                                <x-badge :badge="false" href="/paket/test/{{ $paket->uuid }}" color="success">
                                    <i class="fa-solid fa-play"></i> Kerjakan Ujian
                                </x-badge>
                            </td>
                        @else
                            {{-- @if ($paket->hasil->where('user_id', Auth::user()->id)->first()->nilai === null) --}}
                            @if (!($paket->result && $paket->result->last() && $paket->result->last()->nilai !== null))
                                <td>

                                    <x-badge :badge="false"
                                        href="/paket/test/{{ $paket->uuid }}/{{ $paket->hasil->where('user_id', Auth::user()->id)->first()->start_time != null ? 'play' : '' }}"
                                        color="success">
                                        <i class="fa-solid fa-play"></i>
                                        {{ !($paket->result && $paket->result->last() && $paket->result->last()->start_time !== null) ? 'Kerjakan Ujian' : 'Lanjutkan Ujian' }}
                                    </x-badge>
                                </td>
                            @else
                                <td>

                                    <button data-tooltip-target="tooltip-default" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Default
                                        tooltip</button>

                                    <div id="tooltip-default" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Tooltip content
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <x-badge :badge="false" href="{{ route('hasil', ['paket' => $paket->uuid]) }}"
                                        color="info">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </x-badge>
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
