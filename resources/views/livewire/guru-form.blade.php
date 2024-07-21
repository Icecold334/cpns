<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Guru<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Guru" wire:model.live="name" autocomplete="off">
                    @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="name" class="form-label d-block mb-3">Nama Guru<span
                            class="text-danger">*</span></label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="laki" checked>
                        <label class="form-check-label" for="laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan">
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                        placeholder="Email Guru" wire:model.live="email" autocomplete="off">
                    @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="img" class="form-label">Foto</label>
                    <input type="file" class="form-control  @error('img') is-invalid @enderror" id="img"
                        placeholder="img Guru" wire:model.live="img" autocomplete="off">
                    @error('img')
                        <div id="img" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
