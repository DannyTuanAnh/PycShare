<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Nhập</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
    <!-- link của awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="reset.css" />
    <style>
    :root {
        --maincolorlight: #92c194;
        --maincolorbold: #105013;
        --fontfamily: "Montserrat Alternates", sans-serif;
    }

    body {
        background-image: url(./asset/bg.jpg);
    }

    header {
        width: 1440px;
        height: 80px;
        background-color: rgba(6, 53, 38, 0.75);
        margin: auto;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .logo img {
        margin: 20px 0 0 40px;
    }

    .logo span {
        font-size: 2rem;
        font-family: "Agbalumo", system-ui;
        color: #b9d2c0;
        margin-top: 10px;
    }

    .body h1 {
        font-size: 2rem;
        color: var(--maincolorlight);
        font-family: var(--fontfamily);
        font-weight: 700;
        margin: 50px 0px;
        text-align: center;
    }

    .body {
        width: 700px;
        height: 500px;
        margin: 50px auto;
        align-items: center;
        border: 1px solid white;
        border-radius: 8px;
        background-color: rgba(222, 199, 199, 0.05);
    }

    .form__login {
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
    }

    .form__login p {
        font-family: "Montserrat", sans-serif;
        color: #b9d2c0;
    }

    #login,
    #passwordlogin {
        width: 388px;
        height: 48px;
        border-radius: 8px;
        background-color: #b9d2c0;
        margin-top: 5px;
    }

    #login {
        margin-bottom: 30px;
    }

    #login::placeholder,
    #passwordlogin::placeholder {
        font-family: var(--fontfamily);
        font-size: 1.2rem;
        font-weight: 700;
        padding-left: 20px;
    }

    .body p {
        margin-bottom: 5px;
        font-family: var(--fontfamily);
        font-size: 1.2rem;
        font-weight: 700;
    }

    .btn {
        margin-top: 30px;
        width: 160px;
        height: 50px;
        border-radius: 8px;
        border: none;
        background-color: var(--maincolorbold);
        font-size: 1.2rem;
        font-family: var(--fontfamily);
        font-weight: 700;
        color: var(--maincolorlight);
        cursor: pointer;
    }

    input {
        outline: none;
        border: none;
        font-family: var(--fontfamily);
        font-weight: bold;
        font-size: 1.2rem;
        padding-left: 10px;
        color: var(--maincolorbold);
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .password-container {
        position: relative;
    }

    i {
        color: var(--maincolorbold);
        border-radius: 8px;
        padding: 5px;
        transition: 0.3s;
    }

    i:hover {
        background-color: var(--maincolorlight);
        transition: 0.3s;
    }

    .toast {
        visibility: hidden;
        min-width: 250px;
        background-color: red;
        color: white;
        text-align: center;
        padding: 12px;
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
    }

    .show {
        visibility: visible;
        animation: fadeOut 3s ease-in-out;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
    </style>
    <script src="./login.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="./asset/pycshare_logo.svg" alt="" />
                    <span>PycShare</span>
                </div>
            </nav>
        </div>
    </header>
    <div class="body">
        <h1>ĐĂNG NHẬP</h1>
        <form class="form__login">
            <div class="loginform">
                <p>Tên đăng nhập</p>
                <input type="text" name="username" id="login" placeholder="Tên đăng nhập..." />
            </div>
            <div class="passwordform">
                <p>Mật khẩu</p>
                <div class="password-container">
                    <input type="password" name="password" id="passwordlogin" placeholder="Mật khẩu..." />
                    <span class="toggle-password" onclick="togglePassword()"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <div class="buttonlogin">
                <button class="btn btn__login" name="dangnhap" type="submit">
                    Đăng nhập
                </button>
            </div>
        </form>
        <p id="error-msg" style="color: red"></p>
    </div>
</body>

</html>