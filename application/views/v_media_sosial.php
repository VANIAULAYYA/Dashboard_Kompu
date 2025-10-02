<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #3498db;
      --secondary: #2c3e50;
      --accent: #e74c3c;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      line-height: 1.6;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .hero-section {
      background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
      color: white;
      padding: 80px 0;
      text-align: center;
    }

    footer {
      background-color: var(--secondary);
      color: white;
      padding: 30px 0;
      text-align: center;
    }

    /* === FULL WIDTH SLIDESHOW === */
    .slideshow-wrapper {
      position: relative;
      width: 100%;
      margin: 0;
      overflow: hidden;
      transition: height 0.4s ease;
    }

    .slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      opacity: 0;
      transition: opacity 1s ease, transform 1.2s ease;
      transform: scale(1.05);
    }

    .slide.active {
      opacity: 1;
      transform: scale(1);
      z-index: 1;
    }

    .slide img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* === DOT INDICATOR === */
    .dots {
      text-align: center;
      margin-top: 15px;
    }

    .dot {
      display: inline-block;
      width: 12px;
      height: 12px;
      margin: 5px;
      background: #bbb;
      border-radius: 50%;
      cursor: pointer;
      transition: background 0.3s;
    }

    .dot.active {
      background: var(--accent);
    }

    /* === ARROW NAVIGATION === */
    .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 2rem;
      color: white;
      background: rgba(0, 0, 0, 0.3);
      padding: 10px 15px;
      border-radius: 50%;
      cursor: pointer;
      user-select: none;
      transition: background 0.3s, opacity 0.4s;
      z-index: 10;
      opacity: 0; /* default hidden */
    }

    .arrow.left {
      left: 20px;
    }

    .arrow.right {
      right: 20px;
    }

    .arrow:hover {
      background: rgba(0, 0, 0, 0.6);
    }

    /* Munculkan panah saat hover slideshow */
    .slideshow-wrapper:hover .arrow {
      opacity: 1;
    }
    .social-button:hover {
      color: orange; /* Change color on hover */
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
  <button id="desktop-laporan-btn" class="nav-link text-gray-700 hover:text-orange-600 transition inline-flex items-center">
    Laporan
    <i id="desktop-laporan-icon" class="fas fa-chevron-down ml-1 text-sm"></i>
  </button>
  <div id="desktop-laporan-dropdown" class="absolute hidden bg-white shadow-lg rounded-md mt-2 w-48">
    <a href="<?php echo base_url('Landing/laporan_harian'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan 1</a>
    <a href="<?php echo base_url('Landing/laporan_bulanan'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan 2</a>
    <a href="<?php echo base_url('Landing/laporan_tahunan'); ?>" class="block px-4 py-2 text-gray-700 hover:bg-orange-100">Laporan 3</a>
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
        <a href="<?php echo base_url('Landing/laporan_harian'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan 1</a>
        <a href="<?php echo base_url('Landing/laporan_bulanan'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan 2</a>
        <a href="<?php echo base_url('Landing/laporan_tahunan'); ?>" class="text-gray-700 hover:text-orange-600 transition">Laporan 3</a>
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

  <!-- Hero Section -->
  <section class="hero-section">
    <h1 class="display-4 fw-bold mb-3">TENTANG</h1>
    <p class="lead mb-4">LAMPU PETROMAK BBWS BRANTAS</p>
  </section>

  <div class="container my-5 py-5">
    <section class="mb-5 text-center">
      <div class="text-center">
        <div class="card feature-card">
          <div class="card-body align-center">
            <h2 class="section-title">Media Sosial</h2>
            <table style="width: 100%; text-align: center;">
              <tr>
                <td>
                  <a href="https://www.sda.pu.go.id/balai/bbwsbrantas" class="social-button mx-3">
                    <i class="fas fa-globe-asia fa-3x"></i>
                  </a>
                </td>
                <td>
                  <a href="https://www.instagram.com/pu_sda_brantas" class="social-button mx-3">
                    <i class="fab fa-instagram fa-3x"></i>
                  </a>
                </td>
                <td>
                  <a href="https://www.youtube.com/@sisdabrantas" class="social-button mx-3">
                    <i class="fab fa-youtube fa-3x"></i>
                  </a>
                </td>
                <td>
                  <a href="http://wa.me/+6282338417445" class="social-button mx-3" target="_blank">
                    <i class="fab fa-whatsapp fa-3x"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td><b>Website</b></td>
                <td><b>Instagram</b></td>
                <td><b>Youtube</b></td>
                <td><b>Whatsapp</b></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer>
    <h3 class="h5">Alamat</h3>
    <p>Jl. Raya Menganti No. 312<br>Surabaya, Jawa Timur</p>
    <hr class="my-4">
    <p class="mb-0">&copy; <?php echo date('Y'); ?> BBWS Brantas. All rights reserved.</p>
  </footer>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const wrapper = document.querySelector('.slideshow-wrapper');
    const dotsContainer = document.querySelector('.dots');
    const arrowLeft = document.querySelector('.arrow.left');
    const arrowRight = document.querySelector('.arrow.right');
    let dots = [];

    // Buat dot sesuai jumlah slide
    slides.forEach((_, i) => {
      const dot = document.createElement('span');
      dot.classList.add('dot');
      if (i === 0) dot.classList.add('active');
      dot.addEventListener('click', () => {
        currentSlide = i;
        showSlide(currentSlide);
        resetAutoSlide();
      });
      dotsContainer.appendChild(dot);
      dots.push(dot);
    });

    function adjustWrapperHeight() {
      const activeSlide = document.querySelector('.slide.active img');
      if (activeSlide) {
        wrapper.style.height = activeSlide.offsetHeight + "px";
      }
    }

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
      });
      dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
      });
      adjustWrapperHeight();
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    }

    // Auto slide tiap 5 detik
    let autoSlide = setInterval(nextSlide, 5000);

    function resetAutoSlide() {
      clearInterval(autoSlide);
      autoSlide = setInterval(nextSlide, 5000);
    }

    // Navigasi manual
    arrowLeft.addEventListener('click', () => {
      prevSlide();
      resetAutoSlide();
    });
    arrowRight.addEventListener('click', () => {
      nextSlide();
      resetAutoSlide();
    });

    // ✅ PAUSE saat hover mouse di slideshow
    wrapper.addEventListener("mouseenter", () => {
      clearInterval(autoSlide);
    });
    wrapper.addEventListener("mouseleave", () => {
      autoSlide = setInterval(nextSlide, 5000);
    });

    window.addEventListener("load", adjustWrapperHeight);
    window.addEventListener("resize", adjustWrapperHeight);
  </script>
</body>
</html>
