<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /PycShare/user/Login_Signup/login.php");
        exit();
    }    
?>
<h2>Đăng xuất</h2>
<p>Bạn có chắc chắn muốn đăng xuất?</p>
<form action="/PycShare/user/Profile/Cai-dat/logout.php" id="form-logout" method="post"><button type="submit">Đăng xuất
        ngay</button></form>
<br /><br />
<button class="backBtn">⬅ Quay lại</button>
<script src="../../../asset/javaScript/login_signup.js"></script>