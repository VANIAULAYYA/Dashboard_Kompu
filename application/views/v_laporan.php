<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Viewer dengan Thumbnail Navigation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary: #3498db;
      --secondary: #2c3e50;
      --accent: #e74c3c;
      --orange: #f97316;
      --orange-light: #ffedd5;
      --gray: #374151;
      --black: #000000;
    }

    body {
      font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    /* Navbar Styling */
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

    /* Container Utama */
    .main-container {
      max-width: 1400px;
      margin: 30px auto;
      padding: 0 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      padding: 40px 30px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .header h1 {
      color: var(--black);
      font-size: 2.5em;
      margin-bottom: 15px;
      font-weight: 700;
    }

    .header p {
      color: #666;
      font-size: 1.2em;
      margin: 0;
    }

    /* Thumbnails */
    .thumbnails-container {
      margin-bottom: 30px;
      background: white;
      padding: 35px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .thumbnails-title {
      color: var(--orange);
      font-size: 1.6em;
      font-weight: bold;
      margin-bottom: 25px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .thumbnails-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 20px;
    }

    .thumbnail-card {
      background: linear-gradient(135deg, #fff7ed 0%, var(--orange-light) 100%);
      border: 3px solid transparent;
      border-radius: 12px;
      padding: 25px 15px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .thumbnail-card:hover {
      border-color: var(--orange);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(249, 115, 22, 0.3);
    }

    .thumbnail-card.active {
      border-color: var(--orange);
      background: linear-gradient(135deg, var(--orange) 0%, #ea580c 100%);
      color: white;
      box-shadow: 0 8px 20px rgba(249, 115, 22, 0.5);
      transform: scale(1.03);
    }

    .thumbnail-icon {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .thumbnail-page {
      font-size: 0.9em;
      opacity: 0.85;
    }

    /* Viewer Container - DIKECILKAN */
    .viewer-container {
  background: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  width: 80%;                     /* sama dengan pdf-viewer */
  max-width: 900px;               /* biar nggak terlalu lebar di layar besar */
  margin: 40px auto;              /* center horizontal + jarak atas bawah */
  display: flex;
  flex-direction: column;
  align-items: center;            /* konten rata tengah */
  justify-content: center;
}

/* Header di dalam viewer */
.viewer-header {
  background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
  color: white;
  padding: 12px 20px;
  width: 100%;                    /* biar penuh di atas viewer */
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.viewer-header h3 {
  margin: 0;
  font-size: 1.1em;
  display: flex;
  align-items: center;
  gap: 8px;
}

    .page-indicator {
      background: rgba(255,255,255,0.2);
      padding: 6px 16px;
      border-radius: 20px;
      font-weight: bold;
      backdrop-filter: blur(10px);
      font-size: 0.85em;
    }

    .pdf-viewer-wrapper {
  background: white;
  width: 100%;
  position: relative;
}

    .loading-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255,255,255,0.95);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 10;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}

    .loading-overlay.active {
      opacity: 1;
      pointer-events: all;
    }

    .spinner {
      width: 40px;
      height: 40px;
      border: 4px solid #f3f3f3;
      border-top: 4px solid var(--orange);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .loading-text {
      margin-top: 15px;
      color: var(--orange);
      font-weight: bold;
      font-size: 0.9em;
    }

    .pdf-viewer {
  width: 100%;                    /* penuh mengikuti card */
  height: 800px;
  border: none;
  display: block;
  transition: opacity 0.5s ease;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

    /* Navigation Controls - DIKECILKAN */
    .navigation-controls {
      background: #f8f9fa;
      padding: 12px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      border-top: 1px solid #e0e0e0;
    }

    .btn-nav {
      background: var(--orange);
      color: white;
      border: none;
      padding: 8px 18px;
      border-radius: 20px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(249, 115, 22, 0.3);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .btn-nav:hover:not(:disabled) {
      background: #ea580c;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4);
    }

    .btn-nav:active:not(:disabled) {
      transform: translateY(0);
    }

    .btn-nav:disabled {
      background: #ccc;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }

    .btn-group {
      display: flex;
      gap: 8px;
    }

    .btn-fullscreen {
      background: #28a745 !important;
    }

    .btn-fullscreen:hover {
      background: #218838 !important;
    }

    .btn-download {
      background: #ffc107 !important;
      color: #333 !important;
    }

    .btn-download:hover {
      background: #e0a800 !important;
    }

    /* Hero Section */
  .hero-section {
    background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
    color: white;
    padding: 80px 0;
    text-align: center;
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

    /* Responsive */
    @media (max-width: 768px) {
      .main-container {
        padding: 0 10px;
        margin: 20px auto;
      }

      .header {
        padding: 25px 20px;
      }

      .header h1 {
        font-size: 1.8em;
      }

      .header p {
        font-size: 1em;
      }

      .thumbnails-container {
        padding: 25px 20px;
      }

      .thumbnails-title {
        font-size: 1.3em;
      }

      .thumbnails-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
      }

      .thumbnail-card {
        padding: 18px 12px;
      }

      .thumbnail-icon {
        font-size: 15px;
      }

      .pdf-viewer {
        height: 400px;
      }

      .navigation-controls {
        flex-direction: column;
        padding: 12px 15px;
      }

      .btn-group {
        width: 100%;
        flex-direction: column;
      }

      .btn-nav {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light shadow-sm">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/Pictures/logo-pu.png'); ?>" alt="Logo PU" style="width: 250px; height: auto;">
      </a>

      <!-- Toggler button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Buku Tamu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Media Sosial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Layanan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarLaporan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Publikasi <i id="laporan-icon" class="fas fa-chevron-up ms-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarLaporan">
              <li><a class="dropdown-item" href="#">Laporan PPID</a></li>
              <li><a class="dropdown-item" href="#">Laporan Kompu</a></li>
              <li><a class="dropdown-item" href="#">Survei Kepuasan Masyarakat</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
<section class="hero-section">
  <div class="container text-center">
    <h1 class="display-4 fw-bold mb-3">SURVEI KEPUASAN MASYARAKAT</h1>
    <p class="lead mb-0">LAMPU PETROMAK BBWS BRANTAS</p>
  </div>
</section>

  <!-- Main Content -->
  <div class="main-container">
    <!-- Header -->
    <div class="header">
      <h1> Laporan Survei Kepuasan Masyarakat Triwulan III 2025</h1>
    </div>

    <!-- PDF Viewer -->
    <div class="viewer-container">
      <div class="viewer-header">
        <h3>
          <span>📄</span>
          <span id="currentDocTitle">Cover Silabus</span>
        </h3>
        <div class="page-indicator">
          Halaman <span id="currentPageNum">1</span> / <span id="totalPageNum">8</span>
        </div>
      </div>

      <div class="pdf-viewer-wrapper">
        <div class="loading-overlay" id="loadingOverlay">
          <div class="spinner"></div>
          <div class="loading-text">Memuat halaman...</div>
        </div>

        <iframe id="pdfViewer" 
        class="pdf-viewer"
        src="<?= base_url('assets/Laporan_SKM_Triwulan_III_2025.pdf'); ?>"
        width="100%"
        height="800px"
        style="border: none;">
</iframe>
      </div>

      <div class="navigation-controls">
        <button class="btn-nav" id="btnPrev" onclick="navigatePage(-1)">
          <span>←</span> Sebelumnya
        </button>

        <div class="btn-group">
          <button class="btn-nav btn-fullscreen" onclick="toggleFullscreen()">
            <span>⛶</span> Fullscreen
          </button>
          <button class="btn-nav btn-download" onclick="downloadPDF()">
            <span>⬇</span> Download
          </button>
        </div>

        <button class="btn-nav" id="btnNext" onclick="navigatePage(1)">
          Berikutnya <span>→</span>
        </button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Configuration
    const basePDFUrl = '<?= base_url("assets/Laporan_SKM_Triwulan_III_2025.pdf"); ?>';
    const totalPages = 1;
    let currentPage = 1;

    // Load specific PDF page
    function loadPDFPage(page, title) {
      const loading = document.getElementById('loadingOverlay');
      loading.classList.add('active');

      currentPage = page;

      // Update active thumbnail
      const thumbnails = document.querySelectorAll('.thumbnail-card');
      thumbnails.forEach((thumb, index) => {
        thumb.classList.toggle('active', index + 1 === page);
      });

      // Update header
      document.getElementById('currentDocTitle').textContent = title;
      document.getElementById('currentPageNum').textContent = page;

      // Update PDF viewer
      const viewer = document.getElementById('pdfViewer');
      viewer.style.opacity = '0';

      setTimeout(() => {
        viewer.src = basePDFUrl + '#page=' + page;

        setTimeout(() => {
          viewer.style.opacity = '1';
          loading.classList.remove('active');
        }, 600);
      }, 300);

      updateNavigationButtons();

      if (window.innerWidth <= 768) {
        viewer.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    }

    // Navigate with buttons
    function navigatePage(direction) {
      const newPage = currentPage + direction;

      if (newPage < 1 || newPage > totalPages) return;

      const thumbnails = document.querySelectorAll('.thumbnail-card');
      const title = thumbnails[newPage - 1].querySelector('.thumbnail-icon').textContent;

      loadPDFPage(newPage, title);
    }

    // Update navigation button states
    function updateNavigationButtons() {
      const btnPrev = document.getElementById('btnPrev');
      const btnNext = document.getElementById('btnNext');

      btnPrev.disabled = (currentPage === 1);
      btnNext.disabled = (currentPage === totalPages);
    }

    // Fullscreen toggle
    function toggleFullscreen() {
      const wrapper = document.querySelector('.pdf-viewer-wrapper');

      if (!document.fullscreenElement) {
        if (wrapper.requestFullscreen) {
          wrapper.requestFullscreen();
        } else if (wrapper.webkitRequestFullscreen) {
          wrapper.webkitRequestFullscreen();
        } else if (wrapper.msRequestFullscreen) {
          wrapper.msRequestFullscreen();
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        }
      }
    }

    // Download PDF
    function downloadPDF() {
      const link = document.createElement('a');
      link.href = 'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/examples/learning/helloworld.pdf';
      link.download = 'document.pdf';
      link.target = '_blank';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
      if (e.key === 'ArrowLeft') {
        navigatePage(-1);
      } else if (e.key === 'ArrowRight') {
        navigatePage(1);
      } else if (e.key === 'f' || e.key === 'F') {
        toggleFullscreen();
      }
    });

    // Dropdown toggle script
    const laporanToggle = document.getElementById('navbarLaporan');
    const laporanIcon = document.getElementById('laporan-icon');

    laporanToggle.addEventListener('show.bs.dropdown', () => {
      laporanIcon.classList.remove('fa-chevron-up');
      laporanIcon.classList.add('fa-chevron-down');
    });

    laporanToggle.addEventListener('hide.bs.dropdown', () => {
      laporanIcon.classList.remove('fa-chevron-down');
      laporanIcon.classList.add('fa-chevron-up');
    });

    // Initialize
    updateNavigationButtons();

    console.log('📚 PDF Viewer Ready!');
    console.log('💡 Tips: Gunakan keyboard ← → untuk navigasi cepat');
  </script>
</body>
</html>