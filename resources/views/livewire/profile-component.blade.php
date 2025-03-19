<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="flex items-center group p-4 border-2 rounded-lg ">
        <table class="w-full">
            <tr>
                <td class="px-5 text-xl font-semibold text-slate-800"><label for="name">Nama</label></td>
                <td class="px-5 ">
                    <x-form-input id="name" wire:model.live="name" placeholder="Nama" autocomplete="off"
                        :error="$errors->first('name')"></x-form-input>
                </td>
            </tr>
            <tr>
                <td class="px-5 text-xl font-semibold text-slate-800"><label for="email">Email</label></td>
                <td class="px-5 ">
                    <x-form-input id="email" wire:model.live="email" placeholder="Email" autocomplete="off"
                        :error="$errors->first('email')"></x-form-input>
                </td>
            </tr>
            <tr>
                <td class="px-5 text-xl font-semibold text-slate-800"><label for="gender">Jenis Kelamin</label></td>
                <td class="px-5 ">

                    <ul class="grid w-full gap-3 xl:grid-cols-2 mb-0 mt-2 ">
                        <li>
                            <input wire:loading.attr="disabled" type="radio" name="gender" value="0" id="gender0"
                                wire:model.live="gender" class="hidden peer" required />
                            <label for="gender0"
                                class="inline-flex shadow-md items-center justify-between w-full p-2 text-gray-900 transition duration-200 bg-white peer-checked:bg-primary-950 border border-gray-400 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-primary-900 peer-checked:text-gray-100  hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-sm font-semibold">
                                        <span class="text-blue-500"><i class="fa-solid fa-mars"></i></span>
                                        Pria
                                    </div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input wire:loading.attr="disabled" type="radio" name="gender" value="1" id="gender1"
                                wire:model.live="gender" class="hidden peer" required />
                            <label for="gender1"
                                class="inline-flex shadow-md items-center justify-between w-full p-2 text-gray-900 transition duration-200 bg-white peer-checked:bg-primary-950 border border-gray-400 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-primary-900 peer-checked:text-gray-100  hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-sm font-semibold">
                                        <span class="text-pink-500"><i class="fa-solid fa-venus"></i></span>
                                        Wanita
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="px-5 text-xl font-semibold text-slate-800"><label for="img">Foto</label></td>
                <td class="px-5 ">
                    <x-form-input type="file" id="img" accept=".jpg, .jpeg, .png" wire:model.live="img"
                        placeholder="Foto" autocomplete="off" :error="$errors->first('img')"></x-form-input>
                </td>
            </tr>
            <tr>
                <td class="px-5 ">
                    <div class="flex items-center gap-6 rounded-t">
                        <x-button :button="true" class="mt-5" wire:click='save'>Simpan</x-button>
                        <x-button :button="true" class="mt-5 {{ $img === 'img/undraw_profile.svg' ? 'hidden' : '' }}"
                            wire:click='resetImg'>Reset</x-button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="flex items-center group p-4 border-2 rounded-lg justify-center ">
        <div class="w-[40%]">
            <img src="{{ is_string($img) ? asset($img) : $img->temporaryUrl() }}" alt="{{ " {$name} profil" }}"
                class="w-full">
        </div>
    </div>

</div>