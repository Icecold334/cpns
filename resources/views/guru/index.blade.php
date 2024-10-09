<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10 ">
        <div class="flex items-center text-3xl sm:text-4xl md:text-5xl ">
            {{-- <a href="{{ route('paket.index') }}"
                class=" text-primary-600 hover:text-primary-950 transition duration-200 "><i
                    class="fa-solid fa-circle-chevron-left "></i></a> --}}
            <div class=" font-semibold text-slate-800">Daftar Guru</div>
        </div>
        <div class="hidden xl:flex items-center text-3xl sm:text-4xl md:text-5xl ">
            <x-button :button="true" data-modal-target="guruModal" data-modal-toggle="guruModal">
                <i class="fa-solid fa-circle-plus"></i> Tambah Guru
            </x-button>
            <x-modal title='Tambah Guru' id='guruModal'>
                <livewire:guru-form />
            </x-modal>
        </div>
    </div>


    <x-table id="guru">
        <thead>
            <tr>
                <th><i class="fa-solid fa-sort"></i></th>
                <th>Nama <i class="fa-solid fa-sort"></i></th>
                <th>Email <i class="fa-solid fa-sort"></i></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $guru->name }}</td>
                    <td>{{ $guru->email }}</td>
                    <td><x-badge :badge="false" href="/guru/{{ $guru->id }}/edit" color="warning"
                            class="me-3">Ubah</x-badge>

                        <x-badge :badge="true" color="danger" id="delete{{ $guru->id }}">Hapus</x-badge>
                        <form id="delete-form-{{ $guru->id }}"
                            action="{{ route('guru.destroy', ['guru' => $guru->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        @push('scripts')
                            <script type="module">
                                $(document).ready(function() {
                                    $('#delete{{ $guru->id }}').click(() => {
                                        Swal.fire({
                                            title: 'Apa Anda Yakin?',
                                            text: "Anda akan menghapus guru {{ $guru->name }}!",
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Hapus',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('delete-form-{{ $guru->id }}').submit();
                                            }
                                        });
                                    });
                                });
                            </script>
                        @endpush
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
    @push('scripts')
        <script type="module">
            table('#guru')
        </script>
    @endpush
</x-body>
