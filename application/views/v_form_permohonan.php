<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/adminlte.min.css'); ?>">
    <title>Formulir Permohonan Informasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body {
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
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
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: 500;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

/* Radio Button Styles */
.content {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.radio-group {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto auto;
  gap: 10px 30px;
  margin-top: 10px;
}

.radio-group label {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 15px;
  cursor: pointer;
  margin: 0;
}

.radio-group input[type="radio"] {
  transform: scale(1.3);
  cursor: pointer;
  margin-left: 20px;
  margin-right: 6px;
}

.radio-option input[type="radio"]:checked::before {
  content: "";
  width: 10px;
  height: 10px;
  background: #007bff;
  border-radius: 50%;
  position: absolute;
  top: 3px;
  left: 3px;
}

#otherInput {
    display: none;
}

.form-group {
  margin-bottom: 25px;
}

/* Navigation Styles - SAMA SEPERTI KODE PERTAMA */
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

.fade-in {
    animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.rotate-icon:hover {
    transform: rotate(360deg);
}

/* DROPDOWN STYLING - PERBAIKAN AGAR TIDAK KEPOTONG */
#desktop-laporan-dropdown {
    min-width: 16rem !important;
    padding: 0.5rem 0 !important;
    border-radius: 0.25rem !important;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    background-color: #ffffff !important;
    line-height: 1.5 !important;
    font-family: 'Poppins', sans-serif !important;
    padding-left: -2 rem !important;
}

#desktop-laporan-dropdown a {
    display: block;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
    text-decoration: none;
    line-height: 1.7;
    padding: 0.5rem 1rem 0.5rem 0.8rem !important; /* ubah angka terakhir untuk geser kiri-kanan */
}

#desktop-laporan-dropdown a:hover {
    background-color: #ffedd5;
    color: #f97316;
}

/* Pastikan parent container tidak memotong dropdown */
nav .max-w-7xl,
nav .relative {
    overflow: visible !important;
}

/* DROPDOWN STYLING UNTUK KEDUA DROPDOWN */
#desktop-buku-tamu-dropdown,
#desktop-laporan-dropdown {
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

/* Pastikan parent container tidak memotong dropdown */
nav .max-w-7xl,
nav .relative {
    overflow: visible !important;
}

footer {
    background-color: #2c3e50; /* Ganti dengan warna langsung sebagai backup */
    color: white;
    padding: 30px 0;
    text-align: center;
    margin-top: 50px; /* Tambahkan margin atas */
}
</style>

<body>
    <!-- Navigation - SAMA PERSIS DENGAN KODE BUKU TAMU -->
<nav class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <div class="flex-shrink-0 flex items-center">
          <img src="<?php echo base_url();?>assets/Pictures/logo-pu.png" alt="Logo" width="250">
        </div>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center space-x-8 relative">
        <a href="<?php echo base_url('Landing'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Home</a>
        <a href="<?php echo base_url('Landing/tentang'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Tentang</a>

      <!-- Dropdown Buku Tamu (Desktop) -->
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

        <!-- Dropdown (Desktop) -->
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
        <!-- End Dropdown -->
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-gray-700 hover:text-orange-600">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Mobile menu -->
<div id="mobile-menu" class="md:hidden hidden bg-white py-4 px-6 shadow-lg">
  <div class="flex flex-col space-y-4">
    <a href="<?php echo base_url('Landing'); ?>" class="text-gray-700 hover:text-orange-600 transition">Home</a>
    <a href="<?php echo base_url('Landing/tentang'); ?>" class="text-gray-700 hover:text-orange-600 transition">Tentang</a>

    <!-- Dropdown Buku Tamu Mobile -->
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

    <!-- Dropdown Publikasi Mobile -->
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
    <!-- End Dropdown Mobile -->
  </div>
</div>

<script>
  // Toggle mobile menu (hamburger)
  document.getElementById("mobile-menu-button").addEventListener("click", function() {
    document.getElementById("mobile-menu").classList.toggle("hidden");
  });

  // ========== DROPDOWN BUKU TAMU ==========
  
  // Toggle dropdown buku tamu di mobile
  document.getElementById("buku-tamu-dropdown-btn").addEventListener("click", function() {
    const dropdown = document.getElementById("buku-tamu-dropdown");
    const icon = document.getElementById("buku-tamu-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Toggle dropdown buku tamu di desktop (klik)
  document.getElementById("desktop-buku-tamu-btn").addEventListener("click", function(e) {
    e.preventDefault();
    const dropdown = document.getElementById("desktop-buku-tamu-dropdown");
    const icon = document.getElementById("desktop-buku-tamu-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // ========== DROPDOWN LAPORAN/PUBLIKASI ==========
  
  // Toggle dropdown laporan di mobile
  document.getElementById("laporan-dropdown-btn").addEventListener("click", function() {
    const dropdown = document.getElementById("laporan-dropdown");
    const icon = document.getElementById("laporan-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Toggle dropdown laporan di desktop (klik)
  document.getElementById("desktop-laporan-btn").addEventListener("click", function(e) {
    e.preventDefault();
    const dropdown = document.getElementById("desktop-laporan-dropdown");
    const icon = document.getElementById("desktop-laporan-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // ========== CLOSE DROPDOWN WHEN CLICK OUTSIDE ==========
  
  // Close semua dropdown ketika klik di luar
  document.addEventListener("click", function(e) {
    // Dropdown Buku Tamu
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

    // Dropdown Laporan
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

  // Prevent dropdown dari closing ketika klik inside
  const desktopDropdowns = ["desktop-buku-tamu-dropdown", "desktop-laporan-dropdown"];
  desktopDropdowns.forEach(id => {
    const dropdown = document.getElementById(id);
    if (dropdown) {
      dropdown.addEventListener("click", function(e) {
        e.stopPropagation();
      });
    }
  });
</script>

  <!-- Hero Section -->
<section class="hero-section">
  <div class="container text-center">
    <h1 class="display-4 fw-bold mb-3">FORMULIR PERMOHONAN INFORMASI</h1>
    <p class="lead mb-0">BBWS BRANTAS</p>
  </div>
</section>

    <div class="container mx-auto mt-20">
    <div class="form-container">
        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?php echo site_url('permohonan/simpan_permohonan'); ?>" method="post">
            <input type="hidden" name="buku_tamu_id" value="<?= $bukuTamuId ?? '' ?>">
            
            <!-- INFORMASI PERMOHONAN -->
                <div class="mb-3">
                    <label class="form-label">Nomor Pendaftaran</label>
                    <input type="text" class="form-control" value="<?= $bukuTamuId ?? 'ID tidak ditemukan' ?>" readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="text" class="form-control" value="<?= date('d F Y') ?>" readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Cara Penyampaian Permintaan</label>
                    <input type="text" class="form-control" value="Langsung" readonly>
                </div>
                <br>
                <br>

            <!-- Data Pemohon (Auto dari Buku Tamu) -->
            <div class="form-group">
                <h4 class="text-dark fw-bold mb-3 text-center">DATA PEMOHON INFORMASI</h4>
                
                <!-- Jenis Pemohon -->
                <div class="mb-3">
                    <label class="form-label">Jenis Pemohon</label>
                    <select class="form-control" name="jenis_pemohon" required>
                        <option value="">-- Pilih Jenis Pemohon --</option>
                        <option value="Mahasiswa (instansi)">Mahasiswa (instansi)</option>
                        <option value="Media">Media</option>
                        <option value="Instansi">Instansi</option>
                        <option value="LSM">LSM</option>
                        <option value="Perseorangan">Perseorangan</option>
                    </select>
                </div>

                <?php if (isset($bukuTamu)): ?>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="<?= $bukuTamu['nama'] ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Identitas</label>
                    <input type="text" class="form-control" value="<?= $bukuTamu['nik'] ?? '' ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" value="<?= $bukuTamu['no_handphone'] ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?= $bukuTamu['email'] ?? '' ?>" readonly>
                </div>
                <?php else: ?>
                <div class="alert alert-warning">
                    Data pemohon tidak ditemukan. Silakan isi data buku tamu terlebih dahulu.
                </div>
                <?php endif; ?>
            </div>
            <br>
            <br>

            <!-- Form Permohonan Informasi -->
            <div class="form-group">
                <h4 class="text-dark fw-bold mb-3 text-center">PENGAJUAN PERMOHONAN INFORMASI</h4>

                <div class="mb-3">
                    <label class="form-label">Rincian Informasi yang Dibutuhkan</label>
                    <textarea name="uraian_informasi" class="form-control" rows="3" required placeholder="Jelaskan informasi apa yang Anda butuhkan"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tujuan Penggunaan Informasi (Mohon Diperinci)</label>
                    <textarea name="tujuan_penggunaan" class="form-control" rows="3" required placeholder="Jelaskan tujuan penggunaan informasi tersebut"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cara Memperoleh Informasi</label>
                    <select class="form-control" name="cara_memperoleh_informasi" required>
                        <option value="">-- Pilih Cara Memperoleh Informasi --</option>
                        <option value="Melihat/membaca/mendengarkan/mencatat">Melihat/membaca/mendengarkan/mencatat</option>
                        <option value="Mendapatkan salinan informasi (Hardcopy/Softcopy)">Mendapatkan salinan informasi (Hardcopy/Softcopy)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cara Mendapatkan Salinan Informasi</label>
                    <select class="form-control" name="cara_salinan" required>
                        <option value="">-- Pilih Cara Mendapatkan Salinan Informasi--</option>
                        <option value="Diambil Langsung">Diambil Langsung</option>
                        <option value="Via Pos/Ekspedisi">Via Pos/Ekspedisi</option>
                        <option value="Email">Email</option>
                        <option value="Whatsapp">Whatsapp</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
        <label class="form-label">Tanda Tangan Pemohon Informasi</label>
        <div class="border rounded p-3 bg-light">
            <canvas id="signature-pad" width="500" height="200" style="border: 1px solid #ddd; background: white;"></canvas>
            <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="clearSignature()">Hapus TTD</button>
            </div>
            <input type="hidden" name="tanda_tangan" id="tanda_tangan_data">
        </div>
        <small class="text-muted">Sentuh di area yang telah disediakan untuk menandatangani formulir</small>
    </div>
</div>

            <div class="alert alert-info mt-3">
                <small>
                    <strong>Keterangan:</strong> Dengan menandatangani formulir ini, saya menyatakan bahwa seluruh data yang diberikan adalah benar dan sah. Saya bersedia mempertanggungjawabkan serta diproses sesuai peraturan perundang-undangan apabila informasi yang diterima disalahgunakan atau digunakan untuk hal-hal yang menyimpang dari tujuan permohonan.
                </small>
            </div>

            <!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Dokumen Permohonan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="previewContent" style="height: 600px; overflow-y: auto;">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Memuat preview dokumen...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-success" onclick="submitFormFinal()">✅ Submit & Cetak</button>
            </div>
        </div>
    </div>
</div>

<!-- Tombol di bagian bawah form -->
<div class="text-center mt-4">
    <a href="<?= base_url('Landing/buku_tamu') ?>" class="btn btn-secondary me-2">Kembali</a>
    <button type="button" class="btn btn-info me-2" onclick="previewDocument()">
        <i class="fas fa-eye me-1"></i> Preview
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-paper-plane me-1"></i> Submit Permohonan
    </button>
</div>
        </form>
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
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
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

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offset,
                        top: target.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Animate elements when they come into view
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.fade-in');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.2;
            
            if (elementPosition < screenPosition) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('load', animateOnScroll);
</script>
<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    let signaturePad;

    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('signature-pad');
        signaturePad = new SignaturePad(canvas);
        
        // Update hidden input ketika tanda tangan berubah
        signaturePad.addEventListener('endStroke', () => {
            document.getElementById('tanda_tangan_data').value = signaturePad.toDataURL();
        });
    });

    function clearSignature() {
        signaturePad.clear();
        document.getElementById('tanda_tangan_data').value = '';
    }

    // Validasi sebelum submit
    document.querySelector('form').addEventListener('submit', function(e) {
        if (signaturePad && signaturePad.isEmpty()) {
            e.preventDefault();
            alert('Harap berikan tanda tangan digital terlebih dahulu');
        }
    });
</script>


<script>
function previewDocument() {
    // Validasi form dulu
    const form = document.querySelector('form');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    // Validasi tanda tangan
    const tandaTangan = document.getElementById('tanda_tangan_data').value;
    if (!tandaTangan) {
        isValid = false;
        alert('Harap berikan tanda tangan digital terlebih dahulu');
        return;
    }
    
    if (!isValid) {
        alert('Harap lengkapi semua field yang wajib diisi!');
        return;
    }
    
    // Show loading
    document.getElementById('previewContent').innerHTML = `
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Memuat preview dokumen...</p>
        </div>
    `;
    
    // Show modal
    $('#previewModal').modal('show');
    
    // Kirim data untuk preview
    const formData = new FormData(form);
    
    // Tambah data tambahan jika perlu
    const bukuTamuData = <?= json_encode($bukuTamu ?? []) ?>;
    if (bukuTamuData.nama) {
        formData.append('nama', bukuTamuData.nama);
    }
    if (bukuTamuData.no_handphone) {
        formData.append('no_handphone', bukuTamuData.no_handphone);
    }
    if (bukuTamuData.email) {
        formData.append('email', bukuTamuData.email);
    }
    
    fetch('<?= site_url('permohonan/preview_dokumen') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Network error');
        return response.text();
    })
    .then(html => {
        document.getElementById('previewContent').innerHTML = html;
    })
    .catch(error => {
        document.getElementById('previewContent').innerHTML = `
            <div class="alert alert-danger text-center">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Gagal memuat preview: ${error.message}
            </div>
        `;
    });
}

function submitFormFinal() {
    // Submit form asli
    document.querySelector('form').submit();
    $('#previewModal').modal('hide');
    
    // Show loading state
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Menyimpan...';
    submitBtn.disabled = true;
}
</script>
</body>
</html>