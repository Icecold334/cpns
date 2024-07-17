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


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <!-- Nav Item - Dashboard -->
        @livewire('layout.components.sidelink', ['title' => 'Dashboard', 'href' => '/panel', 'active' => request()->is('panel')])
        @livewire('layout.components.sidelink', ['title' => 'Soal', 'href' => '/soal', 'active' => request()->is('soal*'), 'icon' => '<i class="fa-solid fa-users"></i>'])
        <hr class="sidebar-divider">

        <!-- Divider -->
        <button class="rounded-circle border-0" id="sidebarToggle"></button>

    </div>

</ul>
