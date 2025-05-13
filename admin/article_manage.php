<?php
    session_start();
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['admin'])){
        header("Location:  ../user/Login_Signup/login.php");
        exit();
    }
    $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
    $select = "select idPic, TenPic, MoTa, LuotTym, month(NgayCapNhat) as month, day(NgayCapNhat) as day, year(NgayCapNhat) as year from upload_picture";
    $table = $server->prepare($select) or die ("Không thể truy vấn dữ liệu");
    $table->execute();
    $result = $table->get_result();
    $count_user = $server->query("select count(*) as total from user")->fetch_array()['total'];
    $count_article = $server->query("select count(*) as total from upload_picture")->fetch_array()['total'];
    $count_report;
    if(isset($_GET['listid'])){
        $listid = $_GET['listid'];
        $listid  = explode(",", $listid);
        $listid = array_map("intval", $listid);
        $listid = implode(",", $listid);
        $delete_all = $server->prepare("delete from upload_picture where idPic in ($listid)") or die ("Không thể truy vấn dữ liệu");
        if($delete_all->execute()){
            echo "<script>alert('Xóa thành công');";
            echo "window.location.href = 'article_manage.php';</script>";
        }  
        else{
            echo "<script>alert('Xóa không thành công');</script>";
        }
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $id = intval($id);
        $delete = $server->prepare("delete from upload_picture where idPic = $id") or die ("Không thể truy vấn dữ liệu");
        if($delete->execute()){
            echo "<script>alert('Xóa thành công');";
            echo "window.location.href = 'article_manage.php';</script>";
        }  
        else{
            echo "<script>alert('Xóa không thành công');</script>";
        }
    }        
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
                <h2>Danh sách chi tiết bài viết</h2>
                <form action="article_manage.php" method="get">
                    <table>
                        <thead>
                            <tr>
                                <td colspan="2">
                                    <button name="delete-select" type="button" id="delete-select">Xóa</button>
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
                        echo "<td><input type='checkbox' name = 'chon' id = 'chon' class = 'chon' value='". $row['idPic']. "'></td>";
                        echo "<td>". $count++ . "</td>";
                        echo "<td>". $row['TenPic'] . "</td>";
                        echo "<td>". $row['MoTa'] . "</td>";
                        echo "<td>". $row['LuotTym'] . "</td>";
                        echo "<td>". $row['day']. "/". $row['month'] . "/" . $row['year'] . "</td>";
                        echo "<td><form method = 'get' action = 'article_manage.php'><button name = 'delete' type = 'submit' value = '" . $row['idPic']."'>Xóa</button></form></td>";
                        echo "</tr>";
                    }
                ?>

                        </tbody>
                    </table>
                </form>
            </section>
        </main>
    </div>
    <!-- footer -->
    <footer class="footer"></footer>

    <!-- js -->
    <script src="../asset/javaScript/admin.js"></script>
    <script>
    $(document).ready(function() {
        $("#delete-select").click(function() {
            var listid = "";
            $("input[name = chon]").each(function() {
                if (this.checked) {
                    listid = listid + "," + this.value;
                }
            });
            listid = listid.substr(1);
            window.location = "article_manage.php?listid=" + listid;
        });
    });
    </script>
</body>

</html>