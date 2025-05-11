<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /PycShare/user/Login_Signup/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../asset/style/reset.css" />
    <link rel="stylesheet" href="../asset/style/style.css" />
    <link rel="stylesheet" href="../asset/style/style-main-click-picture.css" />


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
    <!-- link của font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="../asset/javaScript/jquery.min.js"></script>
    <title>Trang chủ</title>
</head>

<body>
    <!-- header -->
    <header class="header">
        <!-- logo -->
        <div class="logo">
            <img src="../asset/img/Logo.svg" alt="Pycshare" />
        </div>
        <!-- thanh tìm kiếm -->
        <div class="search-wrapper">
            <form id="searchForm" name="searchForm" method="GET" action="search.php">
                <input type="text" placeholder="Tìm kiếm..." id="searchInput" name="searchInput" />
                <img src="../asset/img/search_icon.svg" alt="search" id="searchIcon" class="search-icon" />
                <button type="submit" style="display: none;"></button>
            </form>
            <!-- Danh sách tìm kiếm gần đây -->
            <div id="recentSearches" style="display: none;">
                <div class="recent-header">
                    <p>Tìm kiếm gần đây</p>
                    <button id="clearHistory">Xoá tất cả</button>
                </div>
                <ul id="recentList"></ul>
            </div>
        </div>
        <!-- menu -->
        <div class="navbar">
            <!-- home -->
            <a href="./main.php" class="navbar-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 576 512" id="home">
                    <path fill="#ffffff"
                        d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                </svg>
                <span class="tooltip">Nhà</span>
            </a>
            <!-- nút tạo -->
            <a href="./uploadpic.php" class="navbar-button">
                <img src="../asset/img/create.svg" alt="create" id="create" width="30px" height="30px" />
                <span class="tooltip">Đăng tải</span>
            </a>

            <!-- nút blog -->
            <a href="#" class="navbar-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512" id="blog">
                    <path fill="#ffffff"
                        d="M168 80c-13.3 0-24 10.7-24 24l0 304c0 8.4-1.4 16.5-4.1 24L440 432c13.3 0 24-10.7 24-24l0-304c0-13.3-10.7-24-24-24L168 80zM72 480c-39.8 0-72-32.2-72-72L0 112C0 98.7 10.7 88 24 88s24 10.7 24 24l0 296c0 13.3 10.7 24 24 24s24-10.7 24-24l0-304c0-39.8 32.2-72 72-72l272 0c39.8 0 72 32.2 72 72l0 304c0 39.8-32.2 72-72 72L72 480zM176 136c0-13.3 10.7-24 24-24l96 0c13.3 0 24 10.7 24 24l0 80c0 13.3-10.7 24-24 24l-96 0c-13.3 0-24-10.7-24-24l0-80zm200-24l32 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80l32 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                </svg>
                <span class="tooltip">Blog</span>
            </a>
            <!-- nút chuông thông báo -->
            <button class="navbar-button" id="notificationButton">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512" id="bell">
                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                </svg>
                <span class="tooltip">Thông báo</span>
            </button>
            <!-- Trang cá nhân -->
            <a href="./Profile/profile.php" class="navbar-button">
                <div id="profile-img"></div>
                <span class="tooltip">profile</span>
            </a>
            <!-- Nút mở menu chủ đề -->
            <button id="menuButton">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512">
                    <path fill="#ffffff"
                        d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                </svg>
            </button>

            <!-- Khung menu chủ đề -->
            <div id="menuPanel" style="display: none;"></div>
            <!-- Nơi hiển thị ảnh -->
            <div id="imageContainer" style="margin-top: 20px;"></div>


        </div>
        <!-- Khung thông báo -->
        <div class="notification-panel" style="display: none;">
            <div class="notification-arrow"></div>
            <ul class="notification-list">
                <li class="notification-item">
                    <div class="avatar"></div>
                    <div class="content-placeholder"></div>
                </li>
                <li class="notification-item">
                    <div class="avatar"></div>
                    <div class="content-placeholder"></div>
                </li>
                <li class="notification-item">
                    <div class="avatar"></div>
                    <div class="content-placeholder"></div>
                </li>
                <li class="notification-item">
                    <div class="avatar"></div>
                    <div class="content-placeholder"></div>
                </li>
                <li class="notification-item">
                    <div class="avatar"></div>
                    <div class="content-placeholder"></div>
                </li>
                <li class="notification-item">
                    <div class="avatar"></div>
                    <div class="content-placeholder"></div>
                </li>
            </ul>
        </div>

    </header>
    <!-- main -->
    <main class="main-content">
        <?php
            $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
            $table = @mysqli_query($server, "SELECT * from upload_picture") or die ("Không thể truy vấn dữ liệu");
            while($row = mysqli_fetch_array($table)) {
                echo "<div class='gallery'>";
                // echo "<img src='".$row['filePic']."' alt='natural' data-id='" . $row['idPic'] ."' class='gallery-img' />";
                echo "<img src='".$row['filePic']."' alt='" . $row['TenPic'] . "'data-id='" . $row['idPic'] ."' class='gallery-img' />";//chỉnh
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
                <div class="image-actions">
                    <span class="action like">
                        <i class="fa-regular fa-heart"></i>
                        <span class="count">140</span>
                    </span>
                    <span class="action download">
                        <i class="fa-solid fa-download"></i>
                    </span>
                    <span class="action save">
                        <i class="fa-regular fa-bookmark"></i>
                    </span>
                </div>
                <div class="popup-info">
                    <h2 class="popup-title">Tiêu đề ảnh:
                    </h2>
                    <p class="popup-author">Tên tác giả</p>
                    <p class="popup-date">Ngày đăng tải</p>
                    <p class="popup-desc">Mô tả của tác giả</p>
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

    <script src="../asset/javaScript/common.js"></script>
    <script src="../asset/javaScript/click-picture.js"></script>
    <script src="../asset/javaScript/search.js"></script>
    <script src="../asset/javaScript/handle-categories.js"></script>
</body>

</html>