<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['admin'])){
        header("Location:  /user/Login_Signup/login.php");
        exit();
    }
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
    $select = "select idPic, TenPic, MoTa, LuotTym, month(NgayCapNhat) as month, day(NgayCapNhat) as day, year(NgayCapNhat) as year from upload_picture";
    $table = $server->prepare($select) or die ("Không thể truy vấn dữ liệu");
    $table->execute();
    $result = $table->get_result();
?>

<section class="table-section">
    <h2>Danh sách chi tiết bài viết</h2>
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
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Lượt tym</th>
                <th>Ngày đăng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php    
                $count = 0;                 
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='". $row['idPic']. "'></td>";
                    echo "<td>". $count++ . "</td>";
                    echo "<td>". $row['TenPic'] . "</td>";
                    echo "<td>". $row['MoTa'] . "</td>";
                    echo "<td>". $row['LuotTym'] . "</td>";
                    echo "<td>". $row['day']. "/". $row['month'] . "/" . $row['year'] . "</td>";
                    echo "<td><button name = 'delete' type = 'submit' method = 'get' action = './admin.php'>Xóa</button></td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>
</section>