<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    @can('siswa')
        <livewire:panel-siswa :pakets="$pakets">
        @elsecan('guru')
            <livewire:panel-guru :pakets="$pakets">
            @elsecan('admin')
                {{-- <livewire:panel-guru :pakets="$pakets"> --}}
            @endcan
</x-body>
