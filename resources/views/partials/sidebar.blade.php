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
    <li class="nav-item @if ($title == 'Akun Pegawai' || $title == 'Edit Akun Pegawai') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('akun.pegawai.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun Pegawai</span></a>
    </li>


    <!-- Nav Item - Pegawai -->
    <li class="nav-item @if ($title == 'Data Pegawai') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Pegawai</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Inventaris
    </div>

    <!-- Nav Item - Pegawai -->
    <li class="nav-item @if ($title == 'Kategori Barang') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Kategori Barang</span></a>
    </li>

    <!-- Nav Item - Pegawai -->
    <li class="nav-item @if ($title == 'Data Barang') {{ 'active' }} @endif">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Barang</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Keuangan
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#keuangan" aria-expanded="true"
            aria-controls="akun">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Keuangan</span>
        </a>
        <div id="keuangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pemasukan.index') }}">Pemasukan</a>
                <a class="collapse-item" href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                <a class="collapse-item" href="{{ route('laporan.keuangan.index') }}">Pengeluaran</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
