<!-- xử lí đăng nhập -->
<?php
session_start();
$server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["username"]);
    $pass = $_POST["password"];
    
    $table = $server->prepare("select pass, role from user where user = ?");
    $table->bind_param("s", $user);
    $table->execute();
    $table->store_result();

    if ($table->num_rows > 0) {
        $table->bind_result($data_pass, $data_role);
        $table->fetch();
        if (password_verify($pass, $data_pass)) {
            if ($data_role == 1) {
                $_SESSION['admin'] = $user;
                header("Location: ../../admin/admin.php");
            } else {
                $_SESSION['username'] = $user;
                header("Location: ../main.php");
            }
            exit();
        } else {
            $_SESSION['error']= "Sai mật khẩu";
            header ("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error']= "Tài khoản không tồn tại";
        header ("Location: login.php");
        exit();
    }

    $table->close();
}
$server->close();
?>
<?php
    if(isset($_SESSION['error'])) {
        echo "<script>document.addEventListener('DOMContentLoaded', function() { showToast('" . $_SESSION['error'] . "'); });</script>";
        unset($_SESSION['error']);
    }
?>