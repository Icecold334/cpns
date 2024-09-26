<!-- Modal -->

<form wire:submit.prevent="save" enctype="multipart/form-data">
    <div>
        @csrf
        <div class="flex ">
            <div class="w-full">
                <div class="">

                    <x-form-input type="text" label="Nama Kategori" id="nama" wire:model.live="nama"
                        placeholder="Nama Kategori" autocomplete="off" :error="$errors->first('nama')"> </x-form-input>
                </div>
                <div class="">
                    <x-form-input type="text" label="Nama Kategori">

                    </x-form-input>
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Kategori"
                        wire:model.live="deskripsi" id="deskripsi" rows="3"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>
