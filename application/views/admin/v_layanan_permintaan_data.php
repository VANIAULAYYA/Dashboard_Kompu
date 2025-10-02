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
              <li class="nav-item ">
                <a class="nav-link " href="<?php echo base_url('Admin/layanan_kepuasan'); ?>">
                  <span class="sidenav-mini-icon"> L </span>
                  <span class="sidenav-normal"> Layanan Kepuasan Masyarakat </span>
                </a>
              </li>
<li class="nav-item active">
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
                <a class="nav-link" href="../../pages/dashboards/default.html">
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
            <h5 class="mb-0">Layanan Permintaan Data</h5>
            <p class="text-sm mb-0">
              Daftar Layanan Permintaan Data di BBWS Brantas
            </p>
            <button type="button" class="btn btn-primary btn-sm mt-4" id="btnTambah">
              <i class="fa fa-plus"></i> Tambah Permohonan
            </button>
          </div>
          <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
              <thead class="thead-light">
                <tr>
                  <th>Nomor</th>
                  <th>Via</th>
                  <th>Jenis</th>
                  <th>Pengirim</th>
                  <th>Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Diterima PPID</th>
                  <th>Tautan Bukti Surat</th>
                  <th>Tindak Lanjut</th>
                  <th>Status</th>
                  <th>Tautan Bukti Surat Penyelesaian</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($Layanan as $p): ?>
                <tr>
                  <td class="text-sm font-weight-normal"><?= $no++; ?></td>
                  <td class="text-sm font-weight-normal"><?= $p->via; ?></td>
                  <td class="text-sm font-weight-normal"><?= $p->jenis; ?></td>
                  <td class="text-sm font-weight-normal"><?= $p->pengirim; ?></td>
                  <td class="text-sm font-weight-normal">
      <?= date('d F Y', strtotime($p->tanggal_surat)); ?>
    </td>
                  <td class="text-sm font-weight-normal"><?= $p->nomor_surat; ?></td>
                  <td class="text-sm font-weight-normal"><?= $p->perihal; ?></td>
                  <td class="text-sm font-weight-normal"><?= $p->diterima_ppid; ?></td>
                  <td class="text-sm font-weight-normal"><a href="<?= $p->link_bukti_surat ?>" target="_blank">Lihat</a></td>
                  <td class="text-sm font-weight-normal"><?= $p->tindak_lanjut; ?></td>
                  <td class="text-sm font-weight-normal"><?= $p->status; ?></td>
                  <td class="text-sm font-weight-normal"><a href="<?= $p->link_bukti_surat_penyelesaian ?>" target="_blank">Lihat</a></td>
                  <td>
  <button type="button" class="btn btn-warning btn-sm btnEdit"
    data-id="<?= $p->nomor ?>"
    data-via="<?= $p->via ?>"
    data-jenis="<?= $p->jenis ?>"
    data-pengirim="<?= $p->pengirim ?>"
    data-tanggal="<?= $p->tanggal_surat ?>"
    data-nomor_surat="<?= $p->nomor_surat ?>"
    data-perihal="<?= $p->perihal ?>"
    data-diterima="<?= $p->diterima_ppid ?>"
    data-tindak="<?= $p->tindak_lanjut ?>"
    data-status="<?= $p->status ?>"
    data-link1="<?= $p->link_bukti_surat ?>"
    data-link2="<?= $p->link_bukti_surat_penyelesaian ?>">
    Edit
  </button>

  <button type="button" class="btn btn-danger btn-sm" 
    data-bs-toggle="modal" 
    data-bs-target="#confirmDeleteModal" 
    data-delete-url="<?= site_url('Layanan/delete/'.$p->nomor) ?>">
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

 <div id="divForm" style="display:none;">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Tambah Layanan Permintaan Data</h5>
        </div>
        <div class="card-body p-4">
          <form action="<?= site_url('layanan/simpan') ?>" method="post">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Via</label>
                <input type="text" name="via" class="form-control" required placeholder="Contoh: Email, Surat, dll">
              </div>
              <div class="col-md-6 mb-3">
                <label>Jenis</label>
                <input type="text" name="jenis" class="form-control" required placeholder="Contoh: Permintaan Data, Informasi">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Pengirim</label>
                <input type="text" name="pengirim" class="form-control" required placeholder="Nama instansi atau perorangan">
              </div>
              <div class="col-md-6 mb-3">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" required>
              </div>
            </div>

            <div class="mb-3">
              <label>Nomor Surat</label>
              <input type="text" name="nomor_surat" class="form-control" required placeholder="Masukkan nomor surat">
            </div>

            <div class="mb-3">
              <label>Perihal</label>
              <input type="text" name="perihal" class="form-control" required placeholder="Tuliskan perihal surat">
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Diterima PPID</label>
                <input type="date" name="diterima_ppid" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Tindak Lanjut</label>
                <input type="text" name="tindak_lanjut" class="form-control" placeholder="Tuliskan tindak lanjut (opsional)">
              </div>
            </div>

            <div class="mb-3">
              <label>Status</label>
              <select name="status" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="Telah Diterima">Telah Diterima</option>
                <option value="Dalam Proses">Dalam Proses</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="link_bukti_surat" class="form-label">Tautan Bukti Surat</label>
                <input type="text" id="link_bukti_surat" name="link_bukti_surat" class="form-control" placeholder="https://contoh.com/surat.pdf">
              </div>
              <div class="col-md-6 mb-3">
                <label for="link_bukti_surat_penyelesaian" class="form-label">Tautan Bukti Surat Penyelesaian</label>
                <input type="text" id="link_bukti_surat_penyelesaian" name="link_bukti_surat_penyelesaian" class="form-control" placeholder="https://contoh.com/penyelesaian.pdf">
              </div>
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

<div id="divFormEdit" style="display:none;">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Edit Layanan Permintaan Data</h5>
        </div>
        <div class="card-body p-4">
          <form action="<?= site_url('Layanan/update') ?>" method="post">
            <input type="hidden" name="nomor" id="edit_nomor">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Via</label>
                <input type="text" name="via" id="edit_via" class="form-control" 
                       placeholder="Masukkan via pengiriman" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Jenis</label>
                <input type="text" name="jenis" id="edit_jenis" class="form-control" 
                       placeholder="Masukkan jenis layanan" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Pengirim</label>
                <input type="text" name="pengirim" id="edit_pengirim" class="form-control" 
                       placeholder="Masukkan nama pengirim" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="edit_tanggal" class="form-control" required>
              </div>
            </div>

            <div class="mb-3">
              <label>Nomor Surat</label>
              <input type="text" name="nomor_surat" id="edit_nomor_surat" class="form-control" 
                     placeholder="Masukkan nomor surat" required>
            </div>

            <div class="mb-3">
              <label>Perihal</label>
              <input type="text" name="perihal" id="edit_perihal" class="form-control" 
                     placeholder="Masukkan perihal surat" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Diterima PPID</label>
                <input type="date" name="diterima_ppid" id="edit_diterima" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Tindak Lanjut</label>
                <input type="text" name="tindak_lanjut" id="edit_tindak" class="form-control" 
                       placeholder="Masukkan tindak lanjut">
              </div>
            </div>

            <div class="mb-3">
              <label>Status</label>
              <select name="status" id="edit_status" class="form-select" required>
                <option value="Telah Diterima">Telah Diterima</option>
                <option value="Dalam Proses">Dalam Proses</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Tautan Bukti Surat</label>
              <input type="text" name="link_bukti_surat" id="edit_link1" class="form-control" 
                     placeholder="Masukkan URL bukti surat">
            </div>
            <div class="mb-3">
              <label>Tautan Bukti Surat Penyelesaian</label>
              <input type="text" name="link_bukti_surat_penyelesaian" id="edit_link2" class="form-control" 
                     placeholder="Masukkan URL bukti surat penyelesaian">
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



<!-- =================== SCRIPT =================== -->
<script>
  // Tombol Tambah
  document.addEventListener("DOMContentLoaded", function () {
  // Tombol tambah
  document.getElementById("btnTambah").addEventListener("click", function () {
    document.getElementById("divTabel").style.display = "none";
    document.getElementById("divForm").style.display = "block";
    document.getElementById("divFormEdit").style.display = "none";
  });

  // Tombol kembali (tambah)
  document.getElementById("btnKembali").addEventListener("click", function () {
    document.getElementById("divForm").style.display = "none";
    document.getElementById("divTabel").style.display = "block";
  });

  // Tombol edit
  document.addEventListener("click", function (e) {
  let btn = e.target.closest(".btnEdit");
  if (btn) {
    // sembunyikan tabel, tampilkan form edit
    document.getElementById("divTabel").style.display = "none";
    document.getElementById("divForm").style.display = "none";
    document.getElementById("divFormEdit").style.display = "block";

    // isi field edit dari data-attribute tombol
    document.getElementById("edit_nomor").value       = btn.dataset.id || "";
    document.getElementById("edit_via").value         = btn.dataset.via || "";
    document.getElementById("edit_jenis").value       = btn.dataset.jenis || "";
    document.getElementById("edit_pengirim").value    = btn.dataset.pengirim || "";
    document.getElementById("edit_tanggal").value     = btn.dataset.tanggal || "";
    document.getElementById("edit_nomor_surat").value = btn.dataset.nomor_surat || "";
    document.getElementById("edit_perihal").value     = btn.dataset.perihal || "";
    document.getElementById("edit_diterima").value    = btn.dataset.diterima || "";
    document.getElementById("edit_tindak").value      = btn.dataset.tindak || "";
    document.getElementById("edit_status").value      = btn.dataset.status || "";
    document.getElementById("edit_link1").value       = btn.dataset.link1 || "";
    document.getElementById("edit_link2").value       = btn.dataset.link2 || "";
  }
});

// tombol kembali (form edit → tabel)
document.addEventListener("click", function (e) {
  if (e.target.id === "btnKembaliEdit") {
    document.getElementById("divFormEdit").style.display = "none";
    document.getElementById("divTabel").style.display = "block";
  }
});
});

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

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a id="deleteButton" href="#" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

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