<div>
    {{-- <h5 class="font-weight-bold">Soal No.{{ $nomor }}</h5> --}}
    <p class="mb-1 font-bold">{{ $soal->kategori->deskripsi }} - {{ $soal->kategori->nama }}</p>
    @if ($soal->img)
        <div class="flex mb-3 justify-center">
            <div class="w-full md:w-1/3 xl:w-1/2 "><img src="{{ asset($soal->img) }}" alt="">
            </div>
        </div>
    @endif
    <p class="text-lg"><span class="font-bold ">{{ $nomor }}.</span> {{ $soal->soal }}</p>

    <ul class="grid w-full gap-6 md:grid-cols-2 my-4 ">
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


    <div class="grid sm:grid-cols-2 ">
        <div class="flex gap-2 w-full">
            <x-button :button="true"
                class="w-full sm:w-auto {{ $nomor == 1 ? 'bg-primary-500 cursor-not-allowed' : 'bg-primary-950' }}"
                wire:click="before" wire:loading.attr="disabled" wire:loading.class.remove="bg-primary-950"
                wire:loading.class="bg-primary-500 cursor-not-allowed" :disabled="$nomor == 1"><span role="status"><i
                        class="fa-solid fa-chevron-left"></i>
                    Sebelumnya
                    <div role="status" wire:loading class="inline items-center gap-x-1 ">
                        <svg aria-hidden="true"
                            class="inline w-4 h-4 align-middle text-gray-200 animate-spin dark:text-gray-600 fill-primary-950"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </span></x-button>
            <x-button :button="true"
                class="w-full sm:w-auto {{ $nomor == $soals->count() ? 'bg-primary-500 cursor-not-allowed' : 'bg-primary-950' }}"
                wire:loading.attr="disabled" wire:loading.class.remove="bg-primary-950"
                wire:loading.class="bg-primary-500 cursor-not-allowed" :disabled="$nomor == $soals->count()" wire:click="after"><span
                    role="status">
                    <div role="status" wire:loading class="inline items-center gap-x-1 ">
                        <svg aria-hidden="true"
                            class="inline w-4 h-4 align-middle text-gray-200 animate-spin dark:text-gray-600 fill-primary-950"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                    Selanjutnya
                    <i class="fa-solid fa-chevron-right"></i>
                </span></x-button>
        </div>
        <div class="inline sm:ms-auto"><x-button :button="true"
                class="ms-auto w-full sm:w-auto {{ $nomor == 1 ? 'bg-primary-500 cursor-not-allowed' : 'bg-primary-950' }}"
                wire:loading.attr="disabled" wire:loading.class.remove="bg-primary-950"
                wire:loading.class="bg-primary-500 cursor-not-allowed" id="selesai">Selesai</x-button></div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('selesai', function(e) {
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
                    window.location = "{{ route('ujian.selesai', ['paket' => $soal->paket->uuid]) }}";
                });
            }, {
                once: true
            });
            document.getElementById('selesai').addEventListener('click', function() {
                Swal.fire({
                    title: 'Selesaikan Ujian?',
                    text: "Anda yakin ingin mengakhiri ujian?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Selesai',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "{{ route('ujian.selesai', ['paket' => $soal->paket->uuid]) }}";
                    }
                });
            });
        </script>
    @endpush

</div>
