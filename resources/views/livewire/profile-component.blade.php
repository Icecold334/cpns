<div class="flex items-center group p-4 border-2 rounded-lg w-full md:w-[50%]">
    <table class="w-full">
        <tr>
            <td class="px-5 text-xl font-semibold text-slate-800"><label for="name">Nama</label></td>
            <td class="px-5 "><x-form-input id="name" wire:model.live="name" placeholder="Nama" autocomplete="off"
                    :error="$errors->first('name')"></x-form-input></td>
        </tr>
        <tr>
            <td class="px-5 text-xl font-semibold text-slate-800"><label for="email">Email</label></td>
            <td class="px-5 "><x-form-input id="email" wire:model.live="email" placeholder="Email"
                    autocomplete="off" :error="$errors->first('email')"></x-form-input></td>
        </tr>
        <tr>
            <td class="px-5 text-xl font-semibold text-slate-800"><label for="gender">Jenis Kelamin</label></td>
            <td class="px-5 "><x-form-input type="select" id="gender" wire:model.live="gender"
                    placeholder="Jenis Kelamin" autocomplete="off" :error="$errors->first('gender')">
                    <option value="0">Pria</option>
                    <option value="1">Wanita</option>
                </x-form-input></td>
        </tr>
        <tr>
            <td class="px-5 text-xl font-semibold text-slate-800"><label for="img">Foto</label></td>
            <td class="px-5 "><x-form-input type="file" id="img" wire:model.live="img" placeholder="Foto"
                    autocomplete="off" :error="$errors->first('img')"></x-form-input></td>
        </tr>
    </table>
</div>
