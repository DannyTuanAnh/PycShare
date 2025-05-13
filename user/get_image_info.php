<?php
    session_start();
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $server->prepare("select LuotTym, TenPic, user, NgayCapNhat, MoTa  from upload_picture INNER JOIN user ON upload_picture.idUser = user.id WHERE idPic = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'Không tìm thấy ảnh']);
        }
    
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Thiếu tham số ID']);
    }
    $server->close();
?>
