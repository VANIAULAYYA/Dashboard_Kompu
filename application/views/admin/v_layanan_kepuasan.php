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
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Admin/rekap_tamu'); ?>">
                  <span class="sidenav-mini-icon"> R </span>
                  <span class="sidenav-normal"> Rekap Buku Tamu </span>
                </a>
              </li>
              <li class="nav-item active">
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
                <a class="nav-link" href="<?= base_url('Monev'); ?>">
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Default</li>
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
    <!-- End Navbar -->
     <div id="divTabel">
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Layanan Kepuasan Masyarakat</h5>
            <p class="text-sm mb-0">Daftar Layanan Kepuasan Masyarakat di BBWS Brantas</p>
            <button type="button" class="btn btn-primary btn-sm mt-4" id="btnTambah">
              <i class="fa fa-plus"></i> Tambah Data
            </button>
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
                  <th>Persyaratan</th>
                  <th>Prosedur</th>
                  <th>Kecepatan Waktu</th>
                  <th>Biaya/Tarif</th>
                  <th>Kesesuaian Produk Pelayanan</th>
                  <th>Kompetensi Petugas</th>
                  <th>Perilaku Petugas</th>
                  <th>Penanganan Pengaduan</th>
                  <th>Kualitas Sarana Prasarana</th>
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
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_pelayanan; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pemahaman_prosedur; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_kecepatan; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_biaya; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_produk; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_kompetensi; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_perilaku; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_pengaduan; ?></td>
                  <td class="text-sm font-weight-normal"><?= $t->pendapat_kualitas; ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm btnEdit"
                      data-id="<?= $t->id ?>"
                      data-nama="<?= htmlspecialchars($t->nama,ENT_QUOTES) ?>"
                      data-jenis="<?= htmlspecialchars($t->jenis_kelamin,ENT_QUOTES) ?>"
                      data-instansi="<?= htmlspecialchars($t->asal_instansi,ENT_QUOTES) ?>"
                      data-telp="<?= htmlspecialchars($t->no_handphone,ENT_QUOTES) ?>"
                      data-keperluan="<?= htmlspecialchars($t->keperluan,ENT_QUOTES) ?>"
                      data-kritik="<?= htmlspecialchars($t->kritik_saran,ENT_QUOTES) ?>"
                      data-pendapat_pelayanan="<?= htmlspecialchars($t->pendapat_pelayanan,ENT_QUOTES) ?>"
                      data-pemahaman_prosedur="<?= htmlspecialchars($t->pemahaman_prosedur,ENT_QUOTES) ?>"
                      data-pendapat_kecepatan="<?= htmlspecialchars($t->pendapat_kecepatan,ENT_QUOTES) ?>"
                      data-pendapat_biaya="<?= htmlspecialchars($t->pendapat_biaya,ENT_QUOTES) ?>"
                      data-pendapat_produk="<?= htmlspecialchars($t->pendapat_produk,ENT_QUOTES) ?>"
                      data-pendapat_kompetensi="<?= htmlspecialchars($t->pendapat_kompetensi,ENT_QUOTES) ?>"
                      data-pendapat_perilaku="<?= htmlspecialchars($t->pendapat_perilaku,ENT_QUOTES) ?>"
                      data-pendapat_pengaduan="<?= htmlspecialchars($t->pendapat_pengaduan,ENT_QUOTES) ?>"
                      data-pendapat_kualitas="<?= htmlspecialchars($t->pendapat_kualitas,ENT_QUOTES) ?>">
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
            
            <!-- Data Diri -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama tamu">
              </div>

              <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                  <option value="">-- Pilih Jenis Kelamin --</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Asal Instansi/Pribadi</label>
                <input type="text" name="asal_instansi" class="form-control" placeholder="Masukkan asal instansi/pribadi tamu">
              </div>

              <div class="col-md-6 mb-3">
                <label>No. Handphone</label>
                <input type="text" name="no_handphone" class="form-control" placeholder="Masukkan no. handphone tamu">
              </div>
            </div>

            <div class="mb-3">
              <label>Keperluan</label>
              <select name="keperluan" class="form-select" required>
                <option value="">-- Pilih Keperluan --</option>
                <option value="Menemui Pejabat/Staff">Menemui Pejabat/Staff</option>
                <option value="Rekomendasi Teknis (Rekomtek)">Rekomendasi Teknis (Rekomtek)</option>
                <option value="Kirim Surat (Promosi/Aduan/Temuan)">Kirim Surat (Promosi/Aduan/Temuan)</option>
                <option value="Permintaan Data/Informasi">Permintaan Data/Informasi</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <!-- Form Keterangan Lainnya (Awalnya Disembunyikan) -->
            <div class="mb-3" id="keteranganLainnyaGroup" style="display: none;">
              <label>Keterangan Keperluan Lainnya</label>
              <input type="text" id="keteranganLainnya" class="form-control" placeholder="Silakan jelaskan keperluan lainnya...">
              <small class="text-muted">Mohon diisi untuk keperluan selain yang tersedia di atas</small>
            </div>

            <div class="row">
              <!-- Kolom 1 -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="small">Persyaratan</label>
                  <select name="pendapat_pelayanan" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Prosedur</label>
                  <select name="pemahaman_prosedur" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Kecepatan Waktu</label>
                  <select name="pendapat_kecepatan" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Biaya/Tarif</label>
                  <select name="pendapat_biaya" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Kesesuaian Produk</label>
                  <select name="pendapat_produk" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
              </div>

              <!-- Kolom 2 -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="small">Kompetensi Petugas</label>
                  <select name="pendapat_kompetensi" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Perilaku Petugas</label>
                  <select name="pendapat_perilaku" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Penanganan Pengaduan</label>
                  <select name="pendapat_pengaduan" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Kualitas Sarana Prasarana</label>
                  <select name="pendapat_kualitas" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label>Kritik dan Saran Perbaikan</label>
              <textarea name="kritik_saran" class="form-control" rows="3" placeholder="Isi kritik atau saran tamu"></textarea>
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

            <!-- Data Diri -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Nama</label>
                <input type="text" name="nama" id="edit_nama" class="form-control" required>
              </div>

              <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" id="edit_jenis" class="form-select" required>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Asal Instansi/Pribadi</label>
                <input type="text" name="asal_instansi" id="edit_instansi" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>No. Handphone</label>
                <input type="text" name="no_handphone" id="edit_telp" class="form-control">
              </div>
            </div>

            <div class="mb-3">
              <label>Keperluan</label>
              <select name="keperluan" id="edit_keperluan" class="form-select" required>
                <option value="">-- Pilih Keperluan --</option>
                <option value="Menemui Pejabat/Staff">Menemui Pejabat/Staff</option>
                <option value="Rekomendasi Teknis (Rekomtek)">Rekomendasi Teknis (Rekomtek)</option>
                <option value="Kirim Surat (Promosi/Aduan/Temuan)">Kirim Surat (Promosi/Aduan/Temuan)</option>
                <option value="Permintaan Data/Informasi">Permintaan Data/Informasi</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <!-- Form Keterangan Lainnya untuk Edit -->
            <div class="mb-3" id="edit_keteranganLainnyaGroup" style="display: none;">
              <label>Keterangan Keperluan Lainnya</label>
              <input type="text" id="edit_keteranganLainnya" class="form-control" placeholder="Silakan jelaskan keperluan lainnya...">
              <small class="text-muted">Mohon diisi untuk keperluan selain yang tersedia di atas</small>
            </div>

            <div class="row">
              <!-- Kolom 1 -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="small">Persyaratan</label>
                  <select name="pendapat_pelayanan" id="edit_pendapat_pelayanan" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Prosedur</label>
                  <select name="pemahaman_prosedur" id="edit_pemahaman_prosedur" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Kecepatan Waktu</label>
                  <select name="pendapat_kecepatan" id="edit_pendapat_kecepatan" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Biaya/Tarif</label>
                  <select name="pendapat_biaya" id="edit_pendapat_biaya" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Kesesuaian Produk</label>
                  <select name="pendapat_produk" id="edit_pendapat_produk" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
              </div>

              <!-- Kolom 2 -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="small">Kompetensi Petugas</label>
                  <select name="pendapat_kompetensi" id="edit_pendapat_kompetensi" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Perilaku Petugas</label>
                  <select name="pendapat_perilaku" id="edit_pendapat_perilaku" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Penanganan Pengaduan</label>
                  <select name="pendapat_pengaduan" id="edit_pendapat_pengaduan" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="small">Kualitas Sarana Prasarana</label>
                  <select name="pendapat_kualitas" id="edit_pendapat_kualitas" class="form-select form-select-sm" required>
                    <option value="">-- Pilih Nilai --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label>Kritik dan Saran Perbaikan</label>
              <textarea name="kritik_saran" id="edit_kritik" class="form-control" rows="3"></textarea>
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
  // Tambah
  document.getElementById("btnTambah").addEventListener("click", function(){
    document.getElementById("divTabel").style.display = "none";
    document.getElementById("divForm").style.display = "block";
    document.getElementById("divFormEdit").style.display = "none";
  });
  
  document.getElementById("btnKembali").addEventListener("click", function () {
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
      kritik_saran: btn.dataset.kritik,
      pendapat_pelayanan: btn.dataset.pendapat_pelayanan,
      pemahaman_prosedur: btn.dataset.pemahaman_prosedur,
      pendapat_kecepatan: btn.dataset.pendapat_kecepatan,
      pendapat_biaya: btn.dataset.pendapat_biaya,
      pendapat_produk: btn.dataset.pendapat_produk,
      pendapat_kompetensi: btn.dataset.pendapat_kompetensi,
      pendapat_perilaku: btn.dataset.pendapat_perilaku,
      pendapat_kualitas: btn.dataset.pendapat_kualitas,
      pendapat_pengaduan: btn.dataset.pendapat_pengaduan
    };

    console.log('Data dari button:', data); // Debug

    // Gunakan fungsi fillEditForm yang sudah dibuat
    fillEditForm(data);
  });

  document.getElementById("btnKembaliEdit").addEventListener("click", function(){
    document.getElementById("divFormEdit").style.display = "none";
    document.getElementById("divTabel").style.display = "block";
  });

  // Fungsi untuk mengisi form edit dengan data yang ada
  function fillEditForm(data) {
    console.log('Mengisi form edit dengan data:', data);
    
    // Isi field dasar
    document.getElementById('edit_id').value = data.id;
    document.getElementById('edit_nama').value = data.nama;
    document.getElementById('edit_jenis').value = data.jenis_kelamin;
    document.getElementById('edit_instansi').value = data.asal_instansi || '';
    document.getElementById('edit_telp').value = data.no_handphone || '';
    document.getElementById('edit_kritik').value = data.kritik_saran || '';
    
    // Isi field-field pendapat (jika ada di form Anda)
    if (document.getElementById('edit_pendapat_pelayanan')) {
      document.getElementById('edit_pendapat_pelayanan').value = data.pendapat_pelayanan || '';
    }
    if (document.getElementById('edit_pemahaman_prosedur')) {
      document.getElementById('edit_pemahaman_prosedur').value = data.pemahaman_prosedur || '';
    }
    if (document.getElementById('edit_pendapat_kecepatan')) {
      document.getElementById('edit_pendapat_kecepatan').value = data.pendapat_kecepatan || '';
    }
    if (document.getElementById('edit_pendapat_biaya')) {
      document.getElementById('edit_pendapat_biaya').value = data.pendapat_biaya || '';
    }
    if (document.getElementById('edit_pendapat_produk')) {
      document.getElementById('edit_pendapat_produk').value = data.pendapat_produk || '';
    }
    if (document.getElementById('edit_pendapat_kompetensi')) {
      document.getElementById('edit_pendapat_kompetensi').value = data.pendapat_kompetensi || '';
    }
    if (document.getElementById('edit_pendapat_perilaku')) {
      document.getElementById('edit_pendapat_perilaku').value = data.pendapat_perilaku || '';
    }
    if (document.getElementById('edit_pendapat_kualitas')) {
      document.getElementById('edit_pendapat_kualitas').value = data.pendapat_kualitas || '';
    }
    if (document.getElementById('edit_pendapat_pengaduan')) {
      document.getElementById('edit_pendapat_pengaduan').value = data.pendapat_pengaduan || '';
    }
    
    // Handle keperluan dengan sistem "Lainnya"
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
    if (data.keperluan && keperluanUtama.includes(data.keperluan)) {
      // Jika termasuk keperluan utama, pilih dari dropdown
      keperluanSelect.value = data.keperluan;
      keperluanActual.value = data.keperluan;
      console.log('Keperluan utama dipilih:', data.keperluan);
    } else if (data.keperluan) {
      // Jika bukan keperluan utama, pilih "Lainnya" dan isi keterangan
      keperluanSelect.value = 'other';
      keperluanActual.value = data.keperluan;
      keteranganGroup.style.display = 'block';
      keteranganInput.value = data.keperluan;
      keteranganInput.required = true;
      console.log('Keperluan custom dipilih:', data.keperluan);
    } else {
      // Jika tidak ada data keperluan
      keperluanSelect.value = '';
      keperluanActual.value = '';
    }
  }

  // Fungsi toggle untuk form edit
  function toggleKeteranganLainnyaEdit() {
    const keperluanSelect = document.getElementById('edit_keperluanSelect');
    const keteranganGroup = document.getElementById('edit_keteranganLainnyaGroup');
    const keteranganInput = document.getElementById('edit_keteranganLainnya');
    const keperluanActual = document.getElementById('edit_keperluanActual');
    
    if (keperluanSelect.value === 'other') {
      // Tampilkan form keterangan
      keteranganGroup.style.display = 'block';
      keteranganInput.required = true;
      // Kosongkan nilai actual sampai user mengisi
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

  // Update nilai actual ketika user mengetik di keterangan lainnya (edit)
  document.addEventListener('DOMContentLoaded', function() {
    const keteranganInput = document.getElementById('edit_keteranganLainnya');
    if (keteranganInput) {
      keteranganInput.addEventListener('input', function(e) {
        const keperluanActual = document.getElementById('edit_keperluanActual');
        keperluanActual.value = e.target.value.trim();
      });
    }
  });

  // Validasi form edit sebelum submit
  document.addEventListener('DOMContentLoaded', function() {
    const editForm = document.querySelector('#divFormEdit form');
    if (editForm) {
      editForm.addEventListener('submit', function(e) {
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
    }
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
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
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url();?>assets/Template/assets/js/soft-ui-dashboard.min.js?v=1.2.0"></script>
</body>

</html>