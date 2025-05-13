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
        $tittle = $_POST['title'];
        $description = $_POST['description'];
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // 3. Đường dẫn vật lý đầy đủ để lưu file
            $save_path = $upload_dir . basename($file_name);

            // 4. Đường dẫn WEB để lưu vào CSDL
            $web_path = "uploads/" . basename($file_name);

            // 5. Di chuyển file
            if (move_uploaded_file($file_tmp, $save_path)) {
                // 6. Lưu $web_path vào CSDL
                $table = $server->prepare("INSERT INTO upload_picture (TenPic, filePic, idUser, MoTa) VALUES (?, ?, ?, ?)");
                $table->bind_param("ssss", $tittle, $web_path, $user_id, $description);
                if ($table->execute()) {
                    $_SESSION['access'] = "Upload thành công!";
                    header("Location: uploadpic.php");
                    exit();
                }
                else {
                    header ("Location: uploadpic.php");
                    $_SESSION['errorPic'] = "Lỗi khi lưu vào CSDL.";
                    exit();
                }
                $table->close();
            } else {
                $_SESSION['errorPic'] = "Lỗi khi lưu file.";
                exit();
            }
        }
        else {
            $_SESSION['errorPic'] = "Không có file được tải lên.";
        }
    }
?>