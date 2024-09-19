    <style>
        /* Default width for all screens */
        #logo-app {
            width: 30%;
        }

        /* Small screens (mobile) */
        @media (max-width: 767px) {
            #logo-app {
                width: 60%;
            }
        }

        /* Extra-large screens */
        @media (min-width: 1200px) {
            #logo-app {
                width: 30%;
            }
        }
    </style>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-inline-flex flex-column bg-primary  align-items-center justify-content-center py-3 px-3"
            href="/panel" style="height: auto; width: auto;">
            <div class="sidebar-brand-icon">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text  mt-2">{{ App\Models\Pengaturan::first()->nama }}</div>
        </a>





        {{-- <!-- Divider -->
        <hr class="sidebar-divider my-0"> --}}

        <!-- Nav Item -->
        @if (!request()->routeIs('play'))
            <livewire:layout.components.sidelink title="Dashboard" href="/panel" :active="request()->is('panel')" />
            @can('admin')
                @livewire('layout.components.sidelink', ['title' => 'Guru', 'href' => '/guru', 'active' => request()->is('guru*'), 'icon' => '<i class="fa-solid fa-chalkboard-user"></i>'])
            @endcan
            @canany(['admin', 'guru'])
                @livewire('layout.components.sidelink', ['title' => 'Siswa', 'href' => '/siswa', 'active' => request()->is('siswa*'), 'icon' => '<i class="fa-solid fa-users-rectangle"></i>'])
            @endcanany
            @livewire('layout.components.sidelink', ['title' => 'Paket Soal', 'href' => '/paket', 'active' => request()->is('paket*'), 'icon' => '<i class="fa-solid fa-rectangle-list"></i>'])
        @endif




        <!-- Divider -->
        <hr class="sidebar-divider">

        @if (!request()->is('paket/test*'))
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        @endif


    </ul>
