<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10 ">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            {{-- <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a> --}}
            <div class=" font-semibold text-slate-800">Daftar Siswa</div>
        </div>
        <div class="hidden xl:flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl ">
            <x-button :button="true" data-modal-target="siswaModal" data-modal-toggle="siswaModal">
                <i class="fa-solid fa-circle-plus"></i> Tambah Siswa
            </x-button>
            <x-modal title='Tambah Siswa' id='siswaModal'>
                <livewire:siswa-form />
            </x-modal>
        </div>
    </div>


    <x-table id="siswa">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Nama <i class="fa-solid fa-sort"></i></th>
                <th>Email <i class="fa-solid fa-sort"></i></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>
                        <div class="flex">
                            <x-badge :badge="true" class="mx-3" color="warning"
                                data-modal-target="siswa{{ $siswa->id }}"
                                data-modal-toggle="siswa{{ $siswa->id }}">Ubah</x-badge>

                            <x-badge :badge="true" color="danger" id="delete{{ $siswa->id }}">Hapus</x-badge>
                            <form id="delete-form-{{ $siswa->id }}"
                                action="{{ route('siswa.destroy', ['siswa' => $siswa->id]) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @push('scripts')
                                <script type="module">
                                    $(document).ready(function() {
                                        $('#delete{{ $siswa->id }}').click(() => {
                                            Swal.fire({
                                                title: 'Apa Anda Yakin?',
                                                text: "Anda akan menghapus siswa {{ $siswa->name }}!",
                                                icon: 'question',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Hapus',
                                                cancelButtonText: 'Batal'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('delete-form-{{ $siswa->id }}').submit();
                                                }
                                            });
                                        });
                                    });
                                </script>
                            @endpush
                        </div>
                        <x-modal title='Ubah Kategori' id='siswa{{ $siswa->id }}'>
                            <livewire:siswa-form :id="$siswa->id" />
                        </x-modal>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
    @push('scripts')
        <script type="module">
            table('#siswa')
        </script>
    @endpush
</x-body>
