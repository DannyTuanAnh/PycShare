<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /user/Login_Signup/login.php");
        exit();
    }
  $server = @mysqli_connect("localhost:3307", "root", "", "system_user") or die ("Không kết nối được máy chủ");
  $table = $server->query("select * from user where user = '".$_SESSION['username']."'") or die ("Không thể truy vấn dữ liệu");
  $row = mysqli_fetch_array($table);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../asset/style/reset.css" />
    <link rel="stylesheet" href="../../asset/style/style.css" />
    <link rel="stylesheet" href="../../asset/style/style-profile.css" />
    <link rel="stylesheet" href="../../asset/style/style-setting.css" />
    <script type="text/javascript" src="../../asset/javaScript/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link của gg font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />


    <title>Trang chủ</title>
</head>

<body>
    <div>
        <header class="header">
            <!-- logo -->
            <div class="logo">
                <a href="../main.php"><img src="../../asset/img/Logo.svg" alt="Pycshare" /></a>
            </div>
            <!-- thanh tìm kiếm -->
            <div class="search-wrapper">
                <form id="searchForm" name="searchForm" method="GET" action="../search.php">
                    <input type="text" placeholder="Tìm kiếm..." id="searchInput" name="searchInput" />
                    <img src="../../asset/img/search_icon.svg" alt="search" id="searchIcon" class="search-icon" />
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
                <a href="../main.php" class="navbar-button" id="uploadBtnNavHome">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 576 512" id="home">
                        <path fill="#ffffff"
                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <span class="tooltip">Nhà</span>
                </a>
                <!-- nút tạo -->
                <a href="../uploadpic.php" class="navbar-button">
                    <img src="../../asset/img/create.svg" alt="create" id="create" width="30px" height="30px" />
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
                <a href="./profile.php" class="navbar-button">
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

        <div class="main-profile">
            <div class="menu">
                <button id="settingsBtn" class="navbar-button">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
                        <path fill="#063526"
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>
                    <span class="tooltip tooltip-setting">Cài đặt</span>
                </button>
            </div>
            <!-- Menu chức năng -->
            <div id="settingsMenu" style="display: none">
                <ul>
                    <!-- Language trực tiếp -->
                    <li>
                        Ngôn ngữ
                        <select id="languageSelect" style="float: right">
                            <option value="vi">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </li>

                    <!-- Dark mode toggle trực tiếp -->
                    <li>
                        Chế độ nền tối
                        <label class="switch" style="float: right">
                            <input type="checkbox" id="darkModeToggle" />
                            <span class="slider"></span>
                        </label>
                    </li>
                    <li data-section="policy">Chính sách và điều khoản</li>
                    <li data-section="switch-account">Chuyển đổi tài khoản</li>
                    <li data-section="form_logout">Đăng xuất</li>
                </ul>
            </div>
            <!-- Nội dung trang cá nhân gói lại để ẩn/hiện -->
            <div id="personalPage">
                <!-- Toàn bộ nội dung trang cá nhân cũ của bạn để vào đây -->
                <div class="content-profile">
                    <div class="personal-infor">
                        <div class="avatar">
                            <div class="avatar-personal">
                                <!-- SỬA NÀY NHÉ  -->
                                <img id="avatar-preview" src="../../asset/img/avatar_default.jpg" alt="" width="150">
                                <!--========================================================================================================================================= -->
                            </div>
                        </div>
                        <div class="infor">
                            <h1>THÔNG TIN CÁ NHÂN</h1>
                            <p id="user" data-id='<?php echo $row['id'] ?>'>Tên: <?php echo $row['user']; ?></p>
                            <p>Email: <?php echo $row['email']; ?></p>
                            <p>Mô tả cá nhân:</p>
                            <div class="describe">.....</div>
                        </div>
                    </div>

                    <div class="other-option">

                        <button class="btn other-option-button" id="your-blog">
                            Blog
                        </button>
                        <button class="btn other-option-button" id="my-article">
                            Bài viết
                        </button>
                    </div>

                    <div id="output-area"></div>
                </div>
                <div id="content"></div>
            </div>

            <!-- Nội dung của chức năng khi chọn từ menu -->
            <div id="settingContent" style="display: none"></div>
        </div>
    </div>

    <script src="../../asset/javaScript/jquery.min.js"></script>
    <script src="../../asset/javaScript/common.js"></script>
    <script src="../../asset/javaScript/profile.js"></script>
    <script src="../../asset/javaScript/search.js"></script>
</body>

</html>