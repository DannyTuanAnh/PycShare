<?php
include "handle_login.php";
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:wght@400;700&family=Open+Sans:wght@400;700&family=Poppins:wght@400;700&family=Sora:wght@400;700&display=swap" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../asset/style/reset.css" />
    <link rel="stylesheet" href="../../asset/style/style.css" />
    <link rel="stylesheet" href="../../asset/style/style-login-sign.css" />
    <link rel="stylesheet" href="../../asset/responsive/login_signUp_res.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="container-login-signup">
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <a href="../index.php"><img src="../../asset/img/Logo.svg" alt="Pycshare" /></a>
        </div>
    </header>

    <!-- Main -->
    <main class="container-form container-form-login">
        <h1>ĐĂNG NHẬP</h1>
        <form class="form-login-signup" method="POST" action="login.php">
            <div class="loginform">
                <p>Tên đăng nhập</p>
                <input type="text" name="username" id="login" placeholder="Tên đăng nhập..." />
            </div>
            <div class="passwordform">
                <p>Mật khẩu</p>
                <div class="password-container">
                    <input type="password" name="password" id="passwordlogin" placeholder="Mật khẩu..." />
                    <span class="toggle-password" onclick="togglePassword('passwordlogin', this)">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
            </div>
            <div class="buttonlogin">
                <button type="submit" class="btn btn-login">Đăng nhập</button>
            </div>
            <div class="hasaccount">
                <p>Bạn chưa có tài khoản?</p>
                <p><a href="./signup.php">Đăng ký</a></p>
            </div>
        </form>
    </main>

    <!-- JS -->
    <script src="../../asset/javaScript/jquery.min.js"></script>
    <script src="../../asset/javaScript/login_signup.js"></script>
</body>
</html>
