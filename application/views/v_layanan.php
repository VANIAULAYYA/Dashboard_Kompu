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

  /* Hover effect dengan animasi underline - UNTUK SEMUA MENU */
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

  /* Pastikan dropdown toggle juga dapat underline */
  .navbar-nav .dropdown-toggle.nav-link:after {
    content: '' !important;
    display: block !important;
    width: 0 !important;
    height: 2px !important;
    background: var(--orange) !important;
    transition: width 0.3s !important;
    position: absolute !important;
    bottom: 0 !important;
    left: 0 !important;
  }

  .navbar-nav .dropdown-toggle.nav-link:hover:after {
    width: 100% !important;
  }

  /* Style dropdown yang sudah ada tetap sama */
  .navbar .dropdown-menu {
    min-width: 16rem !important;
    padding: 0.5rem 0 !important;
    border-radius: 0.25rem !important;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    background-color: #ffffff !important;
    line-height: 2 !important;
    font-family: 'Poppins', sans-serif !important;
    top: 100% !important;
    left: -15% !important;
    right: auto !important;
    margin-top: 0.5rem;
    transform: translateX(15%) !important;
  }

  .navbar .dropdown-item {
    display: block;
    padding: 0.25rem 1rem;
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
    text-decoration: none;
    line-height: 2;
    border-radius: 0;
    -webkit-text-stroke: 0.2px;
    transition: all 0.3s ease;
  }

  .navbar .dropdown-item:hover {
    background-color: #ffedd5;
    color: #f97316;
  }

  .navbar .dropdown-toggle::after {
    display: none !important;
  }

  /* Atau jika masih muncul, gunakan selector yang lebih spesifik */
  .navbar-nav .dropdown-toggle::after {
    display: none !important;
    content: none !important;
    border: none !important;
  }

  /* Untuk memastikan tidak ada arrow di mana pun */
  .dropdown-toggle::after {
    display: none !important;
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
.navbar .dropdown-toggle::after {
  display: none !important;
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
                    <a class="nav-link <?php echo isset($active_menu) && $active_menu == 'home' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo isset($active_menu) && $active_menu == 'tentang' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/tentang'); ?>">Tentang</a>
                </li>

                <!-- Dropdown Buku Tamu - FIXED -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo isset($active_menu) && $active_menu == 'buku_tamu' ? 'active' : ''; ?>" 
                       href="#" id="navbarBukuTamu" role="button" 
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Buku Tamu <i id="buku-tamu-icon" class="fas fa-chevron-down ms-1"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarBukuTamu">
                        <li><a class="dropdown-item" href="<?php echo base_url('Landing/buku_tamu'); ?>">Formulir Buku Tamu</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Landing/survei'); ?>">Formulir Survei</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo isset($active_menu) && $active_menu == 'medsos' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/medsos'); ?>">Media Sosial</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo isset($active_menu) && $active_menu == 'layanan' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/layanan'); ?>">Layanan</a>
                </li>

                <!-- Dropdown Laporan - FIXED -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo isset($active_menu) && $active_menu == 'laporan' ? 'active' : ''; ?>" 
                       href="#" id="navbarLaporan" role="button" 
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Publikasi <i id="laporan-icon" class="fas fa-chevron-down ms-1"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarLaporan">
                        <li><a class="dropdown-item" href="<?php echo base_url('Landing/laporan_PPID'); ?>">Laporan PPID</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Landing/laporan_Kompu'); ?>">Laporan Kompu</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Landing/Survei_Kepuasan_Masyarakat'); ?>">Survei Kepuasan Masyarakat</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <h1 class="display-4 fw-bold mb-3">LAYANAN</h1>
    <p class="lead mb-4">LAMPU PETROMAK BBWS BRANTAS</p>
  </section>

  <!-- Dot Indicators -->
<div class="dots"></div>

<div class="container my-5 py-5">
  <section class="mb-5 text-center">
    <div class="text-center">
      <div class="card feature-card">
        <div class="card-body text-center">
          <table style="margin: 0 auto; text-align: center;">
            <tr>
              <td style="display: flex; justify-content: center; gap: 200px;">
                
                <!-- SPANLAPOR (kiri) -->
                <div style="display: flex; flex-direction: column; align-items: center; gap: 5px;">
                  <div style="display: flex; align-items: center; gap: 8px;">
                    <img 
                      src="<?= base_url('assets/lowongan_kerja_lapor.png') ?>" 
                      alt="LAPOR" 
                      width="50" 
                      height="50"
                    >
                    <a 
                      href="https://www.lapor.go.id/" 
                      target="_blank" 
                      style="
                        color: black;
                        font-weight: bold;
                        font-size: 20px;
                        text-decoration: none;
                        transition: color 0.3s ease;
                      "
                      onmouseover="this.style.color='#f97316'" 
                      onmouseout="this.style.color='black'"
                    >
                      LAPOR!
                    </a>
                  </div>
                  <b>SPANLAPOR</b>
                  <p style="margin: 0; font-size: 14px; color: #555;">Layanan pengaduan masyarakat</p>
                </div>

                <!-- WhatsApp (kanan) -->
                <div style="display: flex; flex-direction: column; align-items: center; gap: 5px;">
                  <a href="http://wa.me/+6282338417445" class="social-button" target="_blank">
                    <i class="fab fa-whatsapp fa-3x"></i>
                  </a>
                  <b>Whatsapp</b>
                  <p style="margin: 0; font-size: 14px; color: #555;">Layanan informasi</p>
                </div>

              </td>
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

  <!-- HANYA SATU Bootstrap JS di akhir -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script untuk dropdown -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const bukuTamuToggle = document.getElementById('navbarBukuTamu');
        const bukuTamuIcon = document.getElementById('buku-tamu-icon');
        const laporanToggle = document.getElementById('navbarLaporan');
        const laporanIcon = document.getElementById('laporan-icon');

        function handleDropdown(toggleElement, iconElement, dropdownId) {
            if (!toggleElement || !iconElement) {
                console.warn(`Dropdown elements not found for: ${dropdownId}`);
                return;
            }

            const dropdownElement = toggleElement.closest('.dropdown');
            
            toggleElement.addEventListener('show.bs.dropdown', () => {
                iconElement.classList.remove('fa-chevron-down');
                iconElement.classList.add('fa-chevron-up');
                console.log(`Dropdown opened: ${dropdownId}`);
            });

            toggleElement.addEventListener('hide.bs.dropdown', () => {
                iconElement.classList.remove('fa-chevron-up');
                iconElement.classList.add('fa-chevron-down');
                console.log(`Dropdown closed: ${dropdownId}`);
            });

            // Optional: Handle click outside to close
            document.addEventListener('click', (event) => {
                if (!dropdownElement.contains(event.target)) {
                    iconElement.classList.remove('fa-chevron-up');
                    iconElement.classList.add('fa-chevron-down');
                }
            });
        }

        // Initialize both dropdowns
        handleDropdown(bukuTamuToggle, bukuTamuIcon, 'Buku Tamu');
        handleDropdown(laporanToggle, laporanIcon, 'Publikasi');

        console.log('Dropdown animations initialized');
    });
</script>

</body>
</html>
