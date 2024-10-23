<div class="flex justify-center px-4 ">
    <div
        class="w-full md:w-[80%] xl:w-[50%] border border-gray-300  rounded-lg shadow-2xl dark:bg-gray-800 dark:border-gray-700 mb-5">
        <div
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <div
                class="flex w-full justify-center text-xl  font-semibold p-4 text-gray-900 rounded-ss-lg  dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500 ">
                {{ $paket->nama }}</div>
        </div>
        <div class=" px-4 pb-4 bg-white rounded-b-lg  flex flex-col justify-center items-center">
            <div
                class="block mt-5 text-white bg-primary-950 font-bold rounded-lg text-4xl px-5 py-2.5 me-2 mb-2 max-w-xs">
                {{ $durasi }}
            </div>
            <div class="mt-2 text-gray-800 text-justify prose rounded-lg text-2xl py-2.5  mb-2 px-6 ">
                {!! $soal->soal !!}
            </div>

            <ul class="grid w-full gap-6 grid-cols-1 md:grid-cols-2 my-4 px-6 ">
                @foreach ($shuffledJawaban as $jawab)
                    <li>
                        <input wire:loading.attr="disabled" type="radio" name="jawab" value="{{ $jawab->id }}"
                            id="jawaban{{ intToAlphabet($jawab->row, true) }}" wire:model.live="jawaban"
                            wire:key="jawab-{{ $jawab->id }}"class="hidden peer" required />
                        <label for="jawaban{{ intToAlphabet($jawab->row, true) }}"
                            class="inline-flex shadow-md items-center  justify-center w-full p-5 text-gray-900 transition duration-200 bg-white peer-checked:bg-primary-950 border border-gray-400 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-primary-900 peer-checked:text-gray-100  hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-sm font-semibold ">
                                    {{-- {{ intToAlphabet($loop->iteration, true) }}. --}}
                                    {{ $jawab->jawaban }}</div>
                            </div>
                        </label>
                    </li>
                @endforeach
            </ul>
            @if ($nomor == $soals->count() && $jawaban)
                <x-button :button="true" wire:loading.class="cursor-not-allowed" wire:click="selesai">Soal
                    Berikutnya</x-button>
            @endif
            @if ($jawaban && $nomor != $soals->count())
                <x-button :button="true" wire:loading.class="cursor-not-allowed" class="mb-4" wire:click="after"
                    :disabled="$nomor == $soals->count()">Soal Berikutnya</x-button>
            @endif

            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-primary-950 h-2.5 rounded-full " style="width: {{ $persen }}%"></div>
            </div>
            @if (!($durasi == 0 && $nomor == $paket->soal->count()))
                <div wire:poll.1000ms="decrement"></div>
            @else
                <div wire:init="decrement"></div>
            @endif

            @push('scripts')
                <script>
                    document.addEventListener('redirect-with-delay', function(event) {

                        let url = event.detail[0].url;

                        let timerInterval;
                        Swal.fire({
                            title: "Waktu Habis!",
                            html: "Waktu habis",
                            icon: 'info',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then((result) => {

                            window.location = url;
                        });
                    }, {
                        once: true
                    });
                </script>
            @endpush
        </div>
    </div>
</div>
