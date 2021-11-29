 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterBuku"
            aria-expanded="true" aria-controls="collapseMasterBuku">
            <i class="fas fa-book-open"></i>
            <span>Master Buku</span>
        </a>
        <div id="collapseMasterBuku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Buku:</h6>
                <a class="collapse-item" href="{{ url('/admin/book/insert') }}">Input Buku</a>
                <a class="collapse-item" href="{{ url('/admin/book/list') }}">List Buku</a>
                <a class="collapse-item" href="{{ url('/admin/book/insert_kategori') }}">Kategori</a>
                <a class="collapse-item" href="{{ url('/admin/book/insert_penerbit') }}">Penerbit</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterSiswa"
            aria-expanded="true" aria-controls="collapseMasterSiswa">
            <i class="fas fa-users"></i>
            <span>Master Siswa</span>
        </a>
        <div id="collapseMasterSiswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Siswa:</h6>
                <a class="collapse-item" href="{{ url('/admin/student/insert') }}">Input Siswa</a>
                <a class="collapse-item" href="{{ url('/admin/student/list') }}">List Siswa</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="far fa-id-card"></i>
            <span>Master Peminjaman</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Peminjaman :</h6>
                <a class="collapse-item" href="{{ url('/admin/peminjaman') }}">Input Peminjaman</a>
                <a class="collapse-item" href="{{ url('/admin/peminjaman/list') }}">List Peminjaman</a>
                <a class="collapse-item" href="{{ url('/admin/pengembalian') }}">Input Pengembalian</a>
                <a class="collapse-item" href="{{ url('/admin/pengembalian/list') }}">List Pengembalian</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">





</ul>
<!-- End of Sidebar -->
