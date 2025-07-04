<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | Admin</title>
    
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Fullscreen layout */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        .wrapper {
            min-height: 100vh;
        }
        
        /* PENTING: Jangan override CSS AdminLTE untuk animasi sidebar */
        /* Biarkan AdminLTE handle animasi sidebar secara default */
        
        /* Custom scrollbar untuk sidebar */
        .sidebar {
            scrollbar-width: thin;
            scrollbar-color: #6c757d #343a40;
        }
        
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: #343a40;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: #6c757d;
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #adb5bd;
        }
        
        /* Active nav item styling */
        .nav-sidebar .nav-item .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        
        /* Hover effects */
        .nav-sidebar .nav-item .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        /* Brand link styling */
        .brand-link {
            border-bottom: 1px solid #4b545c;
        }
        
        .brand-link:hover {
            color: #fff;
            text-decoration: none;
        }
        
        /* Sidebar menu spacing */
        .nav-sidebar .nav-item {
            margin-bottom: 0.25rem;
        }
        
        .nav-sidebar .nav-link {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            margin: 0 0.5rem;
        }
        
        /* Pastikan animasi AdminLTE berjalan */
        .main-sidebar,
        .content-wrapper,
        .main-footer {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url('admin') ?>" class="brand-link">
            <i class="fas fa-cog brand-icon" style="margin-right: 10px;"></i>
            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?= base_url('admin') ?>" class="nav-link <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/buku_tamu') ?>" class="nav-link <?= $this->uri->segment(2) == 'buku_tamu' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Buku Tamu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/aduan') ?>" class="nav-link <?= $this->uri->segment(2) == 'aduan' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-exclamation-circle"></i>
                            <p>Kelola Aduan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/data_pengguna') ?>" class="nav-link <?= $this->uri->segment(2) == 'data_pengguna' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Kelola Data</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?= $title ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php $this->load->view($content); ?>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; <?= date('Y') ?> Sistem Pengelolaan Buku Tamu</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<script>
$(document).ready(function() {
    // PENTING: Jangan override event handler AdminLTE untuk pushmenu
    // AdminLTE sudah handle animasi sidebar secara otomatis
    
    // Hanya tambahkan fitur tambahan tanpa mengganggu core AdminLTE
    
    // Restore sidebar state on page load (opsional)
    var sidebarState = localStorage.getItem('sidebar-state');
    if (sidebarState === 'collapsed') {
        $('body').addClass('sidebar-collapse');
    }
    
    // Save sidebar state ketika di-toggle (mendengarkan event AdminLTE)
    $(document).on('collapsed.lte.pushmenu', function() {
        localStorage.setItem('sidebar-state', 'collapsed');
    });
    
    $(document).on('expanded.lte.pushmenu', function() {
        localStorage.setItem('sidebar-state', 'expanded');
    });
    
    // Mobile responsive handling
    function handleResize() {
        if ($(window).width() < 768) {
            $('body').addClass('sidebar-collapse');
        } else {
            var sidebarState = localStorage.getItem('sidebar-state');
            if (sidebarState !== 'collapsed') {
                $('body').removeClass('sidebar-collapse');
            }
        }
    }
    
    // Check on page load
    handleResize();
    
    // Handle window resize
    $(window).on('resize', function() {
        handleResize();
    });
    
    // Add tooltips to collapsed sidebar items
    $('body').on('mouseenter', '.sidebar-collapse .nav-sidebar .nav-link', function() {
        if ($('body').hasClass('sidebar-collapse')) {
            var title = $(this).find('p').text().trim();
            if (title) {
                $(this).attr('title', title);
            }
        }
    });
    
    // Remove tooltips when sidebar is expanded
    $('body').on('mouseleave', '.nav-sidebar .nav-link', function() {
        if (!$('body').hasClass('sidebar-collapse')) {
            $(this).removeAttr('title');
        }
    });
});

// Pastikan AdminLTE dapat load dengan benar
$(window).on('load', function() {
    // Trigger resize untuk memastikan layout benar
    $(window).trigger('resize');
});
</script>
</body>
</html>