<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['admin'])){
        header("Location:  /user/Login_Signup/login.php");
        exit();
    }
    
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
    $table = $server->prepare("select id, user, email from user") or die ("Không thể truy vấn dữ liệu");
    $table->execute();
    $result = $table->get_result();
?>

<section class="table-section">
    <h2>Danh sách người dùng</h2>
    <table>
        <thead>
            <tr>
                <td colspan="2">
                    <button name="delete-select" type="submit" method="get" action="./admin.php">Xóa</button>
                </td>
            </tr>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>STT</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php    
                $count = 0;                 
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='". $row['id']. "'></td>";
                    echo "<td>". $count++ . "</td>";
                    echo "<td>". $row['user'] . "</td>";
                    echo "<td>". $row['email'] . "</td>";
                    echo "<td><button name = 'delete' type = 'submit' method = 'get' action = './admin.php'>Xóa</button></td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>
</section>