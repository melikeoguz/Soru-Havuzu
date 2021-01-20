-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2021, 21:57:31
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `oinic-api`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sonuc_tablo`
--

CREATE TABLE `sonuc_tablo` (
  `sonuc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dogru` int(11) NOT NULL,
  `yanlis` int(11) NOT NULL,
  `kayit_tarihi` date NOT NULL,
  `puan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sonuc_tablo`
--

INSERT INTO `sonuc_tablo` (`sonuc_id`, `user_id`, `dogru`, `yanlis`, `kayit_tarihi`, `puan`) VALUES
(4, 1, 3, 7, '2021-01-17', 30),
(6, 1, 2, 8, '2021-01-17', 20),
(8, 8, 3, 7, '2021-01-17', 0),
(9, 8, 1, 9, '2021-01-17', 10),
(10, 9, 1, 9, '2021-01-17', 10),
(12, 1, 1, 9, '2021-01-17', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `datebirth` date NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdat` datetime NOT NULL,
  `sinavturu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `gender`, `datebirth`, `email`, `password`, `createdat`, `sinavturu`) VALUES
(1, 'Melike', 'kadin', '1999-01-16', 'melike', 'c4ca4238a0b923820dcc509a6f75849b', '2021-01-16 22:50:29', 'yks'),
(5, 'Ali KAYA', 'erkek', '2003-01-16', 'ali', 'c81e728d9d4c2f636f067f89cc14862c', '2021-01-16 23:19:07', 'lgs'),
(6, 'Aslan Veli', 'erkek', '2010-01-17', 'ayse', 'c81e728d9d4c2f636f067f89cc14862c', '2021-01-17 14:32:14', 'ales'),
(8, 'Ahmet UÇAR', 'erkek', '2008-01-17', 'ahmet', 'c4ca4238a0b923820dcc509a6f75849b', '2021-01-17 23:18:11', 'kpss'),
(9, 'Ayşe Şimşek', 'kadin', '2013-01-17', 'aysesimsek', 'c4ca4238a0b923820dcc509a6f75849b', '2021-01-17 23:43:47', 'kpss');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sonuc_tablo`
--
ALTER TABLE `sonuc_tablo`
  ADD PRIMARY KEY (`sonuc_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sonuc_tablo`
--
ALTER TABLE `sonuc_tablo`
  MODIFY `sonuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
