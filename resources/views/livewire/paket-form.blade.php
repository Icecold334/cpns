<div>
    <form wire:submit.prevent="@if ($id == null) save @else update @endif" enctype="multipart/form-data">
        @csrf
        <div class="flex mb-3">

            <div class="w-full">
                <x-form-input type="text" label="Nama Paket" id="nama" wire:model.live="nama"
                    placeholder="Nama Paket" autocomplete="off" :error="$errors->first('nama')" class="mb-3" />

                <x-form-input type="select" label="Kategori" id="base_id" wire:model.live="base_id"
                    placeholder="Nama Paket" autocomplete="off" :error="$errors->first('base_id')" class="mb-3">
                    <option value="">Pilih Kategori</option>
                    @foreach ($bases as $base)
                        <option value="{{ $base->id }}">{{ $base->deskripsi }}</option>
                    @endforeach
                </x-form-input>

                <x-form-input type="select" label="Konsep Durasi" id="flat" :error="$errors->first('flat')"
                    wire:model.live="flat" class="mb-3">
                    <option value="">Pilih Kategori</option>
                    <option value="1">Durasi untuk satu paket</option>
                    <option value="0">Durasi untuk satu soal</option>
                </x-form-input>

                @if ($flat != null)
                    @if (!$flat)
                        <x-form-input type="number" label="Durasi / soal" :error="$errors->first('durasi')" id="durasi"
                            wire:model.live="durasi" placeholder="Durasi waktu untuk tiap soal" min="0"
                            max="60" step="1" class="mb-3" />
                    @else
                        <x-form-input type="time" label="Durasi" :error="$errors->first('durasi')" id="durasi"
                            wire:model.live="durasi" class="mb-3" />
                    @endif
                @endif
            </div>

        </div>
        <x-button :button="true" type="submit">Simpan</x-button>
    </form>
</div>
