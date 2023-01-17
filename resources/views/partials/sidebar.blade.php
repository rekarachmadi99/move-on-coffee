<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-coffee"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Move On Coffee</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($title == 'Dashboard') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Data Master -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Akun -->
    <li class="nav-item @if ($title == 'Akun Pegawai' || 'Edit Akun Pegawai') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('akun.pegawai.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun Pegawai</span></a>
    </li>


    <!-- Nav Item - Pegawai -->
    <li class="nav-item @if ($title == 'Data Pegawai') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('akun.pegawai.index') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Pegawai</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Inventaris
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Keuangan
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
