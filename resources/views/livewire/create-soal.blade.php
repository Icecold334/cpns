<div>

    <form wire:submit.prevent="{{ $soal_array == null ? 'save' : 'update' }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="img" class="form-label">Foto</label>
                    @if ($img)
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <img src="{{ $img->temporaryUrl() }}" class="img-thumbnail items-center mb-3"
                                    alt="">
                            </div>
                        </div>
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
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="kategori_id" class="form-label">Pilih Kategori<span class="text-danger">*</span></label>
                    <select class="custom-select @error('kategori_id')  is-invalid @enderror"
                        wire.model.live="kategori_id" aria-label="Pilih Kategori" id="kategori_id" name="kategori_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" @selected($kategori->id == $kategori_id)>{{ $kategori->deskripsi }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div id="kategori_id" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="soal" class="form-label">Soal<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('soal') is-invalid @enderror" wire:model.live="soal" id="soal" rows="3"></textarea>
                    @error('soal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-6">
                <div class="mb-3">
                    <label class="form-label">Pilihan Jawaban<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">A</span>
                            <textarea class="form-control @error('a') is-invalid @enderror" name="a" id="a" wire:model.live="a"></textarea>
                            @error('a')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">B</span>
                            <textarea class="form-control @error('b') is-invalid @enderror" name="b" id="b" wire:model.live="b"></textarea>
                            @error('b')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">C</span>
                            <textarea class="form-control @error('c') is-invalid @enderror" name="c" id="c" wire:model.live="c"></textarea>
                            @error('c')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">D</span>
                            <textarea class="form-control @error('d') is-invalid @enderror" name="d" id="d" wire:model.live="d"></textarea>
                            @error('d')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text">E</span>
                            <textarea class="form-control @error('e') is-invalid @enderror" name="e" id="e" wire:model.live="e"></textarea>
                            @error('e')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>

</div>
