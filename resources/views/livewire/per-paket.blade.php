<div>
    <div id="accordion-collapse" class="text-gray-900 mb-3" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-1">
            <button type="button"
                class="flex items-center justify-between bg-gray-200 w-full p-5 font-medium rtl:text-right text-gray-900 border  border-gray-200 rounded-t-xl  dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-300 dark:hover:bg-gray-800 gap-3"
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
                            <x-table class=" text-gray-800">
                                <tr>
                                    <td class=" px-7 font-bold">Nama Peserta</td>
                                    <td class=" px-7 font-semibold">{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td class=" px-7 font-bold">E-mail</td>
                                    <td class=" px-7 font-semibold">{{ Auth::user()->email }}</td>
                                </tr>
                            </x-table>
                        </div>
                    </div>
                    <div class="w-full mb-3 xl:mb-0 flex">
                        <div
                            class="border-[0.1rem] border-gray-300 rounded-md p-4 h-full w-full flex items-center justify-center">
                            <livewire:card-detail-test :paket="$paket" :result="$result"></livewire:card-detail-test>
                        </div>
                    </div>
                    <div class="w-full mb-3 xl:mb-0 flex">
                        <div
                            class="border-[0.1rem] border-gray-300 rounded-md p-4 h-full w-full flex items-center justify-center">
                            <livewire:card-timer :paket="$paket" :durasi="$paket->durasi"
                                :result="$result"></livewire:card-timer>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="flex">
        <div class="border-[0.15rem] w-full rounded-md p-5">
            <livewire:card-soal :soals="$soals" :result="$result"></livewire:card-soal>
        </div>
    </div>
    @push('html')
        <livewire:canvas-soal :soals="$soals" :result="$result"></livewire:canvas-soal>
    @endpush
    @push('play')
        <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
            aria-controls="drawer-navigation" type="button"
            class="inline-flex items-center p-2 ms-5 text-sm text-white hover:text-primary-950 transition  rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
            <span class="ms-2 text-lg font-semibold">Daftar Soal</span>

        </button>
    @endpush
</div>
