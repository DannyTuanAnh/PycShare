<?php
$server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die("Không kết nối được máy chủ");

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $update = $server->prepare("UPDATE upload_picture SET LuotTym = LuotTym + 1 WHERE idPic = ?");
    $update->bind_param("i", $id);
    if ($update->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
    $update->close();
}
$server->close();
?>