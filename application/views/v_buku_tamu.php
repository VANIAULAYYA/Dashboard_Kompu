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
    font-family: 'Arial', sans-serif;
    scroll-behavior: smooth;
}

.hero-section {
    height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('<?php echo base_url();?>assets/Pictures/kantor.png');
    background-size: cover;
    background-position: center;
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
    position: fixed; /* Navbar tetap */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

/* --- PERBAIKAN RADIO BUTTON --- */
.content {
    display: flex;
    flex-direction: column; /* Agar pertanyaan ke bawah */
    gap: 15px; /* Jarak antar pertanyaan */
}

/* Atur wrapper group radio */
/* Wrapper untuk 1 pertanyaan */
/* Grid pertanyaan: 2 kolom */
/* Grid pertanyaan: 2 kolom */
.radio-group {
  display: grid;
  grid-template-columns: 1fr 1fr; /* 2 kolom */
  grid-template-rows: auto auto; /* 2 baris */
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

/* Besarin bullet */
.radio-group input[type="radio"] {
  transform: scale(1.3); /* gedein bullet */
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
    display: none; /* Sembunyikan input lainnya */
}

.form-group {
  margin-bottom: 25px; /* atur jarak antar pertanyaan */
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

#desktop-laporan-dropdown {
    min-width: 16rem !important;
    padding: 0.5rem 0 !important;
    border-radius: 0.25rem !important;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    background-color: #ffffff !important;
    line-height: 1.5 !important;
    font-family: 'Poppins', sans-serif !important;
}

#desktop-laporan-dropdown a {
    display: block;
    padding: 0.25rem 1rem;
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
    text-decoration: none;
    line-height: 1.5;
}

#desktop-laporan-dropdown a:hover {
    background-color: #ffedd5;
    color: #f97316;
}

    </style>
    
</head>
<body>
    <!-- Navigation -->
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
        <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Buku Tamu</a>

        <!-- Dropdown (Desktop) -->
        <!-- Dropdown (Desktop) -->
<div class="relative" id="desktop-laporan">
  <button id="desktop-laporan-btn" class="nav-link text-gray-700 hover:text-orange-600 transition">
    Laporan
    <i id="desktop-laporan-icon" class="fas fa-chevron-down ml-1 text-sm"></i>
  </button>
  <div id="desktop-laporan-dropdown" class="absolute hidden bg-white shadow-lg rounded-md mt-2 w-48">
    <a href="<?php echo base_url('Landing/laporan_PPID'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan PPID</a>
    <a href="<?php echo base_url('Landing/laporan_Kompu'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan Kompu</a>
    <a href="<?php echo base_url('Landing/Survei_Kepuasan_Masyarakat'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Survei Kepuasan Masyarakat</a>
  </div>
</div>

        <!-- End Dropdown -->

        <a href="<?php echo base_url('Landing/medsos'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Media Sosial</a>
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
    <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="text-gray-700 hover:text-orange-600 transition">Buku Tamu</a>

    <!-- Dropdown Mobile -->
    <div>
      <button id="laporan-dropdown-btn" class="w-full flex justify-between items-center text-gray-700 hover:text-orange-600 transition">
        Laporan
        <i id="laporan-icon" class="fas fa-chevron-down ml-2"></i>
      </button>
      <div id="laporan-dropdown" class="hidden flex flex-col pl-4 mt-2 space-y-2">
        <a href="<?php echo base_url('Landing/laporan_harian'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan PPID</a>
        <a href="<?php echo base_url('Landing/laporan_bulanan'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan Kompu</a>
        <a href="<?php echo base_url('Landing/laporan_tahunan'); ?>" class="text-gray-700 hover:text-orange-600 transition">Survei Kepuasan Masyarakat</a>
      </div>
    </div>
    <!-- End Dropdown Mobile -->

    <a href="<?php echo base_url('Landing/medsos'); ?>" class="text-gray-700 hover:text-orange-600 transition">Media Sosial</a>
  </div>
</div>

<script>
  // Toggle mobile menu (hamburger)
  document.getElementById("mobile-menu-button").addEventListener("click", function() {
    document.getElementById("mobile-menu").classList.toggle("hidden");
  });

  // Toggle dropdown laporan di mobile
  document.getElementById("laporan-dropdown-btn").addEventListener("click", function() {
    const dropdown = document.getElementById("laporan-dropdown");
    const icon = document.getElementById("laporan-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });
  // Toggle mobile menu (hamburger)
  document.getElementById("mobile-menu-button").addEventListener("click", function() {
    document.getElementById("mobile-menu").classList.toggle("hidden");
  });

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
    e.preventDefault(); // mencegah scroll ke atas jika button
    const dropdown = document.getElementById("desktop-laporan-dropdown");
    const icon = document.getElementById("desktop-laporan-icon");
    dropdown.classList.toggle("hidden");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });

  // Optional: klik di luar dropdown untuk menutup
  document.addEventListener("click", function(e) {
    const dropdown = document.getElementById("desktop-laporan-dropdown");
    const btn = document.getElementById("desktop-laporan-btn");
    const icon = document.getElementById("desktop-laporan-icon");

    if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
      if (!dropdown.classList.contains("hidden")) {
        dropdown.classList.add("hidden");
        icon.classList.remove("fa-chevron-up");
        icon.classList.add("fa-chevron-down");
      }
    }
  });
</script>

    <div class="container mx-auto mt-20">
        <div class="form-container">
            <form action="<?php echo site_url('Landing/submit'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
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
                <div class="form-group" id="otherInput">
                    <label for="otherText" class="block font-semibold mb-2">Tuliskan lebih lanjut:</label>
                    <input type="text" class="form-control" id="otherText" name="kategori_lainnya" placeholder="Berikan detail Keperluan">
                </div>

                <!-- Pertanyaan 1 -->
<div class="form-group">
  <label>1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_pelayanan" value="4" required> Sangat Sesuai</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_pelayanan" value="3"> Sesuai</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_pelayanan" value="2"> Kurang Sesuai</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_pelayanan" value="1"> Tidak Sesuai</label>
  </div>
</div>

<!-- Pertanyaan 2 -->
<div class="form-group">
  <label>2. Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pemahaman_prosedur" value="4" required> Sangat Mudah</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pemahaman_prosedur" value="3"> Mudah</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pemahaman_prosedur" value="2"> Kurang Mudah</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pemahaman_prosedur" value="1"> Tidak Mudah</label>
  </div>
</div>

<!-- Pertanyaan 3 -->
<div class="form-group">
  <label>3. Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_kecepatan" value="4" required> Sangat Cepat</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_kecepatan" value="3"> Cepat</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_kecepatan" value="2"> Kurang Cepat</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_kecepatan" value="1"> Tidak Cepat</label>
  </div>
</div>

<!-- Pertanyaan 4 -->
<div class="form-group">
  <label>4. Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_biaya" value="4" required> Sangat Wajar</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_biaya" value="3"> Wajar</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_biaya" value="2"> Kurang Wajar</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_biaya" value="1"> Tidak Wajar</label>
  </div>
</div>

<!-- Pertanyaan 5 -->
<div class="form-group">
  <label>5. Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dengan hasil yang diberikan?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_produk" value="4" required> Sangat Sesuai</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_produk" value="3"> Sesuai</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_produk" value="2"> Kurang Sesuai</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_produk" value="1"> Tidak Sesuai</label>
  </div>
</div>

<!-- Pertanyaan 6 -->
<div class="form-group">
  <label>6. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_kompetensi" value="4" required> Sangat Kompeten</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_kompetensi" value="3"> Kompeten</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_kompetensi" value="2"> Kurang Kompeten</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_kompetensi" value="1"> Tidak Kompeten</label>
  </div>
</div>

<!-- Pertanyaan 7 -->
<div class="form-group">
  <label>7. Bagaimana pendapat Saudara tentang perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_perilaku" value="4" required> Sangat Baik</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_perilaku" value="3"> Baik</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_perilaku" value="2"> Kurang Baik</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_perilaku" value="1"> Tidak Baik</label>
  </div>
</div>

<!-- Pertanyaan 8 -->
<div class="form-group">
  <label>8. Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_kualitas" value="4" required> Sangat Baik</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_kualitas" value="3"> Baik</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_kualitas" value="2"> Kurang Baik</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_kualitas" value="1"> Tidak Baik</label>
  </div>
</div>

<!-- Pertanyaan 9 -->
<div class="form-group">
  <label>9. Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?</label>
  <div class="radio-group">
    <label style="grid-column: 1; grid-row: 1;"><input type="radio" name="pendapat_pengaduan" value="4" required> Sangat Baik</label>
    <label style="grid-column: 1; grid-row: 2;"><input type="radio" name="pendapat_pengaduan" value="3"> Baik</label>
    <label style="grid-column: 2; grid-row: 1;"><input type="radio" name="pendapat_pengaduan" value="2"> Kurang Baik</label>
    <label style="grid-column: 2; grid-row: 2;"><input type="radio" name="pendapat_pengaduan" value="1"> Tidak Baik</label>
  </div>
</div>

                <div class="form-group">
                    <label for="kritik_saran">10. Kritik dan Saran Perbaikan</label>
                    <textarea class="form-control" name="kritik_saran" placeholder="Masukkan kritik dan saran Anda"></textarea>
                </div>
                <div class="form-group text-right">
    <button type="submit" class="btn btn-primary">Kirim</button>
    <button type="reset" class="btn btn-secondary">Clear Form</button>
</div>
            </form>
        </div>
    </div>

    <!-- Back to Top button -->
    <button id="back-to-top" class="hidden fixed bottom-8 right-8 w-12 h-12 bg-orange-600 text-white rounded-full shadow-lg hover:bg-orange-700 transition">
        <i class="fas fa-arrow-up"></i>
    </button>

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
            const select = document.getElementById("keperluan");
            const otherInput = document.getElementById("otherInput");
            if (select.value === "lainnya") {
                otherInput.style.display = "block"; // Tampilkan input lainnya
            } else {
                otherInput.style.display = "none"; // Sembunyikan input lainnya
            }
        }
    </script>
<script src="<?php echo base_url('assets/AdminLTE/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>