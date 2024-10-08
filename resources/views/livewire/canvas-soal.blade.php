<div id="drawer-navigation"
    class="fixed inset-0 top-0 left-0 z-50 h-screen  overflow-y-auto transition-transform  {{ $show ? 'transform-none' : '-translate-x-full' }}  bg-white w-96 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <div class="p-4 bg-primary-950">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-100 uppercase dark:text-gray-400">Daftar
            Soal <div role="status" wire:loading class="inline items-center gap-x-1 ">
                <svg aria-hidden="true"
                    class="inline w-4 h-4 align-middle text-gray-200 animate-spin dark:text-gray-600 fill-primary-950"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
            class="text-gray-100 bg-transparent hover:bg-gray-200 hover:text-primary-950 transition duration-200 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <div class="py-4 overflow-y-auto">
        <div class="grid grid-cols-4 px-3">
            @foreach ($soals as $soal)
                {{-- in_array($soal->id, $jawaban) && $activeSoalId != $soal->id ? 'bg-success-600 text-white' : 'bg-white text-primary-950 border-purple-950 hover:bg-primary-950 hover:text-white' --}}
                <button
                    class="{{ $activeSoalId == $soal->id ? 'bg-primary-950 text-white' : (in_array($soal->id, $jawaban) ? 'bg-success-600 text-white' : 'border border-primary-950 text-primary-950 hover:bg-primary-950 hover:text-white') }} transition duration-200 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-primary-950 focus:outline-none dark:focus:ring-primary-950 mx-2"
                    wire:loading.attr='disabled' wire:loading.class='cursor-not-allowed'
                    wire:click="pilihSoal({{ $soal->id }},{{ $loop->iteration }})">{{ $loop->iteration }}</button>
                {{-- <button
                        class="btn {{ in_array($soal->id, $jawaban) && $activeSoalId != $soal->id ? 'btn-success' : 'btn-outline-primary' }} {{ $activeSoalId === $soal->id ? 'active' : '' }} w-100 ">{{ $loop->iteration }}</button> --}}
            @endforeach
        </div>
    </div>
</div>
{{-- <div class="offcanvas px-0 offcanvas-start {{ $show ? 'show' : '' }}" data-bs-scroll="true" tabindex="-1" id="canvas"
    aria-labelledby="canvasLabel">

    <div class="offcanvas-header bg-primary">
        <h3 class="offcanvas-title text-white px-3" id="canvasLabel" data-bs-backdrop="false">Daftar Soal </h3>
        <div class="spinner-grow text-light" wire:loading role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <button type="button" class="btn-close me-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row px-3">
            @foreach ($soals as $soal)
                <div class="col-3 mb-3">
                    <button
                        class="btn {{ in_array($soal->id, $jawaban) && $activeSoalId != $soal->id ? 'btn-success' : 'btn-outline-primary' }} {{ $activeSoalId === $soal->id ? 'active' : '' }} w-100 "
                        wire:loading.class="disabled" wire:click="pilihSoal({{ $soal->id }},{{ $loop->iteration }})"
                        role="button" data-bs-toggle="button">{{ $loop->iteration }}</button>
                </div>
            @endforeach
        </div>
    </div>

</div> --}}
