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
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-sm shadow-sm border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <i class="far fa-folder-open" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Pelayanan</span>
          </a>
          <div class="collapse show" id="dashboardsExamples">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item active">
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
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pelayanan</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Rekap Buku Tamu</li>
      </ol>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      
      <!-- ✅ FORM FILTER PERIODE - TARUH DI SINI -->
      <form method="GET" action="<?= site_url('Admin/rekap_tamu_filter') ?>" class="d-flex align-items-center gap-3 ms-auto me-3" id="filterForm">
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
            <!-- Options akan diisi oleh JavaScript -->
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

    <!-- HAPUS BUTTON FILTER DAN VERTICAL SEPARATOR -->
</form>
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

    <!-- End Navbar -->
     <div id="divTabel">
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div>
            <h5 class="mb-0">Rekap Buku Tamu</h5>
            <p class="text-sm mb-0">Daftar Kunjungan Tamu di BBWS Brantas</p>
            </div>
              <!-- ✅ LABEL PERIODE DI SEBELAH KANAN -->
              <div class="border-start ps-4 ms-4">
                <div class="text-sm text-muted mb-1">Periode</div>
                <div class="h5 fw-bold text-dark mb-0"><?= isset($periode_label) ? $periode_label : 'Semua Data' ?></div>
              </div>
            </div>
            
            <!-- TOMBOL TAMBAH DAN CETAK -->
<div class="d-flex gap-2 mt-3">
  <button type="button" class="btn btn-primary btn-sm" id="btnTambah">
    <i class="fa fa-plus"></i> Tambah Data
  </button>
  <button type="button" class="btn btn-info btn-sm" onclick="exportExcelRekapTamu()">
    <i class="fas fa-file-excel"></i> Export Excel
  </button>
</div>
           <!-- Tombol Floating untuk Rekap Tamu -->
<div class="position-fixed bottom-0 end-0 m-4 z-3">
  <button type="button" class="btn btn-primary btn-lg shadow rounded-pill" onclick="cetakSemuaDataRekapTamu()">
    <i class="fas fa-print me-2"></i>
    Cetak Semua Data
  </button>
</div>
          </div>
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Asal Instansi</th>
                  <th>No. Telp</th>
                  <th>Keperluan</th>
                  <th>Kritik Saran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($tamu as $t): ?>
                <tr>
                  <td class="text-sm font-weight-normal"><?= $no++; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->nama; ?></td>
                  <td class="text-sm font-weight-normal"><?= ($t->jenis_kelamin=="L") ? "Laki-Laki":"Perempuan"; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->asal_instansi; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->no_handphone; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->keperluan; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->kritik_saran; ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm btnEdit"
                      data-id="<?= $t->id ?>"
                      data-nama="<?= htmlspecialchars($t->nama,ENT_QUOTES) ?>"
                      data-jenis="<?= htmlspecialchars($t->jenis_kelamin,ENT_QUOTES) ?>"
                      data-instansi="<?= htmlspecialchars($t->asal_instansi,ENT_QUOTES) ?>"
                      data-telp="<?= htmlspecialchars($t->no_handphone,ENT_QUOTES) ?>"
                      data-keperluan="<?= htmlspecialchars($t->keperluan,ENT_QUOTES) ?>"
                      data-kritik="<?= htmlspecialchars($t->kritik_saran,ENT_QUOTES) ?>">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#confirmDeleteModal"
                      data-delete-url="<?= site_url('Admin/delete_tamu/'.$t->id) ?>">
                      Delete
                    </button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made by KOMPU BBWS BRANTAS
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">IT Tim</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
     </div>

    <!-- Form Tambah -->
<div id="divForm" style="display:none;">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header"><h5 class="mb-0">Tambah Tamu</h5></div>
        <div class="card-body p-4">
          <form action="<?= site_url('Admin/simpan_tamu') ?>" method="post">
            
            <div class="mb-3">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama tamu">
            </div>

            <div class="mb-3">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Asal Instansi/Pribadi</label>
              <input type="text" name="asal_instansi" class="form-control" placeholder="Masukkan asal instansi/pribadi tamu">
            </div>

            <div class="mb-3">
              <label>No. Handphone yang bisa dihubungi</label>
              <input type="text" name="no_handphone" class="form-control" placeholder="Masukkan no. handphone tamu">
            </div>

            <div class="mb-3">
              <label>Keperluan</label>
              <select id="keperluanSelect" class="form-select" required onchange="toggleKeteranganLainnya()">
                <option value="">-- Pilih Keperluan --</option>
                <option value="Menemui Pejabat/Staff">Menemui Pejabat/Staff</option>
                <option value="Rekomendasi Teknis (Rekomtek)">Rekomendasi Teknis (Rekomtek)</option>
                <option value="Kirim Surat (Promosi/Aduan/Temuan)">Kirim Surat (Promosi/Aduan/Temuan)</option>
                <option value="Permintaan Data/Informasi">Permintaan Data/Informasi</option>
                <option value="other">Lainnya</option>
              </select>
              <!-- Input hidden untuk keperluan yang akan disimpan ke database -->
              <input type="hidden" name="keperluan" id="keperluanActual">
            </div>

            <!-- Form Keterangan Lainnya (Awalnya Disembunyikan) -->
            <div class="mb-3" id="keteranganLainnyaGroup" style="display: none;">
              <label>Keterangan Keperluan Lainnya</label>
              <input type="text" id="keteranganLainnya" class="form-control" placeholder="Silakan jelaskan keperluan lainnya...">
              <small class="text-muted">Mohon diisi untuk keperluan selain yang tersedia di atas</small>
            </div>

            <div class="mb-3">
              <label>Kritik dan Saran Perbaikan</label>
              <textarea name="kritik_saran" class="form-control" placeholder="Isi kritik atau saran tamu"></textarea>
            </div>

            <div class="text-end">
              <button type="button" class="btn btn-secondary" id="btnKembali">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Form Edit -->
<div id="divFormEdit" style="display:none;">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header"><h5 class="mb-0">Edit Tamu</h5></div>
        <div class="card-body p-4">
          <form action="<?= site_url('Admin/update_tamu') ?>" method="post">
            <input type="hidden" name="id" id="edit_id">

            <div class="mb-3">
              <label>Nama</label>
              <input type="text" name="nama" id="edit_nama" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" id="edit_jenis" class="form-select" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Asal Instansi/Pribadi</label>
              <input type="text" name="asal_instansi" id="edit_instansi" class="form-control">
            </div>

            <div class="mb-3">
              <label>No. Handphone yang bisa dihubungi</label>
              <input type="text" name="no_handphone" id="edit_telp" class="form-control">
            </div>

            <div class="mb-3">
              <label>Keperluan</label>
              <select id="edit_keperluanSelect" class="form-select" required onchange="toggleKeteranganLainnyaEdit()">
                <option value="">-- Pilih Keperluan --</option>
                <option value="Menemui Pejabat/Staff">Menemui Pejabat/Staff</option>
                <option value="Rekomendasi Teknis (Rekomtek)">Rekomendasi Teknis (Rekomtek)</option>
                <option value="Kirim Surat (Promosi/Aduan/Temuan)">Kirim Surat (Promosi/Aduan/Temuan)</option>
                <option value="Permintaan Data/Informasi">Permintaan Data/Informasi</option>
                <option value="other">Lainnya</option>
              </select>
              <!-- Input hidden untuk keperluan yang akan disimpan ke database -->
              <input type="hidden" name="keperluan" id="edit_keperluanActual">
            </div>

            <!-- Form Keterangan Lainnya untuk Edit -->
            <div class="mb-3" id="edit_keteranganLainnyaGroup" style="display: none;">
              <label>Keterangan Keperluan Lainnya</label>
              <input type="text" id="edit_keteranganLainnya" class="form-control" placeholder="Silakan jelaskan keperluan lainnya...">
              <small class="text-muted">Mohon diisi untuk keperluan selain yang tersedia di atas</small>
            </div>

            <div class="mb-3">
              <label>Kritik dan Saran Perbaikan</label>
              <textarea name="kritik_saran" id="edit_kritik" class="form-control"></textarea>
            </div>

            <div class="text-end">
              <button type="button" class="btn btn-secondary" id="btnKembaliEdit">Kembali</button>
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal konfirmasi delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Penghapusan Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a id="deleteButton" href="#" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Script -->
<script>

  // Function untuk cetak semua data REKAP TAMU
function cetakSemuaDataRekapTamu() {
    const jenisPeriode = document.getElementById('jenis_periode').value;
    const periode = document.getElementById('periode').value;
    const tahun = document.getElementById('tahun').value;
    
    let url = '<?= site_url("Admin/export_rekap_tamu") ?>'; // GANTI CONTROLLER
    url += `?jenis_periode=${jenisPeriode}&tahun=${tahun}`;
    
    if (periode && jenisPeriode !== 'semua' && jenisPeriode !== 'tahunan') {
        url += `&periode=${periode}`;
    }
    
    window.open(url, '_blank');
}

// Function untuk export Excel REKAP TAMU
function exportExcelRekapTamu() {
    const jenisPeriode = document.getElementById('jenis_periode').value;
    const periode = document.getElementById('periode').value;
    const tahun = document.getElementById('tahun').value;
    
    let url = '<?= site_url("Admin/export_excel_rekap_tamu") ?>'; // GANTI CONTROLLER
    url += `?jenis_periode=${jenisPeriode}&tahun=${tahun}`;
    
    if (periode && jenisPeriode !== 'semua' && jenisPeriode !== 'tahunan') {
        url += `&periode=${periode}`;
    }
    
    window.location.href = url;
}

// ========== EVENT LISTENERS ==========

document.addEventListener('DOMContentLoaded', function() {
    // Tombol Cetak Semua Data
    const btnCetakSemua = document.getElementById('btnCetakSemua');
    if (btnCetakSemua) {
        btnCetakSemua.addEventListener('click', cetakSemuaData);
    }

    // Tombol Export Excel
    const btnExportExcel = document.getElementById('btnExportExcel');
    if (btnExportExcel) {
        btnExportExcel.addEventListener('click', exportExcel);
    }

    // Tombol Tambah
    const btnTambah = document.getElementById("btnTambah");
    if (btnTambah) {
        btnTambah.addEventListener("click", function(){
            console.log('🎯 Tombol Tambah DIKLIK!');
            document.getElementById("divTabel").style.display = "none";
            document.getElementById("divForm").style.display = "block";
            document.getElementById("divFormEdit").style.display = "none";
            
            resetFormTambah();
        });
    }

    // Tombol Kembali Form Tambah
    const btnKembali = document.getElementById("btnKembali");
    if (btnKembali) {
        btnKembali.addEventListener("click", function () {
            console.log('Tombol Kembali Tambah diklik');
            document.getElementById("divForm").style.display = "none";
            document.getElementById("divTabel").style.display = "block";
        });
    }

    // Tombol Kembali Form Edit
    const btnKembaliEdit = document.getElementById("btnKembaliEdit");
    if (btnKembaliEdit) {
        btnKembaliEdit.addEventListener("click", function(){
            console.log('Tombol Kembali Edit diklik');
            document.getElementById("divFormEdit").style.display = "none";
            document.getElementById("divTabel").style.display = "block";
        });
    }

    // Modal delete
    const confirmDeleteModal = document.getElementById('confirmDeleteModal');
    if (confirmDeleteModal) {
        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const deleteUrl = button.getAttribute('data-delete-url');
            document.getElementById('deleteButton').href = deleteUrl;
        });
    }
});


  // Tambah
  document.getElementById("btnTambah").addEventListener("click", function(){
    document.getElementById("divTabel").style.display = "none";
    document.getElementById("divForm").style.display = "block";
    document.getElementById("divFormEdit").style.display = "none";
  });
  document.getElementById("btnKembali").addEventListener("click", function(){
    document.getElementById("divForm").style.display = "none";
    document.getElementById("divTabel").style.display = "block";
  });

  // Edit - VERSI DIPERBAIKI
  document.addEventListener("click", function(e){
    const btn = e.target.closest(".btnEdit");
    if (!btn) return;
    
    // Sembunyikan semua div, tampilkan form edit
    document.getElementById("divTabel").style.display = "none";
    document.getElementById("divForm").style.display = "none";
    document.getElementById("divFormEdit").style.display = "block";

    // Buat object data dari dataset
    const data = {
      id: btn.dataset.id,
      nama: btn.dataset.nama,
      jenis_kelamin: btn.dataset.jenis,
      asal_instansi: btn.dataset.instansi,
      no_handphone: btn.dataset.telp,
      keperluan: btn.dataset.keperluan,
      kritik_saran: btn.dataset.kritik
    };

    console.log('Data dari button:', data); // Debug

    // Gunakan fungsi fillEditForm yang sudah dibuat
    fillEditForm(data);
  });

  document.getElementById("btnKembaliEdit").addEventListener("click", function(){
    document.getElementById("divFormEdit").style.display = "none";
    document.getElementById("divTabel").style.display = "block";
  });

  // Delete
  const deleteModal = document.getElementById('confirmDeleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const url = button.getAttribute('data-delete-url');
    document.getElementById('deleteButton').setAttribute('href', url);
  });

  // Placeholder behavior
  document.querySelectorAll("input, textarea").forEach(function(el){
    el.addEventListener("focus", function(){
      this.dataset.placeholder = this.placeholder;
      this.placeholder = "";
    });
    el.addEventListener("blur", function(){
      if(this.value === ""){
        this.placeholder = this.dataset.placeholder;
      }
    });
  });
</script>

  </main>
  <div class="fixed-plugin">
    <div class="card shadow-lg blur">
      <div class="card-header pb-0 pt-3  bg-transparent ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn btn-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark mb-1 d-xl-block d-none">
        <div class="mt-2 d-xl-block d-none">
          <h6 class="mb-0">Sidenav Mini</h6>
        </div>
        <div class="form-check form-switch ps-0 d-xl-block d-none">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
        </div>
        <hr class="horizontal dark mb-1 d-xl-block d-none">
        <div class="mt-2 d-xl-block d-none">
          <h6 class="mb-0">Light/Dark</h6>
        </div>
        <div class="form-check form-switch ps-0 d-xl-block d-none">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">Buy now</a>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free demo</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/ct-soft-ui-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20PRO%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url();?>assets/Template/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/datatables.js"></script>
  <!-- Kanban scripts -->
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/threejs.js"></script>
  <script src="<?= base_url();?>assets/Template/assets/js/plugins/orbit-controls.js"></script>
  <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // Event listener hanya untuk tombol floating
document.addEventListener('DOMContentLoaded', function() {
    // Tombol Cetak Semua Data (floating)
    const btnCetakSemuaFloating = document.getElementById('btnCetakSemuaFloating');
    if (btnCetakSemuaFloating) {
        btnCetakSemuaFloating.addEventListener('click', cetakSemuaData);
    }

    // Tombol Export Excel
    const btnExportExcel = document.getElementById('btnExportExcel');
    if (btnExportExcel) {
        btnExportExcel.addEventListener('click', exportExcel);
    }
});
  </script>

  <script>
function toggleKeteranganLainnya() {
  const keperluanSelect = document.getElementById('keperluanSelect');
  const keteranganGroup = document.getElementById('keteranganLainnyaGroup');
  const keteranganInput = document.getElementById('keteranganLainnya');
  const keperluanActual = document.getElementById('keperluanActual');
  
  if (keperluanSelect.value === 'other') {
    // Tampilkan form keterangan
    keteranganGroup.style.display = 'block';
    keteranganInput.required = true;
    // Reset nilai actual
    keperluanActual.value = '';
  } else {
    // Sembunyikan form keterangan
    keteranganGroup.style.display = 'none';
    keteranganInput.required = false;
    keteranganInput.value = ''; // Kosongkan input
    // Set nilai actual dari dropdown
    keperluanActual.value = keperluanSelect.value;
  }
}

// Update nilai actual ketika user mengetik di keterangan lainnya
document.getElementById('keteranganLainnya').addEventListener('input', function(e) {
  const keperluanActual = document.getElementById('keperluanActual');
  keperluanActual.value = e.target.value.trim();
});

// Validasi form sebelum submit
document.querySelector('form').addEventListener('submit', function(e) {
  const keperluanSelect = document.getElementById('keperluanSelect');
  const keteranganInput = document.getElementById('keteranganLainnya');
  const keperluanActual = document.getElementById('keperluanActual');
  
  if (keperluanSelect.value === 'other') {
    if (!keteranganInput.value.trim()) {
      e.preventDefault();
      alert('Mohon isi keterangan keperluan lainnya');
      keteranganInput.focus();
      return;
    }
    // Pastikan nilai actual sudah terisi dengan input user
    keperluanActual.value = keteranganInput.value.trim();
  } else {
    // Pastikan nilai actual dari dropdown
    keperluanActual.value = keperluanSelect.value;
  }
  
  console.log('Data yang akan dikirim ke database:', keperluanActual.value);
});

// Inisialisasi saat pertama kali load
document.addEventListener('DOMContentLoaded', function() {
  const keperluanSelect = document.getElementById('keperluanSelect');
  const keperluanActual = document.getElementById('keperluanActual');
  // Set nilai default
  if (keperluanSelect.value && keperluanSelect.value !== 'other') {
    keperluanActual.value = keperluanSelect.value;
  }
});
</script>
<script>
// Fungsi untuk form edit
function toggleKeteranganLainnyaEdit() {
  const keperluanSelect = document.getElementById('edit_keperluanSelect');
  const keteranganGroup = document.getElementById('edit_keteranganLainnyaGroup');
  const keteranganInput = document.getElementById('edit_keteranganLainnya');
  const keperluanActual = document.getElementById('edit_keperluanActual');
  
  if (keperluanSelect.value === 'other') {
    // Tampilkan form keterangan
    keteranganGroup.style.display = 'block';
    keteranganInput.required = true;
  } else {
    // Sembunyikan form keterangan
    keteranganGroup.style.display = 'none';
    keteranganInput.required = false;
    keteranganInput.value = ''; // Kosongkan input
    // Set nilai actual dari dropdown
    keperluanActual.value = keperluanSelect.value;
  }
}

// Update nilai actual ketika user mengetik di keterangan lainnya (edit)
document.getElementById('edit_keteranganLainnya').addEventListener('input', function(e) {
  const keperluanActual = document.getElementById('edit_keperluanActual');
  keperluanActual.value = e.target.value.trim();
});

// Validasi form edit sebelum submit
document.querySelector('#divFormEdit form').addEventListener('submit', function(e) {
  const keperluanSelect = document.getElementById('edit_keperluanSelect');
  const keteranganInput = document.getElementById('edit_keteranganLainnya');
  const keperluanActual = document.getElementById('edit_keperluanActual');
  
  if (keperluanSelect.value === 'other') {
    if (!keteranganInput.value.trim()) {
      e.preventDefault();
      alert('Mohon isi keterangan keperluan lainnya');
      keteranganInput.focus();
      return;
    }
    // Pastikan nilai actual sudah terisi dengan input user
    keperluanActual.value = keteranganInput.value.trim();
  } else {
    // Pastikan nilai actual dari dropdown
    keperluanActual.value = keperluanSelect.value;
  }
  
  console.log('Data keperluan yang akan diupdate:', keperluanActual.value);
});

// Fungsi untuk mengisi form edit dengan data yang ada - VERSI PERBAIKI
function fillEditForm(data) {
  console.log('Mengisi form edit dengan data:', data);
  
  document.getElementById('edit_id').value = data.id;
  document.getElementById('edit_nama').value = data.nama;
  document.getElementById('edit_jenis').value = data.jenis_kelamin;
  document.getElementById('edit_instansi').value = data.asal_instansi || '';
  document.getElementById('edit_telp').value = data.no_handphone || '';
  document.getElementById('edit_kritik').value = data.kritik_saran || '';
  
  const keperluanSelect = document.getElementById('edit_keperluanSelect');
  const keperluanActual = document.getElementById('edit_keperluanActual');
  const keteranganGroup = document.getElementById('edit_keteranganLainnyaGroup');
  const keteranganInput = document.getElementById('edit_keteranganLainnya');
  
  // Daftar keperluan utama yang tersedia di dropdown
  const keperluanUtama = [
    'Menemui Pejabat/Staff',
    'Rekomendasi Teknis (Rekomtek)',
    'Kirim Surat (Promosi/Aduan/Temuan)',
    'Permintaan Data/Informasi'
  ];
  
  // Reset dulu
  keperluanSelect.value = '';
  keteranganGroup.style.display = 'none';
  keteranganInput.value = '';
  keteranganInput.required = false;
  
  // Cek apakah keperluan ada di daftar utama
  if (keperluanUtama.includes(data.keperluan)) {
    // Jika termasuk keperluan utama, pilih dari dropdown
    keperluanSelect.value = data.keperluan;
    keperluanActual.value = data.keperluan;
    console.log('Keperluan utama dipilih:', data.keperluan);
  } else {
    // Jika bukan keperluan utama, pilih "Lainnya" dan isi keterangan
    keperluanSelect.value = 'other';
    keperluanActual.value = data.keperluan;
    keteranganGroup.style.display = 'block';
    keteranganInput.value = data.keperluan;
    keteranganInput.required = true;
    console.log('Keperluan custom dipilih:', data.keperluan);
  }
}

// Event listener untuk form edit
document.addEventListener('DOMContentLoaded', function() {
  // Inisialisasi form edit
  const editKeperluanSelect = document.getElementById('edit_keperluanSelect');
  const editKeperluanActual = document.getElementById('edit_keperluanActual');
  
  if (editKeperluanSelect.value && editKeperluanSelect.value !== 'other') {
    editKeperluanActual.value = editKeperluanSelect.value;
  }
});

// Fungsi untuk membuka form edit (pastikan ini dipanggil dari tombol edit)
function openEditForm(data) {
  fillEditForm(data);
  document.getElementById('divFormEdit').style.display = 'block';
  document.getElementById('divTable').style.display = 'none';
}
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url();?>assets/Template/assets/js/soft-ui-dashboard.min.js?v=1.2.0"></script>

  <script>
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

// Inisialisasi filter dengan AUTO SUBMIT
document.addEventListener('DOMContentLoaded', function() {
    const tahunSelect = document.getElementById('tahun');
    const jenisSelect = document.getElementById('jenis_periode');
    const periodeSelect = document.getElementById('periode');
    const filterForm = document.getElementById('filterForm');

    function updateFilterStates() {
        const jenis = jenisSelect.value;
        const selectedPeriode = '<?= $periode_selected ?>';
        
        periodeSelect.innerHTML = '<option value="">-- Pilih Periode --</option>';

        if (jenis === 'semua') {
            periodeSelect.disabled = true;
            tahunSelect.disabled = true;
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

    // AUTO SUBMIT ketika ada perubahan
    function autoSubmit() {
        // Submit form setelah perubahan
        setTimeout(() => {
            filterForm.submit();
        }, 100);
    }

    // Event listener dengan auto-submit
    jenisSelect.addEventListener('change', function() {
        updateFilterStates();
        autoSubmit();
    });

    periodeSelect.addEventListener('change', function() {
        if (this.value && !this.disabled) {
            autoSubmit();
        }
    });

    tahunSelect.addEventListener('change', function() {
        if (!this.disabled) {
            autoSubmit();
        }
    });

    // Inisialisasi pertama kali
    updateFilterStates();
});
</script>

</body>

</html>