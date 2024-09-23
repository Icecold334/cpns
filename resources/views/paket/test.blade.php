<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:paket>{!! $paket !!}</x-slot>
    @if ($paket->flat)
        <livewire:per-paket :paket="$paket" :soals="$soals" />
    @else
        <livewire:per-soal :paket="$paket" :soals="$soals" />
    @endif
</x-body>
