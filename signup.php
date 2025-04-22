<!-- xử lý đăng kí -->
<?php
    session_start();
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kế nối được máy chủ");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = trim($_POST["username"]);
        $pass = $_POST["password"];
        $role = 0;
        $email = trim($_POST["email"]);
        $select = "select id from user where user = ?";
        $check = $server->prepare($select);
        $check->bind_param("s", $user);
        $check->execute();
        $check->store_result();
        if($check->num_rows > 0){
            echo "<div id = 'toast' class = 'toast show'>Tài khoản đã tồn tại</div>";
            $check->close();
            $server->close();
            exit();
        }
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $update_data = $server->prepare("insert into user (user,pass,role,email) values (?,?,?,?)");
        $update_data->bind_param("ssss", $user, $hash_pass, $role, $email);
        if($update_data->execute()){
            echo "<div id = 'toast' class = 'toast show'>Đăng ký thành công</div>";
            header("Location: login.php");
        }
        else{
            echo "<div id = 'toast' class = 'toast show'>Đăng ký không thành công</div>";
        }
        $update_data->close();
    }
    $server->close();
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Ký</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./asset/style/reset.css" />
    <link rel="stylesheet" href="./asset/style/style.css" />
    <link rel="stylesheet" href="./asset/style/style-login-sign.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="container-login-signup">
    <!-- header -->
    <header class="header">
        <!-- logo -->
        <div class="logo">
            <img src="./asset/img/Logo.svg" alt="Pycshare" />
        </div>
    </header>
    <div class="container-form container-form-signup">
        <h1>ĐĂNG KÍ TÀI KHOẢN</h1>
        <form class="form-login-signup" method="post" action="./signup.php">
            <div class="signupform">
                <p>Tên đăng nhập</p>
                <input type="text" name="username" id="signup" placeholder="Tên đăng nhập..." />
            </div>
            <div class="passwordform">
                <p>Mật khẩu</p>
                <div class="password-container">
                    <input type="password" name="password" id="passwordsignup" placeholder="Mật khẩu..." />
                    <span class="toggle-password" onclick="togglePassword('passwordsignup', this)">
                        <i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <div class="signupform--email">
                <p>Email</p>
                <input type="text" name="email" id="signup" placeholder="Email..." />
            </div>
            <div class="checkbox-container">
                <label>
                    <input type="checkbox" />
                    <p>Đồng ý với điều khoản</p>
                </label>
            </div>

            <div class="buttonsignup">
                <button type="submit" class="btn btn-signup">Đăng ký</button>
            </div>
            <div class="otherssignup">
                <button class="btn btn__facebook">
                    <i class="fa-brands fa-facebook"></i> Facebook
                </button>
                <button class="btn btn__google">
                    <i class="fa-brands fa-google"></i> Google
                </button>
            </div>
            <div class="hasaccount">
                <p>Bạn đã có tài khoản?</p>
                <p><a href="./login.html">Đăng nhập</a></p>
            </div>
        </form>
    </div>
    <script src="./asset/javaCript/login_signup.js"></script>
</body>

</html>