<div>

    <form wire:submit.prevent="@if ($paket == null) save @else update @endif" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-8 col-md-8 col-sm-6">
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Paket<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Nama Paket" wire:model.live="nama" autocomplete="off">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="form-group mb-3">
                    <label for="durasi" class="form-label">Durasi (jam:menit)<span
                            class="text-danger">*</span></label>
                    <input type="time" class="form-control @error('durasi') is-invalid @enderror"
                        wire:model.live="durasi" />
                    @error('durasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-xl-6 col-md-12 col-sm-12">
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
                        placeholder="Email Guru" wire:model.live="email" autocomplete="off">
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
            </div> --}}

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
