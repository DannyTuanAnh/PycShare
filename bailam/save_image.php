<?php
session_start();

// Kiểm tra người dùng đã đăng nhập chưa
if(!isset($_SESSION['username'])) {
    echo "Bạn cần đăng nhập trước!";
    exit();
}

$server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die("Không kết nối được máy chủ");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_id'])) {
    $userId = $_SESSION['username']; // Lấy ID người dùng từ session
    $imageId = $_POST['image_id'];

    // Lấy ID người dùng từ bảng user
    $query = "SELECT id FROM user WHERE user = ?";
    $stmt = $server->prepare($query);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userIdResult);
    $stmt->fetch();
    $stmt->close();

    // Thêm ảnh vào bảng saved_images
    $query = "INSERT INTO saved_images (id, idPic) VALUES (?, ?)";
    $stmt = $server->prepare($query);
    $stmt->bind_param("ii", $userIdResult, $imageId);

    if ($stmt->execute()) {
        echo "Lưu ảnh thành công!";
    } else {
        echo "Có lỗi xảy ra, không thể lưu ảnh.";
    }

    $stmt->close();
} else {
    echo "Thông tin không hợp lệ.";
}

mysqli_close($server);
?>
