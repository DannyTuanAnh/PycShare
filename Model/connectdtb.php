<?php
function connectdb() {
    try {
        $servername = "3306";  
        $user = "root";         
        $pass = "Trantuananh07042005@";           
        $dbname = "system_user";

        // Tạo kết nối PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $user, $pass);
        
        // Thiết lập chế độ báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn; // Trả về đối tượng PDO hợp lệ
    } catch (PDOException $e) {
        return null; // Trả về null nếu kết nối thất bại
    }
}
?>