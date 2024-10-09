<div class="w-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul
        class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
        <div
            class="flex w-full justify-center text-xl  font-semibold p-4 text-gray-900 rounded-ss-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500 ">
            {{ $paket->nama }}</div>
    </ul>
    <div>
        <div class="px-4 pb-4 bg-white rounded-lg  dark:bg-gray-800 flex flex-wrap justify-center">
            <div class="inline mt-2 text-white bg-primary-950   font-bold rounded-lg text-4xl  px-5 py-2.5 me-2 mb-2 ">
                {{ $durasi }}
            </div>

            <ul class="grid w-full gap-6 grid-cols-1 my-4 px-6 sm:px-10 md:px-28 lg:px-52 xl:px-96 ">
                @foreach ($shuffledJawaban as $jawab)
                    <li>
                        <input wire:loading.attr="disabled" type="radio" name="jawab" value="{{ $jawab->id }}"
                            id="jawaban{{ intToAlphabet($jawab->row, true) }}" wire:model.live="jawaban"
                            wire:key="jawab-{{ $jawab->id }}"class="hidden peer" required />
                        <label for="jawaban{{ intToAlphabet($jawab->row, true) }}"
                            class="inline-flex shadow-md items-center justify-between w-full p-5 text-gray-900 transition duration-200 bg-white peer-checked:bg-primary-950 border border-gray-400 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-primary-900 peer-checked:text-gray-100  hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-sm font-semibold">
                                    {{ intToAlphabet($loop->iteration, true) }}.
                                    {{ $jawab->jawaban }}</div>
                            </div>
                        </label>
                    </li>
                @endforeach
            </ul>


            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-primary-950 h-2.5 rounded-full" style="width: {{ $persen }}%"></div>
            </div>
            {{-- @if (!($durasi == 0 && $nomor == $paket->soal->count()))
                <div wire:poll.1000ms="decrement"></div>
            @else
                <div wire:init="decrement"></div>
            @endif --}}

            @push('scripts')
                <script></script>
                <script>
                    document.addEventListener('redirect-with-delay', function(event) {

                        // Ambil URL dan delay dari event yang dikirim oleh Livewire
                        let url = event.detail[0].url;
                        // Set delay untuk redirect
                        setTimeout(function() {
                            window.location.href = url;
                        }, 1000);
                    });
                </script>
            @endpush

            {{-- 
            @foreach ($shuffledJawaban as $jawab)
                <div class="block">
                    <input class="btn-check" wire:loading.attr="disabled" type="radio" name="jawab"
                        value="{{ $jawab->id }}" id="jawaban{{ intToAlphabet($jawab->row, true) }}"
                        wire:model.live="jawaban" wire:key="jawab-{{ $jawab->id }}">
                    <label class="btn btn-outline-primary w-100" for="jawaban{{ intToAlphabet($jawab->row, true) }}">
                        {{ $jawab->jawaban }}
                    </label>
                </div>
            @endforeach --}}
        </div>
    </div>
</div>
