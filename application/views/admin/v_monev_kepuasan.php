<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/Template/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/Pictures/Logo_PU_(RGB).jpg">
  <title>Dashboard Kepuasan Masyarakat</title>
  
  <!-- Pilih SATU framework CSS saja -->
  <!-- Opsi 1: Soft UI Dashboard (Hapus Tailwind) -->
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
                  <span class="sidenav-normal"> Layanan Informasi </span>
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
            <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url('Monev_kepuasan'); ?>">
        <span class="sidenav-mini-icon"> M </span>
        <span class="sidenav-normal"> Monev Kepuasan Masyarakat</span>
    </a>
</li>  
            <li class="nav-item">
                <a class="nav-link" href="../../pages/dashboards/default.html">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Monev Permintaan Data</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../../pages/dashboards/automotive.html">
                  <span class="sidenav-mini-icon"> M </span>
                  <span class="sidenav-normal"> Monev Pengaduan </span>
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
            <a class="nav-link <?= ($this->uri->segment(2) == 'skm' ? 'active fw-bold text-dark' : '') ?>" 
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
            <!-- Hamburger Menu untuk Toggle Sidebar -->
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none me-2">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Monev</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kepuasan Masyarakat</li>
                </ol>
            </nav>

            <!-- Main Navbar Content -->
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                
                <!-- Form Filter Periode -->
<form method="GET" action="<?= site_url('monev_kepuasan') ?>" class="d-flex align-items-center gap-3 ms-auto me-3">
    <!-- Filter Controls -->
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

    <!-- Vertical Separator -->
    <div class="vr h-25 mx-2"></div>

</form>
                <!-- Right Side Navbar Items -->
                <ul class="navbar-nav justify-content-end">
                    <!-- Logout -->
                    <li class="nav-item d-flex align-items-center">
                        <a href="<?= base_url("Auth/logout");?>" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>

                    <!-- Mobile Sidenav Toggler -->
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

                    <!-- Settings -->
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
                        <!-- Judul -->
                        <div>
                            <h2 class="mb-1">Monev Kepuasan Masyarakat</h2>
                            <p class="mb-0 text-sm">Monitoring dan Evaluasi Survey Kepuasan Masyarakat</p>
                        </div>
                        
                        <!-- Label Periode -->
                        <div class="border-start ps-4 ms-4">
                            <div class="text-sm text-muted mb-1">Periode</div>
                            <div class="h5 fw-bold text-dark mb-0"><?= isset($periode_label) ? $periode_label : 'Semua Data' ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Top Cards - MENGGUNAKAN BOOTSTRAP GRID -->
      <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card custom-card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Nilai IKM</p>
                  <h4 class="font-weight-bolder mb-0">
                    <?= number_format($nilai_ikm, 2) ?>
                    <span class="text-success text-sm"><?= number_format($persentase_ikm, 2) ?>%</span>
                  </h4>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fas fa-chart-line text-lg opacity-10"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card custom-card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Grade Mutu</p>
                  <h4 class="font-weight-bolder mb-0">
                    <?= $grade_pkm ?>
                    <span class="text-success text-sm">
                      <?php
                      if($grade_pkm == 'A') echo 'SANGAT BAIK';
                      elseif($grade_pkm == 'B') echo 'BAIK';
                      elseif($grade_pkm == 'C') echo 'CUKUP';
                      else echo 'KURANG';
                      ?>
                    </span>
                  </h4>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
  <i class="fas fa-award text-lg text-white"></i>
</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card custom-card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Responden</p>
                  <h4 class="font-weight-bolder mb-0"><?= $total_responden ?></h4>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
  <i class="fas fa-users text-lg text-white"></i>
</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card custom-card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Jenis Kelamin</p>
                  <h4 class="font-weight-bolder mb-0">
                    <span class="text-success text-sm">Laki-Laki : <?= $jenis_kelamin['pria'] ?></span><br>
                    <span class="text-danger text-sm">Perempuan : <?= $jenis_kelamin['wanita'] ?></span>
                  </h4>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                    <i class="fas fa-venus-mars text-lg opacity-10"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="row mt-4">
<!-- Unsur Survey SKM -->
<div class="col-lg-6 mb-4">
  <div class="card h-100">
    <div class="card-header pb-0">
      <h6>Unsur Survey Kepuasan Masyarakat (SKM)</h6>
    </div>
    <div class="card-body p-3">
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 50px;">#</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Unsur SKM</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 80px;">Nilai</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 70px;">Mutu</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($unsur_skm)): ?>
              <?php foreach ($unsur_skm as $no => $item): ?>
              <tr style="cursor: pointer;" 
    onclick="showUnsurDetail('<?= $item['nama'] ?>', '<?= $no ?>')"
    title="Klik untuk lihat detail <?= $item['nama'] ?>">
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0"><?= $no + 1 ?></p>
    </td>
    <td class="ps-2">
        <p class="text-xs font-weight-bold mb-0">
            <?= $item['nama'] ?>
            <i class="fas fa-chart-pie ms-1 text-info clickable-icon" 
               title="Klik untuk grafik detail"></i>
        </p>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><?= number_format($item['nilai'], 2) ?></span>
    </td>
    <td class="align-middle text-center">
        <?php
        $grade = $item['grade'];
        $color = $grade == 'A' ? 'bg-gradient-success' : 
                ($grade == 'B' ? 'bg-gradient-warning' : 
                ($grade == 'C' ? 'bg-gradient-info' : 'bg-gradient-danger'));
        ?>
        <span class="badge badge-sm <?= $color ?>"><?= $grade ?></span>
    </td>
</tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center py-4"><p class="text-xs text-secondary mb-0">Belum ada data</p></td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Unsur SKM -->
<div class="modal fade" id="detailUnsurModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailUnsurTitle">Detail Unsur SKM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Grafik Donut -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="mb-0">Distribusi Penilaian</h6>
              </div>
              <div class="card-body">
                <div class="position-relative" style="height: 250px;">
                  <canvas id="detailDonutChart"></canvas>
                  <!-- Center Text -->
                  <div class="position-absolute top-50 start-50 translate-middle text-center">
                    <div class="h4 fw-bold text-dark mb-0" id="donutTotal">0</div>
                    <div class="text-xs text-muted">Total Responden</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Statistik & Legend -->
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-header">
                <h6 class="mb-0">Statistik & Keterangan</h6>
              </div>
              <div class="card-body">
                <!-- Statistik -->
                <div id="detailStats" class="mb-3">
                  <!-- Statistik akan diisi oleh JavaScript -->
                </div>
                
                <hr>
                
                <!-- Legend -->
                <div class="space-y-2">
                  <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                    <div class="d-flex align-items-center">
                      <span class="badge badge-dot bg-success me-2"></span>
                      <span class="text-sm font-weight-bold">Sangat Puas</span>
                    </div>
                    <span class="text-sm font-weight-bold" id="legendSangat">0</span>
                  </div>
                  
                  <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                    <div class="d-flex align-items-center">
                      <span class="badge badge-dot bg-warning me-2"></span>
                      <span class="text-sm font-weight-bold">Puas</span>
                    </div>
                    <span class="text-sm font-weight-bold" id="legendPuas">0</span>
                  </div>
                  
                  <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                    <div class="d-flex align-items-center">
                      <span class="badge badge-dot bg-orange me-2" style="background-color: #f97316 !important;"></span>
                      <span class="text-sm font-weight-bold">Cukup</span>
                    </div>
                    <span class="text-sm font-weight-bold" id="legendCukup">0</span>
                  </div>
                  
                  <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
                    <div class="d-flex align-items-center">
                      <span class="badge badge-dot bg-danger me-2"></span>
                      <span class="text-sm font-weight-bold">Kurang Puas</span>
                    </div>
                    <span class="text-sm font-weight-bold" id="legendKurang">0</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Komentar Responden -->
        <div class="row mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h6 class="mb-0">Komentar Responden</h6>
              </div>
              <div class="card-body">
                <div id="detailComments" style="max-height: 200px; overflow-y: auto;">
                  <!-- Komentar akan diisi oleh JavaScript -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

       <!-- Grafik Survey SKM - VERSI IMPROVED -->
<div class="col-lg-6 mb-4">
  <div class="card h-100">
    <div class="card-header pb-0">
      <h6>Grafik Survey Kepuasan Masyarakat (SKM)</h6>
    </div>
    <div class="card-body p-3">
      <?php 
      $total = $grafik_distribusi['sangat_sesuai'] + $grafik_distribusi['sesuai'] + 
               $grafik_distribusi['kurang_sesuai'] + $grafik_distribusi['tidak_sesuai'];
      ?>

      <?php if($total > 0): ?>
      <?php
        $sangat = ($grafik_distribusi['sangat_sesuai'] / $total) * 100;
        $sesuai = ($grafik_distribusi['sesuai'] / $total) * 100;
        $kurang = ($grafik_distribusi['kurang_sesuai'] / $total) * 100;
        $tidak = ($grafik_distribusi['tidak_sesuai'] / $total) * 100;
      ?>
      
      <div class="row align-items-center">
        <div class="col-md-6 text-center">
          <!-- Donut Chart dengan tooltip -->
          <div class="position-relative" style="height: 250px;">
            <canvas id="skmDonutChart"></canvas>
            <!-- Center Text -->
            <div class="position-absolute top-50 start-50 translate-middle text-center">
              <div class="h4 fw-bold text-dark mb-0"><?= $total ?></div>
              <div class="text-xs text-muted">Total Responden</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- Legend dengan progress bars -->
          <div class="space-y-3">
            <!-- Sangat Sesuai -->
            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
              <div class="d-flex align-items-center">
                <span class="badge badge-dot bg-success me-2"></span>
                <div>
                  <span class="text-sm font-weight-bold">Sangat Sesuai</span>
                  <br>
                  <small class="text-muted">4.00 - 3,5324</small>
                </div>
              </div>
              <div class="text-end">
                <span class="text-sm font-weight-bold d-block"><?= $grafik_distribusi['sangat_sesuai'] ?></span>
                <span class="text-xs text-muted"><?= round($sangat, 1) ?>%</span>
              </div>
            </div>

            <!-- Sesuai -->
            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
              <div class="d-flex align-items-center">
                <span class="badge badge-dot bg-warning me-2"></span>
                <div>
                  <span class="text-sm font-weight-bold">Sesuai</span>
                  <br>
                  <small class="text-muted">3,0644 - 3,532</small>
                </div>
              </div>
              <div class="text-end">
                <span class="text-sm font-weight-bold d-block"><?= $grafik_distribusi['sesuai'] ?></span>
                <span class="text-xs text-muted"><?= round($sesuai, 1) ?>%</span>
              </div>
            </div>

            <!-- Kurang Sesuai -->
            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
              <div class="d-flex align-items-center">
                <span class="badge badge-dot bg-orange me-2" style="background-color: #f97316 !important;"></span>
                <div>
                  <span class="text-sm font-weight-bold">Kurang Sesuai</span>
                  <br>
                  <small class="text-muted">2,60 - 3,064</small>
                </div>
              </div>
              <div class="text-end">
                <span class="text-sm font-weight-bold d-block"><?= $grafik_distribusi['kurang_sesuai'] ?></span>
                <span class="text-xs text-muted"><?= round($kurang, 1) ?>%</span>
              </div>
            </div>

            <!-- Tidak Sesuai -->
            <div class="d-flex justify-content-between align-items-center p-2 rounded hover-bg-light">
              <div class="d-flex align-items-center">
                <span class="badge badge-dot bg-danger me-2"></span>
                <div>
                  <span class="text-sm font-weight-bold">Tidak Sesuai</span>
                  <br>
                  <small class="text-muted">1,00 - 2,5996</small>
                </div>
              </div>
              <div class="text-end">
                <span class="text-sm font-weight-bold d-block"><?= $grafik_distribusi['tidak_sesuai'] ?></span>
                <span class="text-xs text-muted"><?= round($tidak, 1) ?>%</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Progress Bars Horizontal -->
      <div class="row mt-4">
        <div class="col-12">
          <div class="space-y-2">
            <div class="d-flex align-items-center">
              <span class="text-xs font-weight-bold me-2" style="width: 120px;">Sangat Sesuai</span>
              <div class="progress flex-grow-1" style="height: 8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $sangat ?>%"></div>
              </div>
              <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($sangat, 1) ?>%</span>
            </div>
            <div class="d-flex align-items-center">
              <span class="text-xs font-weight-bold me-2" style="width: 120px;">Sesuai</span>
              <div class="progress flex-grow-1" style="height: 8px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $sesuai ?>%"></div>
              </div>
              <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($sesuai, 1) ?>%</span>
            </div>
            <div class="d-flex align-items-center">
              <span class="text-xs font-weight-bold me-2" style="width: 120px;">Kurang Sesuai</span>
              <div class="progress flex-grow-1" style="height: 8px;">
                <div class="progress-bar bg-orange" role="progressbar" style="width: <?= $kurang ?>%"></div>
              </div>
              <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($kurang, 1) ?>%</span>
            </div>
            <div class="d-flex align-items-center">
              <span class="text-xs font-weight-bold me-2" style="width: 120px;">Tidak Sesuai</span>
              <div class="progress flex-grow-1" style="height: 8px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $tidak ?>%"></div>
              </div>
              <span class="text-xs font-weight-bold ms-2" style="width: 60px;"><?= round($tidak, 1) ?>%</span>
            </div>
          </div>
        </div>
      </div>

      <?php else: ?>
        <div class="text-center py-4">
          <i class="fas fa-chart-pie text-4xl text-gray-300 mb-3"></i>
          <p class="text-sm text-gray-500">Tidak ada data untuk periode <?= $periode_label ?> ini</p>
          <p class="text-xs text-gray-400">Silakan pilih periode lain</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

      <!-- Jenis Keperluan -->
      <div class="row mt-4">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Jenis Keperluan Kunjungan Masyarakat</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keperluan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Persentase</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($keperluan)): ?>
                      <?php foreach ($keperluan as $idx => $item): ?>
                      <tr>
                        <td><p class="text-xs font-weight-bold mb-0 ps-3"><?= $idx + 1 ?></p></td>
                        <td><p class="text-xs font-weight-bold mb-0"><?= $item['nama'] ?></p></td>
                        <td>
                          <div class="progress-wrapper w-100">
                            <div class="progress-info">
                              <div class="progress-percentage">
                                <span class="text-xs font-weight-bold"><?= $item['persen'] ?>%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <?php
                              $bar_color = $item['persen'] >= 80 ? 'bg-gradient-success' : 
                                          ($item['persen'] >= 60 ? 'bg-gradient-warning' : 'bg-gradient-info');
                              ?>
                              <div class="progress-bar <?= $bar_color ?>" style="width: <?= $item['persen'] ?>%"></div>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= $item['persen'] ?>%</span>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr><td colspan="4" class="text-center py-4"><p class="text-xs text-secondary mb-0">Belum ada data keperluan</p></td></tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer pt-3 no-print">
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
    </div>
  </main>

    <!-- Tombol Cetak Floating dengan Bootstrap Class -->
  <div class="position-fixed bottom-0 end-0 m-4 z-3 no-print btn-print-floating">
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
// Chart untuk Grafik SKM - VERSI IMPROVED
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('skmDonutChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Sangat Sesuai', 'Sesuai', 'Kurang Sesuai', 'Tidak Sesuai'],
                datasets: [{
                    data: [
                        <?= $grafik_distribusi['sangat_sesuai'] ?>,
                        <?= $grafik_distribusi['sesuai'] ?>,
                        <?= $grafik_distribusi['kurang_sesuai'] ?>,
                        <?= $grafik_distribusi['tidak_sesuai'] ?>
                    ],
                    backgroundColor: [
                        '#10b981', // green
                        '#fbbf24', // yellow
                        '#f97316', // orange
                        '#ef4444'  // red
                    ],
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
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} responden (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 2000,
                    easing: 'easeOutQuart'
                },
                elements: {
                    arc: {
                        borderWidth: 2
                    }
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
    
    periodeSelect.innerHTML = '<option value="">-- Pilih Periode --</option>';

    if (jenis === 'semua') {
        // NONAKTIFKAN KEDUA FILTER (periode dan tahun)
        periodeSelect.disabled = true;
        tahunSelect.disabled = true;
        // Set tahun ke "Semua Tahun" secara otomatis
        tahunSelect.value = 'semua';
    } else if (jenis === 'tahunan') {
        // NONAKTIFKAN HANYA FILTER PERIODE untuk tahunan
        periodeSelect.disabled = true;
        tahunSelect.disabled = false;
        // Set value periode ke 'tahunan' untuk backend
        const opt = document.createElement('option');
        opt.value = 'tahunan';
        opt.textContent = 'Tahunan';
        opt.selected = true;
        periodeSelect.appendChild(opt);
    } else {
        // AKTIFKAN KEDUA FILTER untuk jenis lainnya
        periodeSelect.disabled = false;
        tahunSelect.disabled = false;
        
        // Isi opsi periode berdasarkan jenis
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
}

// Event listener dengan auto-submit
jenisSelect.addEventListener('change', function() {
    updateFilterStates();
    // Auto-submit setelah update state
    setTimeout(() => {
        submitForm();
    }, 100);
});

periodeSelect.addEventListener('change', function() {
    if (this.value && !this.disabled) {
        submitForm();
    }
});

tahunSelect.addEventListener('change', function() {
    if (!this.disabled) {
        submitForm();
    }
});

function submitForm() {
    // Submit form ketika ada perubahan
    document.querySelector('form').submit();
}

// Inisialisasi pertama kali
updateFilterStates();
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

let detailDonutChart = null;

function showUnsurDetail(unsurName, index) {
    console.log('Clicked unsur:', unsurName, 'Index:', index);
    
    // Show loading state
    document.getElementById('detailUnsurTitle').textContent = 'Memuat Detail...';
    document.getElementById('detailStats').innerHTML = '<p class="text-sm text-muted">Memuat data...</p>';
    document.getElementById('detailComments').innerHTML = '<p class="text-sm text-muted">Memuat komentar...</p>';
    
    // Reset legend
    document.getElementById('legendSangat').textContent = '0';
    document.getElementById('legendPuas').textContent = '0';
    document.getElementById('legendCukup').textContent = '0';
    document.getElementById('legendKurang').textContent = '0';
    document.getElementById('donutTotal').textContent = '0';
    
    // Get current filter parameters
    const jenisPeriode = document.getElementById('jenis_periode').value;
    const periode = document.getElementById('periode').value;
    const tahun = document.getElementById('tahun').value;
    
    console.log('Filter params:', { jenisPeriode, periode, tahun });
    
    // AJAX call untuk get data real
    fetch(`<?= base_url('monev_kepuasan/get_detail_unsur') ?>?jenis_periode=${jenisPeriode}&periode=${periode}&tahun=${tahun}&unsur_index=${index}`)
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            
            if (data.error) {
                console.error('API Error:', data.error);
                alert('Error: ' + data.error);
                return;
            }
            
            // Update modal dengan data real
            updateModalWithRealData(data);
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            document.getElementById('detailStats').innerHTML = '<p class="text-sm text-danger">Gagal memuat data</p>';
            document.getElementById('detailComments').innerHTML = '<p class="text-sm text-danger">Error: ' + error.message + '</p>';
        });
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('detailUnsurModal'));
    modal.show();
}

function updateModalWithRealData(data) {
    console.log('Updating modal with:', data);
    
    // Set judul modal
    document.getElementById('detailUnsurTitle').textContent = 'Detail - ' + data.unsur;
    
    // Update statistik
    updateDetailStats(data.statistik);
    
    // Update komentar
    updateDetailComments(data.komentar);
    
    // Update grafik donut dan legend
    updateDetailDonutChart(data.unsur, data.distribusi);
}

function updateDetailStats(stats) {
    console.log('Updating stats:', stats);
    
    const statsHtml = `
        <div class="space-y-2">
            <div class="d-flex justify-content-between">
                <span class="text-sm">Rata-rata Nilai:</span>
                <span class="text-sm font-weight-bold">${stats.rata_rata}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Total Responden:</span>
                <span class="text-sm font-weight-bold">${stats.total_responden}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="text-sm">Grade:</span>
                <span class="text-sm font-weight-bold">${getGradeFromNilai(stats.rata_rata)}</span>
            </div>
        </div>
    `;
    document.getElementById('detailStats').innerHTML = statsHtml;
}

function updateDetailComments(comments) {
    console.log('Updating comments:', comments);
    
    let commentsHtml = '';
    
    if (comments && comments.length > 0) {
        comments.forEach(comment => {
            if (comment.kritik_saran && comment.kritik_saran.trim() !== '') {
                const nama = comment.nama || 'Anonim';
                const tanggal = comment.timestamp ? 
                    new Date(comment.timestamp).toLocaleDateString('id-ID') : 
                    'Tanggal tidak tersedia';
                    
                commentsHtml += `
                    <div class="border-bottom pb-2 mb-2">
                        <p class="text-sm mb-1">"${comment.kritik_saran}"</p>
                        <small class="text-muted">- ${nama}, ${tanggal}</small>
                    </div>
                `;
            }
        });
    }
    
    if (!commentsHtml) {
        commentsHtml = '<p class="text-sm text-muted">Tidak ada komentar untuk periode ini</p>';
    }
    
    document.getElementById('detailComments').innerHTML = commentsHtml;
}

function updateDetailDonutChart(unsurName, distribusi) {
    console.log('Updating chart with:', distribusi);
    
    const ctx = document.getElementById('detailDonutChart').getContext('2d');
    
    // Data untuk chart - pastikan formatnya array
    const dataValues = [
        distribusi.sangat_puas || 0,
        distribusi.puas || 0,
        distribusi.cukup || 0,
        distribusi.kurang_puas || 0
    ];
    
    const total = dataValues.reduce((a, b) => a + b, 0);
    
    console.log('Chart data values:', dataValues, 'Total:', total);
    
    // Update legend values
    document.getElementById('legendSangat').textContent = distribusi.sangat_puas || 0;
    document.getElementById('legendPuas').textContent = distribusi.puas || 0;
    document.getElementById('legendCukup').textContent = distribusi.cukup || 0;
    document.getElementById('legendKurang').textContent = distribusi.kurang_puas || 0;
    document.getElementById('donutTotal').textContent = total;
    
    // Destroy chart sebelumnya jika ada
    if (window.detailDonutChart) {
        window.detailDonutChart.destroy();
    }
    
    // Buat chart baru
    window.detailDonutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Sangat Puas', 'Puas', 'Cukup', 'Kurang Puas'],
            datasets: [{
                data: dataValues,
                backgroundColor: [
                    '#10b981', // green
                    '#fbbf24', // yellow
                    '#f97316', // orange
                    '#ef4444'  // red
                ],
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
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                            return `${label}: ${value} responden (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

</script>
</body>
</html>