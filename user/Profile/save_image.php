<?php session_start(); 
require_once 'config.php'; 
// file này có chứa kết nối MySQL 
if (!isset($_SESSION['user_id'])) 
{ http_response_code(401); 
echo "Unauthorized"; exit;} 
$user_id = $_SESSION['user_id']; 
$image_id = $_POST['image_id'] ?? null; 
if (!$image_id) 
{ http_response_code(400); 
echo "Missing image_id"; 
exit; } 
// Kiểm tra xem đã lưu chưa 
$sql_check = "SELECT * FROM saved_images WHERE user_id = ? AND image_id = ?"; 
$stmt_check = $conn->prepare($sql_check); 
$stmt_check->bind_param("ii", $user_id, $image_id); 
$stmt_check->execute(); $result = $stmt_check->get_result(); 
if ($result->num_rows > 0) 
{ 
    // Đã lưu → gỡ lưu 
    $sql_delete = "DELETE FROM saved_images WHERE user_id = ? AND image_id = ?"; 
    $stmt_delete = $conn->prepare($sql_delete); 
    $stmt_delete->bind_param("ii", $user_id, $image_id); 
    $stmt_delete->execute(); echo "removed"; } 
    else { 
        // Chưa lưu → lưu 
        $sql_insert = "INSERT INTO saved_images (user_id, image_id) VALUES (?, ?)"; 
        $stmt_insert = $conn->prepare($sql_insert); 
        $stmt_insert->bind_param("ii", $user_id, $image_id); 
        $stmt_insert->execute(); echo "saved"; } 
        $conn->close(); 