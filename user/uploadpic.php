<!-- php xử lý upload ảnh -->
<?php
    include "./handle_upload.php";
    if(!isset($_SESSION['username'])) {
        header("Location: /PycShare/user/Login_Signup/login.php");
        exit();
    }
?>

<?php
    if(isset($_SESSION['error'])) {
        echo "<script>document.addEventListener('DOMContentLoaded', function() { showToast('" . $_SESSION['error'] . "'); });</script>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['access'])) {
        echo "<script>document.addEventListener('DOMContentLoaded', function() { showSuccess('" . $_SESSION['access'] . "'); });</script>";
        unset($_SESSION['access']);
    }
?>


<!-- html form upload -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../asset/style/reset.css" />
    <link rel="stylesheet" href="../asset/style/style.css" />
    <link rel="stylesheet" href="../asset/style/style-uploadpic.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
    <title>Đăng ảnh</title>
</head>

<body class="container-from-upload-picture">
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
    <h1>Upload Ảnh</h1>
    <main class="container-form container-form-upload-picture">
        <form class="form-upload-picture" action="uploadpic.php" method="POST" enctype="multipart/form-data">
            <div class="left">
                <div class="upload">
                    <button class="btn btn-upload" id="uploadBtn">+</button>
                    <input type="file" name="image" id="imageInput" accept="image/*" />
                    <p>Chọn 1 tệp hoặc kéo và thả tệp ở đây</p>
                    <!-- Thêm thẻ này để hiển thị ảnh -->
                    <img id="previewImage" style="
                display: none;
                max-width: 100%;
                max-height: 200px;
                margin-top: 10px;
                border-radius: 8px;
              " />
                </div>
                <div class="upload-button">
                    <button class="btn btn-delete">xóa ảnh</button>
                </div>
            </div>
            <div class="right">
                <div class="upload-information">
                    <p>Tiêu đề</p>
                    <input type="text" name="title" id="upload-title" />
                    <p>Mô tả</p>
                    <input type="text" name="description" id="upload-descript" placeholder="Thêm mô tả tại đây..." />
                    <p>Liên kết</p>
                    <input type="text" name="link" id="upload-link" />
                </div>
                <button type="submit" name="submit" class="btn btn-upload-confirm">Xác nhận</button>
            </div>
        </form>
    </main>
    <script src="../asset/javaScript/jquery.min.js"></script>
    <script src="../asset/javaScript/common.js"></script>
    <script src="../asset/javaScript/uploadPicture.js"></script>
    <script src="../asset/javaScript/search.js"></script>
    <script src="../asset/javaScript/login_signup.js"></script>

</body>

</html>