<aside id="logo-sidebar"
    class="fixed top-0 shadow-2xl left-0 z-40 w-64 h-screen pt-2  transition-transform -translate-x-full bg-gradient-to-b from-primary-600  to-primary-950 border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="my-3">
        @if (!request()->routeIs('play'))
        <a href="https://flowbite.com" class="flex flex-col flex-1 gap-3 justify-center">
            <div class="flex justify-center">
                <img src="{{ asset('img/logo.png') }}" class="h-24 w-24  bg-white rounded-md" alt="FlowBite Logo" />
            </div>
            <div class="self-center text-xl font-semibold sm:text-xl text-center text-white">{!!
                App\Models\Pengaturan::first()->nama !!}</div>
        </a>
        @endif
    </div>
    <div class="h-full px-3 pb-4 overflow-y-auto bg-primary-950g-gray-800 ">
        <ul class="space-y-2 font-medium">
            @if (!request()->routeIs('play'))
            <x-side-item title='Dashboard' href='/panel'><i class="fas fa-fw fa-tachometer-alt "></i></x-side-item>
            @canany(['admin', 'guru'])
            <x-side-item title='Kategori' href='/kategori'><i class="fa-solid fa-font-awesome"></i></x-side-item>
            @endcanany
            @can('admin')
            <x-side-item title='Guru' href='/guru'><i class="fa-solid fa-chalkboard-user"></i></x-side-item>
            @endcan
            @canany(['admin', 'guru'])
            <x-side-item title='Siswa' href='/siswa'><i class="fa-solid fa-users-rectangle"></i></x-side-item>
            @endcanany
            <x-side-item title='Paket Ujian' href='/paket'><i class="fa-solid fa-rectangle-list"></i></x-side-item>
            @endif
        </ul>
    </div>
</aside>