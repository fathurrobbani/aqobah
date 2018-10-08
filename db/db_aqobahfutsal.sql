/*
SQLyog Ultimate
MySQL - 5.7.21 : Database - db_aqobahfutsal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `jadwal_lapangan` */

DROP TABLE IF EXISTS `jadwal_lapangan`;

CREATE TABLE `jadwal_lapangan` (
  `id_jadwallapangan` int(8) NOT NULL AUTO_INCREMENT,
  `tgl_sewa` date DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `durasi` varchar(10) DEFAULT NULL,
  `id_lapangan` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_jadwallapangan`),
  KEY `id_lapangan` (`id_lapangan`),
  CONSTRAINT `jadwal_lapangan_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal_lapangan` */

insert  into `jadwal_lapangan`(`id_jadwallapangan`,`tgl_sewa`,`jam_awal`,`jam_akhir`,`durasi`,`id_lapangan`) values 
(3,'2018-10-18','09:00:00','11:00:00','2',1);

/*Table structure for table `lapangan` */

DROP TABLE IF EXISTS `lapangan`;

CREATE TABLE `lapangan` (
  `id_lapangan` int(2) NOT NULL AUTO_INCREMENT,
  `kode_lapangan` varchar(10) DEFAULT NULL,
  `hrg_weekday07-12_umum` varchar(10) DEFAULT NULL,
  `hrg_weekday12-17_umum` varchar(10) DEFAULT NULL,
  `hrg_weekday17-24_umum` varchar(10) DEFAULT NULL,
  `hrg_weekend07-12_umum` varchar(10) DEFAULT NULL,
  `hrg_weekend12-17_umum` varchar(10) DEFAULT NULL,
  `hrg_weekend17-24_umum` varchar(10) DEFAULT NULL,
  `hrg_weekday07-12_member` varchar(10) DEFAULT NULL,
  `hrg_weekday12-17_member` varchar(10) DEFAULT NULL,
  `hrg_weekday17-24_member` varchar(10) DEFAULT NULL,
  `hrg_weekend07-12_member` varchar(10) DEFAULT NULL,
  `hrg_weekend12-17_member` varchar(10) DEFAULT NULL,
  `hrg_weekend17-24_member` varchar(10) DEFAULT NULL,
  `id_pengguna` int(8) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_lapangan`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `lapangan` */

insert  into `lapangan`(`id_lapangan`,`kode_lapangan`,`hrg_weekday07-12_umum`,`hrg_weekday12-17_umum`,`hrg_weekday17-24_umum`,`hrg_weekend07-12_umum`,`hrg_weekend12-17_umum`,`hrg_weekend17-24_umum`,`hrg_weekday07-12_member`,`hrg_weekday12-17_member`,`hrg_weekday17-24_member`,`hrg_weekend07-12_member`,`hrg_weekend12-17_member`,`hrg_weekend17-24_member`,`id_pengguna`,`ip_address`,`timestamp`) values 
(1,'LAP_01','10000','10000','10000','10000','10000','10000','10000','5000','10000','10000','10000','10000',1,'::1','2018-10-02 20:17:24');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_pengguna` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `namalevel` enum('admin','operator','member') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `ismember` enum('member','nonmember') DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL,
  `totalmain` int(2) DEFAULT NULL,
  `tgl_aktifmember` date DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`username`,`password`,`namalevel`,`email`,`alamat`,`foto`,`phone`,`ismember`,`status`,`totalmain`,`tgl_aktifmember`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin@admin.com','jogja',NULL,'081322224444','member','aktif',1,'2018-10-01'),
(8,'member1','c7764cfed23c5ca3bb393308a0da2306','member','member1@mail.com','pochinki','16f8fe6d20464ae114823775db0f1c70.PNG','131113133113','member','aktif',0,'2018-10-06'),
(9,'operator1','37832cda757792aef82ce5e21f542006','operator','operator1@mail.com','jogja','37fd5590978007c777687be6b6e37c7a.PNG','2414141241','member','aktif',0,'2018-10-06');

/*Table structure for table `postingan` */

DROP TABLE IF EXISTS `postingan`;

CREATE TABLE `postingan` (
  `id_postingan` int(8) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `subjudul` varchar(50) DEFAULT NULL,
  `isi` varchar(1000) DEFAULT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `id_pengguna` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_postingan`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `postingan` */

/*Table structure for table `transaksi_lapangan` */

DROP TABLE IF EXISTS `transaksi_lapangan`;

CREATE TABLE `transaksi_lapangan` (
  `id_detailtransaksilap` int(8) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(8) DEFAULT NULL,
  `id_jadwal` int(2) DEFAULT NULL,
  `tot_bayar` varchar(20) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  PRIMARY KEY (`id_detailtransaksilap`),
  KEY `id_lapangan` (`id_jadwal`),
  KEY `transaksi_lapangan_ibfk_1` (`id_pengguna`),
  CONSTRAINT `transaksi_lapangan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_lapangan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_lapangan` (`id_jadwallapangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_lapangan` */

insert  into `transaksi_lapangan`(`id_detailtransaksilap`,`id_pengguna`,`id_jadwal`,`tot_bayar`,`ip_address`,`tgl_transaksi`) values 
(3,8,3,'20000','::1','2018-10-02');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
