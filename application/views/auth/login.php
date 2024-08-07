<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Login Form</title>
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

        .wrapper {
            position: relative;
            max-width: 460px;
            width: 100%;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, #F43F00, #8C1A00, #F43F00);
            animation: glowing 10s linear infinite;
            opacity: 0.1;
            z-index: -1;
        }

        @keyframes glowing {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .wrapper h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .wrapper form {
            margin-top: 30px;
        }

        .wrapper form .input-box {
            position: relative;
            height: 52px;
            margin-bottom: 25px;
        }

        form .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 50px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 2px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #F43F00;
            box-shadow: 0 0 10px rgba(244, 63, 0, 0.1);
        }

        .input-box i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #8C1A00;
        }

        .input-box i.icon {
            left: 15px;
        }

        .input-box i.showHidePw {
            right: 15px;
            cursor: pointer;
        }

        .wrapper .remember-forgot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 15px 0 20px;
        }

        .remember-forgot label {
            display: flex;
            align-items: center;
            color: #707070;
            font-size: 14px;
            cursor: pointer;
        }

        .remember-forgot label input {
            margin-right: 5px;
            accent-color: #F43F00;
        }

        .remember-forgot a {
            color: #F43F00;
            font-size: 14px;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .wrapper button {
            width: 100%;
            height: 50px;
            background: #F43F00;
            border: none;
            outline: none;
            border-radius: 6px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .wrapper button:hover {
            background: #8C1A00;
        }

        .wrapper .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .register-link a {
            color: #F43F00;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login dulu dong!</h2>
        <form action="<?= site_url('auth/login')?>" method="post">
            <?= $this->session->flashdata('error') ?>
            <div class="input-box">
                <input type="text" name="username" placeholder="Email" required>
                <i class="fas fa-envelope icon"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock icon"></i>
                <i class="fas fa-eye-slash showHidePw"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Jangan lupain</label>
                <a href="#">Lupa Password</a>
            </div>
            <button type="submit">Login</button>
            <div class="register-link">
                <p>Daftar lah kalo gaada akun <a href="<?= site_url('Auth/signup')?>">Daftar Sekarang</a></p>
            </div>
        </form>
    </div>

    <script>
        const pwShowHide = document.querySelector(".showHidePw");
        const pwField = document.querySelector("input[type='password']");

        pwShowHide.addEventListener("click", () => {
            if (pwField.type === "password") {
                pwField.type = "text";
                pwShowHide.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                pwField.type = "password";
                pwShowHide.classList.replace("fa-eye", "fa-eye-slash");
            }
        });
    </script>
</body>
</html>