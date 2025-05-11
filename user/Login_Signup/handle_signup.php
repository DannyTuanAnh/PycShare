<!-- xử lí đăng ký -->
<?php
session_start();
$server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die("Không kết nối được máy chủ");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["username"]);
    $pass = $_POST["password"];
    $role = 0;
    $email = trim($_POST["email"]);

    // Kiểm tra tài khoản đã tồn tại
    $check = $server->prepare("select id from user where user = ?");
    $check->bind_param("s", $user);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Tài khoản đã tồn tại";
        header ("Location: signup.php");
        exit();
    }
    else{
    // Mã hóa mật khẩu và thêm user mới
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
    $update_data = $server->prepare("insert into user (user, pass, role, email) value (?,?,?,?)");
    $update_data->bind_param("ssss", $user, $hash_pass, $role, $email);
    if ($update_data->execute()) {
        // Chuyển về login sau khi đăng ký thành công
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Đăng ký không thành công";
        header ("Location: signup.php");
        exit();
    }
    $update_data->close();
    }
}
$server->close();
?>
<?php
    if(isset($_SESSION['error'])) {
        echo "<script>document.addEventListener('DOMContentLoaded', () => {showToast('".$_SESSION['error']."');});</script>";
        unset($_SESSION['error']);
    }
?>