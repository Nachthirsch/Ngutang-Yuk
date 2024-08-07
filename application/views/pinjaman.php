<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Koperasi Simpan Pinjam | Formulir Peminjaman</title>
    <meta charset="UTF-8">
    <meta name="description" content="Koperasi Simpan Pinjam">
    <meta name="keywords" content="koperasi, simpan pinjam, formulir peminjaman">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="<?= base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/slicknav.min.css'); ?>"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>"/>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 100px;
        }

        .container.mt-5 {
            margin-top: 3rem !important;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
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
            border-radius: 15px 15px 0 0;
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

        .card-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: 600;
            color: #4a4a4a;
            margin-bottom: 10px;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #D73902;
            box-shadow: 0 0 0 0.2rem rgba(215, 57, 2, 0.25);
        }

        select.form-control {
            color: #333;
            font-size: 16px;
            background-color: #fff;
            text-overflow: ellipsis;
        }

        select.form-control option {
            padding: 10px;
            background-color: #fff;
        }

        select.form-control option:hover {
            background-color: #f0f0f0;
        }

        .btn-primary {
            background: linear-gradient(45deg, #D73902, #FF6B35);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #FF6B35, #D73902);
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(215, 57, 2, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-group .btn {
            flex: 1;
            margin: 0 5px;
        }

        .card-title {
            color: #4a4a4a;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 18px;
            color: #666;
            margin-bottom: 25px;
        }

        .card-text strong {
            color: #D73902;
            font-size: 24px;
            font-weight: 700;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-color: #e0e0e0;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container.mt-5 {
                margin-top: 1rem !important;
            }

            .card-body {
                padding: 20px;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-group .btn {
                margin: 5px 0;
            }
        }
        </style>

</head>
<body>
    <!-- Page Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Header Section -->
    <header class="header-section">
        <a href="<?= site_url('dashboard'); ?>" class="site-logo" aria-label="Homepage">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo">
        </a>
        <nav class="header-nav">
            <ul class="main-menu">
                <li><a href="<?= site_url('dashboard'); ?>" >Home</a></li>
                <li><a href="<?= site_url('Pinjaman'); ?>" class="active">Pinjem Duit</a></li>
                <li><a href="<?= site_url('Simpanan'); ?>">Simpenan</a></li>
                <li><a href="<?= site_url('Auth/logout'); ?>">Cabut</a></li>
            </ul>
            <div class="header-right">
                <?php if (!empty($user) && !empty($user['profile_picture'])): ?>
                    <!-- Jika foto profil tersedia, tampilkan foto profil -->
                    <a href="<?= site_url('Edit_profile'); ?>" class="hr-btn" aria-label="Edit your profile">
                        <img src="<?= base_url('assets/uploads/profile_pictures/' . $user['profile_picture']); ?>" alt="Profile Picture" style="width: 20px; height: 20px; border-radius: 50%; margin-right: 10px;">
                        Profile
                    </a>
                <?php else: ?>
                    <!-- Jika foto profil tidak tersedia, tampilkan ikon default -->
                    <a href="<?= site_url('Edit_profile'); ?>" class="hr-btn" aria-label="Edit your profile">
                        <i class="flaticon-001-user" style="margin-right: 10px;"></i>
                        Profile
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- User's loan limit summary -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Kredit Anda</h5>
                    <p class="card-text">Kredit Tersedia: <strong>Rp. <?= number_format($user['loan_limit'], 0, ',', '.'); ?></strong></p>
                    <div class="btn-group d-flex">
                        <a href="<?= site_url('Pinjaman/view_by_anggota_id/' . $user['Anggota_ID']); ?>" class="btn btn-primary flex-fill mr-2">Lihat Tagihan</a>
                        <a href="<?= site_url('Pembayaran_pinjaman/view_by_anggota_id/' . $user['Anggota_ID']); ?>" class="btn btn-primary flex-fill mr-2">Lihat Transaksi</a>
                    </div>
                </div>
            </div>

            <!-- Loan application form -->
            <div class="card shadow">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0">Formulir Peminjaman</h4>
                </div>
                <div class="card-body">
                    <form id="loanForm" action="<?= site_url('Pinjaman/create'); ?>" method="post">
                        <div class="form-group">
                            <label for="amount">Jumlah Pinjaman</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">IDR</span>
                                </div>
                                <input type="number" id="amount" name="jumlah" class="form-control" required min="500000" max="<?= $user['loan_limit']; ?>">
                            </div>
                            <small class="form-text text-muted">Minimal pinjaman: 500,000 IDR</small>
                        </div>
                        <div class="form-group">
                            <label for="duration">Durasi Angsuran</label>
                            <select id="duration" name="durasi" class="form-control" required>
                                <option value="3">3 Bulan - 5% Bunga</option>
                                <option value="6">6 Bulan - 7% Bunga</option>
                                <option value="12">12 Bulan - 10% Bunga</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Ajukan Pinjaman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal untuk konfirmasi sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan Berhasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pengajuan pinjaman Anda telah berhasil!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan JS Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil form pinjaman
            var loanForm = document.getElementById("loanForm");
            // Menambahkan event listener untuk 'submit'
            loanForm.addEventListener("submit", function(event) {
                // Mengambil nilai jumlah pinjaman
                var amount = document.getElementById("amount").value;
                // Cek jika jumlah pinjaman kurang dari 500,000
                if (amount < 500000) { // Memperbaiki kesalahan penulisan di sini
                    event.preventDefault(); // Mencegah submit form
                    alert("Jumlah pinjaman minimal adalah 500,000");
                } else if (amount > <?= $user['loan_limit']; ?>) {
                    event.preventDefault(); // Mencegah submit form
                    alert("Jumlah pinjaman melebihi limit pinjaman Anda.");
                } else {
                    // Jika jumlah pinjaman valid, maka submit form
                    event.preventDefault();
                    $.ajax({
                        type: loanForm.method,
                        url: loanForm.action,
                        data: $(loanForm).serialize(),
                        success: function(response) {
                            $('#successModal').modal('show');
                        },
                        error: function(error) {
                            alert("Pengajuan pinjaman gagal. Silakan coba lagi.");
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('#successModal').on('shown.bs.modal', function() {
                $(this).find('.modal-dialog').css({
                    'margin-top': function() {
                        return ($(window).height() - $(this).height()) / 2;
                    }
                });
            });

            // Menambahkan kode untuk refresh halaman setelah modal ditutup
            $('#successModal').on('hidden.bs.modal', function () {
                location.reload(); // Refresh halaman
            });
        });
    </script>

    <script src="<?php echo base_url('/assets/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/jquery.slicknav.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/main.js'); ?>"></script>
</body>
</html>
