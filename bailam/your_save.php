<?php
    session_start();
    // Kiểm tra nếu người dùng đã đăng nhập
    if(!isset($_SESSION['username'])) {
        header("Location: /user/Login_Signup/login.php");
        exit();
    }

    // Kết nối với cơ sở dữ liệu
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");

    // Lấy tên người dùng từ session
    $user = $_SESSION['username'];

    // Truy vấn để lấy các ảnh đã lưu của người dùng
    $query = "SELECT upload_picture.filePic FROM saved_images 
              JOIN upload_picture ON saved_images.idPic = upload_picture.idPic 
              JOIN user ON saved_images.id = user.id 
              WHERE user.user = ?";
    $stmt = $server->prepare($query);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<div class="section">
    <h3>Bài viết đã lưu</h3>
    <p>Danh sách bài viết đã lưu hiển thị tại đây.</p>
    
    <div class="saved-images">
        <?php
        // Hiển thị các ảnh đã lưu
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='saved-image'>";
                echo "<img src='uploads/" . $row['filePic'] . "' alt='Saved Image' width='200'>";
                echo "</div>";
            }
        } else {
            echo "<p>Hiện tại bạn chưa lưu bài viết nào.</p>";
        }
        ?>
    </div>
</div>

<?php
    // Đóng kết nối
    $stmt->close();
    $server->close();
?>
