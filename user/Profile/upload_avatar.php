<?php
    session_start();
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không thể kết nối đến database");
    $user = $_SESSION['username'];
    $stmt = $server->prepare("select id from user where user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            
            $upload_dir = "uploadsAvatar/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true); 
            }
        }
            
            $file_path = $upload_dir . basename($file_name);

            if (move_uploaded_file($file_tmp, $file_path)) {
                // Lưu đường dẫn file vào CSDL
                $check = $server->query("select * from avatar where idUser = $user_id");
                if($check->num_rows>0){
                    $table = $server->prepare("update avatar set AvatarFile = ?");
                    $table->bind_param("s", $file_path);
                }
                else {
                    $table = $server->prepare("insert into avatar (idUser, AvatarFile) VALUES (?, ?)");
                    $table->bind_param("ss", $user_id, $file_path);
                }
                if($table->execute()){
                    header ("Location: profile.php");
                    $_SESSION['complete'] = "Thay đổi avatar thành công!";
                    exit();
                }
                else {
                    header ("Location: profile.php");
                    $_SESSION['error'] = "Lỗi khi lưu vào CSDL.";
                }
                $table->close();
            }
            else {
                $_SESSION['error'] = "Lỗi khi lưu file.";
                exit();
            }
    }
    else {
        $_SESSION['error'] = "Không có file được tải lên.";
    }

?>