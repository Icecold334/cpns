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
            <div class="col-xl-8 col-md-8 col-sm-6">
                <div class="form-group mb-3">
                    <label for="base_id" class="form-label">Kategori<span class="text-danger">*</span></label>
                    <select class="custom-select @error('base_id')  is-invalid @enderror" wire:model.live="base_id"
                        aria-label="Pilih Kategori" id="base_id" name="base_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($bases as $base)
                            <option value="{{ $base->id }}">{{ $base->deskripsi }}
                            </option>
                        @endforeach
                    </select>
                    @error('base_id')
                        <div id="base_id" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-8 col-md-8 col-sm-6">
                <div class="form-group mb-3">
                    <label for="flat" class="form-label">Konsep Durasi<span class="text-danger">*</span></label>
                    <select class="custom-select @error('flat')  is-invalid @enderror" wire:model.live="flat"
                        aria-label="Pilih Kategori" id="flat" name="flat">
                        <option value="">Pilih Kategori</option>
                        <option value="1">Durasi untuk satu paket</option>
                        <option value="0">Durasi untuk satu soal</option>
                    </select>
                    @error('flat')
                        <div id="flat" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="{{ $flat == null ? 'd-none' : '' }} col-xl-4 col-md-4 col-sm-6">
                <div class="form-group mb-3">
                    <label for="durasi" class="form-label">Durasi{{ !$flat ? ' / soal' : '' }}<span
                            class="text-danger">*</span></label>
                    <input
                        @if (!$flat) type="number" min="0" max="60" step="1" placeholder="Durasi waktu untuk tiap soal" @else type="time" @endif
                        class="form-control @error('durasi') is-invalid @enderror" wire:model.live="durasi" />
                    @error('durasi')
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
