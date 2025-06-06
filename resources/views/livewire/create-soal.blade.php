<div>

    <form wire:submit.prevent="{{ $soal_array == null ? 'save' : 'update' }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap">
            <div wire:ignore class="w-full">
                <label for="soal" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Soal</label>
                <x-wysiwyg id="soal" class="my-3" name="soal" wire:model="soal" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-10 w-full">
                <div class=" {{ $kategori_id != null && !$kategori->byPoin ? 'col-span-1' : 'col-span-2' }}">
                    <x-form-input type="select" label="Sub Kategori" id="kategori_id" wire:model.live="kategori_id"
                        autocomplete="off" :error="$errors->first('kategori_id')" class="mb-3">
                        @if ($kategori === null)
                            <option value="">Pilih Sub Kategori</option>
                        @endif
                        @foreach ($kategoris as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->deskripsi }}</option>
                        @endforeach
                    </x-form-input>
                </div>
                @if ($kategori_id != null && !$kategori->byPoin)
                    <div class="col-span-1">
                        <x-form-input type="select" label="Jawaban Benar" id="benar" wire:model.live="benar"
                            placeholder="Nama Siswa" autocomplete="off" :error="$errors->first('benar')" class="mb-3">
                            <option value="">Pilih Jawaban</option>
                            <option value="1">Jawaban A</option>
                            <option value="2">Jawaban B</option>
                            <option value="3">Jawaban C</option>
                            <option value="4">Jawaban D</option>
                            <option value="5">Jawaban E</option>
                        </x-form-input>
                    </div>
                @endif
            </div>
            <div class="w-full">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-14">
                    @foreach (['a', 'b', 'c', 'd', 'e'] as $index => $option)
                        <div class="mb-3">
                            <label class="font-medium">
                                Jawaban
                                {{ strtoupper($option) }} <span
                                    class="font-bold">{{ $kategori !== null && $kategori->byPoin ? 'Poin : ' . $index + 1 : '' }}</span>
                            </label>
                            <div wire:ignore>
                                <x-wysiwyg id="{{ $option }}" wire:key="{{ $option }}" class="my-3"
                                    wire:model="{{ $option }}" />
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- @foreach (['a', 'b', 'c', 'd', 'e'] as $index => $option)
                    <div class="flex mb-3">
                        @if ($kategori_id != null && $kategori->byPoin)
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 rounded-s-lg  border-gray-300  dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Poin : {{ $index + 1 }}
                            </span>
                        @endif
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300  dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            {{ strtoupper($option) }}
                        </span>
                        <textarea id="{{ $option }}"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:model.live="{{ $option }}" id="{{ $option }}" placeholder="Jawaban {{ strtoupper($option) }}"></textarea>
                    </div>
                    @error($option)
                        <p class="mb-2  text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                @endforeach --}}
            </div>
        </div>

        <x-button :button="true" type='submit'>Simpan</x-button>
    </form>
    <script type="module">
        // $(document).ready(function() {
        // })
        document.addEventListener('berhasil', function(e) {
            document.getElementById("trix-soal").editor.loadHTML();
            // $("#a, #b, #c, #d, #e, #benar, #kategori_id ,#inputsoal").val("");
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: e.detail.icon,
                title: e.detail.message,
            });
        });
    </script>
</div>
