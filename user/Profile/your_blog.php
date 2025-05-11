<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /PycShare/user/Login_Signup/login.php");
        exit();
    }
?>
<div class="section">
    <h3>Blog của tôi</h3>
    <p>Nội dung blog cá nhân hiển thị tại đây.</p>
</div>