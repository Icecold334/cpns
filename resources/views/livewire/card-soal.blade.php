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

                </span></x-button>
            <x-button :button="true"
                class="w-full sm:w-auto {{ $nomor == $soals->count() ? 'bg-primary-500 cursor-not-allowed' : 'bg-primary-950' }}"
                wire:loading.attr="disabled" wire:loading.class.remove="bg-primary-950"
                wire:loading.class="bg-primary-500 cursor-not-allowed" :disabled="$nomor == $soals->count()" wire:click="after"><span
                    role="status">

                    Selanjutnya
                    <i class="fa-solid fa-chevron-right"></i>
                </span></x-button>
        </div>
        <div class="inline sm:ms-auto"><x-button :button="true" class="ms-auto w-full sm:w-auto bg-primary-950"
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
