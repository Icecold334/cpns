<!-- Modal -->

<form wire:submit.prevent="{{ $id ? 'update' : 'save' }}">
    @csrf
    <div>
        <div class="flex ">
            <div class="w-full">
                <x-form-input type="text" label="Nama Kategori" id="nama" wire:model.live="nama"
                    placeholder="Nama Kategori" autocomplete="off" :error="$errors->first('nama')" class="mb-3"> </x-form-input>
                <x-form-input type="textarea" label="Nama Kategori" :error="$errors->first('deskripsi')" wire:model.live="deskripsi"
                    placeholder="Deskripsi Kategori">
                </x-form-input>
                <x-button :button="true" class="mt-5" type="submit">Simpan</x-button>
            </div>
        </div>
    </div>
</form>
