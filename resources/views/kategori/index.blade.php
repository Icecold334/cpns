<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex justify-between mb-5 ">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a>
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
            <x-modal title='Tambah Sub Kategori' id='sub-kategori'>dafda</x-modal>
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
                <tr class="bg-gray-300">
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $base->nama }}</td>
                    <td>{{ $base->deskripsi }}</td>
                    <td><x-badge :badge="false" color="info" href="/hapus/3">Hapus</x-badge> </td>
                </tr>
                @foreach ($base->kategori as $kategori)
                    <tr>
                        <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        <td><x-badge :badge="false" color="info" href="/hapus/3">Hapus</x-badge> </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </x-table>
    {{-- <table id="filter-table" class="min-w-full ">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Name <i class="fa-solid fa-sort"></i></th>
                <th>Position <i class="fa-solid fa-sort"></i></th>
                <th>Office <i class="fa-solid fa-sort"></i></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 50; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td><x-button :button='true'>Hapus</x-button></td>
                </tr>
            @endfor
        </tbody>
    </table> --}}

    <!-- Include the compiled JavaScript -->

    @push('scripts')
        <script type="module">
            table('#filter-table')
        </script>
    @endpush
    {{-- 
    <div class="row">


        <div class="col-xl-6 col-md-12 col-sm-12">
            <h1 class=""><a href="{{ route('paket.index') }}"><i class="fa-solid fa-circle-chevron-left"></i></a>
                {{ $title }}
            </h1>
        </div>
        <div
            class="col-xl-6 col-md-12 col-sm-12  d-flex justify-content-xl-end justify-content-md-center justify-content-sm-center align-items-center">
            <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#addKategori">
                <i class="fa-solid fa-circle-plus"></i>
                Tambah Kategori
            </button>
            @push('html')
                <div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <livewire:kategori-form />
                        </div>
                    </div>
                </div>
            @endpush
            <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#addSub">
                <i class="fa-solid fa-circle-plus"></i>
                Tambah Sub Kategori
            </button>
            @push('html')
                <div class="modal fade" id="addSub" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <livewire:sub-kategori-form />
                        </div>
                    </div>
                </div>
            @endpush
        </div>

    </div> --}}



</x-body>
