<!-- Xử lý logic đăng nhập -->
<?php
    session_start();
    $server = mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = trim($_POST["username"]);
        $pass = $_POST["password"];
        $select = "select pass, role from user where user = ?";
        $table = $server->prepare($select);
        $table->bind_param("s", $user);
        $table->execute();
        $table->store_result();
        if($table->num_rows > 0){
            $table->bind_result($data_pass,$data_role);
            $table->fetch();
            if(password_verify($pass,$data_pass) && $data_role == 0){
                $_SESSION['username'] = $user;
                header("Location: main.php");
                exit();
            }
            else if(password_verify($pass,$data_pass) && $data_role == 1){
                $_SESSION['username'] = $user   ;
                header("Location: admin.php");
                exit();
            }
            else{
                echo "<div id = 'toast' class = 'toast show'>Sai mật khẩu</div>";
            }
        }
        else{
            echo "<div id = 'toast' class = 'toast show'>Tài khoản không tồn tại</div>";
        }
        $table->close();
    }
    $server->close();
?>

<!-- html -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./asset/style/reset.css" />
    <link rel="stylesheet" href="./asset/style/style.css" />
    <link rel="stylesheet" href="./asset/style/style-login-sign.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <title>Đăng nhập</title>
</head>

<body class="container-login-signup">
    <!-- header -->
    <header class="header">
        <!-- logo -->
        <div class="logo">
            <img src="./asset/img/Logo.svg" alt="Pycshare" />
        </div>
    </header>
    <!-- main -->
    <main class="container-form container-form-login">
        <h1>ĐĂNG NHẬP</h1>
        <form class="form-login-signup" method="post" action="./login.php">
            <div class="loginform">
                <p>Tên đăng nhập</p>
                <input type="text" name="username" id="login" placeholder="Tên đăng nhập..." />
            </div>
            <div class="passwordform">
                <p>Mật khẩu</p>
                <div class="password-container">
                    <input type="password" name="password" id="passwordlogin" placeholder="Mật khẩu..." />
                    <span class="toggle-password" onclick="togglePassword('passwordlogin', this)">
                        <i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <div class="buttonlogin">
                <button type="submit" class="btn btn-login">Đăng nhập</button>
            </div>
        </form>
    </main>

    <script src="./asset/javaCript/login_signup.js"></script>
</body>

</html>