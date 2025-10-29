<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/adminlte.min.css'); ?>">
    <title>Buku Tamu</title>
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
    <!-- Navigation - SAMA PERSIS DENGAN KODE PERTAMA -->
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
    <h1 class="display-4 fw-bold mb-3">FORMULIR BUKU TAMU</h1>
    <p class="lead mb-0">LAMPU PETROMAK BBWS BRANTAS</p>
  </div>
</section>

    <div class="container mx-auto mt-20">
    <div class="form-container">
        <form action="<?php echo site_url('Landing/submit'); ?>" method="post">
            <!-- KOLOM BARU: NIK -->
            <div class="form-group">
                <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK 16 digit" maxlength="16" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="asal_instansi">Asal Instansi/Pribadi</label>
                <input type="text" class="form-control" name="asal_instansi" placeholder="Masukkan asal instansi/pribadi Anda">
            </div>
            
            <div class="form-group">
                <label for="no_handphone">No. Handphone yang bisa dihubungi</label>
                <input type="text" class="form-control" name="no_handphone" placeholder="Masukkan no. handphone Anda">
            </div>

            <!-- KOLOM BARU: EMAIL -->
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan alamat email Anda">
            </div>
            
            <div class="form-group">
                <label for="keperluan" class="block font-semibold mb-2">Keperluan</label>
                <select id="keperluan" name="keperluan" required class="form-control" onchange="toggleOtherInput()">
                    <option value="">-- Pilih Keperluan --</option>
                    <option value="Menemui Pejabat/Staff">Menemui Pejabat/Staff</option>
                    <option value="Rekomendasi Teknis (Rekomtek)">Rekomendasi Teknis (Rekomtek)</option>
                    <option value="Kirim Surat (Promosi/Aduan/Temuan)">Kirim Surat (Promosi/Aduan/Temuan)</option>
                    <option value="Permintaan Data/Informasi">Permintaan Data/Informasi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            
            <div class="form-group" id="otherInput" style="display: none;">
                <label for="otherText" class="block font-semibold mb-2">Tuliskan lebih lanjut:</label>
                <input type="text" class="form-control" id="otherText" name="kategori_lainnya" placeholder="Berikan detail Keperluan">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
        function toggleOtherInput() {
    const keperluanSelect = document.getElementById('keperluan');
    const otherInput = document.getElementById('otherInput');
    const otherText = document.getElementById('otherText');
    
    if (keperluanSelect.value === 'lainnya') {
        otherInput.style.display = 'block';
        otherText.required = true;
    } else {
        otherInput.style.display = 'none';
        otherText.required = false;
        otherText.value = '';
    }
}

// Jalankan sekali saat halaman load
document.addEventListener('DOMContentLoaded', function() {
    toggleOtherInput();
});
    </script>
<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>