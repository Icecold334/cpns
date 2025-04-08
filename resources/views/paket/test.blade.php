<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:paket>{!! $paket !!}</x-slot>
    @if ($paket->flat)
        <livewire:per-paket :paket="$paket" :soals="$soals" :result="$result" />
    @else
        <livewire:per-soal :paket="$paket" :soals="$soals" :result="$result" />
    @endif
</x-body>
