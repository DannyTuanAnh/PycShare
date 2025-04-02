<?php
session_start();
ob_start();

header("Content-Type: application/json");

include "../Model/connectdtb.php";
include "../Model/user.php";

if(($_SERVER["REQUEST_METHOD"] === "POST"))
{
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    //kiểm tra tài khoản từ bảng user
    $isAccount = checkuser($user,$pass);
    if ($isAccount === "not_found") 
    {
        echo json_encode([
            "status" => "error",
            "message" => "Sai tên đăng nhập hoặc mật khẩu!"
        ]);
    }
    else  
    {
        $_SESSION['username'] = $isAccount['user'];
        echo json_encode(["status" => "success", "message" => "Đăng nhập thành công!", "redirect" => "./home.php"]);
    }
}
else 
{
    echo json_encode(["status" => "error", "message" => "Yêu cầu không hợp lệ!"]);
}   
?>