<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex justify-between mb-10 ">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            <div class=" font-semibold text-slate-800">Daftar Kategori</div>
        </div>
        @can('admin')
            <div class="hidden xl:flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
                <x-button :button="true" data-modal-target="kategoriModal" data-modal-toggle="kategoriModal">
                    <i class="fa-solid fa-circle-plus"></i> Tambah Kategori
                </x-button>
                <x-modal title='Tambah Kategori' id='kategoriModal'>
                    <livewire:kategori-form />
                </x-modal>
                <x-button :button="true" data-modal-target="sub-kategoriModal" data-modal-toggle="sub-kategoriModal">
                    <i class="fa-solid fa-circle-plus"></i> Tambah Sub Kategori
                </x-button>
                <x-modal title='Tambah Sub Kategori' id='sub-kategoriModal'>
                    <livewire:sub-kategori-form />
                </x-modal>
            </div>
        @endcan
    </div>


    <x-table id="kategori">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Kategori <i class="fa-solid fa-sort"></i></th>
                <th>Deskripsi <i class="fa-solid fa-sort"></i></th>
                @can('admin')
                    <th></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($bases as $base)
                <tr class="bg-gray-200">
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $base->nama }}</td>
                    <td>{{ $base->deskripsi }}</td>
                    @can('admin')
                        <td>
                            <x-badge :badge="false" href="/kategori/{{ $base->id }}/base/edit" class="me-3"
                                color="warning" data-tooltip-target="edit{{ $base->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </x-badge>
                            <div id="edit{{ $base->id }}" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Ubah data kategori
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <x-badge :badge="true" color="danger" id="delete{{ $base->id }}"
                                data-tooltip-target="hapus{{ $base->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </x-badge>
                            <div id="hapus{{ $base->id }}" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Hapus kategori
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <form id="delete-form-{{ $base->id }}"
                                action="{{ route('base.destroy', ['base' => $base->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @push('scripts')
                                <script type="module">
                                    $(document).ready(function() {
                                        $('#delete{{ $base->id }}').click(() => {
                                            Swal.fire({
                                                title: 'Apa Anda Yakin?',
                                                text: "Anda akan menghapus kategori {{ $base->nama }}!",
                                                icon: 'question',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Hapus',
                                                cancelButtonText: 'Batal'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('delete-form-{{ $base->id }}').submit();
                                                }
                                            });
                                        });
                                    });
                                </script>
                            @endpush
                        </td>
                    @endcan
                </tr>
                @foreach ($base->kategori as $kategori)
                    <tr>
                        <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        @can('admin')
                            <td>
                                <x-badge :badge="false" href="/kategori/{{ $kategori->id }}/sub/edit" class="me-3"
                                    color="warning" data-tooltip-target="editSub{{ $kategori->id }}">
                                    <i class="fa-solid fa-pen"></i>
                                </x-badge>
                                <div id="editSub{{ $kategori->id }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Ubah data kategori
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <x-badge :badge="true" color="danger" id="deleteSub{{ $kategori->id }}"
                                    data-tooltip-target="hapusSub{{ $kategori->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </x-badge>
                                <div id="hapusSub{{ $kategori->id }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Hapus kategori
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <form id="delete-form-sub-{{ $kategori->id }}"
                                    action="{{ route('kategori.destroy', ['kategori' => $kategori->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @push('scripts')
                                    <script type="module">
                                        $(document).ready(function() {
                                            $('#deleteSub{{ $kategori->id }}').click(() => {
                                                Swal.fire({
                                                    title: 'Apa Anda Yakin?',
                                                    text: "Anda akan menghapus sub kategori {{ $kategori->nama }}!",
                                                    icon: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Hapus',
                                                    cancelButtonText: 'Batal'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('delete-form-sub-{{ $kategori->id }}').submit();
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                @endpush
                            </td>
                        @endcan
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </x-table>

    @push('scripts')
        <script type="module">
            table('#kategori')
        </script>
    @endpush
</x-body>
