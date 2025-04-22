<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/reset.css" />
    <link rel="stylesheet" href="./asset/style/style-admin.css" />
    <title>Trang chủ</title>
</head>

<body>
    <div class="container-admin">
        <!-- Sidebar trái -->
        <aside class="sidebar">
            <div class="logo logo-admin">
                <img src="./asset/img/logo-admin.svg" alt="Logo" />
            </div>
            <nav class="navbar">
                <ul>
                    <li class="active">Dashboard</li>
                    <li>Quản lý người dùng</li>
                    <li>Quản lý bài viết</li>
                    <li>Thống kê</li>
                    <li>Cài đặt</li>
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
                    <p>1,240</p>
                </div>
                <div class="card">
                    <h3>Bài viết</h3>
                    <p>3,521</p>
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
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Người đăng</th>
                            <th>Lượt xem</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Trang trí nhà phong cách Nhật</td>
                            <td>user123</td>
                            <td>1.2K</td>
                            <td><button>Xoá</button></td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Ý tưởng decor phòng ngủ</td>
                            <td>user456</td>
                            <td>980</td>
                            <td><button>Xoá</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <!-- footer -->
    <footer class="footer"></footer>
</body>

</html>