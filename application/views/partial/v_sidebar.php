<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link <?= $active_menu == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/buku_tamu') ?>" class="nav-link <?= $active_menu == 'buku_tamu' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Buku Tamu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/aduan') ?>" class="nav-link <?= $active_menu == 'aduan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>Kelola Aduan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/data_pengguna') ?>" class="nav-link <?= $active_menu == 'data_pengguna' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Kelola Data</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
