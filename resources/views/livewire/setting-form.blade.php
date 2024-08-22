<div>

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Aplikasi<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Nama Aplikasi" wire:model.live="nama" autocomplete="off">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="primary" class="form-label">Warna Utama Aplikasi<span
                            class="text-danger">*</span></label>
                    <input type="color" class="form-control  @error('primary') is-invalid @enderror" id="primary"
                        placeholder="Nama Aplikasi" wire:model.live="primary" autocomplete="off">
                    @error('primary')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
