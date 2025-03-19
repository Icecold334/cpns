<x-body>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="flex justify-between mb-10 ">
    <div class="flex items-center text-3xl sm:text-4xl md:text-5xl ">
      <div class=" font-semibold text-slate-800">{{ $title }}</div>
    </div>
  </div>

  <livewire:password-reset />
</x-body>