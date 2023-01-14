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
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.get') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Data Master -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Akun Pegawai -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#akun" aria-expanded="true"
            aria-controls="akun">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun</span>
        </a>
        <div id="akun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Akun Pegawai</a>
                <a class="collapse-item" href="{{ route('tambah.akun.pegawai.get') }}">Tambah Akun</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pegawai -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Pegawai</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Data Pegawai</a>
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Tambah Pegawai</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Inventaris
    </div>

    <!-- Nav Item - Barang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Barang</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Jenis Barang</a>
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Data Barang</a>
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Tambah Barang</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Keuangan
    </div>

    <!-- Nav Item - Keuangan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#keuangan" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-coins"></i>
            <span>Keuangan</span>
        </a>
        <div id="keuangan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}n">Pemasukan</a>
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Pengeluaran</a>
                <a class="collapse-item" href="{{ route('read.akun.pegawai.get') }}">Laporan Keuangan</a>
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
