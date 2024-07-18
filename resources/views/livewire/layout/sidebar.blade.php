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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item -->
        @livewire('layout.components.sidelink', ['title' => 'Dashboard', 'href' => '/panel', 'active' => request()->is('panel')])
        @livewire('layout.components.sidelink', ['title' => 'Guru', 'href' => '/guru', 'active' => request()->is('guru*'), 'icon' => '<i class="fa-solid fa-chalkboard-user"></i>'])
        @livewire('layout.components.sidelink', ['title' => 'Siswa', 'href' => '/siswa', 'active' => request()->is('siswa*'), 'icon' => '<i class="fa-solid fa-users-rectangle"></i>'])
        @livewire('layout.components.sidelink', ['title' => 'Soal', 'href' => '/soal', 'active' => request()->is('soal*'), 'icon' => '<i class="fa-solid fa-rectangle-list"></i>'])
        @livewire('layout.components.sidelink', ['title' => 'Laporan', 'href' => '/laporan', 'active' => request()->is('laporan*'), 'icon' => '<i class="fa-solid fa-chart-pie"></i>'])



        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
