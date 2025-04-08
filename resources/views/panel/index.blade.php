<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-4">
        <div class="flex items-center  text-3xl sm:text-4xl md:text-5xl ">
            <div class=" font-semibold text-slate-800">Dashboard</div>
        </div>
    </div>
    @can('siswa')
        <livewire:panel-siswa :pakets="$pakets">
        @elsecan('guru')
            <livewire:panel-guru :pakets="$pakets">
            @elsecan('admin')
                <livewire:panel-admin :pakets="$pakets">
                @endcan
</x-body>
