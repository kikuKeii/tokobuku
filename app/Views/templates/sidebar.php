<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Buku <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (in_groups('admin')) : ?>
        <div class="sidebar-heading">
            User Management
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>User List</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        User Profile
    </div>

    <!-- Nav Item - user -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-user"></i>
            <span>User</span></a>
    </li>

    <!-- Nav Item - edit -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('buku'); ?>">
            <i class="fas fa-book"></i>
            <span>Buku</span></a>
    </li>
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - user -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('transaksi'); ?>">
            <i class="fas fa-user"></i>
            <span>Trasnsaksi</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>