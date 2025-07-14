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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }

        .text-primary {
            color: var(--primary);
        }
        
        footer {
            background-color: var(--secondary);
            color: white;
            padding: 30px 0;
        }

        .social-button {
        width: 100px; /* Set a fixed width for uniformity */
        color: gray; /* Default color */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        transition: color 0.3s; /* Transition for hover effect */
        }
        
        .social-button:hover {
            color: orange; /* Change color on hover */
        }

        .card-body {
            display: flex;
            justify-content: center; /* Centers the content horizontally */
            align-items: center; /* Centers the content vertically (if needed) */
        }
        table {
            margin: 0 auto; /* This ensures the table itself is centered within its container */
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
                        <a class="nav-link <?php echo $active_menu == 'tentang' ? 'active' : ''; ?>" href="<?php echo base_url('Landing/about'); ?>">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Landing/buku_tamu'); ?>">Buku Tamu</a>
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
                    <p style="text-align: justify;"><b>LAMPU PETROMAK BBWS BRANTAS</b> merupakan inovasi dari layanan komunikasi publik yang dikembangkan oleh Balai Besar Wilayah Sungai (BBWS) Brantas untuk menjawab kebutuhan informasi yang cepat, transparan, dan mudah diakses oleh masyarakat.</p>
                    <p style="text-align: justify;"><b>LAMPU: LAyanan koMunikasi PUblik</b> sebagai sistem layanan yang dirancang untuk memperkuat fungsi komunikasi publik di lingkungan BBWS Brantas, agar informasi terkait kebijakan, program, kegiatan, hingga respons pengaduan dapat tersampaikan secara efektif.</p>
                    <p style="text-align: justify;"><b>PETROMAK: dengan PElayanan yang TRansparan dan Optimal untuk MAsyaraKat</b> sebagai komitmen BBWS Brantas dalam menerangi ruang informasi publik—seperti halnya lampu petromak yang menyala terang di tengah kegelapan—sehingga masyarakat dapat melihat, memahami, dan mengakses segala bentuk layanan informasi secara jelas.</p>
                </section>

                <section class="mb-5">
                    <h2 class="section-title">Apa Sih Kepanjangan LAMPU PETROMAK?</h2>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card feature-card h-100">
                                <div class="card-body">
                                    <h2 class=" text-center" style="color:#3498db;">LAMPU<br>PETROMAK</h2>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <ul class="list-unstyled">
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-lightbulb text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>LA</strong> = LAyanan</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-comments text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>M</strong> = koMunikasi</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-users text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>PU</strong> = PUblik</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-hands-helping text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>PE</strong> = dengan PElayanan</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-check-circle text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>TR</strong> = TRansparan dan</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-star text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>O</strong> = Optimal</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <i class="fas fa-users-cog text-primary me-2" style="font-size: 1.5rem;"></i>
                                            <span><strong>MAK</strong> = untuk MAsyaraKat</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                    <section class="mb-5">
                        <h2 class="section-title text-left">Media Sosial</h2>
                        <div class="text-center">
                            <div class="card feature-card">
                                <div class="card-body align-center">
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
                                                <a href="#" class="social-button mx-3">
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
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div>
                    <h3 class="h5">Alamat</h3>
                    <p>Jl. Raya Menganti No. 312<br>Surabaya, Jawa Timur</p>
                </div>
            </div>
            <hr class="my-4">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> BBWS Brantas. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
