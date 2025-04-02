<?php
//Tạo hàm để kiểm tra tài khoản
function checkuser($user,$pass){
    $conn = connectdb();
    // Chọn dữ liệu từ data
    $stmt = $conn->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    $userData=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$userData){
        return "not_found";
    }
    else{
        return $userData;
    }
}
?>