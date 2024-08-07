<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #8C1A00, #F43F00);
            padding: 30px;
        }
        .container {
            display: flex;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
        .wrapper {
            flex: 1;
            padding: 40px;
            background: #fff;
        }
        .wrapper h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }
        .wrapper h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            height: 4px;
            width: 50px;
            background: #F43F00;
            border-radius: 2px;
        }
        .wrapper form {
            margin-top: 30px;
        }
        .wrapper form .input-box {
            position: relative;
            height: 50px;
            margin-bottom: 20px;
        }
        form .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 50px;
            font-size: 16px;
            color: #333;
            border: 2px solid #ddd;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .input-box input:focus,
        .input-box input:valid {
            border-color: #F43F00;
        }
        .input-box i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #8C1A00;
            left: 20px;
        }
        .policy {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .policy input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: #F43F00;
        }
        .policy h3 {
            color: #707070;
            font-size: 14px;
            font-weight: 500;
        }
        .input-box.button input {
            color: #fff;
            letter-spacing: 1px;
            border: none;
            background: #F43F00;
            cursor: pointer;
            font-weight: 500;
        }
        .input-box.button input:hover {
            background: #8C1A00;
        }
        .text {
            text-align: center;
            margin-top: 20px;
        }
        .text h3 {
            color: #333;
            font-size: 14px;
        }
        .text h3 a {
            color: #F43F00;
            text-decoration: none;
        }
        .text h3 a:hover {
            text-decoration: underline;
        }
        .image-container {
            flex: 1;
            background: linear-gradient(135deg, #F43F00, #8C1A00);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .image-container img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .image-container {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <h2>Yuk ngutang</h2>
        <form action="<?= site_url ('Anggota_controller/create')?>" method="post">
            <div class="input-box">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="text" name="alamat" placeholder="Alamat" required>
                <i class="fas fa-home"></i>
            </div>
            <div class="input-box">
                <input type="text" name="telepon" placeholder="Boleh dong kak nomor nya" required>
                <i class="fas fa-phone"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Pastiin lagi password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="policy">
                <input type="checkbox" name="terms" required>
                <h3>Terima syarat dan ketentuan nya ya</h3>
            </div>
            <div class="input-box button">
                <input type="submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Punya akun? Lansung login aja <a href="<?= site_url('Auth/login') ?>">Login now</a></h3>
            </div>
        </form>
    </div>
    <div class="image-container">
        <img src="<?= base_url('\assets\img\info-img.jpg')?>" alt="Welcome Image">
    </div>
</div>
</body>
</html>