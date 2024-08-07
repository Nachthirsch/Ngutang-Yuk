<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Koperasi Simpan Pinjam | Edit Profile</title>
    <meta charset="UTF-8">
    <meta name="description" content="Koperasi Simpan Pinjam">
    <meta name="keywords" content="koperasi, simpan pinjam, edit profile">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link href="<?= base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 80px;
            min-height: 100vh;
        }
        .container {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            background-color: #ffffff;
        }
        .card-header {
            background: linear-gradient(45deg, #D73902, #FF6B35);
            color: #fff;
            border-bottom: none;
            padding: 25px;
            font-size: 24px;
            font-weight: 600;
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
            padding: 40px;
        }
        .profile-photo-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 30px;
        }
        #profilePhoto {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        #profilePhoto:hover {
            transform: scale(1.05);
        }
        .photo-upload-label {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #D73902;
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .photo-upload-label:hover {
            background-color: #FF6B35;
        }
        .form-group label {
            font-weight: 500;
            color: #4a4a4a;
        }
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #D73902;
            box-shadow: 0 0 0 0.2rem rgba(215, 57, 2, 0.25);
        }
        .btn-primary {
            background: linear-gradient(45deg, #D73902, #FF6B35);
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #FF6B35, #D73902);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(215, 57, 2, 0.1);
        }
        .is-invalid {
            border-color: #e74c3c !important;
        }
        .invalid-feedback {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <!-- [Header Section remains unchanged] -->
    <header class="header-section">
        <a href="<?= site_url('dashboard'); ?>" class="site-logo" aria-label="Homepage">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo">
        </a>
        <nav class="header-nav">
            <ul class="main-menu">
                <li><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                <li><a href="<?= site_url('Pinjaman'); ?>">Pinjem Duit</a></li>
                <li><a href="<?= site_url('Simpanan'); ?>">Simpenan</a></li>
                <li><a href="<?= site_url('Auth/logout'); ?>">Cabut</a></li>
            </ul>
            <div class="header-right">
                <?php if (!empty($user) && !empty($user['profile_picture'])): ?>
                    <!-- Jika foto profil tersedia, tampilkan foto profil -->
                    <a href="<?= site_url('Edit_profile'); ?>" class="hr-btn active" aria-label="Edit your profile">
                        <img src="<?= base_url('assets/uploads/profile_pictures/' . $user['profile_picture']); ?>" alt="Profile Picture" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 10px;">
                        Profile
                    </a>
                <?php else: ?>
                    <!-- Jika foto profil tidak tersedia, tampilkan ikon default -->
                    <a href="<?= site_url('Edit_profile'); ?>" class="hr-btn active" aria-label="Edit your profile">
                        <i class="flaticon-001-user" style="margin-right: 10px;"></i>
                        Profile
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <!-- Edit Profile Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <i class="fas fa-user-edit mr-2"></i>Edit Profil
                    </div>
                    <div class="card-body">
                        <form id="editProfileForm" action="<?= site_url('edit_profile/update');?>" method="post" enctype="multipart/form-data">
                            <div class="profile-photo-container">
                                <img id="profilePhoto" src="<?= base_url(isset($user['profile_picture']) ? 'assets/uploads/profile_pictures/'.$user['profile_picture'] : 'assets/img/default-profile.jpg'); ?>" alt="Profile Photo">
                                <label for="photoUpload" class="photo-upload-label">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" id="photoUpload" name="profile_picture" accept="image/*" style="display: none;" onchange="previewImage();">
                            </div>

                            <div class="form-group">
                                <label for="nama"><i class="fas fa-user mr-2"></i>Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars(isset($user['Nama'])? $user['Nama'] : '');?>">
                                <div class="invalid-feedback">Nama.</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat"><i class="fas fa-home mr-2"></i>Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" value="<?= htmlspecialchars(isset($user['Alamat'])? $user['Alamat'] : '');?>">
                                <div class="invalid-feedback">Alamat.</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="telepon"><i class="fas fa-phone mr-2"></i>Telepon</label>
                                <input type="text" id="telepon" name="telepon" class="form-control" value="<?= htmlspecialchars(isset($user['Telepon'])? $user['Telepon'] : '');?>">
                                <div class="invalid-feedback">Nomor.</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope mr-2"></i>Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars(isset($user['Email'])? $user['Email'] : '');?>">
                                <div class="invalid-feedback">Email.</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block mt-4">
                                <i class="fas fa-save mr-2"></i>Perbarui
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage() {
            var file = document.getElementById("photoUpload").files;
            if (file.length > 0) {
                var fileReader = new FileReader();
                fileReader.onload = function(event) {
                    document.getElementById("profilePhoto").setAttribute("src", event.target.result);
                };
                fileReader.readAsDataURL(file[0]);
            }
        }

        $(document).ready(function() {
            $('#editProfileForm').on('submit', function(e) {
                e.preventDefault();
                let isValid = true;
                
                $(this).find('input[type="text"], input[type="email"]').each(function() {
                    if (!$(this).val().trim()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (isValid) {
                    this.submit();
                } else {
                    $('html, body').animate({
                        scrollTop: $('.is-invalid:first').offset().top - 100
                    }, 200);
                }
            });

            $('input').on('input', function() {
                $(this).removeClass('is-invalid');
            });
        });
    </script>
</body>
</html>