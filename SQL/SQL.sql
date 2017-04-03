-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamaný: 03 Nis 2017, 10:57:29
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabaný: `musteri`
--
CREATE DATABASE IF NOT EXISTS `musteri` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `musteri`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `kullanici`
--

CREATE TABLE `kullanici` (
  `kullaniciAdi` varchar(20) DEFAULT NULL,
  `AdSoyad` varchar(40) DEFAULT NULL,
  `parola` varchar(20) DEFAULT NULL,
  `aktif` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullaniciAdi`, `AdSoyad`, `parola`, `aktif`) VALUES
('gizem', 'Gizem', '11111', NULL),
('yunus', 'Yunus', '11111', NULL),
('ykocak', 'Yunus Koçak', '123', '1'),
('', '', '', '1'),
('', '', '', '1'),
('', '', '', '1'),
('', '', '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `kullaniciyetki`
--

CREATE TABLE `kullaniciyetki` (
  `kullaniciAdi` varchar(20) DEFAULT NULL,
  `yetkiKodu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullaniciyetki`
--

INSERT INTO `kullaniciyetki` (`kullaniciAdi`, `yetkiKodu`) VALUES
('gizem', 'Admin'),
('ykocak', 'User'),
('', 'Admin'),
('ykocak', 'Admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `musteri`
--

CREATE TABLE `musteri` (
  `adSoyad` varchar(40) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `kullaniciAdi` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`adSoyad`, `adres`, `kullaniciAdi`, `email`, `aktif`, `id`) VALUES
('Yunus Koçak', 'Yunus Ev Adresi', 'yunuskocak', 'ykocak@ford.com.tr', '', 20),
('Gizem', 'asdfrer', 'gizux', 'gizem@ulutas.gen.tr', '1', 27),
('denem', ' <script>alert(document.cookie);</script>', 'denmee', 'denem@deneme.com', '', 28);

--
-- Dökümü yapýlmýþ tablolar için indeksler
--

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapýlmýþ tablolar için AUTO_INCREMENT deðeri
--

--
-- Tablo için AUTO_INCREMENT deðeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
