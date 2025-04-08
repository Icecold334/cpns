<x-body>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex justify-between mb-10">
        <div class="flex items-center space-x-4 text-3xl sm:text-4xl md:text-5xl">
            <a href="{{ route('kategori.index') }}"
                class="text-primary-600 hover:text-primary-950 transition duration-200">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
            <div class="font-semibold text-slate-800">{{ $title }}</div>
        </div>
    </div>
    @if ($type == 'base')
        <livewire:kategori-form :id="$kategori->id"></livewire:kategori-form>
    @else
        <livewire:sub-kategori-form :id="$kategori->id"></livewire:sub-kategori-form>
    @endif
</x-body>
