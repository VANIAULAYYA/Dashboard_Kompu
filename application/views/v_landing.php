<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMPU BRANTAS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .gradient-bg {
           background: linear-gradient(135deg, #1e3a8a);
        }
        
        .hero-section {
            /* height: 100vh; */
            background: url('<?php echo base_url();?>assets/Pictures/Banner.png');
            background-size: cover;       /* Ensures the image covers the whole section */
            background-position: center;  /* Keeps the image centered */
            background-repeat: no-repeat; /* Prevents image from repeating */
            height: 100vh;                /* Full viewport height */
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;                 /* Or another color that contrasts the background */
            padding: 2rem;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 60vh;
                padding: 1rem;
            }
        }

        .hero-content h1 {
            font-size: 1.8rem;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
    text-decoration: none;
    line-height: 1.7;
}

#desktop-laporan-dropdown a:hover {
    background-color: #ffedd5;
    color: #f97316;
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
    </style>
</head>
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
    <section class="hero-section flex items-center justify-center text-white">
        <div class="text-center px-4 fade-in">
        <!-- <h1 class="text-4xl md:text-6xl font-bold mb-6" style="font-family: 'Georgia', sans-serif;">LAMPU PETROMAK</h1>
            <h2 class="md:text-4xl font-bold" style="color: orange;">BBWS BRANTAS</h2> -->
            
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">LAYANAN KOMUNIKASI PUBLIK</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Balai Besar Wilayah Sungai Brantas</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chalkboard-teacher text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Kepuasan Masyarakat</h3>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-envelope-open-text text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Permintaan Data</h3>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullhorn text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Pengaduan</h3>
                    
                </div>
                <!-- Feature 4 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="	fa fa-desktop text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Informasi</h3>
                    
                </div>
            </div>
        </div>
    </section>

   <!-- Stats Section -->
<section class="gradient-bg py-20 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-6">
                <h3 class="text-youre-the-is-animated text-4xl md:text-5xl font-bold mb-2">
                    <span id="simpleResponden">0</span>
                </h3>
                <p class="text-lg">Kunjungan</p>
            </div>
            <div class="p-6">
                <h3 class="text-4xl md:text-5xl font-bold mb-2">
                    <span id="simplePersentase">0.0</span>%
                    <span class="text-lg block mt-1"></span>
                </h3>
                <p class="text-lg">Kepuasan Masyarakat</p>
            </div>
            <div class="p-6">
                <h5 class="text-4xl md:text-5xl font-bold mb-2">Senin-Jumat <br>07.30-16.00 WIB</h5>
                <p class="text-lg">Waktu Layanan</p>
            </div>
        </div>
    </div>
</section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Buku Tamu</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">Silahkan isi Buku Tamu pada tombol dibawah ini</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="bg-white text-blue-600 px-8 py-3 rounded-full text-lg font-medium hover:shadow-lg transition transform hover:scale-105">Menuju Formulir</a>
            </div>
        </div>
    </section>


    <!-- Horizontal Polaroid Slider -->
<section id="activities" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Galeri Kegiatan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Dokumentasi berbagai aktivitas dan pelayanan KOMPU BBWS Brantas</p>
        </div>

        <!-- Slider Container -->
        <div class="relative">
            <!-- Navigation Buttons -->
            <button class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 z-10 bg-white rounded-full w-10 h-10 shadow-lg flex items-center justify-center hover:bg-gray-100 transition duration-300" onclick="scrollSlider(-1)">
                <i class="fas fa-chevron-left text-gray-700"></i>
            </button>
            
            <button class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 z-10 bg-white rounded-full w-10 h-10 shadow-lg flex items-center justify-center hover:bg-gray-100 transition duration-300" onclick="scrollSlider(1)">
                <i class="fas fa-chevron-right text-gray-700"></i>
            </button>

            <!-- Slider Track -->
            <div class="overflow-hidden">
                <div id="sliderTrack" class="flex space-x-8 pb-8 transition-transform duration-500 ease-in-out">
                    <!-- Polaroid 1 -->
                    <div class="polaroid-item flex-shrink-0 w-80 transform rotate-2 hover:rotate-0 transition-all duration-500">
                        <div class="bg-white p-4 shadow-2xl rounded-sm">
                            <div class="polaroid-image mb-4">
                                <img src="<?= base_url('assets/Soetami.jpg') ?>" 
                     alt="Pelayanan Publik" 
                     class="w-full h-64 object-cover rounded-sm"
                     onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">
            </div>
                            <div class="polaroid-caption text-center">
                                <p class="text-gray-800 font-medium">Soetami ( Karang Kates )</p>
                                <p class="text-gray-500 text-sm mt-1">Bendungan Karang Kates dibangun pada era Orde Baru, tepatnya mulai dibangun pada tahun 1963 dan diresmikan pada tahun 1972.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Polaroid 2 -->
                    <div class="polaroid-item flex-shrink-0 w-80 transform -rotate-1 hover:rotate-0 transition-all duration-500">
                        <div class="bg-white p-4 shadow-2xl rounded-sm">
                            <div class="polaroid-image mb-4">
                                <img src="<?= base_url('assets/Tugu.jpg') ?>" 
                     alt="Pelayanan Publik" 
                     class="w-full h-64 object-cover rounded-sm"
                     onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">
            </div>
                            <div class="polaroid-caption text-center">
                                <p class="text-gray-800 font-medium">Tugu</p>
                                <p class="text-gray-500 text-sm mt-1">Bendungan Tugu diresmikan pada tahun 2022 oleh Presiden Republik Indonesia yang terletak di Desa Nglebo, Kecamatan Tugu, Kabupaten Trenggalek.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Polaroid 3 -->
                    <div class="polaroid-item flex-shrink-0 w-80 transform rotate-3 hover:rotate-0 transition-all duration-500">
                        <div class="bg-white p-4 shadow-2xl rounded-sm">
                            <div class="polaroid-image mb-4">
                                <img src="<?= base_url('assets/Bajulmati.jpg') ?>" 
                     alt="Pelayanan Publik" 
                     class="w-full h-64 object-cover rounded-sm"
                     onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">
            </div>
                            <div class="polaroid-caption text-center">
                                <p class="text-gray-800 font-medium">Bajulmati</p>
                                <p class="text-gray-500 text-sm mt-1">Bendungan Bajulmati berada di Kecamatan Banyuputih, Kabupaten Situbondo mulai dibangun pada tahun 2006 dan resmi dioperasikan pada tahun 2015.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Polaroid 4 -->
                    <div class="polaroid-item flex-shrink-0 w-80 transform -rotate-2 hover:rotate-0 transition-all duration-500">
                        <div class="bg-white p-4 shadow-2xl rounded-sm">
                            <div class="polaroid-image mb-4">
                                <img src="<?= base_url('assets/Soetami2.jpg') ?>" 
                     alt="Pelayanan Publik" 
                     class="w-full h-64 object-cover rounded-sm"
                     onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">
            </div>
                            <div class="polaroid-caption text-center">
                                <p class="text-gray-800 font-medium">Soetami ( Karang Kates )</p>
                                <p class="text-gray-500 text-sm mt-1">Terletak di Kecamatan Sumberpucung, Kabupaten Malang, bendungan ini bukan hanya berfungsi sebagai pengendali air, tetapi juga menjadi simbol keseimbangan antara manusia dan alam.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Polaroid 5 -->
                    <div class="polaroid-item flex-shrink-0 w-80 transform rotate-1 hover:rotate-0 transition-all duration-500">
                        <div class="bg-white p-4 shadow-2xl rounded-sm">
                            <div class="polaroid-image mb-4">
                                <img src="<?= base_url('assets/Tugu2.jpg') ?>" 
                     alt="Pelayanan Publik" 
                     class="w-full h-64 object-cover rounded-sm"
                     onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">
            </div>
                            <div class="polaroid-caption text-center">
                                <p class="text-gray-800 font-medium">Tugu</p>
                                <p class="text-gray-500 text-sm mt-1">Bendungan ini bukan sekadar proyek fisik, melainkan simbol dari komitmen pemerintah untuk memperkuat ketahanan pangan, air, dan energi di wilayah selatan Jawa yang selama ini kurang terjamah oleh pembangunan besar.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Polaroid 6 -->
                    <div class="polaroid-item flex-shrink-0 w-80 transform -rotate-3 hover:rotate-0 transition-all duration-500">
                        <div class="bg-white p-4 shadow-2xl rounded-sm">
                            <div class="polaroid-image mb-4">
                                <img src="<?= base_url('assets/Bajulmati2.jpg') ?>" 
                     alt="Pelayanan Publik" 
                     class="w-full h-64 object-cover rounded-sm"
                     onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">
            </div>
                            <div class="polaroid-caption text-center">
                                <p class="text-gray-800 font-medium">Bajulmati</p>
                                <p class="text-gray-500 text-sm mt-1">Lokasinya yang berada di antara dua kabupaten membuat bendungan ini memiliki peran strategis, baik dari segi sumber daya air maupun pengembangan wilayah.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Dots Indicator -->
        <div class="flex justify-center space-x-2 mt-8">
            <div class="w-3 h-3 bg-orange-400 rounded-full dot-indicator active"></div>
            <div class="w-3 h-3 bg-gray-300 rounded-full dot-indicator"></div>
            <div class="w-3 h-3 bg-gray-300 rounded-full dot-indicator"></div>
        </div>
        
    </div>
</section>

   <!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-52 sm:px-56 lg:px-60">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-start">
            <!-- Kolom 1: Info Perusahaan & Kontak -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-bold mb-4">HUBUNGI KAMI</h3>
                </div>
                
                <!-- Informasi Kontak -->
<div class="space-y-4">
  <!-- Alamat -->
  <a href="https://maps.google.com/?q=Jl.+Raya+Menganti+No.312,+Wiyung,+Surabaya" 
     target="_blank" 
     class="flex items-start group cursor-pointer">
    <i class="fas fa-map-marker-alt text-gray-400 group-hover:text-orange-400 transition mt-1 mr-3 w-5 text-center flex-shrink-0"></i>
    <span class="text-gray-400 text-sm">
      Jl. Raya Menganti No.312, Wiyung
    </span>
  </a>

  <!-- WhatsApp -->
  <a href="https://wa.me/6282338417445" 
     target="_blank" 
     class="flex items-start group cursor-pointer">
    <i class="fab fa-whatsapp text-gray-400 group-hover:text-orange-400 transition mt-1 mr-3 w-5 text-center flex-shrink-0"></i>
    <div>
      <span class="text-gray-400 text-sm block">
        082338417445
      </span>
      <span class="text-gray-400 text-xs">(Hanya Chat WhatsApp)</span>
    </div>
  </a>

  <!-- Email -->
  <a href="mailto:kompu.sda.brantas@pu.go.id?subject=Permintaan%20Informasi&body=Halo%20tim%20BBWS%20Brantas,%0D%0A%0D%0ASaya%20ingin%20menanyakan%20tentang..."
     class="flex items-start group cursor-pointer">
    <i class="fas fa-envelope text-gray-400 group-hover:text-orange-400 transition mt-1 mr-3 w-5 text-center flex-shrink-0"></i>
    <span class="text-gray-400 text-sm">
      kompu.sda.brantas@pu.go.id
    </span>
  </a>
</div>
            </div>

            <!-- Kolom 2: Media Sosial -->
            <div class="space-y-4 md:col-span-2">
                <h3 class="text-xl font-bold text-white text-left mb-6 pl-56">MEDIA SOSIAL</h3>
                <div class="grid grid-cols-2 gap-x-16 gap-y-4 max-w-xl ml-32">
                    <a href="https://www.facebook.com/profile.php?id=100081895749516&_rdc=2&_rdr#" class="flex items-center text-gray-400 transition group">
                        <i class="fab fa-facebook-f text-base w-5 text-center mr-3 group-hover:text-orange-400 transition flex-shrink-0"></i>
                        <span class="text-sm">Facebook</span>
                    </a>
                    
                    <a href="https://www.instagram.com/pu_sda_brantas" class="flex items-center text-gray-400 transition group" target="_blank">
                        <i class="fab fa-instagram text-base w-5 text-center mr-3 group-hover:text-orange-400 transition flex-shrink-0"></i>
                        <span class="text-sm">Instagram</span>
                    </a>
                    
                    <a href="https://x.com/pu_sda_brantas" class="flex items-center text-gray-400 transition group">
                        <i class="fab fa-twitter text-base w-5 text-center mr-3 group-hover:text-orange-400 transition flex-shrink-0"></i>
                        <span class="text-sm">Twitter</span>
                    </a>
                    
                    <a href="https://www.youtube.com/@sisdabrantas" class="flex items-center text-gray-400 transition group">
                        <i class="fab fa-youtube text-base w-5 text-center mr-3 group-hover:text-orange-400 transition flex-shrink-0"></i>
                        <span class="text-sm">YouTube</span>
                    </a>
                    
                    <a href="https://www.threads.com/@pu_sda_brantas" class="flex items-center text-gray-400 transition group">
                        <i class="fab fa-threads text-base w-5 text-center mr-3 group-hover:text-orange-400 transition flex-shrink-0"></i>
                        <span class="text-sm">Threads</span>
                    </a>
                    
                    <a href="https://www.tiktok.com/@pu_sda_brantas" class="flex items-center text-gray-400 transition group">
                        <i class="fab fa-tiktok text-base w-5 text-center mr-3 group-hover:text-orange-400 transition flex-shrink-0"></i>
                        <span class="text-sm">TikTok</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p class="text-sm">&copy; 2025 KOMPU BBWS BRANTAS. All rights reserved.</p>
        </div>
    </div>
</footer>

    <!-- Back to Top button -->
    <button id="back-to-top" class="hidden fixed bottom-8 right-8 w-12 h-12 bg-orange-600 text-white rounded-full shadow-lg hover:bg-orange-700 transition">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
// Data dari PHP
const targetData = {
    responden: <?= isset($total_responden) ? $total_responden : 0 ?>,
    persentase: <?= isset($persentase_ikm) ? $persentase_ikm : 0 ?>,
    nilai: <?= isset($nilai_ikm) ? $nilai_ikm : 0 ?>
};

// Simple counting animation
function simpleCountUp(elementId, target, isDecimal = false) {
    const element = document.getElementById(elementId);
    let current = 0;
    const increment = target / 100; // 100 frame animation
    const duration = 2000; // 2 seconds
    const intervalTime = duration / 100;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        
        if (isDecimal) {
            element.textContent = current.toFixed(1);
        } else {
            element.textContent = Math.floor(current).toLocaleString();
        }
    }, intervalTime);
}

// Start all animations
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        simpleCountUp('simpleResponden', targetData.responden, false);
        simpleCountUp('simplePersentase', targetData.persentase, true);
        simpleCountUp('simpleNilai', targetData.nilai, true);
    }, 800);
});
</script>

<script>
let currentPosition = 0;
const sliderTrack = document.getElementById('sliderTrack');
const slideWidth = 328; // width + gap (w-80 = 320px + gap-8 = 32px)
let isScrolling = true;

// Clone slides untuk infinite loop yang smooth
function setupInfiniteScroll() {
    const slides = Array.from(sliderTrack.children);
    
    // Clone semua slide dan append ke belakang
    slides.forEach(slide => {
        const clone = slide.cloneNode(true);
        sliderTrack.appendChild(clone);
    });
    
    // Clone lagi untuk buffer
    slides.forEach(slide => {
        const clone = slide.cloneNode(true);
        sliderTrack.appendChild(clone);
    });
}

// Smooth auto scroll
function autoScroll() {
    if (!isScrolling) {
        requestAnimationFrame(autoScroll);
        return;
    }
    
    currentPosition += 1.2; // Kecepatan scroll
    
    // Reset position saat sampai di clone pertama
    const totalSlides = 7; // Jumlah slide asli
    const maxPosition = totalSlides * slideWidth;
    
    if (currentPosition >= maxPosition) {
        currentPosition = 0;
        sliderTrack.style.transition = 'none';
        sliderTrack.style.transform = `translateX(-${currentPosition}px)`;
        
        // Re-enable transition setelah reset
        setTimeout(() => {
            sliderTrack.style.transition = 'transform 0.3s linear';
        }, 50);
    } else {
        sliderTrack.style.transform = `translateX(-${currentPosition}px)`;
    }
    
    requestAnimationFrame(autoScroll);
}

// Manual scroll with buttons
function scrollSlider(direction) {
    currentPosition += direction * slideWidth;
    
    const totalSlides = 7;
    const maxPosition = totalSlides * slideWidth;
    
    if (currentPosition < 0) {
        currentPosition = maxPosition - slideWidth;
    } else if (currentPosition >= maxPosition) {
        currentPosition = 0;
    }
    
    sliderTrack.style.transition = 'transform 0.5s ease-in-out';
    sliderTrack.style.transform = `translateX(-${currentPosition}px)`;
}

// Pause on hover - Apply ke seluruh section
const sliderSection = document.querySelector('#activities .relative');

if (sliderSection) {
    sliderSection.addEventListener('mouseenter', () => {
        isScrolling = false;
        console.log('Scroll PAUSED');
    });

    sliderSection.addEventListener('mouseleave', () => {
        isScrolling = true;
        console.log('Scroll RESUMED');
        sliderTrack.style.transition = 'transform 0.3s linear';
    });
}

// Juga apply ke slider track
sliderTrack.addEventListener('mouseenter', () => {
    isScrolling = false;
});

sliderTrack.addEventListener('mouseleave', () => {
    isScrolling = true;
    sliderTrack.style.transition = 'transform 0.3s linear';
});

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    setupInfiniteScroll();
    sliderTrack.style.transition = 'transform 0.3s linear';
    autoScroll();
});
</script>

</body>
</html>