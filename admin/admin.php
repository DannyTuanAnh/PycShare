<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['admin'])){
        header("Location:  /user/Login_Signup/login.php");
        exit();
    }
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
    $select = "select idPic, TenPic, user, month(NgayCapNhat) as month, day(NgayCapNhat) as day, year(NgayCapNhat) as year from upload_picture, user where upload_picture.idUser = user.id";
    $table = $server->prepare($select) or die ("Không thể truy vấn dữ liệu");
    $table->execute();
    $result = $table->get_result();
    $count_user = $server->query("select count(*) as total from user")->fetch_array()['total'];
    $count_article = $server->query("select count(*) as total from upload_picture")->fetch_array()['total'];
    $count_report;
   
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="/asset/style/reset.css" /> -->
    <link rel="stylesheet" href="../asset/style/style-admin.css" />
    <script type="text/javascript" src="../asset/javaScript/jquery.min.js"></script>
    <title>Trang chủ</title>
</head>

<body>
    <div class="container-admin">
        <!-- Sidebar trái -->
        <aside class="sidebar">
            <div class="logo logo-admin">
                <img src="../asset/img/logo-admin.svg" alt="Logo" />
            </div>
            <nav class="navbar">
                <ul>
                    <li data-url="./admin.php">Dashboard</li>
                    <li data-url="./user_manage.php">Quản lý người dùng</li>
                    <li data-url="./article_manage.php">Quản lý bài viết</li>
                    <li data-url="./statistic.php">Thống kê</li>
                    <li data-url="./setting.php">Cài đặt</li>
                </ul>
            </nav>
        </aside>
        <!-- main -->
        <main class="content-admin">
            <header class="header">
                <h1>Xin chào, Admin!</h1>
                <p>Hôm nay bạn có 3 báo cáo mới.</p>
            </header>

            <section class="stats">
                <div class="card">
                    <h3>Người dùng</h3>
                    <p><?php echo $count_user ?></p>
                </div>
                <div class="card">
                    <h3>Bài viết</h3>
                    <p><?php echo $count_article ?></p>
                </div>
                <div class="card">
                    <h3>Báo cáo</h3>
                    <p>12</p>
                </div>
            </section>

            <section class="table-section">
                <h2>Danh sách bài viết</h2>
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">
                                <button name="delete-select" type="submit" method="get"
                                    action="./admin.php">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Người đăng</th>
                            <th>Ngày cập nhật</th>
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
                                echo "<td>". $row['user'] . "</td>";
                                echo "<td>". $row['day']. "/". $row['month'] . "/" . $row['year'] . "</td>";
                                echo "<td><button name = 'delete' type = 'submit' method = 'get' action = './admin.php'>Xóa</button></td>";
                                echo "</tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <!-- footer -->
    <footer class="footer"></footer>

    <!-- js -->
    <script>
    $(document).ready(function() {
        $("#select-all").click(function() {
            let status = this.checked;
            $("input[type='checkbox']").each(function() {
                this.checked = status;
            });
        });
        $(".navbar li").not(":first").click(function() {
            let url = $(this).data('url');
            $(".table-section").load(url);
            return false;
        });
        $(".navbar li").first().click(function() {
            location.reload();
        });
    });
    </script>
</body>

</html>