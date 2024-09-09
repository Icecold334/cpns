<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:paket>{!! $paket !!}</x-slot>
    @if ($paket->base->id != 2)
        <livewire:per-paket :paket="$paket" :soals="$soals"></livewire:per-paket>
    @else
        <livewire:per-soal :paket="$paket" :soals="$soals"></livewire:per-soal>
    @endif
</x-body>
