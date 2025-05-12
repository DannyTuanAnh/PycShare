-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th5 12, 2025 lúc 05:48 PM
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
(16, 'Hàn ', 'uploads/gyeongbokgung_402072391-5.jpg', 25, '2025-05-06', 0, 'QUỐC', '', 0),
(18, 'biển băng', 'uploads/369781902_194850266991483_7167452680561094126_n.jpg', 27, '2025-05-11', 0, 'biển băng', '', 0),
(19, 'Venom', 'uploads/b33c79cb-e2d9-4317-b4f6-6c8de608dda5.jpg', 27, '2025-05-11', 0, 'venom', '', 0),
(20, 'venom anime', 'uploads/1a2bc892-91ad-4e61-b0b4-16125e56f423.jpg', 27, '2025-05-11', 0, 'venom vẽ anime', '', 0),
(22, 'anime', 'uploads/9c12920d2a09f691f37cbd5b6ed85fcd.jpg', 27, '2025-05-11', 0, 'avatar anime', '', 0),
(24, 'cầu thủ', 'uploads/Doan-Van-Hau.jpg', 27, '2025-05-11', 0, 'cầu thủ việt nam', '', 0),
(25, 'cầu thủ', 'uploads/anh-man-hinh-2024-12-06-luc-114001-17334600114702000390069.webp', 27, '2025-05-11', 0, 'cầu thủ Quang Hải', '', 0),
(26, 'cầu thủ', 'uploads/Leo_Messi_(cropped).jpg', 27, '2025-05-11', 0, 'cầu thủ Leo Messi', '', 0),
(27, 'cầu thủ', 'uploads/jude-bellingham-17169861737831128245797.webp', 27, '2025-05-11', 0, 'cầu thủ Bellingham', '', 0),
(28, 'cầu thủ', 'uploads/screen-shot-2024-12-23-at-105358-am-1734927063507707297952.webp', 27, '2025-05-11', 0, 'cầu thủ Mbappe', '', 0),
(29, 'cầu thủ', 'uploads/7b5ae019cb0cdc2b697794dd2947f10b.jpg', 27, '2025-05-11', 0, 'cầu thủ Yamal', '', 0),
(30, 'cầu thủ', 'uploads/ronaldo.jpg', 27, '2025-05-11', 0, 'cầu thủ Ronaldo', '', 0),
(31, 'Cảnh thiên nhiên chill', 'uploads/236669bd-c17e-4822-8800-78868cb879ef.jpg', 28, '2025-05-11', 0, 'Japan', '', 0),
(32, 'hoàng hôn chill', 'uploads/60f074fe-1f7e-4310-88a9-8ab29c687cc4.jpg', 28, '2025-05-11', 0, 'hoàng hôn', '', 0),
(33, 'mèo meme', 'uploads/870e68df-74ed-4817-ab58-de835cfe1da9.jpg', 28, '2025-05-11', 0, 'mèo', '', 0),
(34, 'chó cún cute', 'uploads/e80d1077-2cfb-436f-b56c-8ec2231c0dca.jpg', 28, '2025-05-11', 0, 'cún ', '', 0),
(35, 'cún cute', 'uploads/ba20f247-707a-4607-bff6-22080c1b2e61.jpg', 28, '2025-05-11', 0, 'cún cười', '', 0),
(36, 'messi vintage', 'uploads/339eb495-dd17-4d2c-9803-31bf7fee9785.jpg', 28, '2025-05-11', 0, 'messi', '', 0),
(37, 'ảnh nền pokemon charizad', 'uploads/fb9f8b62-87f3-43df-95b1-3be99eebb0ed.jpg', 28, '2025-05-11', 0, 'pokemon', '', 0),
(38, 'spider man black', 'uploads/88f46bc7-15be-4a5c-822b-e514a077a244.jpg', 28, '2025-05-11', 0, 'spider man', '', 0),
(39, 'mèo quý tộc', 'uploads/50d70789-77e1-4228-87c0-240e702562a9.jpg', 28, '2025-05-11', 0, 'mèo', '', 0),
(40, 'pokemon charizad nền', 'uploads/0b3cfd0c-2ded-4375-8093-c4cf1eab0e7f.jpg', 28, '2025-05-11', 0, 'pokemon charizad', '', 0),
(41, 'anime totoro', 'uploads/d20d5180-4272-4e8e-be7b-1938a848bc4b.jpg', 28, '2025-05-11', 0, 'nền anime', '', 0),
(42, 'nền xe', 'uploads/5c093dcf-bf74-4f04-9813-79c66ca7eae2.jpg', 28, '2025-05-11', 0, 'nền xe', '', 0),
(43, 'núi Phú Sĩ chill', 'uploads/d97deb96-e103-453f-a29b-9dd3eef936e4.jpg', 28, '2025-05-11', 0, 'núi Phú Sĩ chill', '', 0),
(44, 'ảnh anime chill', 'uploads/50c22611-44c1-426b-8e45-abee8fa0d102.jpg', 28, '2025-05-11', 0, 'chill bầu trời ', '', 0),
(45, 'ảnh nền cún cute', 'uploads/cd80b8b2-4da3-49d5-81a9-c761da036961.jpg', 28, '2025-05-11', 0, 'ảnh nền cún cute', '', 0),
(46, 'anime chill', 'uploads/c7e504a9-c3ca-4a66-90b2-953f0bb29b9f.jpg', 28, '2025-05-11', 0, 'hoa anh đào đẹp', '', 0),
(47, 'ảnh nền đẹp', 'uploads/2fd8dd85-996d-4827-bd30-0238ccd58202.jpg', 28, '2025-05-11', 0, 'ảnh nền bờ biển', '', 0),
(48, 'ảnh nền xe cổ', 'uploads/JOJADOJA_.jpg', 28, '2025-05-11', 0, '', '', 0),
(49, 'ảnh luffy nền', 'uploads/83d7261b-b89d-430d-a1d3-f2bf1f0a91ef.jpg', 28, '2025-05-11', 0, 'luffy', '', 0),
(50, 'cún cute', 'uploads/d9e98342-31ba-4073-b882-a62c4740487a.jpg', 28, '2025-05-11', 0, '', '', 0),
(51, 'mèo cute', 'uploads/9f1ea19a-267b-47be-bc65-73362119638f.jpg', 28, '2025-05-11', 0, '', '', 0),
(52, 'ảnh mây chill nền', 'uploads/b057f2ba-8cfc-40f0-8acb-19230db3c954.jpg', 28, '2025-05-11', 0, '', '', 0),
(53, 'ảnh cusin', 'uploads/8cd5da91-cb19-4cb3-943f-2c352216598c.jpg', 28, '2025-05-11', 0, '', '', 0),
(54, 'anime', 'uploads/diaz.jpg', 27, '2025-05-12', 0, 'anime', '', 0);

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
  MODIFY `idPic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
