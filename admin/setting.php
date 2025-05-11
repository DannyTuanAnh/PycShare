<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['admin'])){
        header("Location:  /user/Login_Signup/login.php");
        exit();
    }
?>
<p>Cài đặt</p>