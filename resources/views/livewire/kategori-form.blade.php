<!-- Modal -->

<form wire:submit.prevent="save" enctype="multipart/form-data">
    <div>
        @csrf
        <div class="flex ">
            <div class="w-full">

                <x-form-input type="text" label="Nama Kategori" id="nama" wire:model.live="nama"
                    placeholder="Nama Kategori" autocomplete="off" :error="$errors->first('nama')" class="mb-3"> </x-form-input>
                <x-form-input type="textarea" label="Nama Kategori" :error="'sdasd '" wire:.model.live="deskripsi"
                    placeholder="Deskripsi Kategori">

                </x-form-input>
            </div>
        </div>
    </div>
</form>
