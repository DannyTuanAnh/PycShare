<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /user/Login_Signup/login.php");
        exit();
    }    
?>
<h2>Chính sách và điều khoản</h2>
<p>Bạn vui lòng đọc kỹ các điều khoản và chính sách sau:</p>
<ul>
    <li>Không chia sẻ nội dung sai sự thật.</li>
    <li>Tôn trọng quyền riêng tư người dùng khác.</li>
    <li>Tuân thủ luật pháp và quy định nền tảng.</li>
</ul>
<br />
<button class="backBtn">⬅ Quay lại</button>