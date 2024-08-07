<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngutangyuk | Solusi Finansial Anak Muda</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0px);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    :root {
        --primary-color: #2c3e50;
        --secondary-color: #e74c3c;
        --accent-color: #f39c12;
        --text-color: #34495e;
        --light-color: #ecf0f1;
        --dark-color: #2c3e50;
    }

    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
    }
    h1, h2, h3, h4, h5, h6 {
        font-weight: 600;
    }
    .navbar {
        background-color: var(--primary-color);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 1rem 2rem;
        animation: slideInLeft 0.5s ease-out;
    }

    .navbar-brand {
        color: var(--light-color) !important;
        font-weight: 600;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
    }

    .nav-link {
        color: var(--light-color) !important;
        position: relative;
        transition: color 0.3s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: var(--accent-color);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .hero-section {
        background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), url('hero-bg.jpg') no-repeat center center;
        background-size: cover;
        color: var(--light-color);
        background-attachment: fixed;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        opacity: 0.9;
        animation: gradientBG 15s ease infinite;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        animation: fadeInUp 1s ease-out;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        animation: pulse 2s infinite;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0;
        animation: fadeInUp 1s ease-out 0.5s forwards;
    }

    .btn-hero {
        background-color: var(--accent-color);
        color: var(--dark-color);
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 30px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        animation: float 3s ease-in-out infinite;
    }

    .btn-hero:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0,0,0,0.15);
    }

    .feature-section {
        padding: 100px 0;
    }

    .feature-item {
        background-color: var(--light-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        padding: 30px;
        border-radius: 10px;
        transition: all 0.3s ease;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        opacity: 0;
        animation: fadeInUp 0.5s ease-out forwards;
    }

    .feature-item:nth-child(1) { animation-delay: 0.2s; }
    .feature-item:nth-child(2) { animation-delay: 0.4s; }
    .feature-item:nth-child(3) { animation-delay: 0.6s; }

    .feature-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .feature-icon {
        font-size: 3rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
        animation: pulse 2s infinite;
    }

    .feature-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--primary-color);
    }

    .footer {
        background-color: var(--primary-color);
        color: var(--light-color);
        padding: 80px 0 40px;
        animation: slideInLeft 0.5s ease-out;
    }

    .footer-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }
    .footer-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 30px;
        height: 2px;
        background-color: var(--accent-color);
    }

    .footer-links li {
        margin-bottom: 0.5rem;
        opacity: 0;
        animation: fadeInUp 0.5s ease-out forwards;
    }

    .footer-links li:nth-child(1) { animation-delay: 0.1s; }
    .footer-links li:nth-child(2) { animation-delay: 0.2s; }
    .footer-links li:nth-child(3) { animation-delay: 0.3s; }
    .footer-links li:nth-child(4) { animation-delay: 0.4s; }

    .footer-links a {
            color: var(--light-color);
            transition: all 0.3s ease;
        }

    .footer-links a:hover {
            color: var(--accent-color);
            text-decoration: none;
        }
    .section {
        padding: 100px 0;
    }

    .feature-section {
        padding: 120px 0;
    }
    .section-title {
        text-align: center;
        margin-bottom: 40px;
        color: var(--primary-color);
        font-weight: 600;
    }

    .layanan-item {
        text-align: center;
        margin-bottom: 30px;
    }

    .layanan-icon {
        font-size: 3rem;
        color: var(--secondary-color);
        margin-bottom: 20px;
    }

    .sticky-navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: all 0.3s ease;
    }
    .btn, .form-control, .feature-item {
        border-radius: 8px;
    }

    #kontak .form-control {
        margin-bottom: 20px;
    }

    #kontak .btn-primary {
        background-color: var(--accent-color);
        border: none;
        padding: 10px 30px;
    }

    #kontak .btn-primary:hover {
        background-color: var(--secondary-color);
    }
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Ngutangyuk Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang-kami">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Hubungi Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Auth/login'); ?>">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="hero" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Uang Mudah, Hidup Nyaman!</h1>
                    <p class="hero-subtitle">Jangan pusing soal uang! Ngutangyuk punya solusi keuangan yang bikin hidupmu lebih enak.</p>
                    <a href="#" class="btn btn-hero">Yuk, Lihat Layanan Kita!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section">
        <div class="container">
            <h2 class="text-center mb-5">Kenapa Pilih Ngutangyuk?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-item">
                        <i class="fas fa-bolt feature-icon"></i>
                        <h3 class="feature-title">Proses Cepat</h3>
                        <p>Persetujuan cepat, nggak pakai lama. Uangmu cair dalam hitungan jam!</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-item">
                        <i class="fas fa-user-shield feature-icon"></i>
                        <h3 class="feature-title">Aman & Terpercaya</h3>
                        <p>Datamu aman banget, dijamin nggak ada yang bisa bocor!</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-item">
                        <i class="fas fa-hand-holding-usd feature-icon"></i>
                        <h3 class="feature-title">Bunga Bersahabat</h3>
                        <p>Bunga rendah, cicilan ringan. Nggak bikin kantong kering!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang-kami" class="section">
        <div class="container">
            <h2 class="section-title">Tentang Kami</h2>
            <p>Ngutangyuk adalah platform keuangan keren yang dibuat khusus untuk memenuhi kebutuhan uang anak muda. Kita percaya kalau semua orang berhak dapat akses ke solusi keuangan yang cepat, aman, dan terjangkau. Dengan teknologi canggih dan cara yang ramah pengguna, kita berkomitmen untuk bantu kamu capai kebebasan finansial.</p>
        </div>
    </section>

    <section id="layanan" class="section">
        <div class="container">
            <h2 class="section-title">Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="layanan-item">
                        <i class="fas fa-money-bill-wave layanan-icon"></i>
                        <h3>Pinjaman Kilat</h3>
                        <p>Dapat uang dalam hitungan jam untuk kebutuhanmu yang mendesak.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="layanan-item">
                        <i class="fas fa-piggy-bank layanan-icon"></i>
                        <h3>Tabungan Fleksibel</h3>
                        <p>Mulai nabung dengan bunga oke dan penarikan yang fleksibel.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="layanan-item">
                        <i class="fas fa-chart-line layanan-icon"></i>
                        <h3>Konsultasi Uang</h3>
                        <p>Dapat saran dari ahli keuangan untuk rencanain masa depanmu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="section">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Pesanmu"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Info Kontak</h4>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Keren No. 123, Jakarta Selatan</p>
                    <p><i class="fas fa-phone"></i> 021-1234567</p>
                    <p><i class="fas fa-envelope"></i> halo@Ngutangyuk.com</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="footer-title">Ngutangyuk</h4>
                    <p>Solusi keuangan keren buat anak muda. Bikin hidupmu lebih lancar tanpa drama!</p>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-title">Link Penting</h4>
                    <ul class="footer-links">
                        <li><a href="#">Tentang Kita</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Tanya Jawab</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-title">Kontak Kami</h4>
                    <p>Jl. Keren No. 123, Jakarta Selatan<br>
                    Telp: 021-1234567<br>
                    Email: halo@Ngutangyuk.com</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top
                    }, 1000);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Smooth scrolling
            $('a[href^="#"]').on('click', function(event) {
                event.preventDefault();
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    var navbarHeight = $('.navbar').outerHeight();
                    $('html, body').animate({
                        scrollTop: target.offset().top - navbarHeight
                    }, 1000);
                }
            });

            // Sticky navbar
            var navbar = $('.navbar');
            var navbarHeight = navbar.outerHeight();
            var sticky = navbar.offset().top;

            function stickyNavbar() {
                if (window.pageYOffset >= sticky) {
                    navbar.addClass("sticky-navbar");
                    $('body').css('padding-top', navbarHeight);
                } else {
                    navbar.removeClass("sticky-navbar");
                    $('body').css('padding-top', 0);
                }
            }

            $(window).scroll(stickyNavbar);
            stickyNavbar(); // Call on page load
        });
    </script>
</body>
</html>