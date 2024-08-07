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

    <div id="preloader">
        <div class="loader"></div>
    </div>


<header class="header-section">
        <a href="<?= site_url('dashboard'); ?>" class="site-logo" aria-label="Homepage">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo">
        </a>
        <nav class="header-nav">
            <ul class="main-menu">
                <li><a href="<?= site_url('dashboard'); ?>" >Beranda</a></li>
                <li><a href="<?= site_url('Pinjaman'); ?>" >Pinjem Duit</a></li>
                <li><a href="<?= site_url('Simpanan'); ?>" class="active">Simpenan</a></li>
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
            <!-- User's savings summary -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Simpenan</h5>
                    <p class="card-text">Total Simpanan: <strong>Rp. <?= number_format($user['saving_limit'], 0, ',', '.'); ?></strong></p>
                    <small class="text-muted">*Total simpanan diakumulasikan dari semua jenis simpanan</small>
                    <div class="btn-group d-flex">
                        <a href="<?= site_url('Simpanan/view_by_anggota_id/' . $user['Anggota_ID']); ?>" class="btn btn-primary flex-fill mr-2">Riwayat Simpanan</a>
                    </div>
                </div>
            </div>

            <!-- Savings form -->
            <div class="card shadow">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0">Formulir Simpanan</h4>
                </div>
                <div class="card-body">
                    <form id="savingsForm" action="<?= site_url('Simpanan/create'); ?>" method="post">
                        <div class="form-group">
                            <label for="amount">Jumlah Simpanan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">IDR</span>
                                </div>
                                <input type="number" id="amount" name="jumlah" class="form-control" required min="10000">
                            </div>
                            <small class="form-text text-muted">Minimal simpanan: 10,000 IDR</small>
                        </div>
                        <div class="form-group">
                            <label for="type">Jenis Simpanan</label>
                            <select id="type" name="jenis" class="form-control" required>
                                <option value="pokok">Simpanan Pokok</option>
                                <option value="wajib">Simpanan Wajib</option>
                                <option value="sukarela">Simpanan Sukarela</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Simpan</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Simpanan Berhasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Simpanan Anda telah berhasil disimpan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var savingsForm = document.getElementById("savingsForm");
        savingsForm.addEventListener("submit", function(event) {
            var amount = document.getElementById("amount").value;
            if (amount < 10000) {
                event.preventDefault();
                alert("Jumlah simpanan minimal adalah 10,000 IDR");
            } else {
                event.preventDefault();
                $.ajax({
                    type: savingsForm.method,
                    url: savingsForm.action,
                    data: $(savingsForm).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $('#successModal').modal('show');
                    },
                    error: function(error) {
                        alert("Simpanan gagal. Silakan coba lagi.");
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

        $('#successModal').on('hidden.bs.modal', function () {
            location.reload();
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