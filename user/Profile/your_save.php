<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: ../Login_Signup/login.php");
        exit();
    }
    $conn = new mysqli("localhost:3307", "root", "", "system_user");
    if ($conn->connect_error) die("Lỗi kết nối");

    $userId = $_SESSION['username'];

    $sql = "SELECT p.* FROM images p
        INNER JOIN saved_posts s ON p.idPic = s.post_id
        WHERE s.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Ảnh bạn đã lưu:</h2>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="saved-image">';
            echo '<img src="../uploads/' . $row['imagePath'] . '" alt="Ảnh đã lưu" width="200">';
            echo '</div>';
        }
    } else {
        echo "Bạn chưa lưu ảnh nào.";
    }

$stmt->close();
$conn->close();
?>
<!-- <div class="section">
    <h3>Bài viết đã lưu</h3>
    <p>Danh sách bài viết đã lưu hiển thị tại đây.</p>
</div> -->