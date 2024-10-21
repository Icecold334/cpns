<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    @can('siswa')
        <livewire:panel-siswa>
        @elsecan('guru')
            b
        @elsecan('admin')
            c
        @endcan
</x-body>
