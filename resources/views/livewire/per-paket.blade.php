<div>
    <div id="accordion-collapse" class="text-gray-900 mb-3" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border  border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                aria-controls="accordion-collapse-body-1">
                <span class="font-bold">Informasi Ujian</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-6 justify-around">
                    <div class="w-full mb-3 xl:mb-0 flex">
                        <div class="border-[0.1rem] border-gray-300 rounded-md p-4 h-full w-full flex justify-center">
                            <x-table class="w-1/2">
                                <tr>
                                    <td class="font-bold">Nama Peserta</td>
                                    <td class="font-semibold">{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">E-mail</td>
                                    <td class="font-semibold">{{ Auth::user()->email }}</td>
                                </tr>
                            </x-table>
                        </div>
                    </div>
                    <div class="w-full mb-3 xl:mb-0 flex">
                        <div
                            class="border-[0.1rem] border-gray-300 rounded-md p-4 h-full w-full flex items-center justify-center">
                            <livewire:card-detail-test :paket="$paket"></livewire:card-detail-test>
                        </div>
                    </div>
                    <div class="w-full mb-3 xl:mb-0 flex">
                        <div
                            class="border-[0.1rem] border-gray-300 rounded-md p-4 h-full w-full flex items-center justify-center">
                            <livewire:card-timer :paket="$paket" :durasi="$paket->durasi"></livewire:card-timer>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="flex">
        <div class="border-[0.15rem] w-full rounded-md p-5">
            <livewire:card-soal :soals="$soals"></livewire:card-soal>
        </div>
    </div>
    @push('html')
        <livewire:canvas-soal :soals="$soals"></livewire:canvas-soal>
    @endpush
</div>
