-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2022 at 08:56 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test', 1, '2022-06-04 20:22:28', '2022-06-04 20:22:28'),
(3, 'Kesehatan Gigi', 'desc', 1, '2022-06-04 19:43:34', '2022-06-04 19:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user` int(11) NOT NULL,
  `status` enum('done','undone') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `title`, `date`, `user`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Pemeriksaan #1', '2022-06-09', 6, 'done', '2022-06-04 15:20:41', '2022-06-04 15:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `kehamilan`
--

CREATE TABLE `kehamilan` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `kandungan` int(11) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `berat_terbaru` int(11) DEFAULT NULL,
  `berat_awal` int(11) DEFAULT NULL,
  `hpht` date DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `prediksi` date DEFAULT NULL,
  `kondisi` enum('IDEAL','TERLALU KURUS','TERLALU GEMUK') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehamilan`
--

INSERT INTO `kehamilan` (`id`, `user`, `kandungan`, `usia`, `berat_terbaru`, `berat_awal`, `hpht`, `tinggi`, `prediksi`, `kondisi`) VALUES
(11, 13, 3, 1, 51, 50, '2022-06-02', 150, '2023-03-09', 'TERLALU GEMUK'),
(8, 6, 3, 1, 51, 50, '2022-06-02', 150, '2023-03-09', 'TERLALU GEMUK'),
(10, 1, 3, 1, 51, 50, '2022-06-02', 150, '2023-03-09', 'TERLALU GEMUK');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `kategori` enum('GROUP','PRIVATE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `phone`, `kategori`) VALUES
(5, 'https://wa.me/6281252604380?text=Saya%20tertarik%20dengan%20mobil%20Anda%20yang%20dijual', 'PRIVATE'),
(6, '	https://chat.whatsapp.com/GqPvQEZVqYbFBmNuo6CMOa', 'GROUP');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` enum('draft','publish') NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `category`, `picture`, `status`, `author`, `created_at`, `updated_at`) VALUES
(12, 'Keuntungan Menggunakan Sikat Gigi Berbulu Halus dan Tipis', '<p><strong>Kapan Waktu yang Tepat untuk Menyikat Gigi?</strong></p><p>&nbsp;</p><p>Selain lebih aman bagi permukaan mulut, penggunaan sikat gigi yang berbulu lembut juga lebih menguntungkan.</p><p>Beberapa keuntungan yang bisa Anda raih berkat penggunaan sikat gigi <i>soft</i>, antara lain:</p><p>1 dari 6 halaman</p><h2>1. Mampu Menghilangkan Bakteri dan Plak</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/5VoBZDEo-HaXQQmnbtgln7aKDBc=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2321389/original/003417600_1605776315-Sikat-Gigi-Berbulu-Lembut-Mampu-Menghilangkan-Bakteri-dan-Plak-shutterstock_609570896.jpg\" alt=\"Mampu Menghilangkan Bakteri dan Plak\"></a></p><p>&nbsp;</p><p>Mampu Menghilangkan Bakteri dan Plak</p><p>Sikat gigi dengan bulu lembut dan tipis merupakan jenis yang sering direkomendasikan oleh dokter gigi. Sikat tipe tersebut dinilai mampu menghilangkan plak dan bakteri.&nbsp;</p><p>Pasalnya, sikat gigi <i>soft</i>&nbsp;dapat menjangkau saku gusi, yaitu tempat tumbuhnya&nbsp;<a href=\"https://www.klikdokter.com/penyakit/karang-gigi\">karang gigi</a>, tanpa membuat gusi berisiko iritasi atau luka.</p><p>Selain itu, sikat berbulu lembut juga lebih aman dan efektif jika digunakan untuk membersihkan bagian <i>interdental</i> alias dinding pertemuan antara gigi yang satu dengan lainnya.&nbsp;</p><p>2 dari 6 halaman</p><h2>2. Tidak Mengiritasi Gusi</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/wUOoyVqXONv10RbY6B9F_zcHSJc=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2317243/original/034840300_1596009835-Sikat-Gigi-shutterstock_641507542.jpg\" alt=\"Tidak Mengiritasi Gusi\"></a></p><p>&nbsp;</p><p>Tidak Mengiritasi Gusi</p><p>Beberapa sikat gigi berbulu keras (<i>hard</i>) terbukti dapat mengiritasi dan berisiko menyebabkan gusi turun (resesi gusi).&nbsp;</p><p>Kondisi gusi turun dapat membuat Anda mengalami kondisi&nbsp;<a href=\"https://www.klikdokter.com/penyakit/gigi-sensitif\">gigi sensitif</a>, yang terasa ngilu apabila terpapar dingin atau panas.&nbsp;</p><p>Di samping itu, gusi yang teriritasi juga biasanya akan dilewati ketika menyikat gigi guna menghindari rasa sakit. Sayangnya, hal tersebut membuat bagian tersebut berisiko mengalami penumpukan plak.</p><p><strong>Artikel Lainnya: </strong><a href=\"https://www.klikdokter.com/info-sehat/read/2695140/jangan-asal-ini-cara-memilih-sikat-gigi-yang-baik-dan-benar\"><strong>Jangan Asal, Ini Cara Memilih Sikat Gigi yang Baik dan Benar</strong></a></p><p>3 dari 6 halaman</p><h2>3. Tidak Merusak Permukaan Gigi</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/6-MJhxVpaMGkrWMUgRrv3_1XHjs=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2313759/original/069533500_1586761190-Alasan-Pentingnya-Menjaga-Kesehatan-Gusi.jpg\" alt=\"Tidak Merusak Permukaan Gigi\"></a></p><p>&nbsp;</p><p>Tidak Merusak Permukaan Gigi</p><p>Sikat gigi berbulu keras (<i>hard</i>) dapat pula menyebabkan lapisan pelindung gigi (enamel) terkikis. Risiko ini meningkat apabila Anda menyikat dengan gerakan yang kuat dan kencang.</p><p>Maka dari itu, akan lebih baik jika Anda menggunakan sikat gigi berbulu lembut. Praktikkan pula cara menyikat gigi yang benar, agar kebersihan rongga mulut Anda senantiasa optimal.</p><p>4 dari 6 halaman</p><h2>4. Aman Digunakan Gigi Sensitif</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/fNSZpyIkdXPRQ8G4DP61LOmVoFo=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2309396/original/040949800_1574147879-Pentingnya-Memilih-dan-Merawat-Sikat-Gigi-By-5-Second-Studio-Shutterstock_1016965933.jpg\" alt=\"Aman Digunakan Gigi Sensitif\"></a></p><p>&nbsp;</p><p>Aman Digunakan Gigi Sensitif</p><p>Sikat gigi berbulu halus cukup aman untuk digunakan oleh penderita gigi sensitif atau mereka yang mengalami <a href=\"https://www.klikdokter.com/penyakit/gusi-turun\">gusi turun</a>.&nbsp;</p><p>Dengan pakai bulu sikat yang lembut, Anda tidak akan merasa ngilu ketika menyikat gigi. Selain itu, penggunaan sikat gigi <i>soft</i> juga dapat membuat Anda terhindar dari risiko terkikisnya permukaan email gigi.</p><p><strong>Artikel Lainnya: </strong><a href=\"https://www.klikdokter.com/info-sehat/read/3634530/tips-menyikat-gigi-untuk-gigi-sensitif\"><strong>Tips Menyikat Gigi untuk Gigi Sensitif</strong></a></p><p>5 dari 6 halaman</p><h2>5. Lebih Nyaman Digunakan</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/Yux316pZoOlNEXVbUeCafe7huE8=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2327928/original/019252800_1639636428-Sering_Mual_dan_Muntah_Saat_Sikat_Gigi.jpg\" alt=\"Lebih Nyaman Digunakan\"></a></p><p>&nbsp;</p><p>Lebih Nyaman Digunakan</p><p>Sikat gigi lembut (<i>soft</i>) berisiko lebih rendah untuk merusak lapisan email gigi daripada sikat gigi berbulu keras (<i>hard</i>).</p><p>Selain itu, penggunaan sikat gigi berbulu halus juga membuat gusi terhindar dari risiko iritasi dan rasa sakit.&nbsp;</p><p>Jadi, apakah Anda sudah menggunakan sikat gigi yang lembut? Jika ya, Anda bisa melanjutkan penggunaannya.</p><p>Agar lebih aman dan efektif, pastikan sikat gigi berbulu lembut yang Anda pilih juga memilih ukuran kepala kecil. Sikat gigi dengan bentuk dan ukuran ujung kecil dapat mengakses bagian mulut yang sulit dijangkau.</p><p>Tak berhenti di situ, Anda pun harus paham cara merawat sikat gigi dengan benar. Setelah digunakan, bilas seluruh sikat gigi menggunakan air bersih, lalu biarkan udara membuatnya kering dengan sendirinya.</p><p>Sikat gigi tidak perlu ditempatkan dalam wadah tertutup. Sebab, wadah sikat gigi yang tertutup dapat membuat kondisi sikat gigi menjadi lembap. Hal ini membuat kuman semakin mudah berkembang biak.</p><p>Hal yang tak kalah penting, Anda pun mesti meletakkannya dalam posisi tegak, dan saling berjauhan dengan sikat gigi lainnya. Hal ini penting untuk mencegah penyebaran bakteri di antara sikat gigi.</p><p>Jangan sungkan untuk mengganti sikat gigi setidaknya setiap 3 bulan, atau ketika bulunya sudah mekar (rusak). Sikat dengan kondisi demikian sudah tidak efektif untuk menjaga kebersihan gigi dan mulut.</p><p>&nbsp;</p><p><strong>Baca Juga</strong></p><ul><li><a href=\"https://www.klikdokter.com/info-sehat/read/3632564/jangan-ditiru-ini-cara-menyikat-gigi-yang-salah\">Jangan Ditiru! Ini Cara Menyikat Gigi yang Salah</a></li><li><a href=\"https://www.klikdokter.com/info-sehat/read/2697209/bisakah-gigi-kembali-putih-hanya-dengan-menyikat-gigi\">Bisakah Gigi Kembali Putih Hanya dengan Menyikat Gigi?</a></li><li><a href=\"https://www.klikdokter.com/info-sehat/read/3628789/seberapa-sering-sikat-gigi-harus-diganti\">Seberapa Sering Sikat Gigi Harus Diganti?</a></li></ul><p>&nbsp;</p><p>Punya pertanyaan seputar kesehatan gigi dan mulut? Ingin tahu fakta lain seputar masalah kesehatan lain? Anda bisa berkonsultasi dengan memanfaatkan layanan <a href=\"https://livechat.klikdokter.com/?utm_source=publishing&amp;utm_medium=cta_article&amp;utm_campaign=artikel_post_3311117\">tanya dokter di LiveChat 24 jam</a> atau <a href=\"https://www.klikdokter.com/download-aplikasi?utm_source=publishing&amp;utm_medium=cta_article&amp;utm_campaign=artikel_post_3311117\">aplikasi KlikDokter</a>.</p><p>\"&gt;</p><p>Menyikat gigi merupakan langkah penting untuk menjaga kebersihan mulut. Namun, agar hasilnya optimal, salah satu hal yang perlu Anda perhatikan adalah jenis sikat gigi yang digunakan.</p><p>Faktanya, kemampuan sikat gigi untuk membersihkan bagian dalam mulut tergantung dari jenis bulu sikatnya.&nbsp;</p><p>Terdapat 3 jenis sikat gigi yang dijual di pasaran. Ada <strong>sikat gigi bulu halus</strong> (<i>soft</i>), sedang (<i>medium</i>), dan keras (<i>hard</i>).&nbsp;</p><p><i>American Dental Association</i>&nbsp;(ADA) merekomendasikan untuk menggunakan sikat gigi dengan bulu yang lembut (soft) atau sedang (<i>medium</i>).</p><p><strong>Artikel Lainnya: </strong><a href=\"https://www.klikdokter.com/info-sehat/read/2695779/kapan-waktu-yang-tepat-untuk-menyikat-gigi\"><strong>Kapan Waktu yang Tepat untuk Menyikat Gigi?</strong></a></p><p>Selain lebih aman bagi permukaan mulut, penggunaan sikat gigi yang berbulu lembut juga lebih menguntungkan.</p><p>Beberapa keuntungan yang bisa Anda raih berkat penggunaan sikat gigi <i>soft</i>, antara lain:</p><p>1 dari 6 halaman</p><h2>1. Mampu Menghilangkan Bakteri dan Plak</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/5VoBZDEo-HaXQQmnbtgln7aKDBc=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2321389/original/003417600_1605776315-Sikat-Gigi-Berbulu-Lembut-Mampu-Menghilangkan-Bakteri-dan-Plak-shutterstock_609570896.jpg\" alt=\"Mampu Menghilangkan Bakteri dan Plak\"></a></p><p>&nbsp;</p><p>Mampu Menghilangkan Bakteri dan Plak</p><p>Sikat gigi dengan bulu lembut dan tipis merupakan jenis yang sering direkomendasikan oleh dokter gigi. Sikat tipe tersebut dinilai mampu menghilangkan plak dan bakteri.&nbsp;</p><p>Pasalnya, sikat gigi <i>soft</i>&nbsp;dapat menjangkau saku gusi, yaitu tempat tumbuhnya&nbsp;<a href=\"https://www.klikdokter.com/penyakit/karang-gigi\">karang gigi</a>, tanpa membuat gusi berisiko iritasi atau luka.</p><p>Selain itu, sikat berbulu lembut juga lebih aman dan efektif jika digunakan untuk membersihkan bagian <i>interdental</i> alias dinding pertemuan antara gigi yang satu dengan lainnya.&nbsp;</p><p>2 dari 6 halaman</p><h2>2. Tidak Mengiritasi Gusi</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/wUOoyVqXONv10RbY6B9F_zcHSJc=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2317243/original/034840300_1596009835-Sikat-Gigi-shutterstock_641507542.jpg\" alt=\"Tidak Mengiritasi Gusi\"></a></p><p>&nbsp;</p><p>Tidak Mengiritasi Gusi</p><p>Beberapa sikat gigi berbulu keras (<i>hard</i>) terbukti dapat mengiritasi dan berisiko menyebabkan gusi turun (resesi gusi).&nbsp;</p><p>Kondisi gusi turun dapat membuat Anda mengalami kondisi&nbsp;<a href=\"https://www.klikdokter.com/penyakit/gigi-sensitif\">gigi sensitif</a>, yang terasa ngilu apabila terpapar dingin atau panas.&nbsp;</p><p>Di samping itu, gusi yang teriritasi juga biasanya akan dilewati ketika menyikat gigi guna menghindari rasa sakit. Sayangnya, hal tersebut membuat bagian tersebut berisiko mengalami penumpukan plak.</p><p><strong>Artikel Lainnya: </strong><a href=\"https://www.klikdokter.com/info-sehat/read/2695140/jangan-asal-ini-cara-memilih-sikat-gigi-yang-baik-dan-benar\"><strong>Jangan Asal, Ini Cara Memilih Sikat Gigi yang Baik dan Benar</strong></a></p><p>3 dari 6 halaman</p><h2>3. Tidak Merusak Permukaan Gigi</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/6-MJhxVpaMGkrWMUgRrv3_1XHjs=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2313759/original/069533500_1586761190-Alasan-Pentingnya-Menjaga-Kesehatan-Gusi.jpg\" alt=\"Tidak Merusak Permukaan Gigi\"></a></p><p>&nbsp;</p><p>Tidak Merusak Permukaan Gigi</p><p>Sikat gigi berbulu keras (<i>hard</i>) dapat pula menyebabkan lapisan pelindung gigi (enamel) terkikis. Risiko ini meningkat apabila Anda menyikat dengan gerakan yang kuat dan kencang.</p><p>Maka dari itu, akan lebih baik jika Anda menggunakan sikat gigi berbulu lembut. Praktikkan pula cara menyikat gigi yang benar, agar kebersihan rongga mulut Anda senantiasa optimal.</p><p>4 dari 6 halaman</p><h2>4. Aman Digunakan Gigi Sensitif</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/fNSZpyIkdXPRQ8G4DP61LOmVoFo=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2309396/original/040949800_1574147879-Pentingnya-Memilih-dan-Merawat-Sikat-Gigi-By-5-Second-Studio-Shutterstock_1016965933.jpg\" alt=\"Aman Digunakan Gigi Sensitif\"></a></p><p>&nbsp;</p><p>Aman Digunakan Gigi Sensitif</p><p>Sikat gigi berbulu halus cukup aman untuk digunakan oleh penderita gigi sensitif atau mereka yang mengalami <a href=\"https://www.klikdokter.com/penyakit/gusi-turun\">gusi turun</a>.&nbsp;</p><p>Dengan pakai bulu sikat yang lembut, Anda tidak akan merasa ngilu ketika menyikat gigi. Selain itu, penggunaan sikat gigi <i>soft</i> juga dapat membuat Anda terhindar dari risiko terkikisnya permukaan email gigi.</p><p><strong>Artikel Lainnya: </strong><a href=\"https://www.klikdokter.com/info-sehat/read/3634530/tips-menyikat-gigi-untuk-gigi-sensitif\"><strong>Tips Menyikat Gigi untuk Gigi Sensitif</strong></a></p><p>5 dari 6 halaman</p><h2>5. Lebih Nyaman Digunakan</h2><p><a href=\"https://www.klikdokter.com/info-sehat/read/3311117/keuntungan-menggunakan-sikat-gigi-berbulu-halus-dan-tipis#\"><img src=\"https://image-cdn.medkomtek.com/Yux316pZoOlNEXVbUeCafe7huE8=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/klikdokter-media-buckets/medias/2327928/original/019252800_1639636428-Sering_Mual_dan_Muntah_Saat_Sikat_Gigi.jpg\" alt=\"Lebih Nyaman Digunakan\"></a></p><p>&nbsp;</p><p>Lebih Nyaman Digunakan</p><p>Sikat gigi lembut (<i>soft</i>) berisiko lebih rendah untuk merusak lapisan email gigi daripada sikat gigi berbulu keras (<i>hard</i>).</p><p>Selain itu, penggunaan sikat gigi berbulu halus juga membuat gusi terhindar dari risiko iritasi dan rasa sakit.&nbsp;</p><p>Jadi, apakah Anda sudah menggunakan sikat gigi yang lembut? Jika ya, Anda bisa melanjutkan penggunaannya.</p><p>Agar lebih aman dan efektif, pastikan sikat gigi berbulu lembut yang Anda pilih juga memilih ukuran kepala kecil. Sikat gigi dengan bentuk dan ukuran ujung kecil dapat mengakses bagian mulut yang sulit dijangkau.</p><p>Tak berhenti di situ, Anda pun harus paham cara merawat sikat gigi dengan benar. Setelah digunakan, bilas seluruh sikat gigi menggunakan air bersih, lalu biarkan udara membuatnya kering dengan sendirinya.</p><p>Sikat gigi tidak perlu ditempatkan dalam wadah tertutup. Sebab, wadah sikat gigi yang tertutup dapat membuat kondisi sikat gigi menjadi lembap. Hal ini membuat kuman semakin mudah berkembang biak.</p><p>Hal yang tak kalah penting, Anda pun mesti meletakkannya dalam posisi tegak, dan saling berjauhan dengan sikat gigi lainnya. Hal ini penting untuk mencegah penyebaran bakteri di antara sikat gigi.</p><p>Jangan sungkan untuk mengganti sikat gigi setidaknya setiap 3 bulan, atau ketika bulunya sudah mekar (rusak). Sikat dengan kondisi demikian sudah tidak efektif untuk menjaga kebersihan gigi dan mulut.</p><p>&nbsp;</p><p><strong>Baca Juga</strong></p><ul><li><a href=\"https://www.klikdokter.com/info-sehat/read/3632564/jangan-ditiru-ini-cara-menyikat-gigi-yang-salah\">Jangan Ditiru! Ini Cara Menyikat Gigi yang Salah</a></li><li><a href=\"https://www.klikdokter.com/info-sehat/read/2697209/bisakah-gigi-kembali-putih-hanya-dengan-menyikat-gigi\">Bisakah Gigi Kembali Putih Hanya dengan Menyikat Gigi?</a></li><li><a href=\"https://www.klikdokter.com/info-sehat/read/3628789/seberapa-sering-sikat-gigi-harus-diganti\">Seberapa Sering Sikat Gigi Harus Diganti?</a></li></ul><p>&nbsp;</p><p>Punya pertanyaan seputar kesehatan gigi dan mulut? Ingin tahu fakta lain seputar masalah kesehatan lain? Anda bisa berkonsultasi dengan memanfaatkan layanan <a href=\"https://livechat.klikdokter.com/?utm_source=publishing&amp;utm_medium=cta_article&amp;utm_campaign=artikel_post_3311117\">tanya dokter di LiveChat 24 jam</a> atau <a href=\"https://www.klikdokter.com/download-aplikasi?utm_source=publishing&amp;utm_medium=cta_article&amp;utm_campaign=artikel_post_3311117\">aplikasi KlikDokter</a>.</p>', 3, '1654345404_2b9a8e41c21df34fa08c.jpg', 'publish', 1, '2022-06-04 12:30:06', '2022-06-04 12:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `suami` varchar(255) DEFAULT NULL,
  `tempatlahir` varchar(255) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `role`, `profile`, `suami`, `tempatlahir`, `tanggallahir`, `umur`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 'dessy', '$2y$10$Pm/tElKQCWLiBGEdUvw0Q.3eLGJFxMpXFBgJXjajiCgT1N1dOPMrO', 'Dessy A', 'dessy@gmail.com', '085674664253', 'customer', NULL, 'Ahmad Criptocurrency', 'awdawda', '2001-07-19', 21, 'awdawdawd', '2022-06-01 13:30:56', '2022-06-01 06:30:56'),
(1, 'admin', '$2a$12$9BHI3Z51GEdMWBCxc7Luh.GjMOhnMe7FrRZUjDBbIOycaLQOKWLsm', 'admin', NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 23:09:42', '2022-06-03 16:09:42'),
(13, 'admin2', '$2y$10$0TYhdO..n0sW6OC9OSea7eKUextcMpFM6cMKFAmSQSKH.bBzuoH/i', 'admin', '', '0827327327', 'admin', NULL, 'Manusia serigala', '', '2001-01-09', 21, '', '2022-06-09 06:51:39', '2022-06-08 23:51:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehamilan`
--
ALTER TABLE `kehamilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`user`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kehamilan`
--
ALTER TABLE `kehamilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
