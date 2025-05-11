<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /PycShare/user/Login_Signup/login.php");
        exit();
    }    
?>
<h2>Bảo mật</h2>
<p>Đổi mật khẩu tài khoản:</p>
<form>
    <label>Mật khẩu hiện tại:</label><br />
    <input type="password" /><br /><br />
    <label>Mật khẩu mới:</label><br />
    <input type="password" /><br /><br />
    <label>Nhập lại mật khẩu mới:</label><br />
    <input type="password" /><br /><br />
    <button type="submit">Xác nhận</button>
</form>
<br />
<button class="backBtn">⬅ Quay lại</button>