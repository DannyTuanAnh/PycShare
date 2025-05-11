-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th5 06, 2025 lúc 04:04 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `system_user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `upload_picture`
--

CREATE TABLE `upload_picture` (
  `idPic` int(11) NOT NULL,
  `TenPic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `filePic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idUser` int(11) NOT NULL,
  `NgayCapNhat` date NOT NULL DEFAULT current_timestamp(),
  `LuotTym` int(11) NOT NULL,
  `MoTa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `urlAnh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idTL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `upload_picture`
--

INSERT INTO `upload_picture` (`idPic`, `TenPic`, `filePic`, `idUser`, `NgayCapNhat`, `LuotTym`, `MoTa`, `urlAnh`, `idTL`) VALUES
(6, 'Vịnh Hạ Long', 'uploads/images1283642_2.jpg', 8, '2025-04-30', 0, 'Ánh nắng mờ mờ nhè nhẹ, làm bức ảnh trông thật huyền bí', '', 0),
(7, 'Vịnh Hạ Long ', 'uploads/mceu_71526892921732460829977.jpg', 8, '2025-04-30', 0, 'Cảnh đẹp hoàng hôn tại Vịnh Hạ Long', '', 0),
(8, 'Hồ Gươm', 'uploads/anh-ha-noi.jpg', 8, '2025-04-30', 0, 'Bức ảnh thật đẹp làm sao', '', 0),
(9, 'Huế', 'uploads/unnamed.jpg', 8, '2025-04-30', 0, 'Ảnh cố đô Huế lúc sáng sớm', '', 0),
(10, 'Ảnh phong cảnh', 'uploads/anh-phong-canh-66-1.jpg', 8, '2025-04-30', 0, 'Thật là đẹp', '', 0),
(11, 'Phong cảnh', 'uploads/2017-02-27-18-41-27-725x408.jpg', 8, '2025-04-30', 0, 'Đỉnh núi tuyết ', '', 0),
(12, 'Hình nền', 'uploads/3980d11494cf721967a7918e435781df.jpg', 8, '2025-04-30', 0, 'Hình nền phong cảnh đẹp', '', 0),
(13, 'Tranh vẽ', 'uploads/500px-Vincent_van_Gogh_-_Brug_in_de_regen-_naar_Hiroshige_-_Google_Art_Project.jpg', 8, '2025-04-30', 0, 'Van Gogh ', '', 0),
(14, 'Núi Bà Đen', 'uploads/nui-ba-1.webp', 25, '2025-05-06', 0, '1 ngày được đi chiêm ngưỡng vẻ đẹp của núi Bà Đen', '', 0),
(15, 'Biển Phú Quốc', 'uploads/phu-quoc.jpg', 25, '2025-05-06', 0, 'Hè đến rồi đi tắm biển thôi mọi người ơiiiiii', '', 0),
(16, 'Hàn ', 'uploads/gyeongbokgung_402072391-5.jpg', 25, '2025-05-06', 0, 'QUỐC', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `upload_picture`
--
ALTER TABLE `upload_picture`
  ADD PRIMARY KEY (`idPic`);
ALTER TABLE `upload_picture` ADD FULLTEXT KEY `searchName` (`TenPic`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `upload_picture`
--
ALTER TABLE `upload_picture`
  MODIFY `idPic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
