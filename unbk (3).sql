-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 09:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE IF NOT EXISTS `hasil_ujian` (
`id` int(10) NOT NULL,
  `id_ujian` int(10) NOT NULL,
  `id_mapel_ujian` int(5) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`id`, `id_ujian`, `id_mapel_ujian`, `nilai`) VALUES
(1, 25, 77, 3),
(2, 25, 77, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
`id_jawaban` int(5) NOT NULL,
  `id_soal` int(4) NOT NULL,
  `pilihan` text NOT NULL,
  `jawab` enum('T','F') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal`, `pilihan`, `jawab`) VALUES
(1, 6, 'aaaaaaaa', 'T'),
(2, 6, 'bbbbbbbbb', 'F'),
(3, 7, 'cccccc', 'T'),
(4, 7, 'ddddd', 'F'),
(5, 8, 'eeeeeeee', 'T'),
(6, 8, 'ffffffff', 'F'),
(7, 9, 'ggggggg', 'T'),
(8, 9, 'hhhhhhh', 'F'),
(9, 10, 'jjjjj', 'T'),
(10, 10, 'kkkkkk', 'F'),
(11, 11, 'laut', 'T'),
(12, 11, 'Air Tawar', 'F'),
(13, 11, 'payau', 'F'),
(14, 11, 'pantai', 'F'),
(15, 11, 'daratan', 'F'),
(16, 15, 'evolusi', 'F'),
(17, 15, 'ekologi', 'F'),
(18, 15, 'entomologi', 'T'),
(19, 15, 'virologi', 'F'),
(20, 15, 'ornitologi', 'F'),
(21, 16, 'pembuatan asam cuka', 'T'),
(22, 16, 'pembuatan yoghurt', 'F'),
(23, 16, 'pembuatan nata de coco', 'F'),
(24, 16, 'penghasil streptomisin', 'F'),
(25, 16, 'menghasilkan kloramfenikol', 'F'),
(26, 17, 'clorophyta', 'F'),
(27, 17, 'crysophyta', 'F'),
(28, 17, 'phaeophyta', 'T'),
(29, 17, 'rhodophyta', 'F'),
(30, 17, 'cyanophyta', 'F'),
(31, 18, 'habitat hidupnya', 'F'),
(32, 18, 'keberadaan gigi', 'F'),
(33, 18, 'jumlah ruang jantung', 'F'),
(34, 18, 'jenis makanan yang dikonsumsi', 'F'),
(35, 18, 'cara penyesuaian terhadap suhu lingkungan', 'T'),
(36, 19, 'mencegah erosi', 'T'),
(37, 19, 'menjaga kelestarian', 'F'),
(38, 19, 'memajukan pariwisata', 'F'),
(39, 19, 'melindungi tumbuhan tertentu', 'F'),
(40, 19, 'mengembangkan jenis tanaman tertentu', 'F'),
(41, 20, '(l), (3), dan (5)', 'F'),
(42, 20, '(1), (4), dan (5)', 'F'),
(43, 20, '(1), (5), dan (6)', 'F'),
(44, 20, '(2), (3), dan (5) ', 'F'),
(45, 20, '(2), (4), dan (6)', 'T'),
(46, 21, '(1), (2), (3), dan (4)', 'F'),
(47, 21, '(1), (3), (4), dan (5)', 'T'),
(48, 21, '(1), (3), (4), dan (6)', 'F'),
(49, 21, '(2), (3), (4), dan (5) ', 'F'),
(50, 21, '(2), (3), (4), dan (6)', 'F'),
(51, 22, 'fitoplankton dan ikan kakap', 'F'),
(52, 22, 'fitoplankton dan ikan sedang', 'F'),
(53, 22, 'zooplankton dan ikan kecil', 'F'),
(54, 22, 'zooplankton dan ikan paus', 'T'),
(55, 22, 'ikan sedang dan ikan kakap', 'F'),
(56, 23, 'gas C02 yang menyebabkan pemanasan global', 'T'),
(57, 23, 'CFCs yang menyebabkan efek rumah kaca', 'F'),
(58, 23, 'SOx dan NOx yang menyebabkan penipisan ozon', 'F'),
(59, 23, 'P04 yang menyebabkan terjadinya hujan asam', 'F'),
(60, 23, 'gas CO yang menyebabkan kematian tumbuhan', 'F'),
(61, 24, 'pronasi', 'F'),
(62, 24, 'ekstensi', 'F'),
(63, 24, 'adduksi', 'T'),
(64, 24, 'abduksi', 'F'),
(65, 24, 'fleksi', 'F'),
(66, 25, 'berlangsungnya pertukaran gas dari aliran darah ke sel-sel tubuh', 'F'),
(67, 25, 'pertukaran gas antara darah dan cairan jaringan tubuh', 'F'),
(68, 25, 'pertukaran gas antara udara dan darah', 'F'),
(69, 25, 'pengambilan udara yang masuk ke paru-paru', 'T'),
(70, 25, 'difusi gas 02 dari luar masuk ke dalam aliran darah', 'F'),
(71, 26, 'tiroksin dan kalsitonin', 'F'),
(72, 26, 'insulin dan adrenalin', 'T'),
(73, 26, 'glucagon dan noradrenalin', 'F'),
(74, 26, 'mineralokortikoid dan tiroksin', 'F'),
(75, 26, 'noradrenalin dan mineralokortikoid', 'F'),
(76, 27, 'menjadi sel yang bersifat fagositosis', 'F'),
(77, 27, 'merangsang pembentukan sel limfosit T', 'F'),
(78, 27, 'menjadi antibodi yang membunuh bibit penyakit', 'F'),
(79, 27, 'menjadi antigen untuk pembentukan antibod', 'F'),
(80, 27, 'mematikan atau menghambat pertumbuhan bakteri', 'T'),
(81, 28, 'dekarboksilasi oksidatif di dalam membrane luar mitokondria', 'T'),
(82, 28, 'siklus Krebs di dalam membran dalam mitokondria', 'F'),
(83, 28, 'siklus Krebs di dalam sitosol', 'F'),
(84, 28, 'transfer elektron di membran dalam mitokondria', 'F'),
(85, 28, 'transfer elektron di dalam matriks mitokondria', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_siswa`
--

CREATE TABLE IF NOT EXISTS `jawaban_siswa` (
`id` int(10) NOT NULL,
  `id_mapel_ujian` int(10) NOT NULL,
  `id_soal` int(4) NOT NULL,
  `nomor` int(11) NOT NULL,
  `jawab_siswa` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_siswa`
--

INSERT INTO `jawaban_siswa` (`id`, `id_mapel_ujian`, `id_soal`, `nomor`, `jawab_siswa`) VALUES
(232, 77, 23, 1, '-'),
(233, 77, 20, 2, '-'),
(234, 77, 16, 3, 'B'),
(235, 77, 11, 4, 'C'),
(236, 77, 25, 5, '-'),
(237, 77, 19, 6, '-'),
(238, 77, 26, 7, 'C'),
(239, 77, 15, 8, 'B'),
(240, 77, 22, 9, 'A'),
(241, 77, 21, 10, 'A'),
(242, 77, 17, 11, 'C'),
(243, 77, 24, 12, 'B'),
(244, 77, 28, 13, 'D'),
(245, 77, 18, 14, 'B'),
(246, 77, 27, 15, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(3) NOT NULL,
  `tingkat` enum('smp','sma') NOT NULL,
  `jurusan` enum('ipa','ips') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `tingkat`, `jurusan`) VALUES
(1, 'smp', 'ipa'),
(2, 'smp', 'ips'),
(3, 'sma', 'ipa'),
(4, 'sma', 'ips');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
`id_mapel` int(5) NOT NULL,
  `nama_mapel` varchar(25) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `durasi` int(3) NOT NULL,
  `jlh_soal` int(3) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `id_kategori`, `durasi`, `jlh_soal`, `gambar`) VALUES
(1, 'Matematika', 3, 120, 40, 'assets/image/matematika.png'),
(2, 'Bahasa Indonesia', 3, 120, 50, 'assets/image/other_resource1.png'),
(3, 'Bahasa Inggris', 3, 120, 50, 'assets/image/bahasa_inggris.png'),
(4, 'Biologi', 3, 120, 15, 'assets/image/microscope.png'),
(5, 'Kimia', 3, 120, 40, 'assets/image/kimia.png'),
(6, 'Fisika', 3, 120, 40, 'assets/image/fisika.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_ujian_siswa`
--

CREATE TABLE IF NOT EXISTS `mapel_ujian_siswa` (
`id` int(10) NOT NULL,
  `id_ujian` int(10) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `status` enum('selesai','berlangsung','belum') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_ujian_siswa`
--

INSERT INTO `mapel_ujian_siswa` (`id`, `id_ujian`, `id_mapel`, `status`) VALUES
(74, 25, 1, 'belum'),
(75, 25, 2, 'belum'),
(76, 25, 3, 'belum'),
(77, 25, 4, 'selesai'),
(78, 25, 5, 'belum'),
(79, 25, 6, 'belum'),
(86, 27, 1, 'belum'),
(87, 27, 2, 'belum'),
(88, 27, 3, 'belum'),
(89, 27, 4, 'belum'),
(90, 27, 5, 'belum'),
(91, 27, 6, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jawaban_ujian`
--

CREATE TABLE IF NOT EXISTS `pilihan_jawaban_ujian` (
`id_pilihan` int(10) NOT NULL,
  `id_jawaban_siswa` int(10) NOT NULL,
  `pilihan` char(1) NOT NULL,
  `id_jawaban` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1051 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan_jawaban_ujian`
--

INSERT INTO `pilihan_jawaban_ujian` (`id_pilihan`, `id_jawaban_siswa`, `pilihan`, `id_jawaban`) VALUES
(976, 232, 'E', 56),
(977, 232, 'A', 57),
(978, 232, 'D', 58),
(979, 232, 'B', 59),
(980, 232, 'C', 60),
(981, 233, 'A', 41),
(982, 233, 'B', 42),
(983, 233, 'E', 43),
(984, 233, 'D', 44),
(985, 233, 'C', 45),
(986, 234, 'D', 21),
(987, 234, 'C', 22),
(988, 234, 'B', 23),
(989, 234, 'A', 24),
(990, 234, 'E', 25),
(991, 235, 'B', 11),
(992, 235, 'C', 12),
(993, 235, 'E', 13),
(994, 235, 'D', 14),
(995, 235, 'A', 15),
(996, 236, 'D', 66),
(997, 236, 'E', 67),
(998, 236, 'B', 68),
(999, 236, 'A', 69),
(1000, 236, 'C', 70),
(1001, 237, 'E', 36),
(1002, 237, 'A', 37),
(1003, 237, 'C', 38),
(1004, 237, 'D', 39),
(1005, 237, 'B', 40),
(1006, 238, 'D', 71),
(1007, 238, 'B', 72),
(1008, 238, 'C', 73),
(1009, 238, 'A', 74),
(1010, 238, 'E', 75),
(1011, 239, 'A', 16),
(1012, 239, 'B', 17),
(1013, 239, 'E', 18),
(1014, 239, 'C', 19),
(1015, 239, 'D', 20),
(1016, 240, 'B', 51),
(1017, 240, 'E', 52),
(1018, 240, 'D', 53),
(1019, 240, 'C', 54),
(1020, 240, 'A', 55),
(1021, 241, 'C', 46),
(1022, 241, 'A', 47),
(1023, 241, 'E', 48),
(1024, 241, 'D', 49),
(1025, 241, 'B', 50),
(1026, 242, 'D', 26),
(1027, 242, 'B', 27),
(1028, 242, 'A', 28),
(1029, 242, 'E', 29),
(1030, 242, 'C', 30),
(1031, 243, 'D', 61),
(1032, 243, 'E', 62),
(1033, 243, 'A', 63),
(1034, 243, 'B', 64),
(1035, 243, 'C', 65),
(1036, 244, 'E', 81),
(1037, 244, 'A', 82),
(1038, 244, 'D', 83),
(1039, 244, 'C', 84),
(1040, 244, 'B', 85),
(1041, 245, 'E', 31),
(1042, 245, 'C', 32),
(1043, 245, 'D', 33),
(1044, 245, 'A', 34),
(1045, 245, 'B', 35),
(1046, 246, 'B', 76),
(1047, 246, 'A', 77),
(1048, 246, 'C', 78),
(1049, 246, 'E', 79),
(1050, 246, 'D', 80);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` char(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
`id_kategori` int(2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `id_kategori`, `foto`) VALUES
('141402039', 'M Isa Dadi hasibuan', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`id_soal` int(4) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `isi_soal` text NOT NULL,
  `durasi_soal` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_mapel`, `isi_soal`, `durasi_soal`) VALUES
(6, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1),
(7, 1, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 3),
(8, 1, 'cccccccccccccccccccccccccccccccc', 2),
(9, 1, 'dddddddddddddddddddddddddddddddd', 1),
(10, 1, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 4),
(11, 4, 'Perhatikan beberapa ciri ekosistem berikut:\r\n• Memiliki salinitas tinggi\r\n• Iklim dan cuaca tidak menentu\r\n• Mengandung mineral NaCl\r\n• Memiliki variasi perbedaan suhu\r\nJenis ekosistem yang memiliki ciri tersebut\r\nadalah ...\r\n', 3),
(15, 4, 'Hama wereng coklat merupakan musuh para petani yang menanam padi. Cabang ilmu biologi yang membahas tentang wereng coklat ini adalah ', 3),
(16, 4, 'Bakteri mempunyai banyak peran dalam kehidupan manusia, seperti Acetobacter aceti  berperan dalam', 3),
(17, 4, 'Perhatikan ciri-ciri alga berikut!\r\n- Habitatnya di tempat yang lembab\r\n- Tubuhnya ada yang bersel satu dan bersel banyak \r\n- Klorofilnya mengandung pigmen karotin\r\nAlga yang sesuai dengan ciri-ciri tersebut berasal dari golongan\r\n', 3),
(18, 4, 'Seorang siswa membuat kelompok-kelompok makhluk hidup. Kelompok I terdiri dari kucing, burung kakatua dan paus bongkok. Kelompok 2 terdiri dari katak, ikan lele dan buaya. Pengelompokan tersebut berdasarkan pada', 3),
(19, 4, 'Pelestarian SDA di Iereng gunung dengan menjadikannya daerah hutan lindung dengan tujuan', 3),
(20, 4, 'Berikut ini ciri-ciri tumbuhan berbiji.\r\n(l) biji berkeping satu\r\n(2) berakar tunggang\r\n(3) tulang daun sejajar\r\n(4) biji berkeping dua\r\n(5) tidak berkambium\r\n(6) tulang daun menjari\r\nCiri-ciri tumbuhan yang tergolong dicotyledone meliputi nomor\r\n', 3),
(21, 4, 'Ditemukan seekor hewan dengan ciri sebagai berikut: \r\n(l) kulitnya licin\r\n(2)	mempunyai glandula mamae\r\n(3)	mempunyai alat gerak\r\n(4)	cara reproduksi ovipar\r\n(5)	jantung beruang 2\r\n(6)	Jantung beruang 4\r\nCiri yang dimiliki oleh Pices adalah\r\n', 3),
(22, 4, 'Perhatikan bagan jaring-jaring makanan berikut:\r\nfitoplankton -> ikan kecil —> ikan kakap \r\n     |              |             |\r\n     V              V             V\r\nZooplankton ->	ikan sedang -> ikan paus\r\nOrganisme yang berperan sebagai konsumen 1 dan konsumen 3 adalah\r\n', 3),
(23, 4, 'Pembakaran bahan bakar fosil untuk berbagai kepentingan ternyata dapat menyebabkan terjadinya pencemaran lingkungan yang serius yaitu timbulnya polutan', 3),
(24, 4, 'Gerakan lencang depan dalam kegiatan baris berbaris merupakan gerak', 3),
(25, 4, 'Inspirasi pada manusia adalah proses', 3),
(26, 4, 'Hormon yang sifatnya bertentangan dalam pengaturan kadar gula darah yaitu', 3),
(27, 4, 'Prinsip kerja antibiotik dalam menyembuhkan penyakit adalah', 3),
(28, 4, 'Pada proses glikolisis dari satu molekul glukosa dihasilkan 2 asam piruvat 2 NADH dan 2 \r\nATP. Selanjutnya, asam piruvat yang dihasilkan dari proses glikolisis akan memasuki tahap\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ujian_siswa`
--

CREATE TABLE IF NOT EXISTS `ujian_siswa` (
`id_ujian` int(10) NOT NULL,
  `nis` char(9) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian_siswa`
--

INSERT INTO `ujian_siswa` (`id_ujian`, `nis`, `date`) VALUES
(25, '141402039', '2017-03-08 14:30:48'),
(27, '141402039', '2017-03-10 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` enum('admin','siswa','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`) VALUES
('141402039', 'anakgaul', 'siswa'),
('123456789', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
 ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
 ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mapel_ujian_siswa`
--
ALTER TABLE `mapel_ujian_siswa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilihan_jawaban_ujian`
--
ALTER TABLE `pilihan_jawaban_ujian`
 ADD PRIMARY KEY (`id_pilihan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `ujian_siswa`
--
ALTER TABLE `ujian_siswa`
 ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
MODIFY `id_jawaban` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
MODIFY `id_mapel` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mapel_ujian_siswa`
--
ALTER TABLE `mapel_ujian_siswa`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `pilihan_jawaban_ujian`
--
ALTER TABLE `pilihan_jawaban_ujian`
MODIFY `id_pilihan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1051;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `id_soal` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ujian_siswa`
--
ALTER TABLE `ujian_siswa`
MODIFY `id_ujian` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
