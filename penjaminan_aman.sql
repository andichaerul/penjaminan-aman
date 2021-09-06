/*
 Navicat Premium Data Transfer

 Source Server         : Xamp725
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3307
 Source Schema         : penjaminan_aman

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 07/09/2021 07:22:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _table_template
-- ----------------------------
DROP TABLE IF EXISTS `_table_template`;
CREATE TABLE `_table_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_insert` datetime DEFAULT CURRENT_TIMESTAMP,
  `w_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `insert_by` varchar(225) DEFAULT NULL,
  `update_by` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of _table_template
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pengajuan_budget
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan_budget`;
CREATE TABLE `pengajuan_budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_insert` datetime DEFAULT CURRENT_TIMESTAMP,
  `w_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `insert_by` varchar(225) DEFAULT NULL,
  `update_by` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1= menunggu, 2= disetujui, 3 = di tolak',
  `budget_nominal` varchar(255) DEFAULT NULL,
  `req_deskripsi` varchar(255) DEFAULT NULL,
  `alasan_tolak` varchar(255) DEFAULT NULL,
  `tgl` date NOT NULL,
  `dilihat` enum('0','1') NOT NULL DEFAULT '0',
  `confirm_by` int(11) DEFAULT NULL,
  `dilihat_spv` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengajuan_budget
-- ----------------------------
BEGIN;
INSERT INTO `pengajuan_budget` VALUES (1, '2021-09-06 22:19:59', '2021-09-07 07:16:01', NULL, NULL, 1, '2', '10000', 'Perbaikan Komputer', '', '0000-00-00', '1', 2, 1);
INSERT INTO `pengajuan_budget` VALUES (2, '2021-09-06 22:33:22', '2021-09-07 07:21:24', NULL, NULL, 1, '2', '12000', 'Perbaikan Komputer', '', '0000-00-00', '1', 2, 1);
INSERT INTO `pengajuan_budget` VALUES (3, '2021-09-06 22:33:35', '2021-09-07 06:53:52', NULL, NULL, 1, '1', '15000', 'Perbaikan Komputer', '', '0000-00-00', '1', 1, 1);
INSERT INTO `pengajuan_budget` VALUES (4, '2021-09-06 22:33:41', '2021-09-07 06:43:57', NULL, NULL, 1, '1', '12000', 'Perbaikan Komputer', '', '0000-00-00', '1', 1, 1);
INSERT INTO `pengajuan_budget` VALUES (5, '2021-09-06 23:28:07', '2021-09-07 02:24:56', NULL, NULL, 1, '2', '12000', 'Test IT', '', '2021-09-06', '1', 1, 0);
INSERT INTO `pengajuan_budget` VALUES (6, '2021-09-06 23:29:44', '2021-09-07 02:25:00', NULL, NULL, 1, '2', '12000', 'Test Lagi', '', '2021-09-06', '1', 1, 0);
INSERT INTO `pengajuan_budget` VALUES (7, '2021-09-06 23:32:18', '2021-09-07 02:26:53', NULL, NULL, 1, '2', '120000', 'Perbaikan Komputer', '', '2021-09-06', '1', 1, 0);
INSERT INTO `pengajuan_budget` VALUES (8, '2021-09-07 02:26:05', '2021-09-07 06:53:39', NULL, NULL, 1, '2', '120000', 'Perjalan dinas ke cabang', '', '2021-09-06', '1', 2, 0);
INSERT INTO `pengajuan_budget` VALUES (9, '2021-09-07 07:07:56', NULL, NULL, NULL, 1, '1', '120000', 'Biaya parkir', NULL, '2021-09-07', '0', NULL, 0);
COMMIT;

-- ----------------------------
-- Table structure for user_profile
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_insert` datetime DEFAULT CURRENT_TIMESTAMP,
  `w_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `insert_by` varchar(225) DEFAULT NULL,
  `update_by` varchar(225) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
BEGIN;
INSERT INTO `user_profile` VALUES (1, '2021-09-06 21:16:15', '2021-09-06 23:31:43', NULL, NULL, 'Andi Chaerul', 1);
INSERT INTO `user_profile` VALUES (2, '2021-09-07 01:14:54', NULL, NULL, NULL, 'Andi Chaerul 2', 2);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_insert` datetime DEFAULT CURRENT_TIMESTAMP,
  `w_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `insert_by` varchar(225) DEFAULT NULL,
  `update_by` varchar(225) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, '2021-09-06 21:01:52', '2021-09-07 02:24:07', NULL, NULL, 'staf', '21232f297a57a5a743894a0e4a801fc3', 'staf');
INSERT INTO `users` VALUES (2, '2021-09-07 01:13:56', '2021-09-07 01:14:32', NULL, NULL, 'supervisor', '21232f297a57a5a743894a0e4a801fc3', 'supervisor');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
