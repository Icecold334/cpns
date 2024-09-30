<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex justify-between mb-10 ">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            {{-- <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a> --}}
            <div class=" font-semibold text-slate-800">Daftar Kategori</div>
        </div>
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
    </div>


    <x-table id="kategori">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Kategori <i class="fa-solid fa-sort"></i></th>
                <th>Deskripsi <i class="fa-solid fa-sort"></i></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bases as $base)
                <tr class="bg-gray-200">
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $base->nama }}</td>
                    <td>{{ $base->deskripsi }}</td>
                    <td><x-badge :badge="true" class="me-3" color="warning"
                            data-modal-target="kategori{{ $base->id }}"
                            data-modal-toggle="kategori{{ $base->id }}">Ubah</x-badge>
                        <x-modal title='Ubah Kategori' id='kategori{{ $base->id }}'>
                            <livewire:kategori-form :id="$base->id" />
                        </x-modal>
                        <x-badge :badge="true" color="danger" id="delete{{ $base->id }}">Hapus</x-badge>
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
                </tr>
                @foreach ($base->kategori as $kategori)
                    <tr>
                        <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        <td>
                            <x-badge :badge="true" class="me-3" color="warning"
                                data-modal-target="subkategori{{ $kategori->id }}"
                                data-modal-toggle="subkategori{{ $kategori->id }}">Ubah</x-badge>
                            <x-modal title='Ubah Kategori' id='subkategori{{ $kategori->id }}'>
                                <livewire:sub-kategori-form :id="$kategori->id" />
                            </x-modal>
                            <x-badge :badge="true" color="danger" id="deleteSub{{ $kategori->id }}">Hapus</x-badge>
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
