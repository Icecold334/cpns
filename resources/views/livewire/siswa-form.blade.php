<div>

    <form wire:submit.prevent="@if ($id == null) save @else update @endif" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Siswa<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Siswa" wire:model.live="name" autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="gender" class="form-label d-block mb-3">Jenis Kelamin<span
                            class="text-danger">*</span></label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="laki" wire:model="gender"
                            value="0">
                        <label class="form-check-label" for="laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan" wire:model="gender"
                            value="1">
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
                        placeholder="Email Siswa" wire:model.live="email" autocomplete="off">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @else
                        <div id="emailHelp" class="form-text small">Pastikan alamat email sudah benar.</div>
                    @endif
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="img" class="form-label">Foto</label>
                    @if ($img)
                        <img src="{{ $img->temporaryUrl() }}" class="d-block img-thumbnail mb-3" width="30%"
                            alt="">
                    @endif
                    <input type="file" class="form-control  @error('img') is-invalid @enderror" id="img"
                        placeholder="img Guru" wire:model.live="img" autocomplete="off">
                    @error('img')
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
