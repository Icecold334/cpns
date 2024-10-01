<div>
    <form wire:submit.prevent="{{ $soal_array == null ? 'save' : 'update' }}" enctype="multipart/form-data">
        @csrf
        @if ($kategori_id != null)
            <div class="hidden" wire:init="fillType({{ $kategori_id }})"></div>
        @endif
        <div class="grid grid-cols-1 gap-4">
            @if ($img)
                <div class="flex justify-center mb-3">
                    <div class="w-1/2">
                        <img src="{{ is_string($img) ? asset($img) : $img->temporaryUrl() }}" class="img-thumbnail"
                            alt="">
                    </div>
                </div>
            @endif
            <x-form-input type="file" label="Foto" id="img" wire:model.live="img" placeholder="Nama Siswa"
                autocomplete="off" :error="$errors->first('img')" class="mb-3" />
            <x-form-input type="select" label="Sub Kategori" id="kategori_id" wire:model.live="kategori_id"
                placeholder="Nama Siswa" autocomplete="off" :error="$errors->first('kategori_id')" class="mb-3">
                <option value="">Pilih Sub Kategori</option>
                @foreach ($kategoris as $kat)
                    <option value="{{ $kat->id }}" @selected($kat->id == $kategori_id)>{{ $kat->deskripsi }}</option>
                @endforeach
            </x-form-input>
            @if ($kategori_id != null)
                <x-form-input type="select" label="Sub Kategori" id="benar" wire:model.live="benar"
                    placeholder="Nama Siswa" autocomplete="off" :error="$errors->first('benar')" class="mb-3">
                    <option value="">Pilih Jawaban</option>
                    <option value="1">Jawaban A</option>
                    <option value="2">Jawaban B</option>
                    <option value="3">Jawaban C</option>
                    <option value="4">Jawaban D</option>
                    <option value="5">Jawaban E</option>ue="{{ $kat->id }}"
                        @selected($kat->id == $kategori_id)>{{ $kat->deskripsi }}</option>
                    </x-form-inpput>
            @endif




            <div class="col-span-1">
                <label for="soal" class="block text-sm font-medium text-gray-700">Soal<span
                        class="text-red-500">*</span></label>
                <textarea
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 @error('soal') border-red-500 @enderror"
                    wire:model.live="soal" id="soal" rows="3"></textarea>
                @error('soal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700">Pilihan Jawaban<span
                        class="text-red-500">*</span></label>
                @foreach (['a', 'b', 'c', 'd', 'e'] as $index => $option)
                    <div class="mb-3">
                        <div class="input-group">
                            @if ($kategori_id == 3)
                                <span class="input-group-text">Poin : {{ $index + 1 }}</span>
                            @endif
                            <span class="input-group-text">{{ strtoupper($option) }}</span>
                            <textarea
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 @error($option) border-red-500 @enderror"
                                wire:model.live="{{ $option }}" id="{{ $option }}"></textarea>
                            @error($option)
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit"
            class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('berhasil', function(e) {
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
