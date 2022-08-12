/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 100424
Source Host           : localhost:3306
Source Database       : pendaftaran

Target Server Type    : MYSQL
Target Server Version : 100424
File Encoding         : 65001

Date: 2022-08-12 10:23:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for anak
-- ----------------------------
DROP TABLE IF EXISTS `anak`;
CREATE TABLE `anak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `jk` varchar(255) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of anak
-- ----------------------------
INSERT INTO `anak` VALUES ('3', 'a', '2134124', 'as', '2022-08-11', 'asda', 'P', 'abb77a2e2f99ecc5e4402bbf0b2f899d.png');
INSERT INTO `anak` VALUES ('4', 'v', '132', 'asd', '2022-08-10', 'saa', 'L', 'aa68a0a1df7b86e0e5fb7a0274462cee.png');

-- ----------------------------
-- Table structure for guru
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL DEFAULT '',
  `nama_berkas` varchar(255) NOT NULL DEFAULT '',
  `jk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of guru
-- ----------------------------
INSERT INTO `guru` VALUES ('1', 'a', 'asda', '2022-08-12', 'edcbef0e1831189baaf6ba020a51a32c.png', 'P');

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petugas
-- ----------------------------
INSERT INTO `petugas` VALUES ('12', '3507212311020001', 'admin', 'admin@mail.com', '$2y$10$nULd/z1s8oncsRHRcasg9eKHR084mKgwY7pYq3AI4vzAoYeEhO6qa', '700213f631505395e1599778aea3cbaf.png', '089666777999');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `telp` varchar(255) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
