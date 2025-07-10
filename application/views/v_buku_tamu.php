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
            position: fixed; /* Pastikan navbar tetap di posisi tetap */
            top: 0; /* Menempatkan navbar di bagian atas */
            left: 0; /* Menempatkan navbar di sisi kiri */
            width: 100%; /* Memastikan navbar mengambil lebar penuh */
            z-index: 1000; /* Memastikan navbar berada di atas elemen lain */
        }
        .content {
            display: flex; /* Menggunakan flexbox untuk grup radio button */
            flex-direction: row; /* Menempatkan elemen secara vertikal */
            align-items: center; /* Menempatkan elemen di tengah secara horizontal */
            justify-content: center;
        }
        .radio-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 3px;
        }
        #otherInput {
            display: none; /* Sembunyikan input lainnya */
        }

    </style>
    
</head>
<body>
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <img src="<?php echo base_url();?>assets/Pictures/logo-pu.png" alt="Logo" width="250">
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="<?php echo base_url('Landing'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Home</a>
                <a href="<?php echo base_url('Landing/tentang'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Tentang</a>
                <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Buku Tamu</a>
                <!-- <a href="#contact" class="nav-link text-gray-700 hover:text-orange-600 transition">Aduan</a> -->
            </div>
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-orange-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white py-4 px-6 shadow-lg">
        <div class="flex flex-col space-y-4">
            <a href="<?php echo base_url('Landing'); ?>" class="text-gray-700 hover:text-orange-600 transition">Home</a>
            <a href="<?php echo base_url('Landing/tentang'); ?>" class="text-gray-700 hover:text-orange-600 transition">Tentang</a>
            <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="text-gray-700 hover:text-orange-600 transition">Buku Tamu</a>
            <!-- <a href="#contact" class="text-gray-700 hover:text-orange-600 transition">Aduan</a> -->
        </div>
    </div>
</nav>

    <div class="container mx-auto mt-20">
        <div class="form-container">
            <form action="<?php echo site_url('Landing/submit'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
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
                    <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" required>
                </div>
                <div class="form-group">
                    <label for="no_handphone">No. Handphone yang bisa dihubungi</label>
                    <input type="text" class="form-control" id="no_handphone" name="no_handphone" required>
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
                    <label>1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_pelayanan1" name="pendapat_pelayanan" value="4" required>
                        <label for="pendapat_pelayanan1">Sangat Sesuai</label>
                    
                        <input type="radio" id="pendapat_pelayanan2" name="pendapat_pelayanan" value="3">
                        <label for="pendapat_pelayanan2">Sesuai</label>
                    
                        <input type="radio" id="pendapat_pelayanan3" name="pendapat_pelayanan" value="2">
                        <label for="pendapat_pelayanan2">Kurang Sesuai</label>
                   
                        <input type="radio" id="pendapat_pelayanan4" name="pendapat_pelayanan" value="1">
                        <label for="pendapat_pelayanan4">Tidak Sesuai</label>
                    </div>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="form-group">
                    <label>2. Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pemahaman_prosedur1" name="pemahaman_prosedur" value="4" required>
                        <label for="pemahaman_prosedur1">Sangat Mudah</label>
                  
                        <input type="radio" id="pemahaman_prosedur2" name="pemahaman_prosedur" value="3">
                        <label for="pemahaman_prosedur2">Mudah</label>
               
                        <input type="radio" id="pemahaman_prosedur3" name="pemahaman_prosedur" value="2">
                        <label for="pemahaman_prosedur3">Kurang Mudah</label>
                   
                        <input type="radio" id="pemahaman_prosedur4" name="pemahaman_prosedur" value="1">
                        <label for="pemahaman_prosedur4">Tidak Mudah</label>
                    </div>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="form-group">
                    <label>3. Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_kecepatan1" name="pendapat_kecepatan" value="4" required>
                        <label for="pendapat_kecepatan1">Sangat Cepat</label>
                    
                        <input type="radio" id="pendapat_kecepatan2" name="pendapat_kecepatan" value="3">
                        <label for="pendapat_kecepatan2">Cepat</label>
                   
                        <input type="radio" id="pendapat_kecepatan3" name="pendapat_kecepatan" value="2">
                        <label for="pendapat_kecepatan3">Kurang Cepat</label>
                    
                        <input type="radio" id="pendapat_kecepatan4" name="pendapat_kecepatan" value="1">
                        <label for="pendapat_kecepatan4">Tidak Cepat</label>
                    </div>
                </div>

                <!-- Pertanyaan 4 -->
                <div class="form-group">
                    <label>4. Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_biaya1" name="pendapat_biaya" value="4" required>
                        <label for="pendapat_biaya1">Gratis</label>
                    
                        <input type="radio" id="pendapat_biaya2" name="pendapat_biaya" value="3">
                        <label for="pendapat_biaya2">Murah</label>
                    
                        <input type="radio" id="pendapat_biaya3" name="pendapat_biaya" value="2">
                        <label for="pendapat_biaya3">Cukup Mahal</label>
                    
                        <input type="radio" id="pendapat_biaya4" name="pendapat_biaya" value="1">
                        <label for="pendapat_biaya4">Sangat Mahal</label>
                    </div>
                </div>

                <!-- Pertanyaan 5 -->
                <div class="form-group">
                    <label>5. Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_produk1" name="pendapat_produk" value="4" required>
                        <label for="pendapat_produk1">Sangat Sesuai</label>
                    
                        <input type="radio" id="pendapat_produk2" name="pendapat_produk" value="3">
                        <label for="pendapat_produk2">Sesuai</label>
                    
                        <input type="radio" id="pendapat_produk3" name="pendapat_produk" value="2">
                        <label for="pendapat_produk3">Kurang Sesuai</label>
                    
                        <input type="radio" id="pendapat_produk4" name="pendapat_produk" value="1">
                        <label for="pendapat_produk4">Tidak Sesuai</label>
                    </div>
                </div>

                <!-- Pertanyaan 6 -->
                <div class="form-group">
                    <label>6. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_kompetensi1" name="pendapat_kompetensi" value="4" required>
                        <label for="pendapat_kompetensi1">Sangat Kompeten</label>
                    
                        <input type="radio" id="pendapat_kompetensi2" name="pendapat_kompetensi" value="3">
                        <label for="pendapat_kompetensi2">Kompeten</label>
                    
                        <input type="radio" id="pendapat_kompetensi3" name="pendapat_kompetensi" value="2">
                        <label for="pendapat_kompetensi3">Kurang Kompeten</label>

                        <input type="radio" id="pendapat_kompetensi4" name="pendapat_kompetensi" value="1">
                        <label for="pendapat_kompetensi4">Tidak Kompeten</label>
                    </div>
                </div>

                <!-- Pertanyaan 7 -->
                <div class="form-group">
                    <label>7. Bagaimana pendapat Saudara tentang perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_perilaku1" name="pendapat_perilaku" value="4" required>
                        <label for="pendapat_perilaku1">Sangat Sopan dan Ramah</label>
                    
                        <input type="radio" id="pendapat_perilaku2" name="pendapat_perilaku" value="3">
                        <label for="pendapat_perilaku2">Sopan dan Ramah</label>
                    
                        <input type="radio" id="pendapat_perilaku3" name="pendapat_perilaku" value="2">
                        <label for="pendapat_perilaku3">Kurang Sopan dan Ramah</label>

                        <input type="radio" id="pendapat_perilaku4" name="pendapat_perilaku" value="1">
                        <label for="pendapat_perilaku4">Tidak Sopan dan Ramah</label>
                    </div>
                </div>

                <!-- Pertanyaan 8 -->
                <div class="form-group">
                    <label>8. Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_kualitas1" name="pendapat_kualitas" value="4" required>
                        <label for="pendapat_kualitas1">Sangat Baik</label>
                    
                        <input type="radio" id="pendapat_kualitas2" name="pendapat_kualitas" value="3">
                        <label for="pendapat_kualitas2">Baik</label>
                    
                        <input type="radio" id="pendapat_kualitas3" name="pendapat_kualitas" value="2">
                        <label for="pendapat_kualitas3">Cukup</label>
                        
                        <input type="radio" id="pendapat_kualitas4" name="pendapat_kualitas" value="1">
                        <label for="pendapat_kualitas4">Buruk</label>
                    </div>
                </div>

                <!-- Pertanyaan 9 -->
                <div class="form-group">
                    <label>9. Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?</label><br><br>
                    <div class="radio-group">
                        <input type="radio" id="pendapat_pengaduan1" name="pendapat_pengaduan" value="4" required>
                        <label for="pendapat_pengaduan1">Dikelola dengan baik</label>
                    
                        <input type="radio" id="pendapat_pengaduan2" name="pendapat_pengaduan" value="3">
                        <label for="pendapat_pengaduan2">Berfungsi tapi kurang</label>
                    
                        <input type="radio" id="pendapat_pengaduan3" name="pendapat_pengaduan" value="2">
                        <label for="pendapat_pengaduan3">Ada tetapi tidak berfungsi</label>

                        <input type="radio" id="pendapat_pengaduan4" name="pendapat_pengaduan" value="1">
                        <label for="pendapat_pengaduan4">Tidak Ada</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kritik_saran">10. Kritik dan Saran Perbaikan</label>
                    <textarea class="form-control" id="kritik_saran" name="kritik_saran"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
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
