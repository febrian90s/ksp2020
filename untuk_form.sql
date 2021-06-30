/*
 Navicat Premium Data Transfer

 Source Server         : koneksi-php
 Source Server Type    : MySQL
 Source Server Version : 50141
 Source Host           : localhost:3306
 Source Schema         : untuk_form

 Target Server Type    : MySQL
 Target Server Version : 50141
 File Encoding         : 65001

 Date: 28/06/2021 00:56:54
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_login
-- ----------------------------
DROP TABLE IF EXISTS `data_login`;
CREATE TABLE `data_login`  (
  `id_login` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_login`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_login
-- ----------------------------
INSERT INTO `data_login` VALUES (1, 'admin01', 'admin', 'Admin');

-- ----------------------------
-- Table structure for tb_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota`;
CREATE TABLE `tb_anggota`  (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pengurus` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES (1, 'Muhammad', 'Laki-Laki', 'Jl.pendidikan no.23', 'Praya', '082339921840', 'halloadmin@gmail.com', 'Iya');
INSERT INTO `tb_anggota` VALUES (2, 'Ali', 'Laki-Laki', 'Jl.ngurah no.4', 'Denpasar', '089323457780', 'hilal45@gmail.com', 'Tidak');
INSERT INTO `tb_anggota` VALUES (3, 'Eibim', 'Laki-Laki', 'jl.Nose no.24', 'Praya', '088123456789', 'hhahah@gmail.com', 'Iya');
INSERT INTO `tb_anggota` VALUES (8, 'Robin', 'Laki-Laki', '            Jl.tukad petanu no.26 Petanu Residence          ', 'Denpasar', '085964125524', 'robinhoode@gmail.com', 'Tidak');
INSERT INTO `tb_anggota` VALUES (7, 'Febrian', 'Laki-Laki', '            Jl.simpang manja no.19', 'Praya Tengah', '085964125542', 'febrian19@gmail.com', 'Iya');

-- ----------------------------
-- Table structure for tb_bayar
-- ----------------------------
DROP TABLE IF EXISTS `tb_bayar`;
CREATE TABLE `tb_bayar`  (
  `id_bayar` int(11) NOT NULL,
  `id_pinjaman` int(11) NULL DEFAULT NULL,
  `tangal` date NULL DEFAULT NULL,
  `angsuran` int(11) NULL DEFAULT NULL,
  `jumlah_bayar` double NULL DEFAULT NULL,
  `keterangan` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_bayar`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_bayar
-- ----------------------------

-- ----------------------------
-- Table structure for tb_jenis
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis`;
CREATE TABLE `tb_jenis`  (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` int(32) NULL DEFAULT NULL,
  `keterangan` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jenis
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `tb_pinjaman`;
CREATE TABLE `tb_pinjaman`  (
  `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `id_anggota` int(11) NULL DEFAULT NULL,
  `jumlah` double NULL DEFAULT NULL,
  `bunga` double NULL DEFAULT NULL,
  `jangka_waktu` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kondisi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pinjaman`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pinjaman
-- ----------------------------
INSERT INTO `tb_pinjaman` VALUES (1, '2021-06-30', 2, 1000000, 2500000, 'Sebulan', '-', 'Belum');
INSERT INTO `tb_pinjaman` VALUES (3, '2021-06-30', 7, 10000000, 25000, 'Sebulan', '-', 'Belum');

-- ----------------------------
-- Table structure for tb_simpanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan`;
CREATE TABLE `tb_simpanan`  (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `nama` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` int(20) NULL DEFAULT NULL,
  `keterangan` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_simpanan`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_simpanan
-- ----------------------------
INSERT INTO `tb_simpanan` VALUES (1, '2021-06-22', 'Eibim', 'Pokok', 1000000, '-');
INSERT INTO `tb_simpanan` VALUES (2, '2021-06-02', '', 'Pokok', 5000000, '-');

SET FOREIGN_KEY_CHECKS = 1;
