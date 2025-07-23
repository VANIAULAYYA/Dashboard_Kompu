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

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url('assets/Pictures/logo-pu.png'); ?>" alt="Logo PU" height="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?php echo $active_menu == 'home' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $active_menu == 'tentang' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/about'); ?>">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Landing/buku_tamu'); ?>">Buku Tamu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Landing/laporan'); ?>">Laporan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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

    // Atur tinggi wrapper sesuai slide aktif
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

    // Auto slide
    let autoSlide = setInterval(nextSlide, 5000);

    function resetAutoSlide() {
      clearInterval(autoSlide);
      autoSlide = setInterval(nextSlide, 5000);
    }

    // Event pada panah navigasi
    arrowLeft.addEventListener('click', () => {
      prevSlide();
      resetAutoSlide();
    });
    arrowRight.addEventListener('click', () => {
      nextSlide();
      resetAutoSlide();
    });

    // Sesuaikan tinggi saat load & resize
    window.addEventListener("load", adjustWrapperHeight);
    window.addEventListener("resize", adjustWrapperHeight);
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
