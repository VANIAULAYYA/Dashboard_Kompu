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
    --orange: #f97316; /* Tailwind orange-600 */
    --orange-light: #ffedd5; /* Tailwind orange-100 */
    --gray: #374151; /* Tailwind gray-700 */
  }

  body {
    font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    line-height: 1.6;
    margin: 0;
    padding: 0;
  }

  /* Navbar */
  .navbar {
    background-color: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    font-family: 'Poppins', sans-serif;
  }

  .navbar-nav .nav-link {
    color: var(--gray);
    font-size: 1rem;
    font-weight: 500;
    margin-left: 0.8rem;
    margin-right: 0.8rem;
    position: relative;
    transition: color 0.3s ease;
  }

  /* Hover effect dengan animasi underline */
  .navbar-nav .nav-link:hover {
    color: var(--orange);
  }

  .navbar-nav .nav-link:after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: var(--orange);
    transition: width 0.3s;
    position: absolute;
    bottom: 0;
    left: 0;
  }

  .navbar-nav .nav-link:hover:after {
    width: 100%;
  }

  /* === Dropdown konsisten dengan desain #desktop-laporan-dropdown === */
.navbar .dropdown-menu {
  min-width: 16rem !important;          /* samakan lebar */
  padding: 0.5rem 0 !important;         /* padding vertikal */
  border-radius: 0.25rem !important;    /* rounded halus */
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important; /* shadow */
  background-color: #ffffff !important; /* background putih */
  line-height: 2 !important;          /* spasi lebih lega */
  font-family: 'Poppins', sans-serif !important; /* konsisten font */
  top: 100% !important;
  left: -15% !important;
  right: auto !important;
  margin-top: 0.5rem;
  transform: translateX(15%) !important;
}

.navbar .dropdown {
  position: relative; /* biar acuan dropdown tepat ke tombol Laporan */
}

.navbar .dropdown-item {
  display: block;
  padding: 0.25rem 1rem;   /* spacing item */
  font-size: 0.875rem;     /* ukuran font sama */
  color: #374151;          /* warna abu Tailwind */
  font-weight: 500;
  text-decoration: none;
  line-height: 2;        /* spasi antar item */
  border-radius: 0;        /* biar tiap item rata */
  -webkit-text-stroke: 0.2px;    /* tambahin ketebalan tipis */
}

.navbar .dropdown-item:hover {
  background-color: #ffedd5; /* hover orange-light */
  color: #f97316;            /* teks orange */
}

  /* Hero Section */
  .hero-section {
    background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
    color: white;
    padding: 80px 0;
    text-align: center;
  }

  /* Footer */
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
    opacity: 0;
  }

  .arrow.left { left: 20px; }
  .arrow.right { right: 20px; }

  .arrow:hover { background: rgba(0, 0, 0, 0.6); }

  .slideshow-wrapper:hover .arrow {
    opacity: 1;
  }

  /* Social button hover */
  .social-button:hover {
    color: var(--orange);
  }
</style>


  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light shadow-sm">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img src="<?php echo base_url('assets/Pictures/logo-pu.png'); ?>" alt="Logo PU" style="width: 250px; height: auto;">
    </a>

    <!-- Toggler/collapse button (mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link <?php echo $active_menu == 'home' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $active_menu == 'tentang' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/tentang'); ?>">Tentang</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $active_menu == 'buku_tamu' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/buku_tamu'); ?>">Buku Tamu</a>
        </li>

        <!-- Dropdown Laporan -->
        <li class="nav-item dropdown">
          <a class="nav-link <?php echo $active_menu == 'laporan' ? 'active' : ''; ?>" 
             href="#" id="navbarLaporan" role="button" 
             data-bs-toggle="dropdown" data-bs-display="static" 
             aria-expanded="false">
            Laporan <i id="laporan-icon" class="fas fa-chevron-up ms-1"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarLaporan">
            <li><a class="dropdown-item" href="<?php echo base_url('Landing/laporan_harian'); ?>">Laporan PPID</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('Landing/laporan_bulanan'); ?>">Laporan Kompu</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('Landing/laporan_tahunan'); ?>">Survei Kepuasan Masyarakat</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $active_menu == 'medsos' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/medsos'); ?>">Media Sosial</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- JS untuk toggle ikon dropdown -->
<script>
  const laporanToggle = document.getElementById('navbarLaporan');
  const laporanIcon = document.getElementById('laporan-icon');

  // Saat dropdown dibuka
  laporanToggle.addEventListener('show.bs.dropdown', () => {
    laporanIcon.classList.remove('fa-chevron-up');
    laporanIcon.classList.add('fa-chevron-down');
  });

  // Saat dropdown ditutup
  laporanToggle.addEventListener('hide.bs.dropdown', () => {
    laporanIcon.classList.remove('fa-chevron-down');
    laporanIcon.classList.add('fa-chevron-up');
  });
</script>

  <!-- Hero Section -->
  <section class="hero-section">
    <h1 class="display-4 fw-bold mb-3">TENTANG</h1>
    <p class="lead mb-4">LAMPU PETROMAK BBWS BRANTAS</p>
  </section>

  <!-- Full Width Slideshow -->
  <div class="slideshow-wrapper">
    <!-- Slides -->
    <div class="slide active">
      <img src="<?php echo base_url('assets/Pictures/Slide/1.png'); ?>" alt="Slide 1">
    </div>
    <div class="slide">
      <img src="<?php echo base_url('assets/Pictures/Slide/2.png'); ?>" alt="Slide 2">
    </div>
    <div class="slide">
      <img src="<?php echo base_url('assets/Pictures/Slide/3.png'); ?>" alt="Slide 3">
    </div>
    <div class="slide">
      <img src="<?php echo base_url('assets/Pictures/Slide/4.png'); ?>" alt="Slide 4">
    </div>
    <div class="slide">
      <img src="<?php echo base_url('assets/Pictures/Slide/5.png'); ?>" alt="Slide 5">
    </div>
    <div class="slide">
      <img src="<?php echo base_url('assets/Pictures/Slide/6.png'); ?>" alt="Slide 6">
    </div>

    <!-- Arrow Navigation -->
    <span class="arrow left">&#10094;</span>
    <span class="arrow right">&#10095;</span>
  </div>

  <!-- Dot Indicators -->
  <div class="dots"></div>

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
    // let autoSlide = setInterval(nextSlide, 5000);

    // function resetAutoSlide() {
    //   clearInterval(autoSlide);
    //   autoSlide = setInterval(nextSlide, 5000);
    // }

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
