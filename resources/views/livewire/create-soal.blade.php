<div>

    <form wire:submit.prevent="{{ $soal_array == null ? 'save' : 'update' }}" enctype="multipart/form-data">
        @csrf
        @if ($kategori_id != null)
            <div class="d-none" wire:init="fillType({{ $kategori_id }})"></div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="img" class="form-label">Foto</label>

                    @if ($img)
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <img src="{{ is_string($img) ? asset($img) : $img->temporaryUrl() }}"
                                    class="img-thumbnail items-center mb-3" alt="">
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
            <div
                class="{{ $kategori_id == null || ($kategori && $kategori->byPoin) ? 'col-xl-12 col-md-12 col-sm-12' : 'col-xl-8 col-md-8 col-sm-12' }} ">
                <div class="form-group mb-3">
                    <label for="kategori_id" class="form-label">Sub Kategori<span class="text-danger">*</span></label>
                    <select class="custom-select @error('kategori_id')  is-invalid @enderror"
                        wire:model.live="kategori_id" aria-label="Pilih Kategori" id="kategori_id" name="kategori_id">
                        <option value="">Pilih Sub Kategori</option>
                        @foreach ($kategoris as $kat)
                            <option value="{{ $kat->id }}" @selected($kat->id == $kategori_id)>{{ $kat->deskripsi }}
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
            @if ($kategori_id != null)
                <div class="{{ $kategori && $kategori->byPoin ? 'd-none' : '' }} col-xl-4 col-md-4 col-sm-12">
                    <div class="form-group mb-3">
                        <label for="benar" class="form-label">Jawaban Benar<span class="text-danger">*</span></label>
                        <select class="custom-select @error('benar') is-invalid @enderror" aria-label="Pilih Kategori"
                            id="benar" name="benar" wire:model.live="benar">
                            <option value="">Pilih Jawaban</option>
                            <option value="1">Jawaban A</option>
                            <option value="2">Jawaban B</option>
                            <option value="3">Jawaban C</option>
                            <option value="4">Jawaban D</option>
                            <option value="5">Jawaban E</option>
                        </select>
                        @error('benar')
                            <div id="benar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endif
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
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Pilihan Jawaban<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            @if ($kategori_id == 3)
                                <span class="input-group-text">Poin : 1</span>
                            @endif <span class="input-group-text">A</span>
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
                            @if ($kategori_id == 3)
                                <span class="input-group-text">Poin : 2</span>
                            @endif <span class="input-group-text">B</span>
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
                            @if ($kategori_id == 3)
                                <span class="input-group-text">Poin : 3</span>
                            @endif <span class="input-group-text">C</span>
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
                            @if ($kategori_id == 3)
                                <span class="input-group-text">Poin : 4</span>
                            @endif <span class="input-group-text">D</span>
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
                            @if ($kategori_id == 3)
                                <span class="input-group-text">Poin : 5</span>
                            @endif <span class="input-group-text">E</span>
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
<script>
    document.addEventListener('berhasil', function(e) {


        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: e.detail.icon,
            title: e.detail.message,
        });
    });
</script>
