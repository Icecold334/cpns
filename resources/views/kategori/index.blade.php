<x-body>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex justify-between">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a>
            <div class=" font-semibold text-slate-800">Daftar Kategori</div>
        </div>
        <div class="hidden md:flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            <button type="button" data-modal-target="kategori" data-modal-toggle="kategori"
                class="text-white bg-primary-600 hover:bg-primary-950 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none dark:focus:ring-pribg-950">
                <i class="fa-solid fa-circle-plus"></i>
                Tambah Kategori
            </button>
            @push('html')
                <x-modal title='Tambah Kategori' id='kategori'>test</x-modal>
            @endpush
            <button type="button"
                class="text-white bg-primary-600 hover:bg-primary-950 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-primary-950 focus:outline-none dark:focus:ring-pribg-950">
                <i class="fa-solid fa-circle-plus"></i>
                Tambah Sub Kategori
            </button>
            @push('html')
                <x-modal title='Tambah Kategori' id='kategori'>test</x-modal>
            @endpush
        </div>
    </div>

    {{-- <div class="row">


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
