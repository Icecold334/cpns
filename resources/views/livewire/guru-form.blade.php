<div>

    <form wire:submit.prevent="@if ($id == null) save @else update @endif" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Guru<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Guru" wire:model.live="name" autocomplete="off">
                    @error('name')
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
