<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /user/Login_Signup/login.php");
        exit();
    }    
?>
<h2>Chuyển đổi tài khoản</h2>
<p>Bạn có thể đăng nhập với một tài khoản khác.</p>
<button>Chuyển sang tài khoản khác</button>
<br /><br />
<button class="backBtn">⬅ Quay lại</button>