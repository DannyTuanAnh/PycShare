<?php
session_start();
$server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die("Không kết nối được máy chủ");

if (isset($_POST['id']) && isset($_SESSION['username'])) {
    $img_id = intval($_POST['id']);
    $user = $_SESSION['username'];

    $stmt = $server->prepare("SELECT id FROM user WHERE user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    $check = $server->prepare("SELECT * FROM tym WHERE img_id = ? AND user_id = ?");
    $check->bind_param("ii", $img_id, $user_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "liked"]);
    } else {
        echo json_encode(["status" => "not_liked"]);
    }

    $check->close();
} else {
    echo json_encode(["status" => "not_logged_in"]);
}
$server->close();
?>