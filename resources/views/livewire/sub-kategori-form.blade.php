<!-- Modal -->
<form wire:submit.prevent="@if ($id == null) save @else update @endif">
    @csrf
    <div>
        <div class="flex ">
            <div class="w-full">
                <x-form-input type="text" label="Nama Sub Kategori" id="nama" wire:model.live="nama"
                    placeholder="Nama Kategori" autocomplete="off" :error="$errors->first('nama')" class="mb-3"> </x-form-input>
                <x-form-input type="select" label="Kategori" id="base_id" wire:model.live="base_id"
                    placeholder="Nama Kategori" autocomplete="off" :error="$errors->first('base_id')" class="mb-3">
                    <option value="">Pilih Kategori</option>
                    @foreach ($base as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}
                        </option>
                    @endforeach
                </x-form-input>
                <x-form-input type="select" label="Jenis Kategori" id="poin" wire:model.live="poin"
                    placeholder="Nama Kategori" autocomplete="off" :error="$errors->first('poin')" :disabled="$id"
                    class="mb-3 {{ $id ? 'cursor-not-allowed' : '' }}">
                    <option value="">Pilih Opsi</option>
                    <option value="0">Terdapat satu opsi jawaban benar</option>
                    <option value="1">Setiap opsi jawaban memiliki poin</option>
                </x-form-input>
                <x-form-input type="textarea" label="Deskripsi Sub Kategori" :error="$errors->first('deskripsi')"
                    wire:model.live="deskripsi" placeholder="Deskripsi Kategori">
                </x-form-input>
                <x-button button='true' class="mt-3" type="submit">Simpan</x-button>
            </div>
        </div>
    </div>
</form>
