<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="flex items-center group p-4 border-2 rounded-lg ">
        <table class="w-full">
            <tr>
                <td class="px-5 text-xl  font-semibold text-slate-800"><label for="oldpassword">Password Lama</label>
                </td>
                <td class="px-5 ">
                    <x-form-input type='password' id="oldpassword" wire:model.live="oldpassword"
                        placeholder="Password Lama" autocomplete="off" :error="$errors->first('oldpassword')">
                    </x-form-input>
                </td>
            </tr>
            <tr>
                <td class="px-5 text-xl  font-semibold text-slate-800"><label for="newpassword">Password Baru</label>
                </td>
                <td class="px-5 ">
                    <x-form-input type='password' id="newpassword" wire:model.live="newpassword"
                        placeholder="Password Baru" autocomplete="off" :error="$errors->first('newpassword')">
                    </x-form-input>
                </td>
            </tr>
            <tr>
                <td class="px-5 text-xl  font-semibold text-slate-800"><label for="confirmpassword">Konfirmasi
                        Password</label>
                </td>
                <td class="px-5 ">
                    <x-form-input type='password' id="confirmpassword" wire:model.live="confirmpassword"
                        placeholder="Konfirmasi Password" autocomplete="off" :error="$errors->first('confirmpassword')">
                    </x-form-input>
                </td>
            </tr>
            <tr>
                <td class="px-5 ">
                    <div class="flex items-center gap-6">
                        <x-button :button="true" class="mt-5" wire:click='save'>Simpan</x-button>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>