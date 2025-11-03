<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/Template/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/Pictures/Logo_PU_(RGB).jpg">
  <title>Dashboard Monev Pengaduan</title>
  
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="<?= base_url();?>assets/Template/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url();?>assets/Template/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link id="pagestyle" href="<?= base_url();?>assets/Template/assets/css/soft-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  
  <style>
    @media print {
      .no-print { display: none !important; }
    }
    .custom-card {
      transition: all 0.3s ease;
    }
    .custom-card:hover {
      transform: translateY(-2px);
    }
    /* Style untuk diagram donut */
    .donut-container {
      position: relative;
      width: 300px;
      height: 300px;
      margin: 0 auto;
    }
    .donut-segment {
      transition: all 0.3s ease;
    }
    .donut-segment:hover {
      stroke-width: 45;
    }
    
    /* STYLE PRINT YANG SAMA PERSIS DENGAN v_monev_kepuasan */
    @media print {
        /* Sembunyikan element yang tidak perlu di print */
        .no-print, 
        .navbar-main,
        .sidenav,
        .footer,
        .btn-print-floating,
        .vr {
            display: none !important;
        }
        
    /* Sembunyikan kolom Progress */
    #via-permohonan-table .col-progress {
        display: none !important;
    }
    
    /* Atau gunakan nth-child jika class tidak work */
    #via-permohonan-table thead tr th:nth-child(3),
    #via-permohonan-table tbody tr td:nth-child(3) {
        display: none !important;
    }
    
        /* Reset layout untuk print */
        body {
            background: white !important;
            font-size: 12pt;
            margin: 0 !important;
            padding: 20px !important;
        }
        
        .main-content {
            margin: 0 !important;
            padding: 0 !important;
            max-height: none !important;
        }
        
        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
        }
        
        .card {
            border: 1px solid #000 !important;
            box-shadow: none !important;
            margin-bottom: 15px !important;
            page-break-inside: avoid;
        }
        
        .card-header {
            background: #f8f9fa !important;
            border-bottom: 1px solid #000 !important;
            padding: 10px 15px !important;
        }
        
        .card-body {
            padding: 15px !important;
        }
        
        /* Header laporan */
        .print-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        
        .print-title {
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .print-subtitle {
            font-size: 12pt;
            margin-bottom: 5px;
        }
        
        .print-period {
            font-size: 11pt;
            font-weight: bold;
        }
        
        /* Optimalkan tabel untuk print */
        .table {
            font-size: 10pt;
            width: 100% !important;
        }
        
        .table th {
            background: #f8f9fa !important;
            border: 1px solid #000 !important;
            padding: 8px !important;
        }
        
        .table td {
            border: 1px solid #000 !important;
            padding: 8px !important;
        }
        
        /* Pastikan grafik terlihat */
        canvas {
            max-width: 100% !important;
            height: auto !important;
        }
        
        /* Atur ulang grid layout */
        .row {
            display: block !important;
        }
        
        .col-lg-6, .col-md-6, .col-xl-3, .col-12 {
            width: 100% !important;
            max-width: 100% !important;
            flex: none !important;
            margin-bottom: 15px !important;
        }
        
        /* Optimalkan spacing */
        .py-4 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        
        .mb-4 {
            margin-bottom: 15px !important;
        }
        
        .mt-4 {
            margin-top: 15px !important;
        }
        
        /* Progress bars */
        .progress {
            height: 15px !important;
        }
        
        /* Badge untuk print */
        .badge {
            border: 1px solid #000 !important;
            padding: 5px 10px !important;
        }
    }
    
    /* Informasi print-only */
    .print-only {
        display: none;
    }
    
    @media print {
        .print-only {
            display: block !important;
        }
    }

    /* Highlight baris tabel yang bisa diklik */
    .table tbody tr[onclick] {
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .table tbody tr[onclick]:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    /* Efek ketika diklik */
    .table tbody tr[onclick]:active {
        background-color: rgba(0, 0, 0, 0.05);
    }

    /* Style untuk icon clickable */
    .clickable-icon {
        color: #17a2b8;
        margin-left: 5px;
        font-size: 0.7rem;
    }
</style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <!-- Sidebar -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 no-print" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?php echo base_url('Admin'); ?>">
        <img src="<?= base_url();?>assets/Pictures/Logo_PU_(RGB).jpg" class="navbar-brand-img h-200" alt="main_logo">
        <span class="ms-1 font-weight-bold">Lampu Petromak</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    
    <div class="collapse navbar-collapse  w-auto h-auto">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?php echo base_url('Admin'); ?>" class="btn btn-primary btn-lg">
              <i class="fas fa-house-user" aria-hidden="true"></i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link active collapsed" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-sm shadow-sm border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <i class="far fa-folder-open" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Pelayanan</span>
          </a>
          <div class="collapse " id="dashboardsExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Admin/rekap_tamu'); ?>">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal"> Rekap Buku Tamu </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo base_url('Admin/layanan_kepuasan'); ?>">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal"> Layanan Kepuasan Masyarakat </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="<?= base_url('Layanan') ?>">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal"> Layanan Permintaan Data </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="<?= base_url('Pengaduan') ?>">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal"> Layanan Pengaduan <b class="caret"></b></span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="<?= base_url('Informasi') ?>">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal"> Rekap Media Sosial </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>

    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dashboardsExamples2" class="nav-link active collapsed" aria-controls="dashboardsExamples2" role="button" aria-expanded="false">
            <div class="icon icon-sm shadow-sm border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <i class="far fa-folder-open" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Monev</span>
          </a>
          <div class="collapse show" id="dashboardsExamples2">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Monev_kepuasan'); ?>">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Monev Kepuasan Masyarakat</span>
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Monev_permintaan'); ?>">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Monev Permintaan Data</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Monev_pengaduan'); ?>">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Monev Pengaduan</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>

    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dashboardsExamples3" class="nav-link active collapsed" aria-controls="dashboardsExamples3" role="button" aria-expanded="false">
            <div class="icon icon-sm shadow-sm border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
              <i class="far fa-folder-open" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Berkas Laporan</span>
          </a>
          <div class="collapse" id="dashboardsExamples3">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Laporan/ppid') ?>">
                  <span class="nav-link-text ms-1">Laporan PPID</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Laporan/kompu') ?>">
                  <span class="nav-link-text ms-1">Laporan Kompu</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Laporan/skm') ?>">
                  <span class="nav-link-text ms-1">Survei Kepuasan Masyarakat</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none me-2">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Monev</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengaduan</li>
                </ol>
            </nav>

            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                
                <!-- Form Filter Periode -->
                <form method="GET" action="<?= site_url('Monev_pengaduan') ?>" class="d-flex align-items-center gap-3 ms-auto me-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex align-items-center">
                            <label class="text-gray-700 font-medium mb-0 me-2">Periode:</label>
                            <select name="jenis_periode" id="jenis_periode" class="form-select form-select-sm" style="width: 130px;">
                                <option value="bulanan" <?= $jenis_periode == 'bulanan' ? 'selected' : '' ?>>Bulanan</option>
                                <option value="triwulan" <?= $jenis_periode == 'triwulan' ? 'selected' : '' ?>>Triwulan</option>
                                <option value="semester" <?= $jenis_periode == 'semester' ? 'selected' : '' ?>>Semester</option>
                                <option value="tahunan" <?= $jenis_periode == 'tahunan' ? 'selected' : '' ?>>Tahunan</option>
                                <option value="semua" <?= $jenis_periode == 'semua' ? 'selected' : '' ?>>Semua Data</option>
                            </select>
                        </div>

                        <select name="periode" id="periode" class="form-select form-select-sm" style="width: 180px;">
                        </select>

                        <div class="d-flex align-items-center">
                            <label class="text-gray-700 font-medium mb-0 me-2">Tahun:</label>
                            <select name="tahun" id="tahun" class="form-select form-select-sm" style="width: 150px;">
                                <option value="semua" <?= $tahun_selected == 'semua' ? 'selected' : '' ?>>-- Semua Tahun --</option>
                                <?php foreach($tahun_available as $tahun_item): ?>
                                    <option value="<?= $tahun_item ?>" <?= $tahun_item == $tahun_selected ? 'selected' : '' ?>>
                                        <?= $tahun_item ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="vr h-25 mx-2"></div>
                </form>

                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="<?= base_url("Auth/logout");?>" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="mb-1">Monev Pengaduan</h2>
                                <p class="mb-0 text-sm">Monitoring dan Evaluasi Pengaduan Informasi</p>
                            </div>
                            <div class="border-start ps-4 ms-4">
                                <div class="text-sm text-muted mb-1">Periode</div>
                                <div class="h5 fw-bold text-dark mb-0"><?= isset($periode_label) ? $periode_label : 'Semua Data' ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Cards -->
        <div class="row mb-4">
            <!-- Card Total Permohonan -->
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card custom-card h-100">
                    <div class="card-body p-3">
                        <div class="row align-items-center h-100">
                            <div class="col-8">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pengaduan</p>
                                <h4 class="font-weight-bolder mb-0">
                                    <?= $total_permohonan ?>
                                </h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-file-alt text-lg opacity-10"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Dalam Proses -->
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card custom-card h-100">
                    <div class="card-body p-3">
                        <div class="row align-items-center h-100">
                            <div class="col-8">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Dalam Proses</p>
                                <h4 class="font-weight-bolder mb-0">
                                    <?= $dalam_proses ?>
                                    <?php if($total_permohonan > 0): ?>
                                        <span class="text-success text-sm"><?= number_format(($dalam_proses / $total_permohonan) * 100, 1) ?>%</span>
                                    <?php endif; ?>
                                </h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                    <i class="fas fa-clock text-lg text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Dipenuhi -->
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card custom-card h-100">
                    <div class="card-body p-3">
                        <div class="row align-items-center h-100">
                            <div class="col-8">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Selesai</p>
                                <h4 class="font-weight-bolder mb-0">
                                    <?= $dipenuhi ?>
                                    <?php if($total_permohonan > 0): ?>
                                        <span class="text-success text-sm"><?= number_format(($dipenuhi / $total_permohonan) * 100, 1) ?>%</span>
                                    <?php endif; ?>
                                </h4>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                    <i class="fas fa-check-circle text-lg opacity-10"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
<div class="row mt-4">
    <!-- Status Permohonan Chart - KIRI -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header pb-0">
                <h6>Status Penanganan Pengaduan</h6>
            </div>
            <div class="card-body p-3 d-flex flex-column justify-content-center">
                <?php 
                $total_status = $status_permohonan['terpenuhi'] + $status_permohonan['dalam_proses'] + $status_permohonan['telah_disampaikan'];
                ?>

                <?php if($total_status > 0): ?>
                <?php
                    $persen_terpenuhi = ($status_permohonan['terpenuhi'] / $total_status) * 100;
                    $persen_proses = ($status_permohonan['dalam_proses'] / $total_status) * 100;
                    $persen_telah_disampaikan = ($status_permohonan['telah_disampaikan'] / $total_status) * 100;
                ?>
                
                <div class="row align-items-center">
                    <div class="col-md-6 text-center pe-4">
                        <div class="position-relative" style="height: 250px;">
                            <canvas id="statusChart"></canvas>
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <div class="h4 fw-bold text-dark mb-0"><?= $total_status ?></div>
                                <div class="text-xs text-muted">Total</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ps-4">
                        <div class="space-y-3">
                            <!-- Selesai -->
                            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light" 
                                 style="cursor: pointer;" 
                                 onclick="showStatusPermohonanDetail('terpenuhi')"
                                 title="Klik untuk lihat detail Selesai">
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-dot me-2" style="background-color: #1C6C8C;"></span>
                                    <span class="text-sm font-weight-bold">Selesai</span>
                                </div>
                                <div class="text-end">
                                    <span class="text-sm font-weight-bold d-block"><?= $status_permohonan['terpenuhi'] ?></span>
                                    <span class="text-xs text-muted"><?= round($persen_terpenuhi, 1) ?>%</span>
                                </div>
                            </div>

                            <!-- Dalam Proses -->
                            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light"
                                 style="cursor: pointer;" 
                                 onclick="showStatusPermohonanDetail('dalam_proses')"
                                 title="Klik untuk lihat detail Dalam Proses">
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-dot me-2" style="background-color: #E1712C;"></span>
                                    <span class="text-sm font-weight-bold">Dalam Proses</span>
                                </div>
                                <div class="text-end">
                                    <span class="text-sm font-weight-bold d-block"><?= $status_permohonan['dalam_proses'] ?></span>
                                    <span class="text-xs text-muted"><?= round($persen_proses, 1) ?>%</span>
                                </div>
                            </div>

                            <!-- Telah Disampaikan -->
                            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light"
                                 style="cursor: pointer;" 
                                 onclick="showStatusPermohonanDetail('telah_disampaikan')"
                                 title="Klik untuk lihat detail Telah Disampaikan">
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-dot me-2" style="background-color: #3D8B37;"></span>
                                    <span class="text-sm font-weight-bold">Telah Disampaikan</span>
                                </div>
                                <div class="text-end">
                                    <span class="text-sm font-weight-bold d-block"><?= $status_permohonan['telah_disampaikan'] ?></span>
                                    <span class="text-xs text-muted"><?= round($persen_telah_disampaikan, 1) ?>%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Bars -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-xs font-weight-bold me-2" style="width: 120px;">Selesai</span>
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: <?= $persen_terpenuhi ?>%; background-color: #1C6C8C;"></div>
                            </div>
                            <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_terpenuhi, 1) ?>%</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-xs font-weight-bold me-2" style="width: 120px;">Dalam Proses</span>
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: <?= $persen_proses ?>%; background-color: #E1712C;"></div>
                            </div>
                            <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_proses, 1) ?>%</span>
                        </div>
                        <div class="d-flex align-items-center mb-0">
                            <span class="text-xs font-weight-bold me-2" style="width: 120px;">Telah Disampaikan</span>
                            <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: <?= $persen_telah_disampaikan ?>%; background-color: #3D8B37;"></div>
                            </div>
                            <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_telah_disampaikan, 1) ?>%</span>
                        </div>
                    </div>
                </div>

                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-chart-pie text-4xl text-gray-300 mb-3"></i>
                        <p class="text-sm text-gray-500">Tidak ada data untuk periode <?= $periode_label ?> ini</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

            <!-- Status Pemohon Chart - KANAN -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Status Pemohon</h6>
                    </div>
                    <div class="card-body p-3">
                        <?php 
                        $total_pemohon = $status_pengirim['mahasiswa'] + $status_pengirim['media'] + 
                                        $status_pengirim['instansi'] + $status_pengirim['lsm'] + 
                                        $status_pengirim['perseorangan'];
                        ?>

                        <?php if($total_pemohon > 0): ?>
                        <?php
                            $persen_mahasiswa = ($status_pengirim['mahasiswa'] / $total_pemohon) * 100;
                            $persen_media = ($status_pengirim['media'] / $total_pemohon) * 100;
                            $persen_instansi = ($status_pengirim['instansi'] / $total_pemohon) * 100;
                            $persen_lsm = ($status_pengirim['lsm'] / $total_pemohon) * 100;
                            $persen_perseorangan = ($status_pengirim['perseorangan'] / $total_pemohon) * 100;
                        ?>
                        
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center">
                                <div class="position-relative" style="height: 250px;">
                                    <canvas id="pemohonChart"></canvas>
                                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                                        <div class="h4 fw-bold text-dark mb-0"><?= $total_pemohon ?></div>
                                        <div class="text-xs text-muted">Total Pemohon</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="space-y-3">
                                    <!-- Mahasiswa -->
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-dot me-2" style="background-color: #1C6C8C;"></span>
                                            <span class="text-sm font-weight-bold">Mahasiswa (Instansi)</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-sm font-weight-bold d-block"><?= $status_pengirim['mahasiswa'] ?></span>
                                            <span class="text-xs text-muted"><?= round($persen_mahasiswa, 1) ?>%</span>
                                        </div>
                                    </div>

                                    <!-- Media -->
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-dot me-2" style="background-color: #E1712C;"></span>
                                            <span class="text-sm font-weight-bold">Media</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-sm font-weight-bold d-block"><?= $status_pengirim['media'] ?></span>
                                            <span class="text-xs text-muted"><?= round($persen_media, 1) ?>%</span>
                                        </div>
                                    </div>

                                    <!-- Instansi -->
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-dot me-2" style="background-color: #3D8B37;"></span>
                                            <span class="text-sm font-weight-bold">Instansi</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-sm font-weight-bold d-block"><?= $status_pengirim['instansi'] ?></span>
                                            <span class="text-xs text-muted"><?= round($persen_instansi, 1) ?>%</span>
                                        </div>
                                    </div>

                                    <!-- LSM -->
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-dot me-2" style="background-color: #33AFE0;"></span>
                                            <span class="text-sm font-weight-bold">LSM</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-sm font-weight-bold d-block"><?= $status_pengirim['lsm'] ?></span>
                                            <span class="text-xs text-muted"><?= round($persen_lsm, 1) ?>%</span>
                                        </div>
                                    </div>

                                    <!-- Perseorangan -->
                                    <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-dot me-2" style="background-color: #A23A8E;"></span>
                                            <span class="text-sm font-weight-bold">Perseorangan</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="text-sm font-weight-bold d-block"><?= $status_pengirim['perseorangan'] ?></span>
                                            <span class="text-xs text-muted"><?= round($persen_perseorangan, 1) ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bars -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="space-y-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-xs font-weight-bold me-2" style="width: 150px;">Mahasiswa</span>
                                        <div class="progress flex-grow-1" style="height: 8px;">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $persen_mahasiswa ?>%; background-color: #1C6C8C;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_mahasiswa, 1) ?>%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-xs font-weight-bold me-2" style="width: 150px;">Media</span>
                                        <div class="progress flex-grow-1" style="height: 8px;">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $persen_media ?>%; background-color: #E1712C;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_media, 1) ?>%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-xs font-weight-bold me-2" style="width: 150px;">Instansi</span>
                                        <div class="progress flex-grow-1" style="height: 8px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $persen_lsm ?>%; background-color: #3D8B37;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_instansi, 1) ?>%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-xs font-weight-bold me-2" style="width: 150px;">LSM</span>
                                        <div class="progress flex-grow-1" style="height: 8px;">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $persen_lsm ?>%; background-color: #33AFE0;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_lsm, 1) ?>%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-xs font-weight-bold me-2" style="width: 150px;">Perseorangan</span>
                                        <div class="progress flex-grow-1" style="height: 8px;">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $persen_perseorangan ?>%; background-color: #A23A8E;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($persen_perseorangan, 1) ?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php else: ?>
                            <div class="text-center py-4">
                                <i class="fas fa-chart-pie text-4xl text-gray-300 mb-3"></i>
                                <p class="text-sm text-gray-500">Tidak ada data untuk periode <?= $periode_label ?> ini</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Via Permohonan Table -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Via Pengaduan</h6>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table id="via-permohonan-table" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 50px;">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3" style="width: 150px;">Via</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-4 col-progress" style="width: 400px;">Progress</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-3" style="width: 80px;">Jumlah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-3" style="width: 80px;">Persen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($via_permohonan)): ?>
                                <?php foreach ($via_permohonan as $no => $item): ?>
                                <tr style="cursor: pointer;" 
                                    onclick="showViaDetail('<?= $item['nama'] ?>', '<?= $no ?>')"
                                    title="Klik untuk lihat detail <?= $item['nama'] ?>">
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?= $no + 1 ?></p>
                                    </td>
                                    <td class="ps-3">
                                        <p class="text-xs font-weight-bold mb-0"><?= $item['nama'] ?></p>
                                    </td>
                                    <td class="align-middle ps-4 pe-4 col-progress">
                                        <div class="progress" style="height: 8px; width: 700px;">
                                            <div class="progress-bar bg-gradient-info" role="progressbar" 
                                                 style="width: <?= $item['persen'] ?>%;">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center ps-3">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $item['jumlah'] ?></span>
                                    </td>
                                    <td class="align-middle text-center ps-3">
                                        <span class="badge badge-sm bg-gradient-info"><?= number_format($item['persen'], 1) ?>%</span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center py-4"><p class="text-xs text-secondary mb-0">Belum ada data</p></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Modal Detail Via -->
        <div class="modal fade" id="detailViaModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailViaTitle">Detail Via</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Distribusi Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="position-relative d-inline-block" style="height: 280px; width: 280px;">
                                                <canvas id="detailViaChart"></canvas>
                                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                                    <div class="h4 fw-bold text-dark mb-0" id="viaTotal">0</div>
                                                    <div class="text-xs text-muted">Total</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h6 class="mb-0">Statistik</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="detailStats" class="mb-3">
                                            <p class="text-sm text-muted">Memuat data...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Visualisasi Persentase -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header pb-2">
                                        <h6 class="mb-0 text-sm">Visualisasi Persentase</h6>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
                                        <!-- Selesai -->
                                        <div class="mb-2">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="d-flex align-items-center" style="width: 120px;">
                                                    <div style="width: 14px; height: 14px; background-color: #1C6C8C; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                                    <span class="text-xs font-weight-bold text-dark">Selesai</span>
                                                </div>
                                                <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                                    <div class="progress-bar" id="progressSelesai" style="width: 0%; background-color: #1C6C8C;"></div>
                                                </div>
                                                <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendSelesai">0</span>
                                                <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentSelesai">0%</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Dalam Proses -->
                                        <div class="mb-2">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="d-flex align-items-center" style="width: 120px;">
                                                    <div style="width: 14px; height: 14px; background-color: #E1712C; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                                    <span class="text-xs font-weight-bold text-dark">Dalam Proses</span>
                                                </div>
                                                <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                                    <div class="progress-bar" id="progressProses" style="width: 0%; background-color: #E1712C;"></div>
                                                </div>
                                                <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendProses">0</span>
                                                <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentProses">0%</span>
                                            </div>
                                        </div>

                                        <!-- Telah Disampaikan -->
                                        <div class="mb-2">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="d-flex align-items-center" style="width: 120px;">
                                                    <div style="width: 14px; height: 14px; background-color: #3D8B37; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                                    <span class="text-xs font-weight-bold text-dark">Telah Disampaikan</span>
                                                </div>
                                                <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                                    <div class="progress-bar" id="progressTelahDisampaikan" style="width: 0%; background-color: #3D8B37;"></div>
                                                </div>
                                                <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendTelahDisampaikan">0</span>
                                                <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentTelahDisampaikan">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Status Pemohon -->
<div class="modal fade" id="detailStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailStatusTitle">Detail Status Pemohon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Distribusi Jenis Pengaduan</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="position-relative d-inline-block" style="height: 280px; width: 280px;">
                                        <canvas id="detailStatusChart"></canvas>
                                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                                            <div class="h4 fw-bold text-dark mb-0" id="statusTotal">0</div>
                                            <div class="text-xs text-muted">Total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">
                                <h6 class="mb-0">Statistik</h6>
                            </div>
                            <div class="card-body">
                                <div id="detailStatusStats" class="mb-3">
                                    <p class="text-sm text-muted">Memuat data...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Visualisasi Persentase -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-2">
                                <h6 class="mb-0 text-sm">Visualisasi Persentase</h6>
                            </div>
                            <div class="card-body pt-2 pb-3">
                                <!-- Pelanggaran SDA -->
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="d-flex align-items-center" style="width: 120px;">
                                            <div style="width: 14px; height: 14px; background-color: #1C6C8C; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                            <span class="text-xs font-weight-bold text-dark">Pelanggaran SDA</span>
                                        </div>
                                        <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                            <div class="progress-bar" id="progressPelanggaran" style="width: 0%; background-color: #1C6C8C;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendPelanggaran">0</span>
                                        <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentPelanggaran">0%</span>
                                    </div>
                                </div>
                                
                                <!-- Pembangunan SDA -->
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="d-flex align-items-center" style="width: 120px;">
                                            <div style="width: 14px; height: 14px; background-color: #E1712C; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                            <span class="text-xs font-weight-bold text-dark">Pembangunan SDA</span>
                                        </div>
                                        <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                            <div class="progress-bar" id="progressPembangunan" style="width: 0%; background-color: #E1712C;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendPembangunan">0</span>
                                        <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentPembangunan">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Status Permohonan -->
<div class="modal fade" id="detailStatusPermohonanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailStatusPermohonanTitle">Detail Status Permohonan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Distribusi Jenis Pengaduan</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="position-relative d-inline-block" style="height: 280px; width: 280px;">
                                        <canvas id="detailStatusPermohonanChart"></canvas>
                                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                                            <div class="h4 fw-bold text-dark mb-0" id="statusPermohonanTotal">0</div>
                                            <div class="text-xs text-muted">Total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">
                                <h6 class="mb-0">Statistik</h6>
                            </div>
                            <div class="card-body">
                                <div id="detailStatusPermohonanStats" class="mb-3">
                                    <p class="text-sm text-muted">Memuat data...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Visualisasi Persentase -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-2">
                                <h6 class="mb-0 text-sm">Visualisasi Persentase</h6>
                            </div>
                            <div class="card-body pt-2 pb-3">
                                <!-- Pelanggaran SDA -->
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="d-flex align-items-center" style="width: 120px;">
                                            <div style="width: 14px; height: 14px; background-color: #1C6C8C; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                            <span class="text-xs font-weight-bold text-dark">Pelanggaran SDA</span>
                                        </div>
                                        <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                            <div class="progress-bar" id="progressStatusPelanggaran" style="width: 0%; background-color: #1C6C8C;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendStatusPelanggaran">0</span>
                                        <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentStatusPelanggaran">0%</span>
                                    </div>
                                </div>
                                
                                <!-- Pembangunan SDA -->
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="d-flex align-items-center" style="width: 120px;">
                                            <div style="width: 14px; height: 14px; background-color: #E1712C; border-radius: 2px; flex-shrink: 0;" class="me-2"></div>
                                            <span class="text-xs font-weight-bold text-dark">Pembangunan SDA</span>
                                        </div>
                                        <div class="progress flex-grow-1 mx-2" style="height: 10px;">
                                            <div class="progress-bar" id="progressStatusPembangunan" style="width: 0%; background-color: #E1712C;"></div>
                                        </div>
                                        <span class="text-xs font-weight-bold text-dark me-2" style="width: 40px; text-align: right;" id="legendStatusPembangunan">0</span>
                                        <span class="text-xs text-muted" style="width: 50px; text-align: right;" id="percentStatusPembangunan">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER DIPINDAH KE DALAM -->
    <footer class="footer pt-0 mb-2 no-print">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>document.write(new Date().getFullYear())</script>,
                        made by KOMPU BBWS BRANTAS
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">IT Tim</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div> <!-- penutup container-fluid py-4 -->

</main>

 <div class="position-fixed bottom-0 end-0 m-4 z-3 no-print">
    <button onclick="window.print()" class="btn btn-primary btn-lg shadow rounded-pill d-flex align-items-center">
        <i class="fas fa-print me-2"></i>
        <span class="d-none d-md-inline">Cetak Laporan</span>
    </button>
</div>

  <!-- Scripts -->
  <script src="<?= base_url();?>assets/Template/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/soft-ui-dashboard.min.js?v=1.2.0"></script>

 <script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart Status Permohonan
    // Chart Status Permohonan
const statusCtx = document.getElementById('statusChart');
if (statusCtx) {
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Dalam Proses', 'Telah Disampaikan'],
            datasets: [{
                data: [
                    <?= $status_permohonan['terpenuhi'] ?>,
                    <?= $status_permohonan['dalam_proses'] ?>,
                    <?= $status_permohonan['telah_disampaikan'] ?>
                ],
                backgroundColor: ['#1C6C8C', '#E1712C', '#3D8B37'], // Update dengan 3 warna
                borderWidth: 3,
                borderColor: '#ffffff',
                hoverBorderWidth: 4,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true,
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });
}

    // Chart Status Pemohon
    const pemohonCtx = document.getElementById('pemohonChart');
    if (pemohonCtx) {
        new Chart(pemohonCtx, {
            type: 'doughnut',
            data: {
                labels: ['Mahasiswa (Instansi)', 'Media', 'Instansi', 'LSM', 'Perseorangan'],
                datasets: [{
                    data: [
                        <?= $status_pengirim['mahasiswa'] ?>,
                        <?= $status_pengirim['media'] ?>,
                        <?= $status_pengirim['instansi'] ?>,
                        <?= $status_pengirim['lsm'] ?>,
                        <?= $status_pengirim['perseorangan'] ?>
                    ],
                    backgroundColor: ['#1C6C8C', '#E1712C', '#3D8B37', '#33AFE0', '#A23A8E'],
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverBorderWidth: 4,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 2000,
                    easing: 'easeOutQuart'
                }
            }
        });
    }

    // Periode Options
    const periodeOptions = {
        bulanan: [
            { value: 'januari', label: 'Januari' }, { value: 'februari', label: 'Februari' },
            { value: 'maret', label: 'Maret' }, { value: 'april', label: 'April' },
            { value: 'mei', label: 'Mei' }, { value: 'juni', label: 'Juni' },
            { value: 'juli', label: 'Juli' }, { value: 'agustus', label: 'Agustus' },
            { value: 'september', label: 'September' }, { value: 'oktober', label: 'Oktober' },
            { value: 'november', label: 'November' }, { value: 'desember', label: 'Desember' }
        ],
        triwulan: [
            { value: 'triwulan1', label: 'Triwulan I (Jan–Mar)' },
            { value: 'triwulan2', label: 'Triwulan II (Apr–Jun)' },
            { value: 'triwulan3', label: 'Triwulan III (Jul–Sep)' },
            { value: 'triwulan4', label: 'Triwulan IV (Okt–Des)' }
        ],
        semester: [
            { value: 'semester1', label: 'Semester I (Jan–Jun)' },
            { value: 'semester2', label: 'Semester II (Jul–Des)' }
        ],
        tahunan: [
            { value: 'tahunan', label: 'Tahunan (Jan–Des)' }
        ]
    };

    const tahunSelect = document.getElementById('tahun');
    const jenisSelect = document.getElementById('jenis_periode');
    const periodeSelect = document.getElementById('periode');

    function updateFilterStates() {
        const jenis = jenisSelect.value;
        const selectedPeriode = '<?= $periode_selected ?>';
        const selectedTahun = '<?= $tahun_selected ?>';
        
        console.log('Updating filter states:', { jenis, selectedPeriode, selectedTahun });
        
        // Reset periode select
        periodeSelect.innerHTML = '';

        if (jenis === 'semua') {
            periodeSelect.disabled = true;
            tahunSelect.disabled = true;
            
            // Set nilai untuk semua data
            const opt = document.createElement('option');
            opt.value = 'semua';
            opt.textContent = '-- Pilih Periode --';
            opt.selected = true;
            periodeSelect.appendChild(opt);
            
            // Set tahun ke semua
            tahunSelect.value = 'semua';
            
        } else if (jenis === 'tahunan') {
            periodeSelect.disabled = true;
            tahunSelect.disabled = false;
            
            const opt = document.createElement('option');
            opt.value = 'tahunan';
            opt.textContent = '-- Pilih Periode --';
            opt.selected = true;
            periodeSelect.appendChild(opt);
            
        } else {
            periodeSelect.disabled = false;
            tahunSelect.disabled = false;
            
            // Tambahkan option default
            const defaultOpt = document.createElement('option');
            defaultOpt.value = '';
            defaultOpt.textContent = '-- Pilih Periode --';
            if (!selectedPeriode || selectedPeriode === 'semua') {
                defaultOpt.selected = true;
            }
            periodeSelect.appendChild(defaultOpt);
            
            // Isi options berdasarkan jenis periode
            if (periodeOptions[jenis]) {
                periodeOptions[jenis].forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.textContent = opt.label;
                    if (opt.value === selectedPeriode) {
                        option.selected = true;
                    }
                    periodeSelect.appendChild(option);
                });
            }
        }
        
        // Pastikan tahun sesuai
        if (jenis !== 'semua' && selectedTahun === 'semua') {
            tahunSelect.value = '<?= date("Y") ?>';
        }
    }

    function submitForm() {
        console.log('Submitting form...');
        document.querySelector('form').submit();
    }

    jenisSelect.addEventListener('change', function() {
        console.log('Jenis periode changed:', this.value);
        updateFilterStates();
        
        // Untuk 'semua', langsung submit
        if (this.value === 'semua') {
            setTimeout(submitForm, 100);
        }
    });

    periodeSelect.addEventListener('change', function() {
        console.log('Periode changed:', this.value);
        if (this.value && !this.disabled && this.value !== 'semua') {
            setTimeout(submitForm, 100);
        }
    });

    tahunSelect.addEventListener('change', function() {
        console.log('Tahun changed:', this.value);
        if (!this.disabled) {
            setTimeout(submitForm, 100);
        }
    });

    // Inisialisasi pertama kali
    updateFilterStates();
    
    // Debug info
    console.log('Filter initialized:', {
        jenis: '<?= $jenis_periode ?>',
        periode: '<?= $periode_selected ?>', 
        tahun: '<?= $tahun_selected ?>'
    });
});

// Modal Detail Via (tetap sama seperti sebelumnya)
let detailViaChart = null;

function showViaDetail(viaName, index) {
    console.log('Loading detail untuk:', viaName, 'Index:', index);
    
    document.getElementById('detailViaTitle').textContent = 'Memuat Detail ' + viaName + '...';
    document.getElementById('detailStats').innerHTML = '<p class="text-sm text-muted">Memuat data statistik...</p>';
    
    resetModalData();
    
    const jenisPeriode = document.getElementById('jenis_periode').value;
    const periode = document.getElementById('periode').value;
    const tahun = document.getElementById('tahun').value;
    
    fetch(`<?= base_url('Monev_pengaduan/get_detail_via') ?>?jenis_periode=${jenisPeriode}&periode=${periode}&tahun=${tahun}&via_index=${index}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data diterima:', data);
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            if (!data.success) {
                throw new Error('Response tidak sukses');
            }
            
            updateModalWithData(data);
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorState(error.message);
        });
    
    const modal = new bootstrap.Modal(document.getElementById('detailViaModal'));
    modal.show();
}

function resetModalData() {
    document.getElementById('legendSelesai').textContent = '0';
    document.getElementById('legendProses').textContent = '0';
    document.getElementById('viaTotal').textContent = '0';
    
    safeDestroyChart();
}

function safeDestroyChart() {
    try {
        if (detailViaChart && typeof detailViaChart.destroy === 'function') {
            detailViaChart.destroy();
        }
    } catch (e) {
        console.log('No chart to destroy:', e.message);
    }
    detailViaChart = null;
}

// Di fungsi updateModalWithData - tambahkan update untuk Telah Disampaikan
function updateModalWithData(data) {
    console.log('Update modal dengan data:', data);
    
    document.getElementById('detailViaTitle').textContent = 'Detail - ' + data.via;
    
    updateDetailStats(data.statistik);
    updateDetailViaChart(data.via, data.distribusi);
}

function updateDetailStats(stats) {
    const statsHtml = `
        <div class="space-y-2">
            <div class="d-flex justify-content-between">
                <span class="text-sm">Total Permohonan:</span>
                <span class="text-sm font-weight-bold">${stats.total_permohonan}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Selesai:</span>
                <span class="text-sm font-weight-bold">${stats.terpenuhi}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Dalam Proses:</span>
                <span class="text-sm font-weight-bold">${stats.dalam_proses}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Telah Disampaikan:</span>
                <span class="text-sm font-weight-bold">${stats.telah_disampaikan}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Persentase Selesai:</span>
                <span class="text-sm font-weight-bold">${stats.persentase_terpenuhi}%</span>
            </div>
        </div>
    `;
    document.getElementById('detailStats').innerHTML = statsHtml;
}

function updateDetailViaChart(viaName, distribusi) {
    console.log('Update chart dengan distribusi:', distribusi);
    
    const ctx = document.getElementById('detailViaChart');
    if (!ctx) {
        console.error('Canvas element tidak ditemukan');
        return;
    }
    
    if (!distribusi) {
        console.error('Data distribusi tidak ada');
        return;
    }
    
    const dataValues = [
        distribusi.terpenuhi || 0,
        distribusi.dalam_proses || 0,
        distribusi.telah_diterima || 0  // TAMBAH INI
    ];
    
    const total = dataValues.reduce((a, b) => a + b, 0);
    
    console.log('Chart data:', dataValues, 'Total:', total);
    
    // Update legends untuk semua status
    document.getElementById('legendSelesai').textContent = distribusi.terpenuhi || 0;
    document.getElementById('legendProses').textContent = distribusi.dalam_proses || 0;
    document.getElementById('legendTelahDisampaikan').textContent = distribusi.telah_disampaikan || 0; // TAMBAH INI
    document.getElementById('viaTotal').textContent = total;
    
    if (total > 0) {
        const percentSelesai = Math.round((distribusi.terpenuhi / total) * 100);
        const percentProses = Math.round((distribusi.dalam_proses / total) * 100);
        const percentTelahDisampaikan = Math.round((distribusi.telah_disampaikan / total) * 100); // TAMBAH INI
        
        document.getElementById('progressSelesai').style.width = percentSelesai + '%';
        document.getElementById('progressProses').style.width = percentProses + '%';
        document.getElementById('progressTelahDisampaikan').style.width = percentTelahDisampaikan + '%'; // TAMBAH INI
        
        document.getElementById('percentSelesai').textContent = percentSelesai + '%';
        document.getElementById('percentProses').textContent = percentProses + '%';
        document.getElementById('percentTelahDisampaikan').textContent = percentTelahDisampaikan + '%'; // TAMBAH INI
    } else {
        ['Selesai', 'Proses', 'Telah Disampaikan'].forEach(type => { // UBAH INI
            document.getElementById('progress' + type).style.width = '0%';
            document.getElementById('percent' + type).textContent = '0%';
        });
    }
    
    safeDestroyChart();
    
    try {
        const context = ctx.getContext('2d');
        detailViaChart = new Chart(context, {
            type: 'doughnut',
            data: {
                labels: ['Selesai', 'Dalam Proses', 'Telah Disampaikan'], // UBAH INI
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['#1C6C8C', '#E1712C', '#3D8B37'], // UBAH INI
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverBorderWidth: 4,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });
        
        console.log('Chart berhasil dibuat');
    } catch (error) {
        console.error('Error creating chart:', error);
    }
}

function showErrorState(message) {
    document.getElementById('detailStats').innerHTML = 
        '<p class="text-sm text-danger">Error: ' + message + '</p>';
}

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('detailViaModal');
    if (modal) {
        modal.addEventListener('hidden.bs.modal', function() {
            safeDestroyChart();
        });
    }
});

// Shortcut Ctrl+P untuk print langsung
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'p') {
        e.preventDefault();
        window.print();
    }
});

// Handle page numbers untuk print
window.addEventListener('beforeprint', function() {
    document.querySelector('.page-number').textContent = '1';
});

// Tambahkan script ini di bagian script yang sudah ada
let afterPrint = function() {
    console.log('Print dibatalkan - resetting styles');
    
    // Method 1: Force re-render yang lebih efektif
    document.body.style.display = 'none';
    document.body.offsetHeight; // Trigger reflow
    document.body.style.display = 'block';
    
    // Method 2: Reset specific elements yang mungkin terpengaruh
    const floatingBtn = document.querySelector('.btn-print-floating');
    if (floatingBtn) {
        floatingBtn.style.cssText = '';
    }
    
    const printBtn = document.querySelector('.btn-print-floating .btn');
    if (printBtn) {
        printBtn.style.cssText = '';
    }
};

// Deteksi print events
if (window.matchMedia) {
    const mediaQueryList = window.matchMedia('print');
    mediaQueryList.addListener(function(mql) {
        if (!mql.matches) {
            setTimeout(afterPrint, 100);
        }
    });
}

window.onafterprint = afterPrint;

// Modal Detail Status Pemohon
let detailStatusChart = null;

function showStatusDetail(statusName, index) {
    console.log('Loading detail status untuk:', statusName, 'Index:', index);
    
    document.getElementById('detailStatusTitle').textContent = 'Memuat Detail ' + statusName + '...';
    document.getElementById('detailStatusStats').innerHTML = '<p class="text-sm text-muted">Memuat data statistik...</p>';
    
    resetStatusModalData();
    
    const jenisPeriode = document.getElementById('jenis_periode').value;
    const periode = document.getElementById('periode').value;
    const tahun = document.getElementById('tahun').value;
    
    fetch(`<?= base_url('Monev_pengaduan/get_detail_status_pengirim') ?>?jenis_periode=${jenisPeriode}&periode=${periode}&tahun=${tahun}&status_index=${index}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data status diterima:', data);
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            if (!data.success) {
                throw new Error('Response tidak sukses');
            }
            
            updateStatusModalWithData(data);
        })
        .catch(error => {
            console.error('Error:', error);
            showStatusErrorState(error.message);
        });
    
    const modal = new bootstrap.Modal(document.getElementById('detailStatusModal'));
    modal.show();
}

function resetStatusModalData() {
    document.getElementById('legendPelanggaran').textContent = '0';
    document.getElementById('legendPembangunan').textContent = '0';
    document.getElementById('statusTotal').textContent = '0';
    
    safeDestroyStatusChart();
}

function safeDestroyStatusChart() {
    try {
        if (detailStatusChart && typeof detailStatusChart.destroy === 'function') {
            detailStatusChart.destroy();
        }
    } catch (e) {
        console.log('No status chart to destroy:', e.message);
    }
    detailStatusChart = null;
}

function updateStatusModalWithData(data) {
    console.log('Update status modal dengan data:', data);
    
    document.getElementById('detailStatusTitle').textContent = 'Detail - ' + data.status_pengirim;
    
    updateStatusStats(data.statistik);
    updateStatusChart(data.status_pengirim, data.distribusi);
}

function updateStatusStats(stats) {
    const statsHtml = `
        <div class="space-y-2">
            <div class="d-flex justify-content-between">
                <span class="text-sm">Total Pengaduan:</span>
                <span class="text-sm font-weight-bold">${stats.total_permohonan}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Pelanggaran SDA:</span>
                <span class="text-sm font-weight-bold">${stats.pelanggaran_sda}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Pembangunan SDA:</span>
                <span class="text-sm font-weight-bold">${stats.pembangunan_sda}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Persentase Pelanggaran:</span>
                <span class="text-sm font-weight-bold">${stats.persentase_pelanggaran}%</span>
            </div>
        </div>
    `;
    document.getElementById('detailStatusStats').innerHTML = statsHtml;
}

function updateStatusChart(statusName, distribusi) {
    console.log('Update status chart dengan distribusi:', distribusi);
    
    const ctx = document.getElementById('detailStatusChart');
    if (!ctx) {
        console.error('Canvas element status tidak ditemukan');
        return;
    }
    
    if (!distribusi) {
        console.error('Data distribusi status tidak ada');
        return;
    }
    
    const dataValues = [
        distribusi.pelanggaran_sda || 0,
        distribusi.pembangunan_sda || 0
    ];
    
    const total = dataValues.reduce((a, b) => a + b, 0);
    
    console.log('Status chart data:', dataValues, 'Total:', total);
    
    // Update legends
    document.getElementById('legendPelanggaran').textContent = distribusi.pelanggaran_sda || 0;
    document.getElementById('legendPembangunan').textContent = distribusi.pembangunan_sda || 0;
    document.getElementById('statusTotal').textContent = total;
    
    if (total > 0) {
        const percentPelanggaran = Math.round((distribusi.pelanggaran_sda / total) * 100);
        const percentPembangunan = Math.round((distribusi.pembangunan_sda / total) * 100);
        
        document.getElementById('progressPelanggaran').style.width = percentPelanggaran + '%';
        document.getElementById('progressPembangunan').style.width = percentPembangunan + '%';
        
        document.getElementById('percentPelanggaran').textContent = percentPelanggaran + '%';
        document.getElementById('percentPembangunan').textContent = percentPembangunan + '%';
    } else {
        ['Pelanggaran', 'Pembangunan'].forEach(type => {
            document.getElementById('progress' + type).style.width = '0%';
            document.getElementById('percent' + type).textContent = '0%';
        });
    }
    
    safeDestroyStatusChart();
    
    try {
        const context = ctx.getContext('2d');
        detailStatusChart = new Chart(context, {
            type: 'doughnut',
            data: {
                labels: ['Pelanggaran SDA', 'Pembangunan SDA'],
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['#1C6C8C', '#E1712C'],
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverBorderWidth: 4,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });
        
        console.log('Status chart berhasil dibuat');
    } catch (error) {
        console.error('Error creating status chart:', error);
    }
}

function showStatusErrorState(message) {
    document.getElementById('detailStatusStats').innerHTML = 
        '<p class="text-sm text-danger">Error: ' + message + '</p>';
}

// Modal Detail Status Permohonan
let detailStatusPermohonanChart = null;

function showStatusPermohonanDetail(statusKey) {
    console.log('Loading detail status permohonan untuk:', statusKey);
    
    document.getElementById('detailStatusPermohonanTitle').textContent = 'Memuat Detail Status...';
    document.getElementById('detailStatusPermohonanStats').innerHTML = '<p class="text-sm text-muted">Memuat data statistik...</p>';
    
    resetStatusPermohonanModalData();
    
    const jenisPeriode = document.getElementById('jenis_periode').value;
    const periode = document.getElementById('periode').value;
    const tahun = document.getElementById('tahun').value;
    
    fetch(`<?= base_url('Monev_pengaduan/get_detail_status_permohonan') ?>?jenis_periode=${jenisPeriode}&periode=${periode}&tahun=${tahun}&status_key=${statusKey}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            console.log('Data status permohonan diterima:', data);
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            if (!data.success) {
                throw new Error('Response tidak sukses');
            }
            
            updateStatusPermohonanModalWithData(data);
        })
        .catch(error => {
            console.error('Error:', error);
            showStatusPermohonanErrorState(error.message);
        });
    
    const modal = new bootstrap.Modal(document.getElementById('detailStatusPermohonanModal'));
    modal.show();
}

function resetStatusPermohonanModalData() {
    document.getElementById('legendStatusPelanggaran').textContent = '0';
    document.getElementById('legendStatusPembangunan').textContent = '0';
    document.getElementById('statusPermohonanTotal').textContent = '0';
    
    safeDestroyStatusPermohonanChart();
}

function safeDestroyStatusPermohonanChart() {
    try {
        if (detailStatusPermohonanChart && typeof detailStatusPermohonanChart.destroy === 'function') {
            detailStatusPermohonanChart.destroy();
        }
    } catch (e) {
        console.log('No status permohonan chart to destroy:', e.message);
    }
    detailStatusPermohonanChart = null;
}

function updateStatusPermohonanModalWithData(data) {
    console.log('Update status permohonan modal dengan data:', data);
    
    document.getElementById('detailStatusPermohonanTitle').textContent = 'Detail - ' + data.status_permohonan;
    
    updateStatusPermohonanStats(data.statistik);
    updateStatusPermohonanChart(data.status_permohonan, data.distribusi);
}

function updateStatusPermohonanStats(stats) {
    const statsHtml = `
        <div class="space-y-2">
            <div class="d-flex justify-content-between">
                <span class="text-sm">Total Pengaduan:</span>
                <span class="text-sm font-weight-bold">${stats.total_permohonan}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Pelanggaran SDA:</span>
                <span class="text-sm font-weight-bold">${stats.pelanggaran_sda}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Pembangunan SDA:</span>
                <span class="text-sm font-weight-bold">${stats.pembangunan_sda}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Persentase Pelanggaran:</span>
                <span class="text-sm font-weight-bold">${stats.persentase_pelanggaran}%</span>
            </div>
        </div>
    `;
    document.getElementById('detailStatusPermohonanStats').innerHTML = statsHtml;
}

function updateStatusPermohonanChart(statusName, distribusi) {
    console.log('Update status permohonan chart dengan distribusi:', distribusi);
    
    const ctx = document.getElementById('detailStatusPermohonanChart');
    if (!ctx) {
        console.error('Canvas element status permohonan tidak ditemukan');
        return;
    }
    
    if (!distribusi) {
        console.error('Data distribusi status permohonan tidak ada');
        return;
    }
    
    const dataValues = [
        distribusi.pelanggaran_sda || 0,
        distribusi.pembangunan_sda || 0
    ];
    
    const total = dataValues.reduce((a, b) => a + b, 0);
    
    console.log('Status permohonan chart data:', dataValues, 'Total:', total);
    
    // Update legends
    document.getElementById('legendStatusPelanggaran').textContent = distribusi.pelanggaran_sda || 0;
    document.getElementById('legendStatusPembangunan').textContent = distribusi.pembangunan_sda || 0;
    document.getElementById('statusPermohonanTotal').textContent = total;
    
    if (total > 0) {
        const percentPelanggaran = Math.round((distribusi.pelanggaran_sda / total) * 100);
        const percentPembangunan = Math.round((distribusi.pembangunan_sda / total) * 100);
        
        document.getElementById('progressStatusPelanggaran').style.width = percentPelanggaran + '%';
        document.getElementById('progressStatusPembangunan').style.width = percentPembangunan + '%';
        
        document.getElementById('percentStatusPelanggaran').textContent = percentPelanggaran + '%';
        document.getElementById('percentStatusPembangunan').textContent = percentPembangunan + '%';
    } else {
        ['StatusPelanggaran', 'StatusPembangunan'].forEach(type => {
            document.getElementById('progress' + type).style.width = '0%';
            document.getElementById('percent' + type).textContent = '0%';
        });
    }
    
    safeDestroyStatusPermohonanChart();
    
    try {
        const context = ctx.getContext('2d');
        detailStatusPermohonanChart = new Chart(context, {
            type: 'doughnut',
            data: {
                labels: ['Pelanggaran SDA', 'Pembangunan SDA'],
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['#1C6C8C', '#E1712C'],
                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverBorderWidth: 4,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });
        
        console.log('Status permohonan chart berhasil dibuat');
    } catch (error) {
        console.error('Error creating status permohonan chart:', error);
    }
}

function showStatusPermohonanErrorState(message) {
    document.getElementById('detailStatusPermohonanStats').innerHTML = 
        '<p class="text-sm text-danger">Error: ' + message + '</p>';
}

// Event listener untuk modal status
document.addEventListener('DOMContentLoaded', function() {
    const statusModal = document.getElementById('detailStatusModal');
    if (statusModal) {
        statusModal.addEventListener('hidden.bs.modal', function() {
            safeDestroyStatusChart();
        });
    }
    
    const statusPermohonanModal = document.getElementById('detailStatusPermohonanModal');
    if (statusPermohonanModal) {
        statusPermohonanModal.addEventListener('hidden.bs.modal', function() {
            safeDestroyStatusPermohonanChart();
        });
    }
});

</script>
</body>
</html>