<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex items-center space-x-4 mb-3 text-3xl sm:text-4xl md:text-5xl">
        <a href="{{ route('paket.soal.index', ['paket' => $paket->uuid]) }}"
            class="text-primary-600 hover:text-primary-950 transition duration-200">
            <i class="fa-solid fa-circle-chevron-left"></i>
        </a>
        <div class="font-semibold text-slate-800">{{ $title }}</div>
    </div>
    <div class="border p-5 rounded-lg shadow-md">
        <livewire:create-soal :paket="$paket" />
    </div>

</x-body>
