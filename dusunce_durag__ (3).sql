-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 May 2025, 06:00:55
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dusunce_duragı`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `ad`, `soyad`, `email`, `sifre`) VALUES
(1, 'Ahmet', 'ŞEN', 'senahmet4321@gmail.com', '$2y$10$cH9w9VZUec3EIDtMrFYLDeXxKGHUCenGQAgPtqvyfxS3t/p8p6agG');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `baslik` varchar(200) NOT NULL,
  `aciklama` varchar(2000) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `kelimeler` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `bakim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`baslik`, `aciklama`, `ikon`, `kelimeler`, `logo`, `bakim`) VALUES
('Blog Uygulaması | PHP', 'Bu blog ile tüm gezi hayatımı sizlerle paylaşıyorum.', '../uploads/spider-8154872_1280.jpg', 'blog, gezi, keyif, hayat', '../uploads/pelican-8023249_1280.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakımda`
--

CREATE TABLE `bakımda` (
  `logo` varchar(300) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `icerik` varchar(300) NOT NULL,
  `altbaslik` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bakımda`
--

INSERT INTO `bakımda` (`logo`, `baslik`, `icerik`, `altbaslik`, `facebook`, `instagram`) VALUES
('../uploads/birds-gb91ae3b03_1280.jpg', 'Bakımdayız!', 'Biraz güncelleme yapıyoruz, ama değecek.', 'Web sitemizin tasarımı değiştiği için, birazcık bakımdayız', 'www.facebook.com', 'www.instagram.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bloglar`
--

CREATE TABLE `bloglar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(200) NOT NULL,
  `icerik` text NOT NULL,
  `etiketler` varchar(200) NOT NULL,
  `tarih` varchar(20) NOT NULL,
  `resim` varchar(500) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `üyeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bloglar`
--

INSERT INTO `bloglar` (`id`, `baslik`, `icerik`, `etiketler`, `tarih`, `resim`, `kategori`, `üyeid`) VALUES
(1, 'Dijital Pazarlamanın Geleceği', 'Dijital pazarlama dünyası hızla değişiyor. Yapay zeka ve otomasyon, pazarlama stratejilerini nasıl etkiliyor? Gelecekte hangi trendler ön plana çıkacak? Bu blog yazısında, dijital pazarlamanın geleceğine dair öngörülerimize göz atacağız. Dijital pazarlama dünyası hızla değişiyor. Yapay zeka ve otomasyon, pazarlama stratejilerini nasıl etkiliyor? Gelecekte hangi trendler ön plana çıkacak? Bu blog yazısında, dijital pazarlamanın geleceğine dair öngörülerimize göz atacağız. Dijital pazarlama dünyası hızla değişiyor. Yapay zeka ve otomasyon, pazarlama stratejilerini nasıl etkiliyor? Gelecekte hangi trendler ön plana çıkacak? Bu blog yazısında, dijital pazarlamanın geleceğine dair öngörülerimize göz atacağız.', 'Dijital Pazarlama', '07.08.2023 - 16:25:1', '../uploads/dijital-pazarlamanın-gelecegi-ocg-01.jpg', 'Dijital Pazarlama, Teknoloji, Trendler', 0),
(2, 'Sağlıklı Beslenme İçin 5 Altın Kura', 'Sağlıklı beslenme, yaşam kalitesini artıran temel bir faktördür. Bu yazıda, dengeli bir beslenme planı oluşturmanın önemini vurgulayacak ve sağlıklı yaşam için beş altın kuralı paylaşacağız.', 'Sağlık, Beslenme, Yaşam Tarzı', '07.08.2023 - 16:26:2', '../uploads/saglikli-beslenme-neden-onemlidir.jpg', 'Sağlık, Beslenme', 0),
(3, 'Yaratıcılığı Tetiklemenin Yolları', 'Yaratıcılık, farklı alanlarda başarı için kritik bir unsur olarak kabul edilir. Bu makalede, yaratıcılığı nasıl tetikleyebileceğinizi ve günlük yaşamınıza nasıl entegre edebileceğinizi keşfedeceksiniz. Yaratıcılık, farklı alanlarda başarı için kritik bir unsur olarak kabul edilir. Bu makalede, yaratıcılığı nasıl tetikleyebileceğinizi ve günlük yaşamınıza nasıl entegre edebileceğinizi keşfedeceksiniz. Yaratıcılık, farklı alanlarda başarı için kritik bir unsur olarak kabul edilir. Bu makalede, yaratıcılığı nasıl tetikleyebileceğinizi ve günlük yaşamınıza nasıl entegre edebileceğinizi keşfedeceksiniz. Yaratıcılık, farklı alanlarda başarı için kritik bir unsur olarak kabul edilir. Bu makalede, yaratıcılığı nasıl tetikleyebileceğinizi ve günlük yaşamınıza nasıl entegre edebileceğinizi keşfedeceksiniz.', 'Yaratıcılık, İnovasyon, Kişisel Gelişim', '07.08.2023 - 16:26:5', '../uploads/yaraticiligi-tetiklemenin-yollari.jpg', 'Yaratıcılık', 0),
(4, 'Seyahat Tutkunları İçin Düşük Bütçeli Rotalar', 'Sınırlı bir bütçeyle seyahat etmek mümkün! Bu rehberde, düşük maliyetli seyahat rotaları, konaklama ipuçları ve yerel deneyimlerle dolu unutulmaz bir tatil nasıl planlanır anlatacağız. Sınırlı bir bütçeyle seyahat etmek mümkün! Bu rehberde, düşük maliyetli seyahat rotaları, konaklama ipuçları ve yerel deneyimlerle dolu unutulmaz bir tatil nasıl planlanır anlatacağız. Sınırlı bir bütçeyle seyahat etmek mümkün! Bu rehberde, düşük maliyetli seyahat rotaları, konaklama ipuçları ve yerel deneyimlerle dolu unutulmaz bir tatil nasıl planlanır anlatacağız. Sınırlı bir bütçeyle seyahat etmek mümkün! Bu rehberde, düşük maliyetli seyahat rotaları, konaklama ipuçları ve yerel deneyimlerle dolu unutulmaz bir tatil nasıl planlanır anlatacağız. Sınırlı bir bütçeyle seyahat etmek mümkün! Bu rehberde, düşük maliyetli seyahat rotaları, konaklama ipuçları ve yerel deneyimlerle dolu unutulmaz bir tatil nasıl planlanır anlatacağız. Sınırlı bir bütçeyle seyahat etmek mümkün! Bu rehberde, düşük maliyetli seyahat rotaları, konaklama ipuçları ve yerel deneyimlerle dolu unutulmaz bir tatil nasıl planlanır anlatacağız.', ' Seyahat, Tatil Planlama, Bütçe Seyahati', '07.08.2023 - 16:29:4', '../uploads/1109.jpg', 'Seyahat', 0),
(5, 'Evden Çalışmanın Artıları ve Eksileri', 'Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız. Uzaktan çalışma trendi hızla yayılıyor. Bu yazıda, evden çalışmanın avantajlarını ve dezavantajlarını ele alacak, verimliliği artırmak için ipuçları sunacağız.', 'Çalışma Hayatı, Uzaktan Çalışma, Verimlilik', '07.08.2023 - 16:30:3', '../uploads/home-office.jpg', 'Çalışma Hayatı', 0),
(6, 'Sürdürülebilir Modanın Yükselişi', ' Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz. Moda endüstrisi giderek sürdürülebilir ve çevre dostu yaklaşımlara yöneliyor. Bu yazıda, sürdürülebilir modanın neden önemli olduğunu ve nasıl uygulanabileceğini inceleyeceğiz.', 'Moda, Sürdürülebilirlik', '07.08.2023 - 16:39:1', '../uploads/SÅrdÅrÅlebilir_Modancn_YÅkseligi_60577.png', 'Gezi Blogları', 0),
(7, 'Dijital Öğrenmenin Geleceği', ' Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız.Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız.Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız.Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız. Dijital öğrenme yöntemleri geleneksel eğitim anlayışını dönüştürüyor. Bu blog yazısında, online eğitim trendlerini ve dijital öğrenmenin geleceğini ele alacağız.', 'Eğitim Teknolojileri', '07.08.2023 - 16:39:5', '../uploads/dijitalegitim.jpeg', 'Kişisel Gelişim', 0),
(8, ' Doğa Fotoğrafçılığının Püf Noktaları', ' Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.  Doğanın güzelliklerini yakalamak için doğru fotoğrafçılık teknikleri önemlidir. Bu blog yazısında, doğa fotoğrafçılığının temel ipuçlarını ve önerilerini paylaşacağız.', 'Fotoğrafçılık, Doğa', '07.08.2023 - 16:41:1', '../uploads/11856_doga-fotografciligi-egitimi.jpg', 'Fotoğrafçılık', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bulunamadi`
--

CREATE TABLE `bulunamadi` (
  `baslik` varchar(100) NOT NULL,
  `acıklama` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bulunamadi`
--

INSERT INTO `bulunamadi` (`baslik`, `acıklama`) VALUES
('21231', '21231');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `footer`
--

CREATE TABLE `footer` (
  `tanıtım` varchar(1000) NOT NULL,
  `linkler` varchar(800) NOT NULL,
  `facebook` varchar(1000) NOT NULL,
  `instagram` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `footer`
--

INSERT INTO `footer` (`tanıtım`, `linkler`, `facebook`, `instagram`) VALUES
('Yapımcı', 'boş', 'boş', 'ahmet_._senn');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkımda`
--

CREATE TABLE `hakkımda` (
  `ben_kimim` varchar(200) NOT NULL,
  `nerelere_gittim` varchar(200) NOT NULL,
  `en_begendigim_yer` varchar(200) NOT NULL,
  `ozlu_soz` varchar(200) NOT NULL,
  `ozlu_soz_sahibi` varchar(50) NOT NULL,
  `instagram` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hakkımda`
--

INSERT INTO `hakkımda` (`ben_kimim`, `nerelere_gittim`, `en_begendigim_yer`, `ozlu_soz`, `ozlu_soz_sahibi`, `instagram`) VALUES
('Ben Ahmet ŞEN,\r\nBu web sitenin tasarımcısıyım.', 'Siirt, Eskişehir, Ankara, Diyarbakır, Bursa, Balıkesir', 'Bursa', '1 bende 2 demokraside çare tükenmez.', 'Ahmet ŞEN', 'ahmet_._senn');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `tarih` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `ad`, `tarih`) VALUES
(1, 'Gezi Blogları', '123'),
(2, 'Dijital Pazarlama, Teknoloji, Trendler', '07.08.2023 - 16:24:41'),
(3, 'Sağlık, Beslenme', '07.08.2023 - 16:25:24'),
(4, ' Yaşam Tarzı', '07.08.2023 - 16:25:28'),
(5, 'Yaratıcılık', '07.08.2023 - 16:25:33'),
(6, 'Kişisel Gelişim', '07.08.2023 - 16:25:36'),
(7, 'Seyahat', '07.08.2023 - 16:25:39'),
(8, 'Verimlilik', '07.08.2023 - 16:25:43'),
(9, 'Çalışma Hayatı', '07.08.2023 - 16:25:47'),
(10, 'Fotoğrafçılık', '07.08.2023 - 16:40:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loglar`
--

CREATE TABLE `loglar` (
  `id` int(11) NOT NULL,
  `ad` varchar(150) NOT NULL,
  `detay` varchar(500) NOT NULL,
  `tarih` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `loglar`
--

INSERT INTO `loglar` (`id`, `ad`, `detay`, `tarih`) VALUES
(1, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 708),
(2, 'Üye Silindi', 'Admin bir üyeyi sildi.', 708),
(3, 'Site Ayarları Güncellendi', 'Admin site ayarlarını güncelledi', 708),
(4, 'Bakımda Ayarları Güncellendi', 'Admin bakımda sayfası için ayarları güncelledi', 708),
(5, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(6, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(7, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(8, 'Kategori Silindi', 'Admin bir kategoriyi sildi.', 708),
(9, 'Bulunamadı Güncellendi', 'Admin bulunamadı sayfasını güncelledi!', 708),
(10, 'Footer Güncellendi', 'Admin footer bilgilerini güncelledi!', 708),
(11, 'Footer Güncellendi', 'Admin footer bilgilerini güncelledi!', 708),
(12, 'Hakkımda Güncellendi', 'Admin hakkımda sayfasını güncelledi!', 708),
(13, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 708),
(14, 'Yeni Slider Eklendi', 'Admin yeni bir slider ekledi!', 708),
(15, 'Yeni Slider Eklendi', 'Admin yeni bir slider ekledi!', 708),
(16, 'Slider Silindi', 'Admin bir slider sildi.', 708),
(17, 'Slider Güncellendi', 'Admin bir slider güncelledi!', 708),
(18, 'Yeni Soru-Cevap Eklendi', 'Admin yeni bir Sık Sorulan Soru ekledi!', 708),
(19, 'Üye Güncellendi', 'Admin bir üye güncelledi!', 708),
(20, 'Üye Silindi', 'Admin bir üyeyi sildi.', 708),
(21, 'Yorum Silindi', 'Admin bir yorumu sildi.', 708),
(22, 'Kategori Silindi', 'Admin bir kategoriyi sildi.', 708),
(23, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(24, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(25, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(26, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(27, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(28, 'Yeni Slider Eklendi', 'Admin yeni bir slider ekledi!', 708),
(29, 'Yeni Slider Eklendi', 'Admin yeni bir slider ekledi!', 708),
(30, 'Slider Güncellendi', 'Admin bir slider güncelledi!', 708),
(31, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(32, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(33, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(34, 'Footer Güncellendi', 'Admin footer bilgilerini güncelledi!', 708),
(35, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(36, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(37, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(38, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(39, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(40, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(41, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(42, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(43, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(44, 'Blog Silindi', 'Admin bir blog sildi.', 708),
(45, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(46, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(47, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(48, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(49, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(50, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(51, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(52, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(53, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(54, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(55, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(56, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(57, 'Blog Güncellendi', 'Admin bir blog güncelledi!', 708),
(58, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(59, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(60, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(61, 'Yeni Kategori Eklendi', 'Admin yeni bir kategori ekledi!', 708),
(62, 'Yeni Blog Eklendi', 'Admin yeni bir blog ekledi!', 708),
(63, 'Kategori Silindi', 'Admin bir kategoriyi sildi.', 708),
(64, 'Kategori Silindi', 'Admin bir kategoriyi sildi.', 708),
(65, 'Kategori Silindi', 'Admin bir kategoriyi sildi.', 708),
(66, 'Kategori Silindi', 'Admin bir kategoriyi sildi.', 708),
(67, 'Slider Güncellendi', 'Admin bir slider güncelledi!', 708),
(68, 'Slider Güncellendi', 'Admin bir slider güncelledi!', 708),
(69, 'Slider Güncellendi', 'Admin bir slider güncelledi!', 708),
(70, 'Slider eklendi.', 'Admin yeni bir slider ekledi.', 1804),
(71, 'Slider Silindi', 'Admin bir slider sildi.', 1804),
(72, 'Üye Silindi', 'Admin bir üyeyi sildi.', 2904),
(73, 'Üye Silindi', 'Admin bir üyeyi sildi.', 2904),
(74, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 2904),
(75, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 2904),
(76, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 1205),
(77, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 1205),
(78, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 1205),
(79, 'Mesaj Silindi', 'Admin bir mesajı sildi.', 1205),
(80, 'Hakkımda güncellendi', 'Admin Hakkımda ayarlarını güncelledi.', 1205),
(81, 'Hakkımda güncellendi', 'Admin Hakkımda ayarlarını güncelledi.', 1205),
(82, 'Blog Silindi', 'Admin bir blog sildi.', 1205);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `id` int(11) NOT NULL,
  `ad` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mesaj` varchar(200) DEFAULT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `okundu` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `ad`, `email`, `mesaj`, `tarih`, `okundu`) VALUES
(7, 'asdfgh', 'sdfgh@gmail.com', 'sdfgh', '2025-04-19 21:51:52', 1),
(24, 'Ahmet', 'aysenur58@gmail.com', '6r556', '2025-05-12 03:25:27', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `etiket` varchar(50) NOT NULL,
  `başlık` varchar(200) NOT NULL,
  `açıklama` varchar(100) NOT NULL,
  `resim` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `etiket`, `başlık`, `açıklama`, `resim`) VALUES
(7, 'hayat, keyif', 'Hayat gezince güzel', 'Gezelim gençleşelim', '../uploads/spider-8154872_1280.jpg'),
(11, 'TANITIM', 'Şu an tanıtım için yapıldı', 'Bu eğitimi al, tamamla ve başarıya ulaş!', '../uploads/1109.jpg'),
(13, 'Kuğu, Yaşam', 'Kuğu gibi olun', 'Kuğu gibi olun açıklama', '../uploads/ocean-3605547_1920.jpg'),
(14, 'Hayat, Su', 'Su gibi aziz olun.', 'Her gün 3 litre su için (en az)', '../uploads/ocean-3605547_1920.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sss`
--

CREATE TABLE `sss` (
  `id` int(11) NOT NULL,
  `başlık` varchar(100) NOT NULL,
  `içerik` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sss`
--

INSERT INTO `sss` (`id`, `başlık`, `içerik`) VALUES
(1, 'bunu kim yaptı.', 'Ahmet Şen'),
(2, '122', '1212'),
(3, 'soru 1', 'soru 1 cevap');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `üyeler`
--

CREATE TABLE `üyeler` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `gmail` varchar(300) NOT NULL,
  `sifre` varchar(300) NOT NULL,
  `tarih` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `üyeler`
--

INSERT INTO `üyeler` (`id`, `ad`, `soyad`, `gmail`, `sifre`, `tarih`) VALUES
(11, 'Ahmet', 'ŞEN', 'senahmet4321@gmail.com', '$2y$10$8n11prul7SCz.9nVyC5YYO16ZsEJl9jVerQkw4iHrcFSX/.ZabY.K', '2025-05-12 03:58:25');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bloglar`
--
ALTER TABLE `bloglar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `loglar`
--
ALTER TABLE `loglar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sss`
--
ALTER TABLE `sss`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `üyeler`
--
ALTER TABLE `üyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `bloglar`
--
ALTER TABLE `bloglar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `loglar`
--
ALTER TABLE `loglar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `sss`
--
ALTER TABLE `sss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `üyeler`
--
ALTER TABLE `üyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
