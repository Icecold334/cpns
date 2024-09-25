<!-- Modal -->

<form wire:submit.prevent="save" enctype="multipart/form-data">
    <div>
        @csrf
        <div class="flex ">
            <div class="w-full">
                <div class="">
                    <x-form-input type="select" label="Nama Kategori" id="nama" placeholder="Nama Kategori"
                        autocomplete="off">
                        <option value="">pilih</option>
                    </x-form-input>
                    <label for="nama" class="form-label">Nama Kategori<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Nama Kategori" wire:model.live="nama" autocomplete="off">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
