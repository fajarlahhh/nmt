/*
 Navicat MySQL Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : nicemetavest

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 03/06/2022 16:08:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for achievement
-- ----------------------------
DROP TABLE IF EXISTS `achievement`;
CREATE TABLE `achievement`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `value` int(11) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operator_id` bigint(20) NULL DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `achievement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of achievement
-- ----------------------------

-- ----------------------------
-- Table structure for authentication_log
-- ----------------------------
DROP TABLE IF EXISTS `authentication_log`;
CREATE TABLE `authentication_log`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `authenticatable_id` bigint(20) NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `authentication_log_authenticatable_type_authenticatable_id_index`(`authenticatable_type`, `authenticatable_id`) USING BTREE,
  INDEX `authenticatable_id`(`authenticatable_id`) USING BTREE,
  CONSTRAINT `authentication_log_ibfk_1` FOREIGN KEY (`authenticatable_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 375 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of authentication_log
-- ----------------------------
INSERT INTO `authentication_log` VALUES (1, 'App\\Models\\User', 2, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 09:14:24', '2022-04-16 09:15:41');
INSERT INTO `authentication_log` VALUES (2, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 09:15:30', NULL);
INSERT INTO `authentication_log` VALUES (4, 'App\\Models\\User', 1, '36.85.100.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/100.0.4896.77 Mobile/15E148 Safari/604.1', '2022-04-16 09:17:19', NULL);
INSERT INTO `authentication_log` VALUES (13, 'App\\Models\\User', 1, '36.85.100.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:08:39', NULL);
INSERT INTO `authentication_log` VALUES (17, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 10:14:08', NULL);
INSERT INTO `authentication_log` VALUES (27, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 12:27:20', '2022-04-16 12:27:42');
INSERT INTO `authentication_log` VALUES (28, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 12:28:43', '2022-04-16 12:29:12');
INSERT INTO `authentication_log` VALUES (29, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 12:29:30', '2022-04-16 12:30:11');
INSERT INTO `authentication_log` VALUES (30, 'App\\Models\\User', 2, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 12:30:19', '2022-04-16 12:31:28');
INSERT INTO `authentication_log` VALUES (31, 'App\\Models\\User', 2, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 12:31:38', '2022-04-16 13:19:58');
INSERT INTO `authentication_log` VALUES (37, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 13:28:58', '2022-04-16 13:30:29');
INSERT INTO `authentication_log` VALUES (41, 'App\\Models\\User', 1, '36.85.100.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/100.0.4896.77 Mobile/15E148 Safari/604.1', '2022-04-16 17:30:18', NULL);
INSERT INTO `authentication_log` VALUES (47, 'App\\Models\\User', 1, '110.136.218.33', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-17 02:51:50', '2022-04-17 02:52:34');
INSERT INTO `authentication_log` VALUES (53, 'App\\Models\\User', 1, '114.122.164.153', 'Mozilla/5.0 (Linux; Android 12; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-17 10:54:24', '2022-04-17 11:44:29');
INSERT INTO `authentication_log` VALUES (54, 'App\\Models\\User', 1, '203.78.121.44', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/100.0.4896.85 Mobile/15E148 Safari/604.1', '2022-04-17 11:03:12', NULL);
INSERT INTO `authentication_log` VALUES (55, 'App\\Models\\User', 1, '114.122.164.153', 'Mozilla/5.0 (Linux; Android 12; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-17 11:47:21', NULL);
INSERT INTO `authentication_log` VALUES (61, 'App\\Models\\User', 2, '36.75.168.239', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', '2022-04-18 06:50:45', '2022-04-18 06:51:15');
INSERT INTO `authentication_log` VALUES (63, 'App\\Models\\User', 2, '36.75.168.239', 'Mozilla/5.0 (Linux; Android 12; CPH2159 Build/SKQ1.210216.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-18 07:07:02', NULL);
INSERT INTO `authentication_log` VALUES (64, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-18 07:09:07', '2022-04-18 07:10:48');
INSERT INTO `authentication_log` VALUES (65, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 07:09:28', '2022-04-18 08:04:33');
INSERT INTO `authentication_log` VALUES (69, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 08:06:32', '2022-04-18 08:07:26');
INSERT INTO `authentication_log` VALUES (71, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-18 08:16:08', '2022-04-18 08:16:56');
INSERT INTO `authentication_log` VALUES (72, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 08:17:14', '2022-04-18 08:17:18');
INSERT INTO `authentication_log` VALUES (74, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 08:17:37', '2022-04-18 08:18:19');
INSERT INTO `authentication_log` VALUES (75, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 08:18:33', '2022-04-18 08:19:29');
INSERT INTO `authentication_log` VALUES (77, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-18 08:32:17', '2022-04-18 08:33:13');
INSERT INTO `authentication_log` VALUES (83, 'App\\Models\\User', 2, '2401:4900:4ccf:404a:47af:4703:2722:dbdc', 'Mozilla/5.0 (Linux; Android 12; Pixel 4a Build/SP2A.220305.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-19 05:01:43', NULL);
INSERT INTO `authentication_log` VALUES (84, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-19 05:05:12', NULL);
INSERT INTO `authentication_log` VALUES (89, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-19 09:51:29', '2022-04-19 09:52:21');
INSERT INTO `authentication_log` VALUES (96, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-20 03:37:41', NULL);
INSERT INTO `authentication_log` VALUES (102, 'App\\Models\\User', 1, '140.213.150.137', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-20 10:22:33', NULL);
INSERT INTO `authentication_log` VALUES (103, 'App\\Models\\User', 1, '140.213.150.137', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-20 17:31:06', NULL);
INSERT INTO `authentication_log` VALUES (109, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-21 04:11:42', '2022-04-21 04:16:21');
INSERT INTO `authentication_log` VALUES (112, 'App\\Models\\User', 1, '112.215.219.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0', '2022-04-21 08:53:43', NULL);
INSERT INTO `authentication_log` VALUES (118, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 03:51:35', '2022-04-22 03:52:27');
INSERT INTO `authentication_log` VALUES (119, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 03:52:34', '2022-04-22 03:52:37');
INSERT INTO `authentication_log` VALUES (120, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 03:52:49', '2022-04-22 04:08:49');
INSERT INTO `authentication_log` VALUES (121, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 04:09:06', '2022-04-22 04:25:37');
INSERT INTO `authentication_log` VALUES (122, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 04:25:53', '2022-04-22 04:40:09');
INSERT INTO `authentication_log` VALUES (123, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 04:40:20', '2022-04-22 12:18:06');
INSERT INTO `authentication_log` VALUES (124, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 06:08:57', '2022-04-22 06:17:29');
INSERT INTO `authentication_log` VALUES (126, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 06:17:41', '2022-04-22 06:19:39');
INSERT INTO `authentication_log` VALUES (129, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 06:19:58', '2022-04-22 06:27:39');
INSERT INTO `authentication_log` VALUES (137, 'App\\Models\\User', 1, '203.78.121.132', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-22 09:12:00', NULL);
INSERT INTO `authentication_log` VALUES (139, 'App\\Models\\User', 1, '140.213.126.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 09:20:19', NULL);
INSERT INTO `authentication_log` VALUES (140, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 09:20:52', '2022-04-22 09:21:56');
INSERT INTO `authentication_log` VALUES (143, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 09:22:19', NULL);
INSERT INTO `authentication_log` VALUES (146, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', NULL, '2022-04-22 09:36:32');
INSERT INTO `authentication_log` VALUES (147, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 09:37:14', '2022-04-22 09:47:08');
INSERT INTO `authentication_log` VALUES (150, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 09:47:25', NULL);
INSERT INTO `authentication_log` VALUES (159, 'App\\Models\\User', 1, '140.213.126.121', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', NULL, '2022-04-22 11:25:56');
INSERT INTO `authentication_log` VALUES (160, 'App\\Models\\User', 2, '140.213.126.121', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 11:26:12', NULL);
INSERT INTO `authentication_log` VALUES (165, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 12:18:13', NULL);
INSERT INTO `authentication_log` VALUES (180, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-23 11:47:44', '2022-04-23 11:51:38');
INSERT INTO `authentication_log` VALUES (183, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-23 11:51:49', NULL);
INSERT INTO `authentication_log` VALUES (185, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-23 17:43:20', NULL);
INSERT INTO `authentication_log` VALUES (188, 'App\\Models\\User', 2, '110.136.151.239', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-24 00:32:13', '2022-04-24 00:32:27');
INSERT INTO `authentication_log` VALUES (190, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 02:48:09', '2022-04-24 02:48:52');
INSERT INTO `authentication_log` VALUES (191, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 02:49:01', '2022-04-24 02:49:39');
INSERT INTO `authentication_log` VALUES (192, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 02:49:45', '2022-04-24 02:50:28');
INSERT INTO `authentication_log` VALUES (193, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 02:51:05', '2022-04-24 02:51:47');
INSERT INTO `authentication_log` VALUES (195, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 02:57:54', NULL);
INSERT INTO `authentication_log` VALUES (203, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-25 03:11:48', '2022-04-25 03:12:41');
INSERT INTO `authentication_log` VALUES (204, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-25 03:12:56', '2022-04-25 03:13:25');
INSERT INTO `authentication_log` VALUES (205, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-25 03:35:11', '2022-04-25 03:38:13');
INSERT INTO `authentication_log` VALUES (217, 'App\\Models\\User', 2, '140.213.151.96', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-26 03:30:24', '2022-04-26 03:33:00');
INSERT INTO `authentication_log` VALUES (219, 'App\\Models\\User', 1, '140.213.151.96', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-26 03:33:17', '2022-04-26 03:33:36');
INSERT INTO `authentication_log` VALUES (220, 'App\\Models\\User', 2, '140.213.151.96', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-26 03:33:47', NULL);
INSERT INTO `authentication_log` VALUES (228, 'App\\Models\\User', 1, '110.136.216.147', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-26 13:43:49', NULL);
INSERT INTO `authentication_log` VALUES (242, 'App\\Models\\User', 1, '112.215.220.89', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-28 03:36:30', NULL);
INSERT INTO `authentication_log` VALUES (255, 'App\\Models\\User', 1, '203.78.121.71', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-28 12:33:19', NULL);
INSERT INTO `authentication_log` VALUES (263, 'App\\Models\\User', 1, '110.136.216.147', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-29 03:20:56', NULL);
INSERT INTO `authentication_log` VALUES (282, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.41 Mobile Safari/537.36', '2022-05-03 04:06:03', NULL);
INSERT INTO `authentication_log` VALUES (286, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.41 Mobile Safari/537.36', '2022-05-03 20:09:06', NULL);
INSERT INTO `authentication_log` VALUES (287, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-05-03 23:10:03', NULL);
INSERT INTO `authentication_log` VALUES (288, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-05-04 06:30:51', '2022-05-04 06:31:45');
INSERT INTO `authentication_log` VALUES (298, 'App\\Models\\User', 1, '110.136.218.3', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.41 Mobile Safari/537.36', '2022-05-05 22:49:01', NULL);
INSERT INTO `authentication_log` VALUES (299, 'App\\Models\\User', 1, '110.136.218.3', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-05-05 22:49:02', NULL);
INSERT INTO `authentication_log` VALUES (306, 'App\\Models\\User', 1, '110.136.218.3', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-05-08 00:43:19', NULL);
INSERT INTO `authentication_log` VALUES (308, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-23 07:22:36', NULL);
INSERT INTO `authentication_log` VALUES (309, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-23 21:51:33', '2022-05-23 21:51:43');
INSERT INTO `authentication_log` VALUES (310, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Mobile Safari/537.36', '2022-05-23 21:52:21', '2022-05-23 21:52:25');
INSERT INTO `authentication_log` VALUES (311, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Mobile Safari/537.36', '2022-05-23 21:52:52', NULL);
INSERT INTO `authentication_log` VALUES (312, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2022-05-23 22:13:35');
INSERT INTO `authentication_log` VALUES (313, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-23 22:13:38', '2022-05-23 23:29:18');
INSERT INTO `authentication_log` VALUES (314, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-23 23:34:05', NULL);
INSERT INTO `authentication_log` VALUES (315, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-24 19:46:39', '2022-05-24 22:38:51');
INSERT INTO `authentication_log` VALUES (316, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-24 22:42:21', '2022-05-24 22:42:25');
INSERT INTO `authentication_log` VALUES (317, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-24 22:42:37', '2022-05-24 22:46:40');
INSERT INTO `authentication_log` VALUES (318, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-24 22:49:35', NULL);
INSERT INTO `authentication_log` VALUES (319, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-25 02:09:44', NULL);
INSERT INTO `authentication_log` VALUES (320, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-25 08:12:33', NULL);
INSERT INTO `authentication_log` VALUES (321, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-25 08:42:31', NULL);
INSERT INTO `authentication_log` VALUES (322, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.62 Safari/537.36', '2022-05-26 20:53:45', NULL);
INSERT INTO `authentication_log` VALUES (323, 'App\\Models\\User', 2, '112.78.38.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.62 Safari/537.36', '2022-05-26 22:47:39', NULL);
INSERT INTO `authentication_log` VALUES (324, 'App\\Models\\User', 2, '203.78.114.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36', '2022-05-27 09:18:51', NULL);
INSERT INTO `authentication_log` VALUES (325, 'App\\Models\\User', 2, '203.78.114.129', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-27 09:19:12', NULL);
INSERT INTO `authentication_log` VALUES (326, 'App\\Models\\User', 2, '112.215.220.51', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', NULL, '2022-05-27 09:47:53');
INSERT INTO `authentication_log` VALUES (328, 'App\\Models\\User', 2, '140.213.151.85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2022-05-27 09:50:12');
INSERT INTO `authentication_log` VALUES (331, 'App\\Models\\User', 2, '112.215.220.51', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-27 09:53:42', NULL);
INSERT INTO `authentication_log` VALUES (332, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', NULL, '2022-05-29 09:33:04');
INSERT INTO `authentication_log` VALUES (333, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 09:33:16', '2022-05-29 09:40:27');
INSERT INTO `authentication_log` VALUES (334, 'App\\Models\\User', 1, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 09:33:32', '2022-05-29 11:00:41');
INSERT INTO `authentication_log` VALUES (336, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 09:42:24', '2022-05-29 09:43:24');
INSERT INTO `authentication_log` VALUES (338, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-05-29 09:43:54', NULL);
INSERT INTO `authentication_log` VALUES (339, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Mobile Safari/537.36', NULL, '2022-05-29 09:50:42');
INSERT INTO `authentication_log` VALUES (343, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 10:06:36', NULL);
INSERT INTO `authentication_log` VALUES (344, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', NULL, '2022-05-29 10:44:00');
INSERT INTO `authentication_log` VALUES (346, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 10:44:21', '2022-05-29 11:18:11');
INSERT INTO `authentication_log` VALUES (347, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 10:59:17', NULL);
INSERT INTO `authentication_log` VALUES (348, 'App\\Models\\User', 1, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:01:09', NULL);
INSERT INTO `authentication_log` VALUES (349, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', NULL, '2022-05-29 11:02:24');
INSERT INTO `authentication_log` VALUES (351, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:06:16', '2022-05-29 11:07:26');
INSERT INTO `authentication_log` VALUES (353, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:12:43', '2022-05-29 11:13:25');
INSERT INTO `authentication_log` VALUES (358, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:26:02', '2022-05-29 11:31:19');
INSERT INTO `authentication_log` VALUES (362, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:33:13', '2022-05-29 11:33:47');
INSERT INTO `authentication_log` VALUES (370, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-01 11:06:08', NULL);
INSERT INTO `authentication_log` VALUES (371, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Mobile Safari/537.36', NULL, '2022-06-01 11:56:03');
INSERT INTO `authentication_log` VALUES (372, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-01 11:56:09', '2022-06-01 12:27:05');
INSERT INTO `authentication_log` VALUES (373, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', '2022-06-01 12:27:08', NULL);
INSERT INTO `authentication_log` VALUES (374, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-03 05:05:23', NULL);

-- ----------------------------
-- Table structure for balance
-- ----------------------------
DROP TABLE IF EXISTS `balance`;
CREATE TABLE `balance`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `debit` decimal(40, 2) NULL DEFAULT NULL,
  `credit` decimal(40, 2) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of balance
-- ----------------------------

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `debit` decimal(40, 2) NULL DEFAULT NULL,
  `credit` decimal(40, 2) NULL DEFAULT NULL,
  `daily_id` bigint(20) NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `withdrawal_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_withdrawal`(`withdrawal_id`) USING BTREE,
  INDEX `bonus_ibfk_2`(`user_id`) USING BTREE,
  INDEX `bonus_ibfk_3`(`daily_id`) USING BTREE,
  CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bonus_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bonus_ibfk_3` FOREIGN KEY (`daily_id`) REFERENCES `daily` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bonus
-- ----------------------------

-- ----------------------------
-- Table structure for contract
-- ----------------------------
DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value` int(11) NULL DEFAULT NULL,
  `benefit` int(11) NULL DEFAULT NULL,
  `minimum_withdrawal` double(10, 2) NULL DEFAULT NULL,
  `maximum_withdrawal` double(10, 2) NULL DEFAULT NULL,
  `fee_withdrawal` double(10, 2) NULL DEFAULT NULL,
  `sponsorship_benefits` double(10, 2) NULL DEFAULT NULL,
  `first_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `second_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `third_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `forth_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `pin_requirement` tinyint(4) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contract
-- ----------------------------
INSERT INTO `contract` VALUES (1, 'Bronze', 100, 250, 25.00, 50.00, 2.00, 10.00, 3.00, 2.00, 1.00, 1.00, 1, NULL, NULL);
INSERT INTO `contract` VALUES (2, 'Silver', 500, 1250, 25.00, 250.00, 2.00, 50.00, 15.00, 10.00, 5.00, 5.00, 1, NULL, NULL);
INSERT INTO `contract` VALUES (3, 'Gold', 1000, 2500, 25.00, 500.00, 2.00, 100.00, 30.00, 20.00, 10.00, 10.00, 1, NULL, NULL);
INSERT INTO `contract` VALUES (4, 'Platinum', 2000, 5000, 25.00, 1000.00, 2.00, 200.00, 60.00, 40.00, 20.00, 20.00, 2, NULL, NULL);
INSERT INTO `contract` VALUES (5, 'Diamond', 5000, 12500, 25.00, 2500.00, 2.00, 500.00, 150.00, 100.00, 50.00, 50.00, 3, NULL, NULL);
INSERT INTO `contract` VALUES (6, 'Crown', 10000, 25000, 25.00, 5000.00, 2.00, 1000.00, 300.00, 200.00, 100.00, 100.00, 5, NULL, NULL);

-- ----------------------------
-- Table structure for daily
-- ----------------------------
DROP TABLE IF EXISTS `daily`;
CREATE TABLE `daily`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `value` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daily
-- ----------------------------

-- ----------------------------
-- Table structure for deposit
-- ----------------------------
DROP TABLE IF EXISTS `deposit`;
CREATE TABLE `deposit`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `amount` decimal(20, 5) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `information` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operator_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `deposit_ibfk_1`(`user_id`) USING BTREE,
  CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of deposit
-- ----------------------------
INSERT INTO `deposit` VALUES (6, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 2000.00100, 2, '1234', NULL, '2022-06-03 10:26:40', '2022-06-03 10:26:43', NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `connection` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `queue` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payload` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exception` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for information
-- ----------------------------
DROP TABLE IF EXISTS `information`;
CREATE TABLE `information`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NULL DEFAULT NULL,
  `title` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `information_ibfk_1`(`id_user`) USING BTREE,
  CONSTRAINT `information_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of information
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payload` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_01_26_221915_create_coinpayment_transactions_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_11_26_000000_create_spammers_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_11_30_030150_create_coinpayment_transaction_items_table', 1);
INSERT INTO `migrations` VALUES (8, '2017_09_01_000000_create_authentication_log_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pin
-- ----------------------------
DROP TABLE IF EXISTS `pin`;
CREATE TABLE `pin`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `debit` int(11) NULL DEFAULT NULL,
  `credit` int(11) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `pin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pin
-- ----------------------------
INSERT INTO `pin` VALUES (1, 'Transfer from administrator', 0, 10000, 2, '2021-06-08 22:30:35', '2021-06-08 22:30:35', NULL);

-- ----------------------------
-- Table structure for recovery
-- ----------------------------
DROP TABLE IF EXISTS `recovery`;
CREATE TABLE `recovery`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `recovery_ibfk_1`(`email`) USING BTREE,
  CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recovery
-- ----------------------------

-- ----------------------------
-- Table structure for spammers
-- ----------------------------
DROP TABLE IF EXISTS `spammers`;
CREATE TABLE `spammers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `attempts` int(11) NOT NULL,
  `blocked_at` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spammers
-- ----------------------------

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` decimal(40, 2) NULL DEFAULT NULL,
  `kode` int(11) NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket
-- ----------------------------

-- ----------------------------
-- Table structure for turnover
-- ----------------------------
DROP TABLE IF EXISTS `turnover`;
CREATE TABLE `turnover`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `value` int(11) NULL DEFAULT NULL,
  `downline_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `turnover_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of turnover
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `free` tinyint(1) NOT NULL DEFAULT 0,
  `first_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `network` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ticket` tinyint(4) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `google2fa_secret` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `role` tinyint(1) NULL DEFAULT 1,
  `reinvest` tinyint(4) NULL DEFAULT 1,
  `upline_id` bigint(20) NULL DEFAULT NULL,
  `contract_id` bigint(20) NULL DEFAULT NULL,
  `security` int(11) NULL DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `member_user`(`username`) USING BTREE,
  INDEX `anggota_paket_id_fkey`(`contract_id`) USING BTREE,
  INDEX `user_ibfk_3`(`upline_id`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'administrator', '$2y$10$i2DDlTfbECGuQvOgbyeb2OQEnIP5ZDNz90OumlihjWVmFIccpTCyi', 0, '', 'Administrator', 'admin@bttgift.com', NULL, NULL, NULL, '', '93EqxEFNGKdyqTWwpFqikMahKiFWO8pXaOeMfOPMal7dSq7C5uH8fs6udyzb', 'XRRRPKm2DKjjnKWuhOhWgAjdO765CiRz907eXOfhTtCJDBLDRPNwWB44T5vr', 0, NULL, NULL, NULL, NULL, NULL, '2021-05-04 18:00:00', '2022-06-01 11:56:09', NULL);
INSERT INTO `user` VALUES (2, 'james', '$2y$10$lXYFgcOn2QaigUZC82DIHeh8niO052/Zvlnw/VgXGI1s864ByobPi', 1, '', 'James', 'andifajarlah@gmail.com', '12312312', NULL, NULL, '123123', '0eLBrzMF8rfM3de5j1uXcpKRDRrlaeiIqSEINfYG7wkZpoHjGDg0G44ZsEFj', NULL, 1, NULL, NULL, 6, 1234, '2022-04-10 03:09:31', '2021-06-08 22:30:35', '2022-06-03 05:05:23', NULL);

-- ----------------------------
-- Table structure for withdrawal
-- ----------------------------
DROP TABLE IF EXISTS `withdrawal`;
CREATE TABLE `withdrawal`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(15, 2) NOT NULL,
  `fee` decimal(15, 2) NOT NULL,
  `usdt_price` decimal(15, 10) NULL DEFAULT NULL,
  `usdt_amount` decimal(15, 2) NULL DEFAULT NULL,
  `txid` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `operator_id` bigint(20) NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `withdrawal_ibfk_1`(`user_id`) USING BTREE,
  INDEX `id_operator`(`operator_id`) USING BTREE,
  CONSTRAINT `withdrawal_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of withdrawal
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
