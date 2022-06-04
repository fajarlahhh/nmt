/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80023
 Source Host           : localhost:3306
 Source Schema         : nicemetavest

 Target Server Type    : MySQL
 Target Server Version : 80023
 File Encoding         : 65001

 Date: 04/06/2022 15:12:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for balance
-- ----------------------------
DROP TABLE IF EXISTS `balance`;
CREATE TABLE `balance`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `debit` decimal(20, 5) NULL DEFAULT NULL,
  `credit` decimal(20, 5) NULL DEFAULT NULL,
  `user_id` bigint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of balance
-- ----------------------------
INSERT INTO `balance` VALUES (1, 'Deposit', 0.00000, 3000.00100, 2, '2022-05-03 00:00:00', '2022-05-03 00:00:00', NULL);
INSERT INTO `balance` VALUES (24, 'Enrollment contract 100 username james1', 103.44900, 0.00000, 2, '2022-06-04 05:19:51', '2022-06-04 05:19:51', NULL);
INSERT INTO `balance` VALUES (25, 'Renewal contract 1,000 username ', 1034.48400, 0.00000, 2, '2022-06-04 06:36:38', '2022-06-04 06:36:38', NULL);

SET FOREIGN_KEY_CHECKS = 1;
