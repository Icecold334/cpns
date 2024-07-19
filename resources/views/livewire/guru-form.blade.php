<div>
    <form wire:submit.prevent="save">
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
        </div>

        <button type="submit" class="btn btn-primary @if ($errors->any()) disabled @endif">Simpan</button>
    </form>

</div>
