<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?> - LAMPU PETROMAK BBWS BRANTAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary: #4e73df;
      --secondary: #1a1a2e;
      --accent: #5a67d8;
      --orange: #4e73df;
      --orange-light: #e3e7f3;
      --gray: #374151;
      --black: #000000;
      --white: #ffffff;
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

    /* Hero Section */
    .hero-section {
      background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
      color: white;
      padding: 80px 0;
      text-align: center;
    }

    /* Filter Section */
    .filter-section {
      background: white;
      border-radius: 12px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .filter-title {
      color: var(--orange);
      font-size: 1.4em;
      font-weight: bold;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .filter-group {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 20px;
    }

    .form-label {
      font-weight: 600;
      color: var(--gray);
      margin-bottom: 8px;
    }

    .form-select {
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      padding: 10px 15px;
      font-size: 0.95em;
      transition: all 0.3s ease;
    }

    .form-select:focus {
      border-color: var(--orange);
      box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
    }

    /* Period Cards */
    .period-section {
      margin-bottom: 40px;
    }

    .period-title {
      color: var(--secondary);
      font-size: 1.6em;
      font-weight: bold;
      margin-bottom: 25px;
      padding-bottom: 10px;
      border-bottom: 3px solid var(--orange);
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .period-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
    }

    .period-card {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .period-card:hover {
      transform: translateY(-5px);
      border-color: var(--orange);
      box-shadow: 0 8px 25px rgba(245, 158, 11, 0.15);
    }

    .period-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .period-name {
      font-size: 1.3em;
      font-weight: bold;
      color: var(--secondary);
      margin: 0;
    }

    .period-badge {
      background: var(--orange);
      color: white;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 0.8em;
      font-weight: 600;
    }

    .period-badge.tersedia { background: #10b981; }
    .period-badge.dalam-proses { background: #f59e0b; color: #000; }
    .period-badge.akan-datang { background: #6b7280; }

    .period-date {
      color: #666;
      font-size: 0.9em;
      margin-bottom: 15px;
    }

    .period-stats {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin-top: 20px;
    }

    .stat-item {
      text-align: center;
    }

    .stat-value {
      font-size: 1.4em;
      font-weight: bold;
      color: var(--orange);
    }

    .stat-label {
      font-size: 0.8em;
      color: #666;
    }

    .btn-view {
      background: var(--orange);
      color: white;
      border: none;
      padding: 8px 20px;
      border-radius: 6px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      cursor: pointer;
    }

    .btn-view:hover {
      background: #d97706;
      transform: translateY(-2px);
      color: white;
      text-decoration: none;
    }

    .btn-view:disabled {
      background: #ccc;
      cursor: not-allowed;
      transform: none;
    }

    /* File Card Styling */
    .file-card {
      background: #f8f9fa;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      padding: 12px 15px;
      margin: 15px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: all 0.3s ease;
    }

    .file-card:hover {
      background: #e9ecef;
      border-color: var(--orange);
    }

    .file-card.empty {
      background: transparent;
      border: 1px dashed #dee2e6;
    }

    .file-info {
      display: flex;
      align-items: center;
      gap: 12px;
      flex: 1;
    }

    .file-icon {
      font-size: 1.5em;
      color: #dc2626;
    }

    .file-details {
      flex: 1;
    }

    .file-name {
      font-weight: 600;
      color: var(--gray);
      font-size: 0.9em;
      margin-bottom: 4px;
      word-break: break-word;
    }

    .file-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      font-size: 0.8em;
      color: #6c757d;
      align-items: center;
    }

    .file-size {
      background: #e9ecef;
      padding: 2px 8px;
      border-radius: 4px;
    }

    .file-date {
      white-space: nowrap;
    }

    .file-actions {
      display: flex;
      gap: 8px;
    }

    .btn-action {
      width: 32px;
      height: 32px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .view-btn {
      background: var(--orange);
      color: white;
    }

    .view-btn:hover {
      background: #d97706;
      transform: translateY(-2px);
    }

    .download-btn {
      background: #10b981;
      color: white;
    }

    .download-btn:hover {
      background: #059669;
      transform: translateY(-2px);
    }

    /* Enhanced PDF Viewer Section */
    .pdf-viewer-wrapper {
      display: none;
      background: white;
      border-radius: 12px;
      margin: 30px 0;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
      overflow: hidden;
      animation: slideDown 0.3s ease-out;
    }

    .pdf-viewer-wrapper.active {
      display: block;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .pdf-header {
      background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
      color: white;
      padding: 20px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 4px solid var(--orange);
    }

    .pdf-header-left {
      display: flex;
      align-items: center;
      gap: 15px;
      flex: 1;
    }

    .pdf-icon-box {
      background: rgba(255,255,255,0.2);
      width: 50px;
      height: 50px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5em;
    }

    .pdf-title-box h3 {
      margin: 0;
      font-size: 1.2em;
      font-weight: 600;
    }

    .pdf-subtitle {
      font-size: 0.85em;
      opacity: 0.9;
      margin-top: 4px;
    }

    .pdf-actions {
      display: flex;
      gap: 10px;
    }

    .btn-pdf {
      background: rgba(255,255,255,0.2);
      color: white;
      border: 1px solid rgba(255,255,255,0.3);
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 0.9em;
      transition: all 0.3s ease;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      font-weight: 500;
    }

    .btn-pdf:hover {
      background: rgba(255,255,255,0.3);
      color: white;
      text-decoration: none;
      transform: translateY(-2px);
    }

    .btn-pdf.btn-close-pdf {
      background: #ef4444;
      border-color: #dc2626;
    }

    .btn-pdf.btn-close-pdf:hover {
      background: #dc2626;
    }

    .btn-pdf i {
      font-size: 1em;
    }

    /* PDF Container with page counter */
    .pdf-viewer-container {
      position: relative;
      background: #e5e7eb;
      padding: 20px;
    }

    .pdf-page-info {
      text-align: center;
      padding: 10px;
      background: var(--orange-light);
      color: var(--gray);
      font-size: 0.9em;
      font-weight: 600;
      border-radius: 8px 8px 0 0;
    }

    .pdf-iframe-wrapper {
      background: white;
      border-radius: 0 0 8px 8px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .pdf-iframe {
      width: 100%;
      height: 700px;
      border: none;
      display: block;
    }

    /* Action buttons below PDF */
    .pdf-bottom-actions {
      padding: 20px;
      background: #f9fafb;
      display: flex;
      justify-content: center;
      gap: 15px;
      border-top: 1px solid #e5e7eb;
    }

    .btn-secondary-action {
      background: white;
      color: var(--gray);
      border: 2px solid #e5e7eb;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-secondary-action:hover {
      border-color: var(--orange);
      color: var(--orange);
      transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .main-container {
        padding: 0 15px;
        margin: 20px auto;
      }

      .hero-section {
        padding: 60px 0;
      }

      .filter-section {
        padding: 20px;
      }

      .filter-group {
        grid-template-columns: 1fr;
        gap: 15px;
      }

      .period-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .period-card {
        padding: 20px;
      }

      .period-stats {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
      }

      .file-card {
        flex-direction: column;
        gap: 12px;
        text-align: center;
      }
      
      .file-info {
        flex-direction: column;
        text-align: center;
      }
      
      .file-meta {
        justify-content: center;
      }

      .pdf-header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
      }

      .pdf-header-left {
        flex-direction: column;
        text-align: center;
      }

      .pdf-actions {
        width: 100%;
        flex-direction: column;
      }

      .btn-pdf {
        width: 100%;
        justify-content: center;
      }

      .pdf-iframe {
        height: 500px;
      }

      .pdf-bottom-actions {
        flex-direction: column;
      }

      .btn-secondary-action {
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
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url('assets/Pictures/logo-pu.png'); ?>" alt="Logo PU" style="width: 250px; height: auto;">
      </a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'home' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'tentang' ? 'active' : '' ?>" href="<?= base_url('Landing/tentang') ?>">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'buku_tamu' ? 'active' : '' ?>" href="<?= base_url('Landing/buku_tamu') ?>">Buku Tamu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'medsos' ? 'active' : '' ?>" href="<?= base_url('Landing/medsos') ?>">Media Sosial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'layanan' ? 'active' : '' ?>" href="<?= base_url('Landing/layanan') ?>">Layanan</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link <?= $active_menu == 'laporan' ? 'active' : '' ?>" 
               href="#" id="navbarLaporan" role="button" 
               data-bs-toggle="dropdown" data-bs-display="static" 
               aria-expanded="false">
              Publikasi <i id="laporan-icon" class="fas fa-chevron-up ms-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarLaporan">
              <li><a class="dropdown-item" href="<?= base_url('Landing/laporan_PPID') ?>">Laporan PPID</a></li>
              <li><a class="dropdown-item" href="<?= base_url('Landing/laporan_Kompu') ?>">Laporan Kompu</a></li>
              <li><a class="dropdown-item" href="<?= base_url('Landing/Survei_Kepuasan_Masyarakat') ?>">Survei Kepuasan Masyarakat</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container text-center">
      <h1 class="display-4 fw-bold mb-3"><?= $page_title ?></h1>
      <p class="lead mb-0">LAMPU PETROMAK BBWS BRANTAS</p>
    </div>
  </section>

  <!-- Main Content -->
  <div class="main-container">
    
    <!-- Filter Section -->
    <div class="filter-section">
      <div class="filter-title">
        <i class="fas fa-filter"></i>
        Filter Laporan
      </div>
      
      <div class="filter-group">
        <div>
          <label class="form-label">Tahun</label>
          <select class="form-select" id="filterTahun">
            <?php foreach ($tahun_list as $tahun_item): ?>
            <option value="<?= $tahun_item['tahun'] ?>" 
                    <?= $tahun_item['tahun'] == $current_year ? 'selected' : '' ?>>
                <?= $tahun_item['tahun'] ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div>
          <label class="form-label">Jenis Periode</label>
          <select class="form-select" id="filterPeriode">
            <option value="">Semua Periode</option>
            <option value="triwulan">Triwulan</option>
            <option value="semester">Semester</option>
            <option value="tahunan">Tahunan</option>
          </select>
        </div>
        
        <div>
          <label class="form-label">Status</label>
          <select class="form-select" id="filterStatus">
            <option value="">Semua Status</option>
            <option value="tersedia">Tersedia</option>
            <option value="dalam-proses">Dalam Proses</option>
            <option value="akan-datang">Akan Datang</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Period Section -->
<div class="period-section" data-year="<?= $current_year ?>">
  <div class="period-title">
    <i class="fas fa-calendar-alt"></i>
    Laporan Triwulan <?= $current_year ?>
  </div>

  <!-- Triwulan Cards -->
  <div class="period-grid">
    <?php 
    $triwulan_data = [
        'I' => ['Januari - Maret '.$current_year, '82%'],
        'II' => ['April - Juni '.$current_year, '87%'], 
        'III' => ['Juli - September '.$current_year, '-'],
        'IV' => ['Oktober - Desember '.$current_year, '-']
    ];
    
    foreach ($triwulan_data as $roman => $info): 
        $found_docs = [];
        
        foreach ($triwulan as $doc) {
            if (isset($doc['triwulan_number']) && $doc['triwulan_number'] == $roman) {
                $found_docs[] = $doc;
            }
        }
        
        $is_available = !empty($found_docs);
        $is_current = ($roman == 'I' && date('n') >= 1 && date('n') <= 3) ||
                     ($roman == 'II' && date('n') >= 4 && date('n') <= 6) ||
                     ($roman == 'III' && date('n') >= 7 && date('n') <= 9) ||
                     ($roman == 'IV' && date('n') >= 10 && date('n') <= 12);
        
        $status = $is_available ? 'tersedia' : 
                 ($is_current ? 'dalam-proses' : 'akan-datang');
        
        $status_text = $is_available ? 'Tersedia' : 
                      ($is_current ? 'Dalam Proses' : 'Akan Datang');
    ?>
    <div class="period-card" data-period="triwulan" data-type="<?= $roman ?>">
        <div class="period-header">
            <h3 class="period-name">Triwulan <?= $roman ?></h3>
            <span class="period-badge <?= $status ?>">
                <?= $status_text ?>
            </span>
        </div>
        <div class="period-date"><?= $info[0] ?></div>
        <p>Laporan <?= $page_title ?> untuk periode Triwulan <?= $roman ?> Tahun <?= $current_year ?></p>
        
        <?php if ($is_available): ?>
            <?php foreach ($found_docs as $doc): ?>
            <div class="file-card">
                <div class="file-info">
                    <i class="fas fa-file-pdf file-icon"></i>
                    <div class="file-details">
                        <div class="file-name">
                            <strong><?= $doc['nama_file'] ?></strong>
                            <?php if (isset($doc['triwulan_number'])): ?>
                                <small class="text-muted"> - Triwulan <?= $doc['triwulan_number'] ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="file-meta">
                            <span class="file-size">PDF Document</span>
                            <span class="file-date"><?= date('d M Y', strtotime($doc['tanggal'])) ?></span>
                        </div>
                    </div>
                </div>
                <div class="file-actions">
                    <?php if ($doc['file_exists']): ?>
                    <button class="btn-action view-btn" title="Lihat PDF" 
                            onclick="showPDF('<?= addslashes($doc['nama_file']) ?>', '<?= base_url($doc['bukti_file']) ?>', 'Triwulan <?= $roman ?> <?= $current_year ?>')">
                        <i class="fas fa-eye"></i>
                    </button>
                    <a href="<?= base_url($doc['bukti_file']) ?>" class="btn-action download-btn" download title="Download">
                        <i class="fas fa-download"></i>
                    </a>
                    <?php else: ?>
                    <button class="btn-action view-btn" title="File tidak tersedia" disabled style="background: #ccc;">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn-action download-btn" title="File tidak tersedia" disabled style="background: #ccc;">
                        <i class="fas fa-download"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="file-card empty">
                <div class="file-info">
                    <i class="fas fa-file-circle-question file-icon"></i>
                    <div class="file-details">
                        <div class="file-name text-muted">Belum ada laporan</div>
                        <div class="file-meta">
                            <span class="file-date">-</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
              
        <div class="period-stats">
            <?php if ($is_available && !empty($found_docs[0]['bukti_file'])): ?>
            <button class="btn-view" onclick="showPDF('<?= addslashes($found_docs[0]['nama_file']) ?>', '<?= base_url($found_docs[0]['bukti_file']) ?>', 'Triwulan <?= $roman ?> <?= $current_year ?>')">
                <i class="fas fa-eye me-2"></i>Lihat Laporan
            </button>
            <?php else: ?>
            <button class="btn-view" disabled>
                <i class="fas fa-<?= $is_current ? 'spinner' : 'clock' ?> me-2"></i>
                <?= $status_text ?>
            </button>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Semester Section -->
<div class="period-section">
  <div class="period-title">
    <i class="fas fa-calendar-check"></i>
    Laporan Semester <?= $current_year ?>
  </div>
  
  <div class="period-grid">
    <?php 
    $semester_data = [
        'I' => ['Januari - Juni '.$current_year],
        'II' => ['Juli - Desember '.$current_year]
    ];
    
    foreach ($semester_data as $roman => $info): 
        $found_docs = [];
        
        // Cari dokumen untuk semester ini
        foreach ($semester as $doc) {
            if (isset($doc['semester_number']) && $doc['semester_number'] == $roman) {
                $found_docs[] = $doc;
            }
        }
        
        $is_available = !empty($found_docs);
        $is_current = ($roman == 'I' && date('n') >= 1 && date('n') <= 6) ||
                     ($roman == 'II' && date('n') >= 7 && date('n') <= 12);
        
        $status = $is_available ? 'tersedia' : 
                 ($is_current ? 'dalam-proses' : 'akan-datang');
        
        $status_text = $is_available ? 'Tersedia' : 
                      ($is_current ? 'Dalam Proses' : 'Akan Datang');
    ?>
    <div class="period-card" data-period="semester" data-type="<?= $roman ?>">
        <div class="period-header">
            <h3 class="period-name">Semester <?= $roman ?></h3>
            <span class="period-badge <?= $status ?>">
                <?= $status_text ?>
            </span>
        </div>
        <div class="period-date"><?= $info[0] ?></div>
        <p>Laporan <?= $page_title ?> untuk periode Semester <?= $roman ?> Tahun <?= $current_year ?></p>
        
        <?php if ($is_available): ?>
            <?php foreach ($found_docs as $doc): ?>
            <div class="file-card">
                <div class="file-info">
                    <i class="fas fa-file-pdf file-icon"></i>
                    <div class="file-details">
                        <div class="file-name">
                            <strong><?= $doc['nama_file'] ?></strong>
                            <?php if (isset($doc['semester_number'])): ?>
                                <small class="text-muted"> - Semester <?= $doc['semester_number'] ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="file-meta">
                            <span class="file-size">PDF Document</span>
                            <span class="file-date"><?= date('d M Y', strtotime($doc['tanggal'])) ?></span>
                        </div>
                    </div>
                </div>
                <div class="file-actions">
                    <?php if ($doc['file_exists']): ?>
                    <button class="btn-action view-btn" title="Lihat PDF" 
                            onclick="showPDF('<?= addslashes($doc['nama_file']) ?>', '<?= base_url($doc['bukti_file']) ?>', 'Semester <?= $roman ?> <?= $current_year ?>')">
                        <i class="fas fa-eye"></i>
                    </button>
                    <a href="<?= base_url($doc['bukti_file']) ?>" class="btn-action download-btn" download title="Download">
                        <i class="fas fa-download"></i>
                    </a>
                    <?php else: ?>
                    <button class="btn-action view-btn" title="File tidak tersedia" disabled style="background: #ccc;">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn-action download-btn" title="File tidak tersedia" disabled style="background: #ccc;">
                        <i class="fas fa-download"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="file-card empty">
                <div class="file-info">
                    <i class="fas fa-file-circle-question file-icon"></i>
                    <div class="file-details">
                        <div class="file-name text-muted">Belum ada laporan</div>
                        <div class="file-meta">
                            <span class="file-date">-</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
              
        <div class="period-stats">
            <?php if ($is_available && !empty($found_docs[0]['bukti_file'])): ?>
            <button class="btn-view" onclick="showPDF('<?= addslashes($found_docs[0]['nama_file']) ?>', '<?= base_url($found_docs[0]['bukti_file']) ?>', 'Semester <?= $roman ?> <?= $current_year ?>')">
                <i class="fas fa-eye me-2"></i>Lihat Laporan
            </button>
            <?php else: ?>
            <button class="btn-view" disabled>
                <i class="fas fa-<?= $is_current ? 'spinner' : 'clock' ?> me-2"></i>
                <?= $status_text ?>
            </button>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Tahunan Section -->
<div class="period-section">
  <div class="period-title">
    <i class="fas fa-calendar"></i>
    Laporan Tahunan <?= $current_year ?>
  </div>
  
  <div class="period-grid">
    <?php 
    $is_available = !empty($tahunan);
    $is_current = (date('n') == 12); // Desember
    
    $status = $is_available ? 'tersedia' : 
             ($is_current ? 'dalam-proses' : 'akan-datang');
    
    $status_text = $is_available ? 'Tersedia' : 
                  ($is_current ? 'Dalam Proses' : 'Akan Datang');
    ?>
    <div class="period-card" data-period="tahunan">
        <div class="period-header">
            <h3 class="period-name">Laporan Tahunan</h3>
            <span class="period-badge <?= $status ?>">
                <?= $status_text ?>
            </span>
        </div>
        <div class="period-date">Januari - Desember <?= $current_year ?></div>
        <p>Laporan <?= $page_title ?> untuk periode Tahunan <?= $current_year ?></p>
        
        <?php if ($is_available): ?>
            <?php foreach ($tahunan as $doc): ?>
            <div class="file-card">
                <div class="file-info">
                    <i class="fas fa-file-pdf file-icon"></i>
                    <div class="file-details">
                        <div class="file-name">
                            <strong><?= $doc['nama_file'] ?></strong>
                            <small class="text-muted"> - Tahunan</small>
                        </div>
                        <div class="file-meta">
                            <span class="file-size">PDF Document</span>
                            <span class="file-date"><?= date('d M Y', strtotime($doc['tanggal'])) ?></span>
                        </div>
                    </div>
                </div>
                <div class="file-actions">
                    <?php if ($doc['file_exists']): ?>
                    <button class="btn-action view-btn" title="Lihat PDF" 
                            onclick="showPDF('<?= addslashes($doc['nama_file']) ?>', '<?= base_url($doc['bukti_file']) ?>', 'Tahunan <?= $current_year ?>')">
                        <i class="fas fa-eye"></i>
                    </button>
                    <a href="<?= base_url($doc['bukti_file']) ?>" class="btn-action download-btn" download title="Download">
                        <i class="fas fa-download"></i>
                    </a>
                    <?php else: ?>
                    <button class="btn-action view-btn" title="File tidak tersedia" disabled style="background: #ccc;">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn-action download-btn" title="File tidak tersedia" disabled style="background: #ccc;">
                        <i class="fas fa-download"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="file-card empty">
                <div class="file-info">
                    <i class="fas fa-file-circle-question file-icon"></i>
                    <div class="file-details">
                        <div class="file-name text-muted">Belum ada laporan</div>
                        <div class="file-meta">
                            <span class="file-date">-</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
              
        <div class="period-stats">
            <?php if ($is_available && !empty($tahunan[0]['bukti_file'])): ?>
            <button class="btn-view" onclick="showPDF('<?= addslashes($tahunan[0]['nama_file']) ?>', '<?= base_url($tahunan[0]['bukti_file']) ?>', 'Tahunan <?= $current_year ?>')">
                <i class="fas fa-eye me-2"></i>Lihat Laporan
            </button>
            <?php else: ?>
            <button class="btn-view" disabled>
                <i class="fas fa-<?= $is_current ? 'spinner' : 'clock' ?> me-2"></i>
                <?= $status_text ?>
            </button>
            <?php endif; ?>
        </div>
    </div>
  </div>
</div>

<!-- Enhanced PDF Viewer (Hidden by default) -->
<div id="pdfViewerWrapper" class="pdf-viewer-wrapper">
  <div class="pdf-header">
    <div class="pdf-header-left">
      <div class="pdf-icon-box">
        <i class="fas fa-file-pdf"></i>
      </div>
      <div class="pdf-title-box">
        <h3 id="pdfDocTitle">Loading...</h3>
        <div class="pdf-subtitle" id="pdfDocSubtitle">Cover Silabus</div>
      </div>
    </div>
    <div class="pdf-actions">
      <button class="btn-pdf" onclick="toggleFullscreen()" title="Fullscreen">
        <i class="fas fa-expand"></i>
        <span>Fullscreen</span>
      </button>
      <a href="#" id="pdfDownloadLink" class="btn-pdf" download title="Download">
        <i class="fas fa-download"></i>
        <span>Download</span>
      </a>
      <button class="btn-pdf btn-close-pdf" onclick="closePDFViewer()" title="Tutup">
        <i class="fas fa-times"></i>
        <span>Tutup</span>
      </button>
    </div>
  </div>

  <div class="pdf-viewer-container">
    <div class="pdf-page-info">
      <span id="pdfPageInfo">Halaman 1 / 8</span>
    </div>
    <div class="pdf-iframe-wrapper">
      <iframe id="pdfIframe" class="pdf-iframe" src=""></iframe>
    </div>
  </div>

  <div class="pdf-bottom-actions">
    <button class="btn-secondary-action" onclick="window.print()">
      <i class="fas fa-print"></i>
      <span>Cetak</span>
    </button>
    <button class="btn-secondary-action" onclick="closePDFViewer()">
      <i class="fas fa-arrow-left"></i>
      <span>Kembali ke Daftar</span>
    </button>
  </div>
</div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Enhanced PDF Viewer Functions
    function showPDF(title, pdfUrl, subtitle) {
      console.log('📄 Loading PDF:', pdfUrl);
      
      // Test if file is accessible
      fetch(pdfUrl, { method: 'HEAD' })
        .then(response => {
          if (response.ok) {
            // Set PDF information
            document.getElementById('pdfDocTitle').textContent = title;
            document.getElementById('pdfDocSubtitle').textContent = subtitle || 'Cover Silabus';
            document.getElementById('pdfIframe').src = pdfUrl + '#toolbar=0&navpanes=0&scrollbar=1';
            document.getElementById('pdfDownloadLink').href = pdfUrl;
            
            // Show PDF viewer
            document.getElementById('pdfViewerWrapper').classList.add('active');
            
            // Scroll to PDF viewer smoothly
            setTimeout(() => {
              document.getElementById('pdfViewerWrapper').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
              });
            }, 100);
            
            console.log('✅ PDF loaded successfully');
          } else {
            console.error('❌ PDF not found:', pdfUrl);
            alert('File PDF tidak ditemukan: ' + pdfUrl + '\n\nPastikan file ada di server.');
          }
        })
        .catch(error => {
          console.error('❌ Error accessing PDF:', error);
          alert('Error mengakses PDF: ' + pdfUrl + '\n\n' + error.message);
        });
    }

    function closePDFViewer() {
      // Hide PDF viewer
      document.getElementById('pdfViewerWrapper').classList.remove('active');
      
      // Clear iframe source to stop loading
      document.getElementById('pdfIframe').src = '';
      
      // Scroll back to top smoothly
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function toggleFullscreen() {
      const iframe = document.getElementById('pdfIframe');
      if (!document.fullscreenElement) {
        if (iframe.requestFullscreen) {
          iframe.requestFullscreen();
        } else if (iframe.webkitRequestFullscreen) {
          iframe.webkitRequestFullscreen();
        } else if (iframe.msRequestFullscreen) {
          iframe.msRequestFullscreen();
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    }

    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
      const filterTahun = document.getElementById('filterTahun');
      const filterPeriode = document.getElementById('filterPeriode');
      const filterStatus = document.getElementById('filterStatus');

      function applyFilters() {
        const selectedPeriod = filterPeriode.value;
        const selectedStatus = filterStatus.value;

        document.querySelectorAll('.period-card').forEach(card => {
          const period = card.getAttribute('data-period');
          const statusBadge = card.querySelector('.period-badge');
          const status = statusBadge ? statusBadge.classList[1] : '';
          let showCard = true;

          if (selectedPeriod && period !== selectedPeriod) {
            showCard = false;
          }

          if (selectedStatus && status !== selectedStatus) {
            showCard = false;
          }

          card.style.display = showCard ? 'block' : 'none';
        });

        document.querySelectorAll('.section-title').forEach(title => {
          const sectionType = title.textContent.includes('Triwulan') ? 'triwulan' : 
                            title.textContent.includes('Semester') ? 'semester' : 'tahunan';
          
          const hasVisibleCards = Array.from(document.querySelectorAll('.period-card'))
            .some(card => {
              return card.style.display !== 'none' && 
                     card.getAttribute('data-period') === sectionType;
            });
          
          title.style.display = hasVisibleCards ? 'block' : 'none';
        });
      }

      filterTahun.addEventListener('change', function() {
    const selectedYear = this.value;
    const baseUrl = '<?= base_url() ?>';
    
    // Dapatkan controller dan method dari PHP
    const currentController = '<?= $this->router->class ?>';
    const currentMethod = '<?= $this->router->method ?>';
    
    console.log('Current Controller:', currentController);
    console.log('Current Method:', currentMethod);
    
    // Redirect ke URL yang benar
    window.location.href = baseUrl + currentController + '/' + currentMethod + '/' + selectedYear;
});

filterPeriode.addEventListener('change', applyFilters);
filterStatus.addEventListener('change', applyFilters);

applyFilters();
    });

    // Dropdown toggle script
    const laporanToggle = document.getElementById('navbarLaporan');
    const laporanIcon = document.getElementById('laporan-icon');

    if (laporanToggle && laporanIcon) {
      laporanToggle.addEventListener('show.bs.dropdown', () => {
        laporanIcon.classList.remove('fa-chevron-up');
        laporanIcon.classList.add('fa-chevron-down');
      });

      laporanToggle.addEventListener('hide.bs.dropdown', () => {
        laporanIcon.classList.remove('fa-chevron-down');
        laporanIcon.classList.add('fa-chevron-up');
      });
    }

    // Close PDF viewer when pressing ESC key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        const pdfWrapper = document.getElementById('pdfViewerWrapper');
        if (pdfWrapper.classList.contains('active')) {
          closePDFViewer();
        }
      }
    });
    
  </script>
</body>
</html>