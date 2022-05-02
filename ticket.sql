-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 May 2022, 16:33:39
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ticket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`) VALUES
(1, 'Test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `desc` varchar(3000) DEFAULT NULL,
  `sub` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `title`, `desc`, `sub`, `status`, `user_id`, `createdAt`) VALUES
(1, 'Test Ticket', 'Test açıklama', 1, 1, 1, '2022-05-02 13:21:57'),
(2, 'tesadfasdfsdf', 'asdfasdfasdf', 1, 1, 1, '2022-05-02 01:46:00'),
(3, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:48:51'),
(4, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:51:05'),
(5, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:51:42'),
(6, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:52:15'),
(7, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:52:50'),
(8, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:53:22'),
(9, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:57:19'),
(10, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:58:40'),
(11, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:59:18'),
(12, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 01:59:44'),
(13, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 02:00:36'),
(14, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 02:02:22'),
(15, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 02:02:37'),
(16, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 02:04:12'),
(17, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 1, 1, '2022-05-02 02:04:30'),
(18, 'asdfasdfasdfsdfsadfsdf', 'sdfasdfasdfdsf', 1, 2, 1, '2022-05-02 02:05:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_images`
--

CREATE TABLE `ticket_images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ticket_images`
--

INSERT INTO `ticket_images` (`image_id`, `image`, `ticket_id`) VALUES
(1, 'warning-session_start-connot-send-session-cookie.jpg', 0),
(2, 'warning-session_start-connot-send-session-cookie.jpg', 0),
(3, 'warning-session_start-connot-send-session-cookie.jpg', 0),
(4, 'warning-session_start-connot-send-session-cookie.jpg', 16),
(5, 'warning-session_start-connot-send-session-cookie.jpg', 17),
(6, 'indir.png', 17),
(7, 'warning-session_start-connot-send-session-cookie.jpg', 18),
(8, 'indir.png', 18);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `by` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ticket_messages`
--

INSERT INTO `ticket_messages` (`id`, `by`, `message`, `ticket_id`, `createdAt`) VALUES
(1, '0', 'testsdfsd', 18, '2022-05-02 15:19:43'),
(2, '1', 'testdsfsdfsdf', 18, '2022-05-02 15:24:21'),
(3, '0', 'testsssdfsdf', 18, '2022-05-02 15:26:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_status`
--

CREATE TABLE `ticket_status` (
  `status_id` int(10) UNSIGNED NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ticket_status`
--

INSERT INTO `ticket_status` (`status_id`, `status_name`) VALUES
(1, 'Bekliyor'),
(2, 'Cevaplandı'),
(3, 'Tamamlandı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userlevel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`customer_id`, `username`, `password`, `userlevel`) VALUES
(1, 'adnan', 'd1a0a9e9391af09e978c4c3d11711e75', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`) USING BTREE;

--
-- Tablo için indeksler `ticket_images`
--
ALTER TABLE `ticket_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Tablo için indeksler `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`customer_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_images`
--
ALTER TABLE `ticket_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
