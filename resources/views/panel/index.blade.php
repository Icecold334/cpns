<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    @can('siswa')
        <livewire:panel-siswa :pakets="$pakets">
        @elsecan('guru')
            b
        @elsecan('admin')
            c
        @endcan
</x-body>
