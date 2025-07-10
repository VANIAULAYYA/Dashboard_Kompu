<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .hero-section {
            background: linear-gradient(rgba(78, 115, 223, 0.8), rgba(26, 26, 46, 0.8));
            color: white;
            padding: 100px 0;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--accent);
        }
        
        .feature-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        footer {
            background-color: var(--secondary);
            color: white;
            padding: 30px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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
                        <a class="nav-link <?php echo $active_menu == 'tentang' ? 'active' : ''; ?>" href="<?php echo base_url('about'); ?>">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('buku_tamu'); ?>">Buku Tamu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('laporan'); ?>">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">TENTANG</h1>
            <p class="lead mb-4">LAMPU PETROMAK BBWS BRANTAS</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <section class="mb-5">
                    <h2 class="section-title">Tentang Lampu Petromak</h2>
                    <p>Balai Besar Wilayah Sungai Brantas (BBWS Brantas) merupakan unit pelaksana teknis dari Direktorat Jenderal Sumber Daya Air Kementerian Pekerjaan Umum dan Perumahan Rakyat yang bertanggung jawab dalam pengelolaan sumber daya air di Wilayah Sungai Brantas.</p>
                    <p>Wilayah Sungai Brantas merupakan salah satu wilayah sungai strategis nasional yang terletak di Provinsi Jawa Timur dengan luas sekitar 11.800 km2 dan mencakup 15 kabupaten/kota.</p>
                </section>

                <section class="mb-5">
                    <h2 class="section-title">Visi dan Misi</h2>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card feature-card h-100">
                                <div class="card-body">
                                    <h3 class="h5">Visi</h3>
                                    <p>Menjadi institusi pengelola sumber daya air yang profesional untuk mewujudkan ketahanan air dan kemanfaatan air yang berkelanjutan di Wilayah Sungai Brantas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card feature-card h-100">
                                <div class="card-body">
                                    <h3 class="h5">Misi</h3>
                                    <ul>
                                        <li>Melaksanakan pengelolaan sumber daya air secara terpadu</li>
                                        <li>Mengoptimalkan pemanfaatan sumber daya air</li>
                                        <li>Meningkatkan kualitas pelayanan kepada masyarakat</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="section-title">Tugas dan Fungsi</h2>
                    <div class="card feature-card">
                        <div class="card-body">
                            <p>BBWS Brantas mempunyai tugas melaksanakan pengelolaan sumber daya air di Wilayah Sungai Brantas yang meliputi:</p>
                            <ul>
                                <li>Perencanaan pengelolaan sumber daya air</li>
                                <li>Pelaksanaan konstruksi dan operasi pemeliharaan</li>
                                <li>Pemantauan, evaluasi, dan pelaporan</li>
                                <li>Pelaksanaan administrasi dan koordinasi</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3 class="h5">Kontak Kami</h3>
                    <p>Jl. Raya Menganti No. 312<br>Surabaya, Jawa Timur</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3 class="h5">Tautan Cepat</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url(); ?>" class="text-white">Home</a></li>
                        <li><a href="<?php echo base_url('about'); ?>" class="text-white">Tentang</a></li>
                        <li><a href="<?php echo base_url('buku_tamu'); ?>" class="text-white">Buku Tamu</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="h5">Sosial Media</h3>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <hr class="my-4">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> BBWS Brantas. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
