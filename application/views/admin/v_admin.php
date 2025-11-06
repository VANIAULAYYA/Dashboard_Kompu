<!--
=========================================================
* Soft UI Dashboard 3 PRO - v1.2.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-dashboard-pro 
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/Template/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/Pictures/Logo_PU_(RGB).jpg">
  <title>
    Dashboard Lampu Petromak
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Nucleo Icons -->
  <link href="<?= base_url();?>assets/Template/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url();?>assets/Template/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url();?>assets/Template/assets/css/soft-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .custom-card {
      transition: all 0.3s ease;
      border: none;
      box-shadow: 0 4px 6px rgba(0,0,0,0.07);
    }
    .custom-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0,0,0,0.15);
    }
    .section-title {
      position: relative;
      padding-left: 15px;
      margin-bottom: 25px;
    }
    .section-title::before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 4px;
      height: 30px;
      background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
      border-radius: 2px;
    }
    .stat-card-link {
      text-decoration: none;
      display: block;
    }
    .icon-box {
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 12px;
      font-size: 24px;
    }
    @media print {
      .no-print { display: none !important; }
    }
  </style>

</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" <?php echo base_url('Admin'); ?>">
        <img src="<?= base_url();?>assets/Pictures/Logo_PU_(RGB).jpg" class="navbar-brand-img h-200" alt="main_logo">
        <span class="ms-1 font-weight-bold">Lampu Petromak</span> <br>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto">
      <ul class="navbar-nav">
        <li class="nav-item active">
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
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-sm shadow-sm border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <i class="far fa-folder-open" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Pelayanan</span>
          </a>
          <div class="collapse" id="dashboardsExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('Admin/rekap_tamu'); ?>">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal"> Rekap Buku Tamu </span>
                </a>
              </li>
              <li class="nav-item ">
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
          <div class="collapse" id="dashboardsExamples2">
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
             <li class="nav-item">
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

          <!-- Laporan PPID -->
          <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(2) == 'ppid' ? 'active fw-bold text-dark' : '') ?>" 
               href="<?= site_url('Laporan/ppid') ?>">
              <span class="nav-link-text ms-1">Laporan PPID</span>
            </a>
          </li>

          <!-- Laporan Kompu -->
          <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(2) == 'kompu' ? 'active fw-bold text-dark' : '') ?>" 
               href="<?= site_url('Laporan/kompu') ?>">
              <span class="nav-link-text ms-1">Laporan Kompu</span>
            </a>
          </li>

          <!-- Survei Kepuasan Masyarakat -->
          <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(1) == 'skm' ? 'active fw-bold text-dark' : '') ?>" 
               href="<?= site_url('Laporan/skm') ?>">
              <span class="nav-link-text ms-1">Survei Kepuasan Masyarakat</span>
            </a>
          </li>

        </ul>
      </div> <!-- Tutup collapse -->
    </li>
  </ul>
</div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
     <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none me-2 ">
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
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
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-1 fw-bold">Dashboard Monitoring & Evaluasi</h2>
            <p class="mb-0 text-sm text-muted">Overview semua layanan monitoring dan evaluasi</p>
          </div>
          <div class="text-end">
            <div class="text-sm text-muted mb-1">Periode</div>
            <div class="h5 fw-bold text-dark mb-0"><?= date('Y') ?></div> <!-- 🔹 hanya tahun -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

      <!-- KEPUASAN MASYARAKAT - TAHUN BERJALAN -->
<br>
      <div class="section-title">
  <h5 class="fw-bold text-dark mb-3">Kepuasan Masyarakat - <?= date('Y') ?></h5>
</div>
<div class="row mb-4">
  <!-- Card Total Responden -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_kepuasan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Responden</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= number_format($kepuasan_tahun_ini['total_responden']) ?>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-users text-white text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Card Nilai IKM -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_kepuasan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Nilai IKM</p>
              <h4 class="font-weight-bolder mb-0">
                <?= number_format($kepuasan_tahun_ini['nilai_ikm'], 2) ?>
                <span class="text-success text-sm"><?= number_format($kepuasan_tahun_ini['persentase_ikm'] ?? (($kepuasan_tahun_ini['nilai_ikm'] / 4) * 100), 2) ?>%</span>
              </h4>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-chart-line text-lg opacity-10 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Card Grade Mutu -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_kepuasan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Grade Mutu</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= substr($kepuasan_tahun_ini['grade_mutu'], 0, 1) ?>
                  <span class="text-success text-sm">
                    <?php
                    $grade = substr($kepuasan_tahun_ini['grade_mutu'], 0, 1);
                    if($grade == 'A') echo 'SANGAT BAIK';
                    elseif($grade == 'B') echo 'BAIK';
                    elseif($grade == 'C') echo 'CUKUP';
                    else echo 'KURANG';
                    ?>
                  </span>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="fas fa-award text-white text-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Tombol Lihat Detail -->
  <div class="col-12 mt-2 text-end">
    <a href="<?= base_url('Monev_kepuasan') ?>" class="btn btn-warning w-15 text-white fw-bold">
      <i class="fas fa-eye me-2"></i> LIHAT DETAIL
    </a>
  </div>
</div>

<!-- MONEV PERMINTAAN DATA -->
<div class="section-title">
  <h5 class="fw-bold text-dark mb-3">Permintaan Data - <?= date('Y') ?></h5>
</div>
<div class="row mb-4">
  <!-- Card Total Permohonan -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_permintaan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Permohonan</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= number_format($permintaan['total_permohonan'] ?? 0) ?>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-file-alt text-white text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Card Dalam Proses -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_permintaan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Dalam Proses</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= number_format($permintaan['dalam_proses'] ?? 0) ?>
                  <span class="text-success text-sm">
                    <?= $permintaan['persen_proses'] ?? 0 ?>%
                  </span>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="fas fa-clock text-white text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Card Dipenuhi -->
<div class="col-xl-4 col-md-6 mb-4">
  <a href="<?= base_url('Monev_permintaan') ?>" class="stat-card-link">
    <div class="card custom-card h-100">
      <div class="card-body p-3">
        <div class="row align-items-center h-100">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Dipenuhi</p>
              <h4 class="font-weight-bolder mb-0">
                <?= number_format($permintaan['dipenuhi'] ?? 0) ?>
                <span class="text-success text-sm">
                  <?= $permintaan['persen_dipenuhi'] ?? 0 ?>%
                </span>
              </h4>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fas fa-check-circle text-white text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>

  <!-- Tombol Lihat Detail -->
  <div class="col-12 mt-2 text-end">
    <a href="<?= base_url('Monev_permintaan') ?>" class="btn btn-warning w-15 text-white fw-bold">
      <i class="fas fa-eye me-2"></i> LIHAT DETAIL
    </a>
  </div>
</div>

<!-- MONEV PENGADUAN -->
<div class="section-title">
  <h5 class="fw-bold text-dark mb-3">Pengaduan - <?= date('Y') ?></h5>
</div>
<div class="row mb-4">
  <!-- Card Total Pengaduan -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_pengaduan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Total Pengaduan</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= number_format($pengaduan['total_pengaduan'] ?? 0) ?>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-file-alt text-white text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Card Dalam Proses -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_pengaduan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Dalam Proses</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= number_format($pengaduan['dalam_proses'] ?? 0) ?>
                  <span class="text-success text-sm">
                    <?= $pengaduan['persen_proses'] ?? 0 ?>%
                  </span>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="fas fa-clock text-white text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Card Selesai -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('Monev_pengaduan') ?>" class="stat-card-link">
      <div class="card custom-card h-100">
        <div class="card-body p-3">
          <div class="row align-items-center h-100">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Selesai</p>
                <h4 class="font-weight-bolder mb-0">
                  <?= number_format($pengaduan['selesai'] ?? 0) ?>
                  <span class="text-success text-sm">
                    <?= $pengaduan['persen_selesai'] ?? 0 ?>%
                  </span>
                </h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="fas fa-check-circle text-white text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <!-- Tombol Lihat Detail -->
  <div class="col-12 mt-2 text-end">
    <a href="<?= base_url('Monev_pengaduan') ?>" class="btn btn-warning w-15 text-white fw-bold">
      <i class="fas fa-eye me-2"></i> LIHAT DETAIL
    </a>
  </div>
</div>

<!-- FOOTER -->
<footer class="footer pt-2 no-print"> <!-- 🔽 dari pt-3 jadi pt-2 -->
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-3">
        <div class="copyright text-center text-sm text-muted text-lg-start" style="line-height:1.3;"> <!-- 🔽 line spacing dirapatkan -->
          © <script>document.write(new Date().getFullYear())</script>, made by KOMPU BBWS BRANTAS
          <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">IT Tim</a>
        </div>
      </div>
    </div>
  </div>
</footer>

  <!-- Scripts -->
  <script src="<?= base_url();?>assets/Template/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/soft-ui-dashboard.min.js?v=1.2.0"></script>

  <script>
    // Smooth scroll behavior
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // Card animation on load
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.custom-card');
      cards.forEach((card, index) => {
        setTimeout(() => {
          card.style.opacity = '0';
          card.style.transform = 'translateY(20px)';
          card.style.transition = 'all 0.5s ease';
          
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          }, 50);
        }, index * 50);
      });
    });
  </script>
</body>
</html>