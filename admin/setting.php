<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['admin'])){
        header("Location:  /user/Login_Signup/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="/asset/style/reset.css" /> -->
    <link rel="stylesheet" href="../asset/style/style-admin.css" />
    <script type="text/javascript" src="../asset/javaScript/jquery.min.js"></script>
    <title>Trang chủ</title>
</head>

<body>
    <div class="container-admin">
        <!-- Sidebar trái -->
        <aside class="sidebar">
            <div class="logo logo-admin">
                <img src="../asset/img/logo-admin.svg" alt="Logo" />
            </div>
            <nav class="navbar">
                <ul>
                    <li data-url="./admin.php">Dashboard</li>
                    <li data-url="./user_manage.php">Quản lý người dùng</li>
                    <li data-url="./article_manage.php">Quản lý bài viết</li>
                    <li data-url="./statistic.php">Thống kê</li>
                    <li data-url="./setting.php">Cài đặt</li>
                </ul>
            </nav>
        </aside>
        <p>Cài đặt</p>
        <!-- footer -->
        <footer class="footer"></footer>

        <!-- js -->
        <script src="../asset/javaScript/admin.js"></script>
</body>

</html>