<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOMPU BBWS BRANTAS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('<?php echo base_url();?>assets/Pictures/kantor.png');
            background-size: cover;
            background-position: center;
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
            background: #fff;
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
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img src="<?php echo base_url();?>assets/Pictures/logo-pu.png" alt="Girl in a jacket" width="250">
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="nav-link text-gray-700 hover:text-orange-600 transition">Home</a>
                    <a href="#features" class="nav-link text-gray-700 hover:text-orange-600 transition">Tentang</a>
                    <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="nav-link text-gray-700 hover:text-orange-600 transition">Buku Tamu</a>
                    <a href="#contact" class="nav-link text-gray-700 hover:text-orange-600 transition">Aduan</a>
                    <!-- <a href="#" class="gradient-bg text-white px-6 py-2 rounded-full hover:shadow-lg transition">Masuk</a> -->
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
                <a href="#" class="text-gray-700 hover:text-orange-600 transition">Home</a>
                <a href="#features" class="text-gray-700 hover:text-orange-600 transition">Tentang</a>
                <a href="<?php echo base_url('Landing/buku_tamu'); ?>" class="text-gray-700 hover:text-orange-600 transition">Buku Tamu</a>
                <a href="#contact" class="text-gray-700 hover:text-orange-600 transition">Aduan</a>
                <a href="#" class="gradient-bg text-white px-6 py-2 rounded-full text-center hover:shadow-lg transition">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section flex items-center justify-center text-white">
        <div class="text-center px-4 fade-in">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">SELAMAT DATANG</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-8">KOMUNIKASI PUBLIK BBWS BRANTAS</p>
            
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">KOMUNIKASI PUBLIK</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Balai Besar Wilayah Sungai Brantas</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chalkboard-teacher text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Informasi</h3>
                    <p class="text-gray-600">Our optimized infrastructure ensures ultra-fast performance and minimal latency for all your operations.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-envelope-open-text text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Informasi Publik</h3>
                    <p class="text-gray-600">Enterprise-level security protocols protect your data with end-to-end encryption and regular audits.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="gradient-bg text-white w-14 h-14 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullhorn text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Publikasi</h3>
                    <p class="text-gray-600">Gain valuable insights with our comprehensive analytics dashboard that updates in real-time.</p>
                </div>
            
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="gradient-bg py-20 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <h3 class="textyou're the is-animated text-4xl md:text-5xl font-bold mb-2">9440</h3>
                    <p class="text-lg">Kunjungan</p>
                </div>
                <div class="p-6">
                    <h3 class="text-4xl md:text-5xl font-bold mb-2">90%</h3>
                    <p class="text-lg">Kepuasan Layanan</p>
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

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Kontak Kompu dan PPID</h2>
                    <p class="text-gray-600 mb-8">Kontak KOMPU BBWS Brantas dapat dihubungi di:</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="gradient-bg text-white w-10 h-10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <p class="text-gray-700">Jl. Raya Menganti No.312<br>Wiyung, Surabaya</p>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="gradient-bg text-white w-10 h-10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <p class="text-gray-700">082338417445 (Hanya Chat Whatsapp)</p>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="gradient-bg text-white w-10 h-10 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <p class="text-gray-700">bbwsbrantas@pu.go.id</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-700 hover:text-white hover:bg-orange-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-700 hover:text-white hover:bg-orange-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-700 hover:text-white hover:bg-orange-600 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.instagram.com/pu_sda_brantas" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-700 hover:text-white hover:bg-orange-600 transition" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- <div>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" id="first-name" name="first-name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent" placeholder="John">
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" id="last-name" name="last-name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent" placeholder="Doe">
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent" placeholder="your@email.com">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent" placeholder="+1 (___) ___-____">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent" placeholder="Your message..."></textarea>
                        </div>
                        
                        <button type="submit" class="gradient-bg text-white px-8 py-3 rounded-lg text-lg font-medium hover:shadow-lg transition w-full">Send Message</button>
                    </form>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <span class="text-xl font-bold">KEMENPU BBWS BRANTAS</span>
                    </div>
                    <p class="text-gray-400 mb-4">Jl. Raya Menganti No.312 Wiyung Surabaya</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <!-- <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Press</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">API Reference</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Community</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">Cookie Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-400 transition">GDPR</a></li>
                    </ul>
                </div> -->
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 KOMPU BBWS BRANTAS. All rights reserved.</p>
            </div>
        </div>
    </footer>

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
</body>
</html>
