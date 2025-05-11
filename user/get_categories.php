<?php
header('Content-Type: application/json'); // Trả về JSON
$conn = new mysqli("localhost:3307", "root", "", "system_user");
$conn->set_charset("utf8");

// Kiểm tra lỗi kết nối
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối database thất bại: " . $conn->connect_error]));
}

// Lấy các chủ đề (TenPic) không trùng lặp
$sql = "SELECT DISTINCT TenPic FROM upload_picture WHERE TenPic IS NOT NULL AND TenPic != ''";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["error" => "Lỗi truy vấn: " . $conn->error]));
}

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row['TenPic'];
}

echo json_encode($categories);
$conn->close();
?>