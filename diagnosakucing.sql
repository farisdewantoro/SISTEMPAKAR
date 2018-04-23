-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.30-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for diagnosakucing
CREATE DATABASE IF NOT EXISTS `diagnosakucing` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `diagnosakucing`;


-- Dumping structure for table diagnosakucing.rekappenyakit
CREATE TABLE IF NOT EXISTS `rekappenyakit` (
  `Norekap` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `KodePertanyaan` varchar(11) DEFAULT NULL,
  `Pertanyaan` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time DEFAULT NULL,
  PRIMARY KEY (`Norekap`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.rekappenyakit: ~9 rows (approximately)
/*!40000 ALTER TABLE `rekappenyakit` DISABLE KEYS */;
INSERT INTO `rekappenyakit` (`Norekap`, `username`, `KodePertanyaan`, `Pertanyaan`, `Tanggal`, `Waktu`) VALUES
	(3, 'faris', 'T0001', 'ads', '0000-00-00', NULL),
	(5, 'farisdewant', ' T0001 ', ' Apakah anda merasa demam? ', '0000-00-00', '01:40:45'),
	(6, 'farisdewant', ' T0001 ', ' Apakah anda merasa demam? ', '2018-04-07', '01:45:00'),
	(7, 'farisdewantoro', ' T0001 ', ' Apakah anda merasa demam? ', '2018-04-07', '01:47:43'),
	(8, 'farisdewantoro', ' T0003 ', ' Apakah anda merasa konjugtivitas? ', '2018-04-07', '01:47:52'),
	(9, 'farisdewantoro', ' T0004 ', ' Apakah hidung anda ingusan? ', '2018-04-07', '01:48:50'),
	(10, 'farisdewantoro', ' T0001 ', ' Apakah anda merasa demam? ', '2018-04-07', '01:50:47'),
	(11, 'farisdewantoro', ' T0001 ', ' Apakah anda merasa demam? ', '2018-04-07', '01:51:38'),
	(12, 'farisdewantoro', ' T0001 ', ' Apakah anda merasa demam? ', '2018-04-07', '01:54:24'),
	(13, 'farisdewantoro', ' T0003 ', ' Apakah anda merasa konjugtivitas? ', '2018-04-07', '01:59:45');
/*!40000 ALTER TABLE `rekappenyakit` ENABLE KEYS */;


-- Dumping structure for table diagnosakucing.riwayatjawaban
CREATE TABLE IF NOT EXISTS `riwayatjawaban` (
  `noRjawaban` int(11) NOT NULL AUTO_INCREMENT,
  `kodePertanyaan` varchar(6) NOT NULL,
  `Pertanyaan` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `jawaban` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`noRjawaban`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.riwayatjawaban: ~0 rows (approximately)
/*!40000 ALTER TABLE `riwayatjawaban` DISABLE KEYS */;
INSERT INTO `riwayatjawaban` (`noRjawaban`, `kodePertanyaan`, `Pertanyaan`, `Tanggal`, `Waktu`, `username`, `jawaban`) VALUES
	(24, 'T0001', 'Apakah anda merasa demam?', '2018-04-23', '04:42:57', 'farisdewantoro', 'YA');
/*!40000 ALTER TABLE `riwayatjawaban` ENABLE KEYS */;


-- Dumping structure for table diagnosakucing.tabelgejala
CREATE TABLE IF NOT EXISTS `tabelgejala` (
  `NoGejala` int(11) NOT NULL AUTO_INCREMENT,
  `KodeGejala` char(7) NOT NULL,
  `NamaGejala` char(23) NOT NULL,
  PRIMARY KEY (`NoGejala`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.tabelgejala: ~11 rows (approximately)
/*!40000 ALTER TABLE `tabelgejala` DISABLE KEYS */;
INSERT INTO `tabelgejala` (`NoGejala`, `KodeGejala`, `NamaGejala`) VALUES
	(1, 'G0001\r\n', 'Demam'),
	(2, 'G0002', 'Batuk'),
	(3, 'G0003', 'Konjungtivitas'),
	(4, 'G0004', 'Ingusan'),
	(5, 'G0005', 'Kulit Berbintik'),
	(6, 'G0006', 'Sakit Kepala'),
	(7, 'G0007\r\n', 'Pegal-Pegal'),
	(8, 'G0008', 'Kedinginan'),
	(9, 'G0009', 'Sakit Tenggorokan'),
	(10, 'G0010', 'Bersin-bersin'),
	(11, 'G0011', 'Pembekakan Kelenjar');
/*!40000 ALTER TABLE `tabelgejala` ENABLE KEYS */;


-- Dumping structure for table diagnosakucing.tabelpenyakit
CREATE TABLE IF NOT EXISTS `tabelpenyakit` (
  `NoPenyakit` int(11) NOT NULL AUTO_INCREMENT,
  `KodePenyakit` varchar(6) NOT NULL,
  `NamaPenyakit` varchar(25) DEFAULT NULL,
  `Deskripsi` text,
  PRIMARY KEY (`NoPenyakit`),
  UNIQUE KEY `NamaPenyakit` (`NamaPenyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.tabelpenyakit: ~7 rows (approximately)
/*!40000 ALTER TABLE `tabelpenyakit` DISABLE KEYS */;
INSERT INTO `tabelpenyakit` (`NoPenyakit`, `KodePenyakit`, `NamaPenyakit`, `Deskripsi`) VALUES
	(1, 'P0001', 'Campak', NULL),
	(2, 'P0002', 'Campak Jerman', NULL),
	(3, 'P0003', 'Flu', NULL),
	(4, 'P0004', 'Pilek', NULL),
	(5, 'P0005', 'Gondongan', NULL),
	(6, 'P0006', 'Cacar air', NULL),
	(7, 'P0007', 'Batuk Rejan', NULL);
/*!40000 ALTER TABLE `tabelpenyakit` ENABLE KEYS */;


-- Dumping structure for table diagnosakucing.tabelpertanyaan
CREATE TABLE IF NOT EXISTS `tabelpertanyaan` (
  `NoPertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `NamaGejala` char(23) NOT NULL,
  `KodePertanyaan` varchar(6) NOT NULL,
  `Pertanyaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NoPertanyaan`),
  UNIQUE KEY `KodePertanyaan` (`KodePertanyaan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.tabelpertanyaan: ~11 rows (approximately)
/*!40000 ALTER TABLE `tabelpertanyaan` DISABLE KEYS */;
INSERT INTO `tabelpertanyaan` (`NoPertanyaan`, `NamaGejala`, `KodePertanyaan`, `Pertanyaan`) VALUES
	(1, 'Demam', 'T0001', 'Apakah anda merasa demam?'),
	(2, 'Batuk-batuk', 'T0002', 'Apakah anda menderita batuk-batuk?'),
	(3, 'Konjugtivitas', 'T0003', 'Apakah anda merasa konjugtivitas?'),
	(4, 'Ingusan', 'T0004', 'Apakah hidung anda ingusan?'),
	(5, 'Berbintik Merah', 'T0005', 'Apakah kulit anda berbintik merah?'),
	(6, 'Sakit Kepala', 'T0006', 'Apakah anda merasa sakit kepala?'),
	(7, 'Pegal-Pegal', 'T0007', 'Apakah anda merasa pegal-pegal?'),
	(8, 'Kedinginan', 'T0008', 'Apakah anda merasa kedinginan?'),
	(9, 'Sakit Tenggorokan', 'T0009', 'Apakah anda merasa sakit tenggorokan?'),
	(10, 'Bersin-bersin', 'T0010', 'Apakah anda mengalami bersin-bersin?'),
	(11, 'Pembengkakan Kelenjar', 'T0011', 'Apakah anda merasa ada pembengkakan kelenjar?');
/*!40000 ALTER TABLE `tabelpertanyaan` ENABLE KEYS */;


-- Dumping structure for table diagnosakucing.tabelrule
CREATE TABLE IF NOT EXISTS `tabelrule` (
  `NoRule` int(11) NOT NULL AUTO_INCREMENT,
  `KodeRule` varchar(6) NOT NULL,
  `KodePertanyaan` varchar(50) DEFAULT NULL,
  `kodepenyakit` varchar(6) DEFAULT NULL,
  `NamaPenyakit` varchar(25) NOT NULL,
  PRIMARY KEY (`NoRule`),
  UNIQUE KEY `KodeRule` (`KodeRule`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.tabelrule: ~7 rows (approximately)
/*!40000 ALTER TABLE `tabelrule` DISABLE KEYS */;
INSERT INTO `tabelrule` (`NoRule`, `KodeRule`, `KodePertanyaan`, `kodepenyakit`, `NamaPenyakit`) VALUES
	(1, 'R0001', 'T0001,T0002,T0003,T0004,T0005', 'P0001', 'Campak'),
	(2, 'R0002', 'T0001,T0004,T0005,T0006', 'P0002', 'Campak Jerman'),
	(3, 'R0003', 'T0001,T0002,T0003,T0004,T0006,T0007,T0008,T0009', 'P0003', 'Flu'),
	(4, 'R0004', 'T0004,T0006,T0008,T0009,T0010', 'P0004', 'Pilek'),
	(5, 'R0005', 'T0001,T0011', 'P0005', 'Gondongan'),
	(6, 'R0006', 'T0001,T0005,T0007,T0008', 'P0006', 'Cacar air'),
	(7, 'R0007', 'T0002,T0004,T0010', 'P0007', 'Batuk Rejan');
/*!40000 ALTER TABLE `tabelrule` ENABLE KEYS */;


-- Dumping structure for table diagnosakucing.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table diagnosakucing.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `nama`, `alamat`, `email`, `password`, `deskripsi`) VALUES
	(1, 'farisdewantoro', 'faris   ', ' Komplek Antapanimas Bandung ', 'farisdewantoro@yahoo', 'faris', 'lallalala'),
	(2, 'tes', 'tes  ', 'd', 'fafafaf@yahoo.com', 'tes', 'asfsafafafasf');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
