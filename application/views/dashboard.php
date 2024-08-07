<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Koperasi Simpan Pinjam | Dashboard</title>
    <meta charset="UTF-8">
    <meta name="description" content="Koperasi Simpan Pinjam">
    <meta name="keywords" content="koperasi, simpan pinjam, dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link href="<?= base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/slicknav.min.css'); ?>"/>
    
    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .dashboard-section {
            padding: 70px 0;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 30px;
            background-color: #ffffff;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(215, 57, 2, 0.1);
        }
        .card-header {
            background: linear-gradient(45deg, #D73902, #FF6B35);
            color: #fff;
            border-bottom: none;
            padding: 25px;
            position: relative;
            overflow: hidden;
        }
        .card-header:before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            bottom: -50%;
            left: -50%;
            background: linear-gradient(to bottom right, rgba(255,255,255,0.2), rgba(255,255,255,0));
            transform: rotate(45deg);
            pointer-events: none;
        }
        .card-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.3rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .card-body {
            padding: 30px;
        }
        .icon-box {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .icon-box i {
            font-size: 32px;
            margin-right: 20px;
            color: #D73902;
            background: rgba(215, 57, 2, 0.1);
            padding: 15px;
            border-radius: 50%;
        }
        .icon-box p {
            margin: 0;
            font-size: 1.1rem;
            line-height: 1.4;
        }
        .list-unstyled li {
            padding: 20px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }
        .list-unstyled li:last-child {
            border-bottom: none;
        }
        .list-unstyled li i {
            margin-right: 15px;
            font-size: 24px;
            color: #D73902;
        }
        #loanChart {
            height: 400px !important;
        }
        .stat-card {
            background: linear-gradient(45deg, #D73902, #FF6B35);
            color: #fff;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .stat-card:before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            bottom: -50%;
            left: -50%;
            background: linear-gradient(to bottom right, rgba(255,255,255,0.2), rgba(255,255,255,0));
            transform: rotate(45deg);
            pointer-events: none;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(215, 57, 2, 0.2);
        }
        .stat-card h3 {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .stat-card p {
            font-size: 2.2rem;
            color: #fff;
            font-weight: 700;
            margin: 0;
        }
        .notification-item {
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        .notification-item:last-child {
            border-bottom: none;
        }
        .notification-item i {
            margin-right: 15px;
            font-size: 24px;
            color: #D73902;
        }
    </style>
</head>
<body>
    <!-- Page Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <a href="<?= site_url('dashboard'); ?>" class="site-logo" aria-label="Homepage">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo KopeGaul">
        </a>
        <nav class="header-nav">
            <ul class="main-menu">
                <li><a href="<?= site_url('dashboard'); ?>" class="active">Home</a></li>
                <li><a href="<?= site_url('Pinjaman'); ?>">Pinjem Duit</a></li>
                <li><a href="<?= site_url('Simpanan'); ?>">Simpenan</a></li>
                <li><a href="<?= site_url('Auth/logout'); ?>">Cabut</a></li>
            </ul>
            <div class="header-right">
                <?php if (!empty($user) && !empty($user['profile_picture'])): ?>
                    <a href="<?= site_url('Edit_profile'); ?>" class="hr-btn" aria-label="Edit profilmu">
                        <img src="<?= base_url('assets/uploads/profile_pictures/' . $user['profile_picture']); ?>" alt="Foto Profil" style="width: 20px; height: 20px; border-radius: 50%; margin-right: 10px;">
                        Profil Lo
                    </a>
                <?php else: ?>
                    <a href="<?= site_url('Edit_profile'); ?>" class="hr-btn" aria-label="Edit profilmu">
                        <i class="flaticon-001-user" style="margin-right: 10px;"></i>
                        Profil Lo
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <section class="dashboard-section spad mt-5">
        <div class="container">
            <div class="row">
                <!-- Akun Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4><i class="fas fa-user-circle mr-2"></i>Info</h4>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($user)): ?>
                                <div class="icon-box">
                                    <i class="fas fa-user"></i>
                                    <p><strong>Nama:</strong><br><?= isset($user['Nama']) ? $user['Nama'] : 'Belom Diisi'; ?></p>
                                </div>
                                <!-- [Info lainnya tetap sama] -->
                            <?php else: ?>
                                <p>Waduh, data lo belom ada nih.</p>
                            <?php endif; ?>
                            <a href="<?= site_url('Edit_profile'); ?>" class="btn btn-custom mt-4">Update Profil</a>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan Keuangan -->
                <div class="col-lg-8 col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4><i class="fas fa-money-bill-wave mr-2"></i>Duit</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stat-card">
                                        <h3>Limit Pinjem</h3>
                                        <p>Rp <?= isset($user['loan_limit']) ? number_format($user['loan_limit'], 0, ',', '.') : 'Belom Ada'; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stat-card">
                                        <h3>Utang Jalan</h3>
                                        <p>Rp <?= isset($user['current_loan']) ? number_format($user['current_loan'], 0, ',', '.') : 'Belom Ada'; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stat-card">
                                        <h3>Total Tabungan</h3>
                                        <p>Rp <?= isset($user['saving_limit']) ? number_format($user['saving_limit'], 0, ',', '.') : 'Belom Ada'; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-calculator mr-2"></i>Ngitung Pinjeman</h4>
                        </div>
                        <div class="card-body">
                            <form id="loanSimulationForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="loanAmount">Mau Pinjem Berapa? (Rp)</label>
                                        <input type="number" class="form-control" id="loanAmount" placeholder="Masukin jumlah yang dimau" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="loanTerm">Mau Bayar Berapa Lama?</label>
                                        <select class="form-control" id="loanTerm" required>
                                            <option value="3">3 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="12">Setaun</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Gas Hitung!</button>
                            </form>
                            <div id="simulationResult" class="mt-4" style="display: none;">
                                <h5>Nih Hasilnya:</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Bunga per Tahun</th>
                                        <td id="appliedInterestRate"></td>
                                    </tr>
                                    <tr>
                                        <th>Cicilan per Bulan</th>
                                        <td id="monthlyPayment"></td>
                                    </tr>
                                    <tr>
                                        <th>Total Bayar</th>
                                        <td id="totalPayment"></td>
                                    </tr>
                                    <tr>
                                        <th>Total Bunga</th>
                                        <td id="totalInterest"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifikasi dan Pesan -->
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-bell mr-2"></i>Update Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="notification-item">
                                <p><i class="fas fa-info-circle"></i>Belom ada notif baru nih.</p>
                            </div>
                            <div class="notification-item">
                                <p><i class="fas fa-envelope"></i>Inboxnya masih kosong nih.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url('/assets/js/jquery.slicknav.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/main.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.getElementById('loanSimulationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const loanAmount = parseFloat(document.getElementById('loanAmount').value);
        const loanTerm = parseInt(document.getElementById('loanTerm').value);
        
        // Menentukan suku bunga berdasarkan jangka waktu
        let interestRate;
        if (loanTerm <= 3) {
            interestRate = 0.05; // 5% untuk 3 bulan
        } else if (loanTerm <= 6) {
            interestRate = 0.07; // 7% untuk 6 bulan
        } else {
            interestRate = 0.10; // 10% untuk 12 bulan atau lebih
        }

        // Hitung total bunga dan jumlah pinjaman termasuk bunga
        const totalInterest = loanAmount * interestRate;
        const totalAmount = loanAmount + totalInterest;
        const monthlyInstallment = totalAmount / loanTerm;

        document.getElementById('monthlyPayment').textContent = 'Rp ' + monthlyInstallment.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        document.getElementById('totalPayment').textContent = 'Rp ' + totalAmount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        document.getElementById('totalInterest').textContent = 'Rp ' + totalInterest.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        document.getElementById('appliedInterestRate').textContent = (interestRate * 100) + '%';

        document.getElementById('simulationResult').style.display = 'block';
    });
    </script>

</body>
</html>