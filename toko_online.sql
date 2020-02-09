# Host: localhost  (Version 5.5.5-10.4.8-MariaDB)
# Date: 2020-01-27 22:13:13
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tb_barang"
#

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(8) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "tb_barang"
#

INSERT INTO `tb_barang` VALUES (1,'Sepatu','Sepatu merk all stars',2,350000,53,'sepatu.jpg'),(2,'Kamera','Kamera canon eos 700d',1,5900000,8,'kamera.jpg'),(3,'Samsung Galaxy A20','Samsung Galaxy A20',1,4000000,99,'hp.jpg'),(4,'Laptop Asus','Laptop Asus Ram 2 GB',1,4500000,40,'laptop.jpg'),(5,'Pensil','bagus',11,10000,500,'8553633346f0a3e500426bb69f08fd69--cone-de-l-pis-caneta-by-vexels.png'),(6,'Printer','Mahal',1,3510000,54,'printer1.png'),(7,'Laci','Laci Kayu Jati dan Duatingkat',12,250000,250,'bmbjbgv.jpg'),(8,'abdulloh','asd',1,123,1,'Koala.jpg');

#
# Structure for table "tb_invoice"
#

DROP TABLE IF EXISTS `tb_invoice`;
CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_invoice"
#

INSERT INTO `tb_invoice` VALUES (1,'asd','asd','2019-11-12 00:25:15','2019-11-13 00:25:15'),(2,'yuda','jl. asdsad kela dsd kec dadsjnd kota dafhbkakjlkjk','2019-11-13 16:37:14','2019-11-14 16:37:14'),(3,'fffft','jl ffftftftftfttftf','2019-11-13 17:46:19','2019-11-14 17:46:19'),(7,'hhh','jl sdjhhfhhdifdjkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj','2019-11-14 01:04:40','2019-11-15 01:04:40'),(8,'rhy','re','2019-11-25 12:52:41','2019-11-26 12:52:41'),(9,'rhy','re','2019-11-25 12:53:12','2019-11-26 12:53:12'),(17,'satrio','cimanggis','2019-12-02 17:50:17','2019-12-03 17:50:17'),(18,'dsa','asdadad','2019-12-05 09:05:33','2019-12-06 09:05:33'),(19,'asdd','asdaj','2019-12-05 11:03:28','2019-12-06 11:03:28'),(20,'Anggi Kinanti','jl ffftftftftfttftf','2019-12-05 11:06:28','2019-12-06 11:06:28'),(21,'satrio pea','cimanggis raya bebek','2019-12-05 11:25:17','2019-12-06 11:25:17'),(22,'sadsadaf','aefafa','2019-12-05 13:00:51','2019-12-06 13:00:51'),(23,'asdsad','sadasd','2019-12-05 13:01:33','2019-12-06 13:01:33'),(24,'sdad','asdf','2019-12-05 13:10:01','2019-12-06 13:10:01'),(25,'sadsad','asd','2019-12-05 13:13:54','2019-12-06 13:13:54'),(26,'sadsad','asd','2019-12-05 13:17:19','2019-12-06 13:17:19'),(27,'bu dewi','jala','2019-12-05 13:32:33','2019-12-06 13:32:33');

#
# Structure for table "tb_kategori"
#

DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_kategori"
#

INSERT INTO `tb_kategori` VALUES (1,'Elektronik'),(2,'Pakaian Pria'),(3,'Pakaian Wanita'),(4,'Pakaian Anak'),(5,'Peralatan Olahraga'),(6,'Aksesoris Pria'),(8,'Aksesoris Wanita'),(11,'Alat Tulis'),(12,'Perlengkapan Rumah');

#
# Structure for table "tb_pesanan"
#

DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `pilihan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_pesanan"
#

INSERT INTO `tb_pesanan` VALUES (1,1,3,'Samsung Galaxy A20',1,3400000,''),(2,1,2,'Kamera',1,5900000,''),(3,1,1,'Sepatu',1,350000,''),(4,2,1,'Sepatu',1,350000,''),(5,2,4,'Laptop Asus',3,4500000,''),(6,3,4,'Laptop Asus',1,4500000,''),(7,3,1,'Sepatu',2,350000,''),(8,3,2,'Kamera',1,5900000,''),(9,3,3,'Samsung Galaxy A20',3,3400000,''),(10,4,2,'Kamera',1,5900000,''),(11,5,3,'Samsung Galaxy A20',1,3400000,''),(12,6,1,'Sepatu',1,350000,''),(13,7,3,'Samsung Galaxy A20',2,3400000,''),(14,7,2,'Kamera',1,5900000,''),(15,8,1,'Sepatu',1,350000,''),(16,10,4,'Laptop Asus',1,4500000,''),(17,10,3,'Samsung Galaxy A20',2,3400000,''),(18,10,2,'Kamera',1,5900000,''),(19,11,3,'Samsung Galaxy A20',1,3400000,''),(20,17,3,'Samsung Galaxy A20',1,3400000,''),(21,18,3,'Samsung Galaxy A20',1,4000000,''),(22,19,1,'Sepatu',1,350000,''),(23,19,4,'Laptop Asus',1,4500000,''),(24,19,3,'Samsung Galaxy A20',1,4000000,''),(25,20,5,'Pensil',1,10000,''),(26,21,7,'Laci',1,250000,''),(27,22,8,'abdulloh',1,123,''),(28,23,1,'Sepatu',1,350000,''),(31,26,1,'Sepatu',2,350000,''),(32,27,3,'Samsung Galaxy A20',1,4000000,''),(33,27,6,'Printer',1,3510000,'');

#
# Structure for table "tb_user"
#

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `role_id` int(3) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_user"
#

INSERT INTO `tb_user` VALUES (1,'Iqbal Maulana','iqbal','$2y$10$BqrqpC1Yr/rsIeXvZwNfau4XNT8cChbRbtsdX0UPATTnleEnzKPyG','default.png',1,1573893019),(2,'Naufal','naufal','$2y$10$XIy200BRo3VkpZ9Kvk9/f.RIeYy5acJwYCZTaAo.H4oQsLs7WEs.6','default.png',2,1573893045),(3,'Satrio','satrio','$2y$10$xRpZG1npHGl.9rQY51SHveqnazW4TJYODao5ICuBPbNjkzfIwtP5m','default.png',2,1573893074),(4,'Achmad abimayu','abimayu','$2y$10$wZdE4tNR9WtsJJW0ENgRRumhkf46ew4Fcp7leBwB1L1Bumu5exEaq','default.png',2,1574661112);

#
# Structure for table "tb_user_role"
#

DROP TABLE IF EXISTS `tb_user_role`;
CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_user_role"
#

INSERT INTO `tb_user_role` VALUES (1,'Admin'),(2,'User');

#
# Trigger "pesanan_penjualan"
#

DROP TRIGGER IF EXISTS `pesanan_penjualan`;
toko_online
