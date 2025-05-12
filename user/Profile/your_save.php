<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: ../Login_Signup/login.php");
        exit();
    }
?>
<div class="section">
    <h3>Bài viết đã lưu</h3>
    <p>Danh sách bài viết đã lưu hiển thị tại đây.</p>
</div>