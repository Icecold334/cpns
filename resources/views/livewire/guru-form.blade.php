<div>
    <!-- Modal -->
    <form wire:submit.prevent="@if ($id == null) save @else update @endif" enctype="multipart/form-data">
        @csrf
        <div class="flex">
            <div class="w-full">
                <!-- Nama Guru -->
                <x-form-input type="text" label="Nama Guru" id="name" wire:model.live="name" placeholder="Nama Guru"
                    autocomplete="off" :error="$errors->first('name')" class="mb-3" />

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin<span
                            class="text-danger">*</span></label>
                    <x-form-input type="radio" label="Laki-laki" id="laki" name="jkel"
                        wire:model.live="gender" value="0" />
                    <x-form-input type="radio" label="Perempuan" id="perempuan" name="jkel"
                        wire:model.live="gender" value="1" />
                </div>

                <!-- Email Guru -->
                <x-form-input type="email" label="Email" id="email" wire:model.live="email"
                    placeholder="Email Guru" autocomplete="off" :error="$errors->first('email')" class="mb-3" />

                <!-- Foto Guru -->
                <div class="mb-3 ">
                    @if ($img)
                        <img src="{{ is_string($img) ? asset($img) : $img->temporaryUrl() }}"
                            class="border-4 shadow-lg rounded-xl mb-3w-1/2 sm:w-1/3 md:w-1/5" alt="">
                    @endif
                    <x-form-input type="file" id="img" label="Foto" wire:model.live="img" :error="$errors->first('img')"
                        class="mb-3" />
                </div>

                <!-- Submit Button -->
                <x-button button="true" class="mt-3" type="submit">Simpan</x-button>
            </div>
        </div>
    </form>
</div>
