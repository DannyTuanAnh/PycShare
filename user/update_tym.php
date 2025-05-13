 <?php
// $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die("Không kết nối được máy chủ");

// if (isset($_POST['id'])) {
//     $id = intval($_POST['id']);
//     $update = $server->prepare("UPDATE upload_picture SET LuotTym = LuotTym + 1 WHERE idPic = ?");
//     $update->bind_param("i", $id);
//     if ($update->execute()) {
//         echo json_encode(["status" => "success"]);
//     } else {
//         echo json_encode(["status" => "error"]);
//     }
//     $update->close();
// }
// $server->close();
?>

 <?php
session_start();
$server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die("Không kết nối được máy chủ");

// Kiểm tra đã đăng nhập chưa

if (isset($_POST['id'])) {
    $img_id = intval($_POST['id']);
    $user = $_SESSION['username'];
    $stmt = $server->prepare("select id from user where user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    // Kiểm tra đã tym chưa
    $check = $server->prepare("SELECT * FROM tym WHERE img_id = ? AND user_id = ?");
    $check->bind_param("ii", $img_id, $user_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "already_liked"]);
        $check->close();
        $server->close();
        exit();
    }
    $check->close();

    // Tăng lượt tym và thêm vào bảng tym
    $insertTym = $server->prepare("INSERT INTO tym (img_id, user_id) VALUES (?, ?)");
    $insertTym->bind_param("ii", $img_id, $user_id);

    $updatePic = $server->prepare("UPDATE upload_picture SET LuotTym = LuotTym + 1 WHERE idPic = ?");
    $updatePic->bind_param("i", $img_id);

    if ($insertTym->execute() && $updatePic->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }

    $insertTym->close();
    $updatePic->close();
}
$server->close();
?>