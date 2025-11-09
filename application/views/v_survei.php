<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/adminlte.min.css'); ?>">
    <title>FORMULIR SURVEI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body {
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
    background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
}

:root {
    --primary: #3498db;
    --secondary: #2c3e50; /* INI YANG DITAMBAHKIN */
    --accent: #e74c3c;
}

.hero-section {
  background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
  color: white;
  text-align: center;
  padding: 140px 0 120px;
  width: 100%;
}

.form-container {
    background-color: #ffffff;
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

/* Validation Step Styling */
#step-validasi {
    text-align: center;
    padding: 40px 20px;
}

#step-validasi h3 {
    color: #1a1a2e;
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 12px;
}

#step-validasi p {
    color: #6c757d;
    font-size: 16px;
    margin-bottom: 40px;
}

.nik-input-wrapper {
    position: relative;
    max-width: 500px;
    margin: 0 auto 30px;
}

.nik-input-wrapper i {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #4e73df;
    font-size: 20px;
}

#nik {
    width: 100%;
    padding: 18px 20px 18px 55px;
    border: 2px solid #e3e6f0;
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s ease;
}

#nik:focus {
    outline: none;
    border-color: #4e73df;
    box-shadow: 0 0 0 4px rgba(78, 115, 223, 0.1);
}

.btn-validate {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    color: white;
    padding: 15px 50px;
    border-radius: 12px;
    border: none;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
}

.btn-validate:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(78, 115, 223, 0.4);
}

/* Survey Step Styling */
#step-survei h3 {
    color: #1a1a2e;
    font-weight: 700;
    font-size: 26px;
    margin-bottom: 30px;
    text-align: center;
}

.user-data-card {
    background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
    color: white;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 4px 15px rgba(78, 115, 223, 0.2);
}

.user-data-card h5 {
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 18px;
}

.user-data-card p {
    margin-bottom: 8px;
    font-size: 15px;
    opacity: 0.95;
}

.user-data-card strong {
    font-weight: 600;
    margin-right: 8px;
}

.form-group {
    margin-bottom: 25px;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #e3e6f0;
    transition: all 0.3s ease;
}

.form-group:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    border-color: #d1d3e2;
}

.form-group label:first-child {
    font-weight: 500;
    color: #2c3e50;
    font-size: 15px;
    display: block;
    margin-bottom: 20px;
    line-height: 1.7;
}

.radio-group {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr; /* 4 kolom sama rata */
  gap: 8px;
  margin-top: 15px;
}

.radio-group label {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-size: 14px;
  cursor: pointer;
  margin: 0;
  padding: 12px 8px;
  background: white;
  border-radius: 6px;
  border: 2px solid #e3e6f0;
  transition: all 0.3s ease;
  font-weight: 400 !important;
  color: #5a5c69;
  min-height: 60px;
  text-align: center;
  word-wrap: break-word;
  box-sizing: border-box;
  line-height: 1.3;
  flex-direction: row; /* Horizontal - simbol sejajar dengan teks */
}

/* Pastikan semua teks konsisten */
.radio-group label span {
  text-align: center;
  display: block;
  width: 100%;
  font-weight: 400 !important; /* Pastikan semua sama */
  font-family: inherit !important; /* Pastikan font family sama */
}

.radio-group label:hover {
  border-color: #4e73df;
  background: #f8f9ff;
  font-weight: 400 !important;
}

.radio-group input[type="radio"] {
  transform: scale(1.2);
  cursor: pointer;
  accent-color: #4e73df;
  flex-shrink: 0;
  margin: 0;
  /* Hapus order: -1 agar radio tetap di kiri */
}

.radio-group label:has(input:checked) {
  background: #4e73df;
  color: white;
  border-color: #4e73df;
  box-shadow: 0 2px 8px rgba(78, 115, 223, 0.3);
  font-weight: 400 !important;
}

/* Responsive */
@media (max-width: 768px) {
  .radio-group {
    grid-template-columns: 1fr 1fr; /* 2 kolom di mobile */
    gap: 6px;
  }
  
  .radio-group label {
    min-height: 55px;
    padding: 10px 6px;
    font-size: 13px;
    gap: 6px;
  }
}

@media (max-width: 480px) {
  .radio-group {
    grid-template-columns: 1fr 1fr; /* Tetap 2 kolom di layar sangat kecil */
  }
  
  .radio-group label {
    font-size: 12px;
    padding: 8px 4px;
  }
}

/* Textarea Styling */
textarea.form-control {
    width: 100%;
    padding: 15px;
    border: 2px solid #e3e6f0;
    border-radius: 12px;
    font-size: 15px;
    min-height: 120px;
    resize: vertical;
    transition: all 0.3s ease;
}

textarea.form-control:focus {
    outline: none;
    border-color: #4e73df;
    box-shadow: 0 0 0 4px rgba(78, 115, 223, 0.1);
}

/* Submit Button */
.btn-submit {
    background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
    color: white;
    padding: 15px 50px;
    border-radius: 12px;
    border: none;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(28, 200, 138, 0.3);
    width: 100%;
    margin-top: 20px;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(28, 200, 138, 0.4);
}

/* Success Step */
#step-success {
    text-align: center;
    padding: 60px 20px;
}

.success-icon {
    font-size: 80px;
    color: #1cc88a;
    margin-bottom: 20px;
    animation: scaleIn 0.5s ease-out;
}

@keyframes scaleIn {
    from {
        transform: scale(0);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

#step-success h2 {
    color: #1cc88a;
    font-weight: 700;
    font-size: 32px;
    margin-bottom: 15px;
}

#step-success p {
    color: #5a5c69;
    font-size: 16px;
    margin-bottom: 30px;
}

.btn-outline-primary {
    background: white;
    color: #4e73df;
    border: 2px solid #4e73df;
    padding: 12px 30px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: #4e73df;
    color: white;
    transform: translateY(-2px);
}

.btn-primary {
    background: #4e73df;
    color: white;
    padding: 12px 30px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    border: 2px solid #4e73df;
}

.btn-primary:hover {
    background: #224abe;
    transform: translateY(-2px);
    color: white;
}

/* Error Message */
.alert-danger {
    background: #fff5f5;
    color: #c53030;
    border: 1px solid #feb2b2;
    padding: 15px 20px;
    border-radius: 10px;
    margin-top: 20px;
}

/* Progress Indicator */
.progress-steps {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 40px;
    gap: 20px;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.progress-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e3e6f0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #858796;
    transition: all 0.3s ease;
}

.progress-step.active .progress-circle {
    background: #4e73df;
    color: white;
}

.progress-step.completed .progress-circle {
    background: #1cc88a;
    color: white;
}

.progress-label {
    font-size: 12px;
    color: #858796;
    font-weight: 500;
}

.progress-step.active .progress-label {
    color: #4e73df;
    font-weight: 600;
}

.progress-line {
    width: 60px;
    height: 2px;
    background: #e3e6f0;
    margin-top: -20px;
}

.progress-step.active ~ .progress-line,
.progress-step.completed ~ .progress-line {
    background: #4e73df;
}

nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

.nav-link:hover:after {
    width: 100%;
}

.nav-link:after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #e74c3c;
    transition: width .3s;
}

#desktop-laporan-dropdown, #desktop-buku-tamu-dropdown {
    min-width: 16rem !important;
    padding: 0.5rem 0 !important;
    border-radius: 0.25rem !important;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    background-color: #ffffff !important;
    line-height: 1.5 !important;
    font-family: 'Poppins', sans-serif !important;
}

#desktop-buku-tamu-dropdown a,
#desktop-laporan-dropdown a {
    display: block;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
    text-decoration: none;
    line-height: 1.7;
}

#desktop-buku-tamu-dropdown a:hover,
#desktop-laporan-dropdown a:hover {
    background-color: #ffedd5;
    color: #f97316;
}

nav .max-w-7xl,
nav .relative {
    overflow: visible !important;
}

/* Responsive */
@media (max-width: 768px) {
    .form-container {
        padding: 25px;
        margin: 15px;
    }
    
    .radio-group {
        grid-template-columns: 1fr;
    }
    
    .progress-steps {
        display: none;
    }
}

/* Modal Popup Styles */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 9998;
    animation: fadeIn 0.3s ease;
}

.modal-popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border-radius: 20px;
    padding: 40px;
    z-index: 9999;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: slideUp 0.4s ease;
    text-align: center;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { 
        opacity: 0;
        transform: translate(-50%, -40%);
    }
    to { 
        opacity: 1;
        transform: translate(-50%, -50%);
    }
}

.modal-icon {
    font-size: 70px;
    color: #1cc88a;
    margin-bottom: 20px;
    animation: scaleIn 0.5s ease;
}

.modal-title {
    font-size: 26px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 15px;
}

.modal-message {
    font-size: 16px;
    color: #5a5c69;
    margin-bottom: 25px;
    line-height: 1.6;
}

.modal-timer {
    font-size: 14px;
    color: #858796;
    margin-top: 20px;
}

.modal-timer span {
    font-weight: 700;
    color: #4e73df;
    font-size: 18px;
}

/* Alert Box Styles */
.alert-box {
    background: #fff3cd;
    border: 1px solid #ffc107;
    border-left: 4px solid #ffc107;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.alert-box.error {
    background: #f8d7da;
    border-color: #dc3545;
}

.alert-box.error .alert-icon {
    color: #dc3545;
}

.alert-icon {
    font-size: 30px;
    color: #ffc107;
    flex-shrink: 0;
}

.alert-content h4 {
    margin: 0 0 8px 0;
    font-size: 18px;
    font-weight: 600;
    color: #1a1a2e;
}

.alert-content p {
    margin: 0 0 15px 0;
    font-size: 14px;
    color: #5a5c69;
    line-height: 1.5;
}

.btn-warning {
    background: #ffc107;
    color: #1a1a2e;
    padding: 10px 25px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    border: none;
    font-size: 14px;
}

.btn-warning:hover {
    background: #e0a800;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
    color: #1a1a2e;
}

footer {
    background-color: #2c3e50; /* Ganti dengan warna langsung sebagai backup */
    color: white;
    padding: 30px 0;
    text-align: center;
    margin-top: 50px; /* Tambahkan margin atas */
}

</style>
</head>

<body>
    <!-- Navigation -->
<nav class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <div class="flex-shrink-0 flex items-center">
          <img src="<?php echo base_url();?>assets/Pictures/logo-pu.png" alt="Logo" width="250">
        </div>
      </div>

      <div class="hidden md:flex items-center space-x-8 relative">
        <a href="<?php echo base_url('Landing'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Home</a>
        <a href="<?php echo base_url('Landing/tentang'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Tentang</a>

      <div class="relative" id="desktop-buku-tamu">
          <button id="desktop-buku-tamu-btn" class="nav-link text-gray-700 hover:text-orange-600 transition">
              Buku Tamu
              <i id="desktop-buku-tamu-icon" class="fas fa-chevron-down ml-1 text-sm"></i>
          </button>
          <div id="desktop-buku-tamu-dropdown" class="absolute hidden bg-white shadow-lg rounded-md mt-2 w-48 z-50">
              <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Formulir Buku Tamu</a>
              <a href="<?php echo base_url('Landing/survei'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Formulir Survei</a>
          </div>
      </div>

        <a href="<?php echo base_url('Landing/medsos'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Media Sosial</a>
        <a href="<?php echo base_url('Landing/layanan'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Layanan</a>

        <div class="relative" id="desktop-laporan">
          <button id="desktop-laporan-btn" class="nav-link text-gray-700 hover:text-orange-600 transition">
            Publikasi
            <i id="desktop-laporan-icon" class="fas fa-chevron-down ml-1 text-sm"></i>
          </button>
          <div id="desktop-laporan-dropdown" class="absolute hidden bg-white shadow-lg rounded-md mt-2 w-48">
            <a href="<?php echo base_url('Landing/laporan_PPID'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan PPID</a>
            <a href="<?php echo base_url('Landing/laporan_Kompu'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan Kompu</a>
            <a href="<?php echo base_url('Landing/Survei_Kepuasan_Masyarakat'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Survei Kepuasan Masyarakat</a>
          </div>
        </div>
      </div>

      <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-gray-700 hover:text-orange-600">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>
  </div>
</nav>

<div id="mobile-menu" class="md:hidden hidden bg-white py-4 px-6 shadow-lg">
  <div class="flex flex-col space-y-4">
    <a href="<?php echo base_url('Landing'); ?>" class="text-gray-700 hover:text-orange-600 transition">Home</a>
    <a href="<?php echo base_url('Landing/tentang'); ?>" class="text-gray-700 hover:text-orange-600 transition">Tentang</a>

    <div>
        <button id="buku-tamu-dropdown-btn" class="w-full flex justify-between items-center text-gray-700 hover:text-orange-600 transition">
            Buku Tamu
            <i id="buku-tamu-icon" class="fas fa-chevron-down ml-2"></i>
        </button>
        <div id="buku-tamu-dropdown" class="hidden flex flex-col pl-4 mt-2 space-y-2">
            <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="text-gray-700 hover:text-orange-600 transition">Formulir Buku Tamu</a>
            <a href="<?php echo base_url('Landing/survei'); ?>" class="text-gray-700 hover:text-orange-600 transition">Formulir Survei</a>
        </div>
    </div>
    
    <a href="<?php echo base_url('Landing/medsos'); ?>" class="text-gray-700 hover:text-orange-600 transition">Media Sosial</a>
    <a href="<?php echo base_url('Landing/layanan'); ?>" class="text-gray-700 hover:text-orange-600 transition">Layanan</a>

    <div>
      <button id="laporan-dropdown-btn" class="w-full flex justify-between items-center text-gray-700 hover:text-orange-600 transition">
        Publikasi
        <i id="laporan-icon" class="fas fa-chevron-down ml-2"></i>
      </button>
      <div id="laporan-dropdown" class="hidden flex flex-col pl-4 mt-2 space-y-2">
        <a href="<?php echo base_url('Landing/laporan_PPID'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan PPID</a>
        <a href="<?php echo base_url('Landing/laporan_Kompu'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan Kompu</a>
        <a href="<?php echo base_url('Landing/Survei_Kepuasan_Masyarakat'); ?>" class="text-gray-700 hover:text-orange-600 transition">Survei Kepuasan Masyarakat</a>
      </div>
    </div>
  </div>
</div>

  <!-- Hero Section -->
<section class="hero-section">
  <div class="container text-center">
    <h1 class="display-4 fw-bold mb-3">FORMULIR SURVEI</h1>
    <p class="lead mb-0">BBWS BRANTAS</p>
  </div>
</section>

    <div class="container mx-auto mt-20 mb-20">
    <div class="form-container">
        <!-- Progress Steps -->
        <div class="progress-steps" id="progress-indicator">
            <div class="progress-step active" id="step-indicator-1">
                <div class="progress-circle">1</div>
                <div class="progress-label">Validasi</div>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step" id="step-indicator-2">
                <div class="progress-circle">2</div>
                <div class="progress-label">Survei</div>
            </div>
            <div class="progress-line"></div>
            <div class="progress-step" id="step-indicator-3">
                <div class="progress-circle">3</div>
                <div class="progress-label">Selesai</div>
            </div>
        </div>

        <!-- STEP 1: VALIDASI NIK -->
        <div id="step-validasi">
            <h3>Validasi Data Anda</h3>
            <p>Masukkan NIK yang telah Anda daftarkan di Buku Tamu</p>
            <form id="form-validasi">
                <div class="nik-input-wrapper">
                    <i class="fas fa-id-card"></i>
                    <input type="text" id="nik" name="nik" 
                           placeholder="Masukkan NIK 16 digit" maxlength="16" required>
                </div>
                <small class="text-muted" style="display: block; margin-bottom: 25px;">
                    <i class="fas fa-info-circle"></i> NIK harus sama dengan yang Anda isi di formulir buku tamu
                </small>
                <button type="submit" class="btn-validate">
                    <i class="fas fa-check-circle mr-2"></i> Validasi Data
                </button>
            </form>
            
            <!-- Alert jika belum isi buku tamu -->
            <div id="alert-belum-isi" style="display: none; margin-top: 30px;">
                <div class="alert-box error">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Data Tidak Ditemukan</h4>
                        <p>NIK yang Anda masukkan belum terdaftar di buku tamu. Silakan isi buku tamu terlebih dahulu sebelum mengisi survei.</p>
                        <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="btn-warning">
                            <i class="fas fa-book mr-2"></i> Isi Buku Tamu Sekarang
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Alert jika sudah isi survei -->
            <div id="alert-sudah-isi" style="display: none; margin-top: 30px;">
                <div class="alert-box">
                    <div class="alert-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Survei Sudah Terisi</h4>
                        <p>Anda sudah mengisi survei untuk kunjungan ini. Jika ingin mengisi survei lagi, silakan isi buku tamu terlebih dahulu untuk kunjungan baru.</p>
                        <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="btn-warning">
                            <i class="fas fa-book mr-2"></i> Isi Buku Tamu Lagi
                        </a>
                    </div>
                </div>
            </div>
        
        </div>

       <!-- STEP 2: FORM SURVEI -->
<div id="step-survei" style="display: none;">
    <h3>Formulir Survei Kepuasan Masyarakat</h3>
    
    <div class="user-data-card">
        <h5 class="flex justify-center items-center text-white-700 text-lg font-semibold">
  <i class="fas fa-user-circle mr-2"></i> Data Anda
</h5>
        <p><strong>Nama:</strong> <span id="display-nama">-</span></p>
        <p><strong>Asal Instansi:</strong> <span id="display-instansi">-</span></p>
        <p><strong>Keperluan:</strong> <span id="display-keperluan">-</span></p>
    </div>

    <form action="<?php echo site_url('Landing/submit_survei'); ?>" method="post">
        <input type="hidden" name="nik" id="hidden-nik">

            <div class="form-group">
                <label>1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_pelayanan" value="4" required> Sangat Sesuai</label>
                    <label><input type="radio" name="pendapat_pelayanan" value="3"> Sesuai</label>
                    <label><input type="radio" name="pendapat_pelayanan" value="2"> Kurang Sesuai</label>
                    <label><input type="radio" name="pendapat_pelayanan" value="1"> Tidak Sesuai</label>
                </div>
            </div>

            <div class="form-group">
                <label>2. Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pemahaman_prosedur" value="4" required> Sangat Mudah</label>
                    <label><input type="radio" name="pemahaman_prosedur" value="3"> Mudah</label>
                    <label><input type="radio" name="pemahaman_prosedur" value="2"> Kurang Mudah</label>
                    <label><input type="radio" name="pemahaman_prosedur" value="1"> Tidak Mudah</label>
                </div>
            </div>

            <div class="form-group">
                <label>3. Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_kecepatan" value="4" required> Sangat Cepat</label>
                    <label><input type="radio" name="pendapat_kecepatan" value="3"> Cepat</label>
                    <label><input type="radio" name="pendapat_kecepatan" value="2"> Kurang Cepat</label>
                    <label><input type="radio" name="pendapat_kecepatan" value="1"> Tidak Cepat</label>
                </div>
            </div>

            <div class="form-group">
                <label>4. Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_biaya" value="4" required> Sangat Wajar</label>
                    <label><input type="radio" name="pendapat_biaya" value="3"> Wajar</label>
                    <label><input type="radio" name="pendapat_biaya" value="2"> Kurang Wajar</label>
                    <label><input type="radio" name="pendapat_biaya" value="1"> Tidak Wajar</label>
                </div>
            </div>

            <div class="form-group">
                <label>5. Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dengan hasil yang diberikan?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_produk" value="4" required> Sangat Sesuai</label>
                    <label><input type="radio" name="pendapat_produk" value="3"> Sesuai</label>
                    <label><input type="radio" name="pendapat_produk" value="2"> Kurang Sesuai</label>
                    <label><input type="radio" name="pendapat_produk" value="1"> Tidak Sesuai</label>
                </div>
            </div>

            <div class="form-group">
                <label>6. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_kompetensi" value="4" required> Sangat Kompeten</label>
                    <label><input type="radio" name="pendapat_kompetensi" value="3"> Kompeten</label>
                    <label><input type="radio" name="pendapat_kompetensi" value="2"> Kurang Kompeten</label>
                    <label><input type="radio" name="pendapat_kompetensi" value="1"> Tidak Kompeten</label>
                </div>
            </div>

            <div class="form-group">
                <label>7. Bagaimana pendapat Saudara tentang perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_perilaku" value="4" required> Sangat Baik</label>
                    <label><input type="radio" name="pendapat_perilaku" value="3"> Baik</label>
                    <label><input type="radio" name="pendapat_perilaku" value="2"> Kurang Baik</label>
                    <label><input type="radio" name="pendapat_perilaku" value="1"> Tidak Baik</label>
                </div>
            </div>

            <div class="form-group">
                <label>8. Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_kualitas" value="4" required> Sangat Baik</label>
                    <label><input type="radio" name="pendapat_kualitas" value="3"> Baik</label>
                    <label><input type="radio" name="pendapat_kualitas" value="2"> Kurang Baik</label>
                    <label><input type="radio" name="pendapat_kualitas" value="1"> Tidak Baik</label>
                </div>
            </div>

            <div class="form-group">
                <label>9. Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?</label>
                <div class="radio-group">
                    <label><input type="radio" name="pendapat_pengaduan" value="4" required> Sangat Baik</label>
                    <label><input type="radio" name="pendapat_pengaduan" value="3"> Baik</label>
                    <label><input type="radio" name="pendapat_pengaduan" value="2"> Kurang Baik</label>
                    <label><input type="radio" name="pendapat_pengaduan" value="1"> Tidak Baik</label>
                </div>
            </div>

            <div class="form-group">
                <label for="kritik_saran">10. Kritik dan Saran Perbaikan</label>
                <textarea class="form-control" name="kritik_saran" id="kritik_saran" placeholder="Silakan tuliskan kritik dan saran Anda untuk perbaikan layanan kami..." rows="5"></textarea>
            </div>
            
            <div class="form-group text-center" style="border: none; background: transparent; padding: 0;">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Survei
                </button>
            </div>
        </form>
    </div>

<!-- STEP 3: SUCCESS MESSAGE -->
<div id="step-success" style="display: none;">
    <div class="success-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <h2>Survei Berhasil Dikirim!</h2>
    <p>Terima kasih atas partisipasi Anda dalam survei kepuasan masyarakat BBWS Brantas.<br>
    Masukan Anda sangat berharga bagi kami untuk meningkatkan kualitas pelayanan.</p>
    
    <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
        <a href="<?php echo base_url('Landing'); ?>" class="btn-primary">
            <i class="fas fa-home mr-2"></i> Kembali ke Home
        </a>
        <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="btn-outline-primary">
            <i class="fas fa-book mr-2"></i> Isi Buku Tamu Lagi
        </a>
    </div>
    
    <p style="font-size: 14px; color: #858796; margin-top: 30px;">
        <i class="fas fa-info-circle"></i> Untuk mengisi survei lagi, silakan isi buku tamu terlebih dahulu.
    </p>
</div>

   <!-- ERROR MESSAGE -->
        <div id="error-message" class="alert-danger" style="display: none;"></div>
    </div>
</div>

    <!-- Modal Popup Success -->
    <div class="modal-overlay" id="modal-overlay"></div>
    <div class="modal-popup" id="modal-success">
        <div class="modal-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2 class="modal-title">Terima Kasih!</h2>
        <p class="modal-message">
            Survei Anda telah berhasil dikirim.<br>
            Masukan Anda sangat berharga bagi kami untuk meningkatkan kualitas pelayanan.
        </p>
        <div class="modal-timer">
            Anda akan dialihkan dalam <span id="countdown">5</span> detik...
        </div>
    </div>

    <!-- Back to Top button -->
    <button id="back-to-top" class="hidden fixed bottom-8 right-8 w-12 h-12 bg-orange-600 text-white rounded-full shadow-lg hover:bg-orange-700 transition">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Footer -->
  <footer>
    <h3 class="h5">Alamat</h3>
    <p>Jl. Raya Menganti No. 312<br>Surabaya, Jawa Timur</p>
    <hr class="my-4">
    <p class="mb-0">&copy; <?php echo date('Y'); ?> BBWS Brantas. All rights reserved.</p>
  </footer>

    <script>
  // Toggle mobile menu (hamburger)
  document.getElementById("mobile-menu-button").addEventListener("click", function() {
    document.getElementById("mobile-menu").classList.toggle("hidden");
  });

  // Toggle dropdown buku tamu di mobile
  document.getElementById("buku-tamu-dropdown-btn").addEventListener("click", function() {
    const dropdown = document.getElementById("buku-tamu-dropdown");
    const icon = document.getElementById("buku-tamu-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Toggle dropdown buku tamu di desktop
  document.getElementById("desktop-buku-tamu-btn").addEventListener("click", function(e) {
    e.preventDefault();
    const dropdown = document.getElementById("desktop-buku-tamu-dropdown");
    const icon = document.getElementById("desktop-buku-tamu-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Toggle dropdown laporan di mobile
  document.getElementById("laporan-dropdown-btn").addEventListener("click", function() {
    const dropdown = document.getElementById("laporan-dropdown");
    const icon = document.getElementById("laporan-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Toggle dropdown laporan di desktop
  document.getElementById("desktop-laporan-btn").addEventListener("click", function(e) {
    e.preventDefault();
    const dropdown = document.getElementById("desktop-laporan-dropdown");
    const icon = document.getElementById("desktop-laporan-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Close dropdown when click outside
  document.addEventListener("click", function(e) {
    const bukuTamuDropdown = document.getElementById("desktop-buku-tamu-dropdown");
    const bukuTamuBtn = document.getElementById("desktop-buku-tamu-btn");
    const bukuTamuIcon = document.getElementById("desktop-buku-tamu-icon");

    if (bukuTamuBtn && !bukuTamuBtn.contains(e.target) && bukuTamuDropdown && !bukuTamuDropdown.contains(e.target)) {
      if (!bukuTamuDropdown.classList.contains("hidden")) {
        bukuTamuDropdown.classList.add("hidden");
        bukuTamuIcon.classList.remove("fa-chevron-up");
        bukuTamuIcon.classList.add("fa-chevron-down");
      }
    }

    const laporanDropdown = document.getElementById("desktop-laporan-dropdown");
    const laporanBtn = document.getElementById("desktop-laporan-btn");
    const laporanIcon = document.getElementById("desktop-laporan-icon");

    if (laporanBtn && !laporanBtn.contains(e.target) && laporanDropdown && !laporanDropdown.contains(e.target)) {
      if (!laporanDropdown.classList.contains("hidden")) {
        laporanDropdown.classList.add("hidden");
        laporanIcon.classList.remove("fa-chevron-up");
        laporanIcon.classList.add("fa-chevron-down");
      }
    }
  });

        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
</script>

<script>
// Update progress indicator
function updateProgress(step) {
    const steps = [1, 2, 3];
    steps.forEach(s => {
        const stepEl = document.getElementById('step-indicator-' + s);
        if (s < step) {
            stepEl.classList.add('completed');
            stepEl.classList.remove('active');
        } else if (s === step) {
            stepEl.classList.add('active');
            stepEl.classList.remove('completed');
        } else {
            stepEl.classList.remove('active', 'completed');
        }
    });
}

document.getElementById('form-validasi').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const nik = document.getElementById('nik').value;
    
    // Reset alert boxes
    document.getElementById('alert-belum-isi').style.display = 'none';
    document.getElementById('alert-sudah-isi').style.display = 'none';
    document.getElementById('error-message').style.display = 'none';
    
    // Validasi NIK via AJAX
    fetch('<?php echo site_url("Landing/validate_nik"); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'nik=' + nik
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update progress
            updateProgress(2);
            
            // Tampilkan form survei
            document.getElementById('step-validasi').style.display = 'none';
            document.getElementById('step-survei').style.display = 'block';
            
            // Isi data user
            document.getElementById('display-nama').textContent = data.user_data.nama;
            document.getElementById('display-instansi').textContent = data.user_data.asal_instansi;
            document.getElementById('display-keperluan').textContent = data.user_data.keperluan;
            
            // Isi hidden field NIK
            document.getElementById('hidden-nik').value = nik;
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            // Cek tipe error
            if (data.error_type === 'not_found') {
                // Belum isi buku tamu
                document.getElementById('alert-belum-isi').style.display = 'block';
            } else if (data.error_type === 'already_filled') {
                // Sudah isi survei
                document.getElementById('alert-sudah-isi').style.display = 'block';
            } else {
                // Error lainnya
                document.getElementById('error-message').innerHTML = '<i class="fas fa-exclamation-circle mr-2"></i>' + data.message;
                document.getElementById('error-message').style.display = 'block';
            }
            
            // Scroll ke alert
            window.scrollTo({ 
                top: document.querySelector('.form-container').offsetTop - 100, 
                behavior: 'smooth' 
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('error-message').innerHTML = '<i class="fas fa-exclamation-circle mr-2"></i>Terjadi kesalahan sistem';
        document.getElementById('error-message').style.display = 'block';
    });
});

// Handle form survei submission with popup and redirect
const surveyForm = document.querySelector('#step-survei form');
if (surveyForm) {
    surveyForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Kirim form via AJAX
        const formData = new FormData(this);
        
        fetch('<?php echo site_url("Landing/submit_survei"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update progress
                updateProgress(3);
                
                // Tampilkan modal popup
                document.getElementById('modal-overlay').style.display = 'block';
                document.getElementById('modal-success').style.display = 'block';
                
                // Countdown dan redirect
                let seconds = 5;
                const countdownEl = document.getElementById('countdown');
                
                const countdownInterval = setInterval(function() {
                    seconds--;
                    countdownEl.textContent = seconds;
                    
                    if (seconds <= 0) {
                        clearInterval(countdownInterval);
                        window.location.href = '<?php echo base_url("Landing"); ?>';
                    }
                }, 1000);
            } else {
                alert('Terjadi kesalahan saat mengirim survei. Silakan coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan sistem. Silakan coba lagi.');
        });
    });
}

// Only number input for NIK
document.getElementById('nik').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Force equal height for all radio options
function equalizeRadioHeights() {
    document.querySelectorAll('.radio-group').forEach(group => {
        const labels = group.querySelectorAll('label');
        let maxHeight = 0;
        
        // Reset heights first
        labels.forEach(label => label.style.height = 'auto');
        
        // Find max height
        labels.forEach(label => {
            const height = label.offsetHeight;
            if (height > maxHeight) maxHeight = height;
        });
        
        // Apply max height to all
        labels.forEach(label => {
            label.style.height = maxHeight + 'px';
        });
    });
}

// Run on page load and window resize
document.addEventListener('DOMContentLoaded', equalizeRadioHeights);
window.addEventListener('resize', equalizeRadioHeights);
</script>

<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>