<?php
$conn = new mysqli("localhost:3307", "root", "", "system_user");
$conn->set_charset("utf8");

$tenpic = $_GET['TenPic'] ?? '';
if (empty($tenpic)) die("Lỗi: Chưa chọn chủ đề");

// Lấy tất cả ảnh thuộc chủ đề
$sql = "SELECT * FROM upload_picture WHERE TenPic = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tenpic);
$stmt->execute();
$result = $stmt->get_result();

// Tạo HTML ghép vào trang chủ
$html = '';
while ($row = $result->fetch_assoc()) {
    $html .= '
    <div class="gallery">
        <img src="' . ($row['filePic']) . '" 
             alt="' . ($row['TenPic']) . '" 
             data-id="' . $row['idPic'] . '" 
             class="gallery-img" />
    </div>';
}

echo $html; // Trả về HTML để ghép trang
$stmt->close();
$conn->close();
?>