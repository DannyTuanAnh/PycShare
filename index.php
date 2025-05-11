<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./asset/style/reset.css" />
    <link rel="stylesheet" href="./asset/style/style.css" />

    <link rel="stylesheet" href="./asset/style/style-main-click-picture.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
    <!-- link của font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
    .auth-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-left: 20px;
    }

    .auth-buttons a {
        padding: 8px 16px;
        background-color: #A9DCC9;
        color: black;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .auth-buttons a:hover {
        background-color: #105e3c;
    }
    </style>
    <title>index</title>
</head>

<body>

    <!-- header -->
    <header class=" header">
        <!-- logo -->
        <div class="logo">
            <a href="./index.php"><img src="./asset/img/Logo.svg" alt="Pycshare" /></a>
        </div>
        <!-- menu -->
        <div class="navbar">
            <!-- đăng nhập & đăng ký -->
            <div class="auth-buttons">
                <a href="./user/Login_Signup/login.php">Đăng nhập</a>
                <a href="./user/Login_Signup/signup.php">Đăng ký</a>
            </div>
        </div>
    </header>
    <!-- main -->
    <main class="main-content">
        <?php
            $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
            $table = @mysqli_query($server, "select * from upload_picture") or die ("Không thể truy vấn dữ liệu");
            while($row = mysqli_fetch_array($table)) {
                echo "<div class='gallery'>";
                echo "<img src='".$row['filePic']."' alt='". $row['TenPic']."' data-id='" . $row['idPic'] ."' class='gallery-img' />";
                echo "</div>";
            }
        ?>
    </main>

    <!-- Popup xem ảnh chi tiết -->
    <div class="image-popup-overlay" style="display: none;"></div>
    <div class="image-popup" style="display: none;">
        <div class="popup-content">
            <div class="popup-left">
                <img src="" alt="Xem ảnh" class="popup-img" />
            </div>
            <div class="popup-right">
                <div class="popup-info">
                    <h2 class="popup-title"></h2>
                    <p class="popup-author"></p>
                    <p class="popup-date"></p>
                    <p class="popup-desc"></p>
                </div>
                <div class="popup-comments">
                    <p class="popup-comments-count">6 nhận xét</p>
                    <input type="text" placeholder="Thêm nhận xét" />
                    <button class="btn btn-comment">Gửi</button>
                </div>
            </div>
            <button class="close-popup">&times;</button>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer"></footer>
    <!-- js -->
    <script src="./asset/javaScript/common.js"></script>
    <script src="./asset/javaScript/jquery.min.js"></script>
    <script src="./asset/javaScript/click-picture.js"></script>
</body>

</html>