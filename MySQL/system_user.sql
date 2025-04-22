-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 22, 2025 lúc 06:52 AM
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
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `role`, `email`) VALUES
(7, 'admin', '$2y$10$eOb.CLrNWU3jSyMoLUVVpOyqtX8wbLbvhjiheXZvg4a4C5xtrvT2.', 1, 'admin@gmail.com'),
(8, 'nguoidung1', '$2y$10$fUQ8PjgfaTLOsrMNMkhh.uIWg7NQLSvqJO7t30xlko.rxBvGPn2Cu', 0, 'nguoidung1@gmail.com'),
(9, 'nguoidung2', '$2y$10$nhnHDa5TsDWK705lpO0dW.mwQw4D5cSICQSYCko6gAIOE6yaOSRkK', 0, 'nguoidung2@gmail.com'),
(11, 'berbebong113', '$2y$10$d8AGNdFpeQc4ZPAIG4Jwz.g1dY/cvb7wgzdXoJ8CRa.r/KNxWJhZO', 0, 'ber123@gmail.com'),
(12, 'darkchuate', '$2y$10$01MPlJ6nFeqfEvbcGYSN4.0hZcXkQAGIi0eDdemxisdYDheLVbt0O', 0, 'dark@gmail.com'),
(13, 'darkaudam', '$2y$10$W5U4CHLaQNYNQ6/UQKNJv.B4QheReSxiPAUa9j4zvt/JeSUsMZSOy', 0, 'darkad@gmail.com'),
(14, 'phuongex', '$2y$10$Jm1yyVV1ZAUnsYzr915si.EWwObsC4lsPeIRHrAr6lYkiwyF5.3S.', 0, 'phuongbest@gmail.com'),
(15, 'phuongsuper', '$2y$10$9Iv9CVVtnAmO9fdi1HD6AujPrfBjZ8.aP3OkGFtuOgGlLvV/A4r/2', 0, 'phuongsp@gmail.com'),
(16, 'cyberhawk', '$2y$10$Gf.WEUJMMt.QEG9VLJ7tA.RtukJvqTG1HcNVjgI1dSkw9k.hOU4VW', 0, 'cyber@gmail.com'),
(17, 'firefly', '$2y$10$6Cx1VLWd3JrljNGBayqx7eULFVGGLnjlPztTFkKwvIjDrSwhWTfeq', 0, 'fireff@gmail.com'),
(18, 'neonblade', '$2y$10$OcWN0T5fzKO9NDLx5SpXJuWu1QCCOybfp49NvLCcx1tczOiPPK9ZS', 0, 'neon@gmail.com'),
(19, 'shadowfox', '$2y$10$ajdrm59.BMb27J.fjMsl5OOnjJ30RzQ5Vny0qPTPSa2uqoJDyNmby', 0, 'fox@gmail.com'),
(20, 'silverstone', '$2y$10$J/EzZdhzuX4z048qCGf2.ekgxb7nAKTfI0KYBUAE1jrvmneIovL.S', 0, 'slst@gmail.com'),
(21, 'goldenflare', '$2y$10$vpAwUxsd7zBwT6C.LnS18uVlTmApRycvBHMR926kDi4LrAb/s0EXy', 0, 'sunst@gmail.com'),
(22, 'dreamcatcher', '$2y$10$j1ZJkUlSt8QGMt0inMMlFufzz2b/zU1rnbC82E1Qt5uDrHwSeShPS', 0, 'drcatch@gmail.com'),
(23, 'twilightwolf', '$2y$10$y9rRFrqSgC/bICbanqFyB.o2/Aw6p9rR8jtLcWqQKLmXBSK.SxsPC', 0, 'twlight@gmail.com'),
(25, 'test', '$2y$10$stERF.TapoLuZEWAiuLzVORs4Yl5krqmb85iXGDkgPMpHYmJYBKfK', 0, 'test@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
