<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10 ">
        <div class="flex items-center  text-3xl sm:text-4xl md:text-5xl ">
            {{-- <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a> --}}
            <div class=" font-semibold text-slate-800">Daftar Siswa</div>
        </div>
        @can('admin')
            <div class="hidden xl:flex items-center  text-3xl sm:text-4xl md:text-5xl ">
                <x-button :button="true" data-modal-target="siswaModal" data-modal-toggle="siswaModal">
                    <i class="fa-solid fa-circle-plus"></i> Tambah Siswa
                </x-button>
                <x-modal title='Tambah Siswa' id='siswaModal'>
                    <livewire:siswa-form />
                </x-modal>
            </div>
        @endcan
    </div>


    <x-table id="siswa">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Nama <i class="fa-solid fa-sort"></i></th>
                <th>Email <i class="fa-solid fa-sort"></i></th>
                @can('admin')
                    <th></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->email }}</td>
                    @can('admin')
                        <td>
                            <div class="flex">
                                <x-badge :badge="false" href="/siswa/{{ $siswa->id }}/edit" class="mx-3"
                                    color="warning">Ubah</x-badge>

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
                        </td>
                    @endcan
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
