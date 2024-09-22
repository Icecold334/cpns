<!-- Modal -->

<form wire:submit.prevent="save" enctype="multipart/form-data">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Kategori<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Nama Kategori" wire:model.live="nama" autocomplete="off">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" wire:model.live="deskripsi" id="deskripsi"
                        rows="3"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
