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
            <x-button :button="true" data-modal-target="kategori" data-modal-toggle="kategori">
                <i class="fa-solid fa-circle-plus"></i> Tambah Kategori
            </x-button>
            <x-modal title='Tambah Kategori' id='kategori'>
                <livewire:kategori-form />
            </x-modal>
            <x-button :button="true" data-modal-target="sub-kategori" data-modal-toggle="sub-kategori">
                <i class="fa-solid fa-circle-plus"></i> Tambah Sub Kategori
            </x-button>
            <x-modal title='Tambah Sub Kategori' id='sub-kategori'>
                <livewire:sub-kategori-form />
            </x-modal>
        </div>
    </div>


    <x-table id="filter-table">
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
                    <td><x-badge :badge="true" color="warning" data-modal-target="kategori{{ $base->id }}"
                            data-modal-toggle="kategori{{ $base->id }}">Ubah</x-badge>
                        <x-modal title='Ubah Kategori' id='kategori{{ $base->id }}'>
                            <livewire:kategori-form :id="$base->id" />
                        </x-modal>
                    </td>
                </tr>
                @foreach ($base->kategori as $kategori)
                    <tr>
                        <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        <td>
                            <x-badge :badge="true" color="warning"
                                data-modal-target="subkategori{{ $kategori->id }}"
                                data-modal-toggle="subkategori{{ $kategori->id }}">Ubah</x-badge>
                            <x-modal title='Ubah Kategori' id='subkategori{{ $kategori->id }}'>
                                <livewire:sub-kategori-form :id="$kategori->id" />
                            </x-modal>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </x-table>

    @push('scripts')
        <script type="module">
            table('#filter-table')
        </script>
    @endpush
</x-body>
