/*
 Navicat Premium Data Transfer

 Source Server         : Localhost 57
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : nicemetavest

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 30/05/2022 12:05:55
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of achievement
-- ----------------------------
INSERT INTO `achievement` VALUES (1, 2, 1000, 'Achievement 2', NULL, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 370 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `authentication_log` VALUES (345, 'App\\Models\\User', 17, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 10:44:08', NULL);
INSERT INTO `authentication_log` VALUES (346, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 10:44:21', '2022-05-29 11:18:11');
INSERT INTO `authentication_log` VALUES (347, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 10:59:17', NULL);
INSERT INTO `authentication_log` VALUES (348, 'App\\Models\\User', 1, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:01:09', NULL);
INSERT INTO `authentication_log` VALUES (349, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', NULL, '2022-05-29 11:02:24');
INSERT INTO `authentication_log` VALUES (350, 'App\\Models\\User', 17, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:02:33', '2022-05-29 11:06:04');
INSERT INTO `authentication_log` VALUES (351, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:06:16', '2022-05-29 11:07:26');
INSERT INTO `authentication_log` VALUES (352, 'App\\Models\\User', 17, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:07:34', '2022-05-29 11:12:36');
INSERT INTO `authentication_log` VALUES (353, 'App\\Models\\User', 2, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:12:43', '2022-05-29 11:13:25');
INSERT INTO `authentication_log` VALUES (354, 'App\\Models\\User', 17, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:13:43', '2022-05-29 11:16:24');
INSERT INTO `authentication_log` VALUES (355, 'App\\Models\\User', 18, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:16:43', '2022-05-29 11:24:40');
INSERT INTO `authentication_log` VALUES (356, 'App\\Models\\User', 17, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:18:18', '2022-05-29 11:25:53');
INSERT INTO `authentication_log` VALUES (357, 'App\\Models\\User', 23, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:24:50', '2022-05-29 11:28:38');
INSERT INTO `authentication_log` VALUES (358, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:26:02', '2022-05-29 11:31:19');
INSERT INTO `authentication_log` VALUES (359, 'App\\Models\\User', 26, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:28:46', '2022-05-29 11:32:51');
INSERT INTO `authentication_log` VALUES (360, 'App\\Models\\User', 29, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:31:28', '2022-05-29 11:33:00');
INSERT INTO `authentication_log` VALUES (361, 'App\\Models\\User', 30, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:33:00', '2022-05-29 11:34:58');
INSERT INTO `authentication_log` VALUES (362, 'App\\Models\\User', 2, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:33:13', '2022-05-29 11:33:47');
INSERT INTO `authentication_log` VALUES (363, 'App\\Models\\User', 17, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:33:54', '2022-05-29 11:41:40');
INSERT INTO `authentication_log` VALUES (364, 'App\\Models\\User', 26, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:35:06', '2022-05-29 11:35:33');
INSERT INTO `authentication_log` VALUES (365, 'App\\Models\\User', 30, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:35:40', '2022-05-29 11:37:16');
INSERT INTO `authentication_log` VALUES (366, 'App\\Models\\User', 31, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:37:23', '2022-05-29 11:38:58');
INSERT INTO `authentication_log` VALUES (367, 'App\\Models\\User', 32, '112.215.219.64', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:39:09', NULL);
INSERT INTO `authentication_log` VALUES (368, 'App\\Models\\User', 18, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 11:41:51', '2022-05-29 20:23:18');
INSERT INTO `authentication_log` VALUES (369, 'App\\Models\\User', 26, '36.85.100.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.61 Mobile Safari/537.36', '2022-05-29 20:23:36', NULL);

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `debit` decimal(40, 2) NULL DEFAULT NULL,
  `credit` decimal(40, 2) NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `withdrawal_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_withdrawal`(`withdrawal_id`) USING BTREE,
  INDEX `bonus_ibfk_2`(`user_id`) USING BTREE,
  CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bonus_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 109 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bonus
-- ----------------------------
INSERT INTO `bonus` VALUES (47, 'Ref. 10% of $ 2,000 by Atik', 0.00, 200.00, 2, NULL, '2022-05-29 11:01:25', '2022-05-29 11:01:25', NULL);
INSERT INTO `bonus` VALUES (48, 'Ref. 10% of $ 5,000 by Wildan', 0.00, 500.00, 17, NULL, '2022-05-29 11:08:34', '2022-05-29 11:08:34', NULL);
INSERT INTO `bonus` VALUES (49, 'Lvl. 1 3% of $ 5,000 by Wildan', 0.00, 150.00, 2, NULL, '2022-05-29 11:08:34', '2022-05-29 11:08:34', NULL);
INSERT INTO `bonus` VALUES (50, 'Ref. 10% of $ 10,000 by Tika', 0.00, 1000.00, 17, NULL, '2022-05-29 11:09:43', '2022-05-29 11:09:43', NULL);
INSERT INTO `bonus` VALUES (51, 'Lvl. 1 3% of $ 10,000 by Tika', 0.00, 300.00, 2, NULL, '2022-05-29 11:09:43', '2022-05-29 11:09:43', NULL);
INSERT INTO `bonus` VALUES (52, 'Ref. 10% of $ 5,000 by Lukas', 0.00, 500.00, 17, NULL, '2022-05-29 11:10:42', '2022-05-29 11:10:42', NULL);
INSERT INTO `bonus` VALUES (53, 'Lvl. 1 3% of $ 5,000 by Lukas', 0.00, 150.00, 2, NULL, '2022-05-29 11:10:42', '2022-05-29 11:10:42', NULL);
INSERT INTO `bonus` VALUES (54, 'Ref. 10% of $ 10,000 by Sugeng', 0.00, 1000.00, 17, NULL, '2022-05-29 11:14:39', '2022-05-29 11:14:39', NULL);
INSERT INTO `bonus` VALUES (55, 'Lvl. 1 3% of $ 10,000 by Sugeng', 0.00, 300.00, 2, NULL, '2022-05-29 11:14:39', '2022-05-29 11:14:39', NULL);
INSERT INTO `bonus` VALUES (56, 'Ref. 10% of $ 10,000 by Sari', 0.00, 1000.00, 17, NULL, '2022-05-29 11:15:24', '2022-05-29 11:15:24', NULL);
INSERT INTO `bonus` VALUES (57, 'Lvl. 1 3% of $ 10,000 by Sari', 0.00, 300.00, 2, NULL, '2022-05-29 11:15:24', '2022-05-29 11:15:24', NULL);
INSERT INTO `bonus` VALUES (58, 'Ref. 10% of $ 500 by Eril', 0.00, 50.00, 18, NULL, '2022-05-29 11:18:13', '2022-05-29 11:18:13', NULL);
INSERT INTO `bonus` VALUES (59, 'Lvl. 1 3% of $ 500 by Eril', 0.00, 15.00, 17, NULL, '2022-05-29 11:18:13', '2022-05-29 11:18:13', NULL);
INSERT INTO `bonus` VALUES (60, 'Lvl. 2 2% of $ 500 by Eril', 0.00, 10.00, 2, NULL, '2022-05-29 11:18:13', '2022-05-29 11:18:13', NULL);
INSERT INTO `bonus` VALUES (61, 'Ref. 10% of $ 10,000 by Opan', 0.00, 1000.00, 18, NULL, '2022-05-29 11:19:30', '2022-05-29 11:19:30', NULL);
INSERT INTO `bonus` VALUES (62, 'Lvl. 1 3% of $ 10,000 by Opan', 0.00, 300.00, 17, NULL, '2022-05-29 11:19:30', '2022-05-29 11:19:30', NULL);
INSERT INTO `bonus` VALUES (63, 'Lvl. 2 2% of $ 10,000 by Opan', 0.00, 200.00, 2, NULL, '2022-05-29 11:19:30', '2022-05-29 11:19:30', NULL);
INSERT INTO `bonus` VALUES (64, 'Ref. 10% of $ 5,000 by Tatik', 0.00, 500.00, 18, NULL, '2022-05-29 11:20:59', '2022-05-29 11:20:59', NULL);
INSERT INTO `bonus` VALUES (65, 'Lvl. 1 3% of $ 5,000 by Tatik', 0.00, 150.00, 17, NULL, '2022-05-29 11:20:59', '2022-05-29 11:20:59', NULL);
INSERT INTO `bonus` VALUES (66, 'Lvl. 2 2% of $ 5,000 by Tatik', 0.00, 100.00, 2, NULL, '2022-05-29 11:20:59', '2022-05-29 11:20:59', NULL);
INSERT INTO `bonus` VALUES (67, 'Ref. 10% of $ 5,000 by Oyim', 0.00, 500.00, 23, NULL, '2022-05-29 11:22:25', '2022-05-29 11:22:25', NULL);
INSERT INTO `bonus` VALUES (68, 'Lvl. 1 3% of $ 5,000 by Oyim', 0.00, 150.00, 18, NULL, '2022-05-29 11:22:25', '2022-05-29 11:22:25', NULL);
INSERT INTO `bonus` VALUES (69, 'Lvl. 2 2% of $ 5,000 by Oyim', 0.00, 100.00, 17, NULL, '2022-05-29 11:22:25', '2022-05-29 11:22:25', NULL);
INSERT INTO `bonus` VALUES (70, 'Lvl. 3 1% of $ 5,000 by Oyim', 0.00, 50.00, 2, NULL, '2022-05-29 11:22:25', '2022-05-29 11:22:25', NULL);
INSERT INTO `bonus` VALUES (71, 'Ref. 10% of $ 2,000 by Suro', 0.00, 200.00, 23, NULL, '2022-05-29 11:27:09', '2022-05-29 11:27:09', NULL);
INSERT INTO `bonus` VALUES (72, 'Lvl. 1 3% of $ 2,000 by Suro', 0.00, 60.00, 18, NULL, '2022-05-29 11:27:09', '2022-05-29 11:27:09', NULL);
INSERT INTO `bonus` VALUES (73, 'Lvl. 2 2% of $ 2,000 by Suro', 0.00, 40.00, 17, NULL, '2022-05-29 11:27:09', '2022-05-29 11:27:09', NULL);
INSERT INTO `bonus` VALUES (74, 'Lvl. 3 1% of $ 2,000 by Suro', 0.00, 20.00, 2, NULL, '2022-05-29 11:27:09', '2022-05-29 11:27:09', NULL);
INSERT INTO `bonus` VALUES (75, 'Ref. 10% of $ 1,000 by Parti', 0.00, 100.00, 23, NULL, '2022-05-29 11:28:00', '2022-05-29 11:28:00', NULL);
INSERT INTO `bonus` VALUES (76, 'Lvl. 1 3% of $ 1,000 by Parti', 0.00, 30.00, 18, NULL, '2022-05-29 11:28:00', '2022-05-29 11:28:00', NULL);
INSERT INTO `bonus` VALUES (77, 'Lvl. 2 2% of $ 1,000 by Parti', 0.00, 20.00, 17, NULL, '2022-05-29 11:28:00', '2022-05-29 11:28:00', NULL);
INSERT INTO `bonus` VALUES (78, 'Lvl. 3 1% of $ 1,000 by Parti', 0.00, 10.00, 2, NULL, '2022-05-29 11:28:00', '2022-05-29 11:28:00', NULL);
INSERT INTO `bonus` VALUES (79, 'Ref. 10% of $ 1,000 by Fajar', 0.00, 100.00, 26, NULL, '2022-05-29 11:29:43', '2022-05-29 11:29:43', NULL);
INSERT INTO `bonus` VALUES (80, 'Lvl. 1 3% of $ 1,000 by Fajar', 0.00, 30.00, 23, NULL, '2022-05-29 11:29:43', '2022-05-29 11:29:43', NULL);
INSERT INTO `bonus` VALUES (81, 'Lvl. 2 2% of $ 1,000 by Fajar', 0.00, 20.00, 18, NULL, '2022-05-29 11:29:43', '2022-05-29 11:29:43', NULL);
INSERT INTO `bonus` VALUES (82, 'Lvl. 3 1% of $ 1,000 by Fajar', 0.00, 10.00, 17, NULL, '2022-05-29 11:29:43', '2022-05-29 11:29:43', NULL);
INSERT INTO `bonus` VALUES (83, 'Lvl. 4 1% of $ 1,000 by Fajar', 0.00, 10.00, 2, NULL, '2022-05-29 11:29:43', '2022-05-29 11:29:43', NULL);
INSERT INTO `bonus` VALUES (84, 'Ref. 10% of $ 5,000 by Agus', 0.00, 500.00, 29, NULL, '2022-05-29 11:32:33', '2022-05-29 11:32:33', NULL);
INSERT INTO `bonus` VALUES (85, 'Lvl. 1 3% of $ 5,000 by Agus', 0.00, 150.00, 26, NULL, '2022-05-29 11:32:33', '2022-05-29 11:32:33', NULL);
INSERT INTO `bonus` VALUES (86, 'Lvl. 2 2% of $ 5,000 by Agus', 0.00, 100.00, 23, NULL, '2022-05-29 11:32:33', '2022-05-29 11:32:33', NULL);
INSERT INTO `bonus` VALUES (87, 'Lvl. 3 1% of $ 5,000 by Agus', 0.00, 50.00, 18, NULL, '2022-05-29 11:32:33', '2022-05-29 11:32:33', NULL);
INSERT INTO `bonus` VALUES (88, 'Lvl. 4 1% of $ 5,000 by Agus', 0.00, 50.00, 17, NULL, '2022-05-29 11:32:33', '2022-05-29 11:32:33', NULL);
INSERT INTO `bonus` VALUES (89, 'Ref. 10% of $ 2,000 by Suri', 0.00, 200.00, 30, NULL, '2022-05-29 11:36:32', '2022-05-29 11:36:32', NULL);
INSERT INTO `bonus` VALUES (90, 'Lvl. 1 3% of $ 2,000 by Suri', 0.00, 60.00, 29, NULL, '2022-05-29 11:36:32', '2022-05-29 11:36:32', NULL);
INSERT INTO `bonus` VALUES (91, 'Lvl. 2 2% of $ 2,000 by Suri', 0.00, 40.00, 26, NULL, '2022-05-29 11:36:32', '2022-05-29 11:36:32', NULL);
INSERT INTO `bonus` VALUES (92, 'Lvl. 3 1% of $ 2,000 by Suri', 0.00, 20.00, 23, NULL, '2022-05-29 11:36:32', '2022-05-29 11:36:32', NULL);
INSERT INTO `bonus` VALUES (93, 'Lvl. 4 1% of $ 2,000 by Suri', 0.00, 20.00, 18, NULL, '2022-05-29 11:36:32', '2022-05-29 11:36:32', NULL);
INSERT INTO `bonus` VALUES (94, 'Ref. 10% of $ 5,000 by Totok', 0.00, 500.00, 31, NULL, '2022-05-29 11:38:13', '2022-05-29 11:38:13', NULL);
INSERT INTO `bonus` VALUES (95, 'Lvl. 1 3% of $ 5,000 by Totok', 0.00, 150.00, 30, NULL, '2022-05-29 11:38:13', '2022-05-29 11:38:13', NULL);
INSERT INTO `bonus` VALUES (96, 'Lvl. 2 2% of $ 5,000 by Totok', 0.00, 100.00, 29, NULL, '2022-05-29 11:38:13', '2022-05-29 11:38:13', NULL);
INSERT INTO `bonus` VALUES (97, 'Lvl. 3 1% of $ 5,000 by Totok', 0.00, 50.00, 26, NULL, '2022-05-29 11:38:13', '2022-05-29 11:38:13', NULL);
INSERT INTO `bonus` VALUES (98, 'Lvl. 4 1% of $ 5,000 by Totok', 0.00, 50.00, 23, NULL, '2022-05-29 11:38:13', '2022-05-29 11:38:13', NULL);
INSERT INTO `bonus` VALUES (99, 'Ref. 10% of $ 10,000 by Uki', 0.00, 1000.00, 32, NULL, '2022-05-29 11:39:53', '2022-05-29 11:39:53', NULL);
INSERT INTO `bonus` VALUES (100, 'Lvl. 1 3% of $ 10,000 by Uki', 0.00, 300.00, 31, NULL, '2022-05-29 11:39:53', '2022-05-29 11:39:53', NULL);
INSERT INTO `bonus` VALUES (101, 'Lvl. 2 2% of $ 10,000 by Uki', 0.00, 200.00, 30, NULL, '2022-05-29 11:39:53', '2022-05-29 11:39:53', NULL);
INSERT INTO `bonus` VALUES (102, 'Lvl. 3 1% of $ 10,000 by Uki', 0.00, 100.00, 29, NULL, '2022-05-29 11:39:53', '2022-05-29 11:39:53', NULL);
INSERT INTO `bonus` VALUES (103, 'Lvl. 4 1% of $ 10,000 by Uki', 0.00, 100.00, 26, NULL, '2022-05-29 11:39:53', '2022-05-29 11:39:53', NULL);
INSERT INTO `bonus` VALUES (104, 'Ref. 10% of $ 10,000 by Pur', 0.00, 1000.00, 33, NULL, '2022-05-29 11:40:53', '2022-05-29 11:40:53', NULL);
INSERT INTO `bonus` VALUES (105, 'Lvl. 1 3% of $ 10,000 by Pur', 0.00, 300.00, 32, NULL, '2022-05-29 11:40:53', '2022-05-29 11:40:53', NULL);
INSERT INTO `bonus` VALUES (106, 'Lvl. 2 2% of $ 10,000 by Pur', 0.00, 200.00, 31, NULL, '2022-05-29 11:40:53', '2022-05-29 11:40:53', NULL);
INSERT INTO `bonus` VALUES (107, 'Lvl. 3 1% of $ 10,000 by Pur', 0.00, 100.00, 30, NULL, '2022-05-29 11:40:53', '2022-05-29 11:40:53', NULL);
INSERT INTO `bonus` VALUES (108, 'Lvl. 4 1% of $ 10,000 by Pur', 0.00, 100.00, 29, NULL, '2022-05-29 11:40:53', '2022-05-29 11:40:53', NULL);

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
-- Table structure for deposit
-- ----------------------------
DROP TABLE IF EXISTS `deposit`;
CREATE TABLE `deposit`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `amount` decimal(20, 10) NULL DEFAULT NULL,
  `requisite` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `owner_id` bigint(20) NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `information` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operator_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `deposit_ibfk_1`(`user_id`) USING BTREE,
  INDEX `deposit_ibfk_2`(`owner_id`) USING BTREE,
  CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `deposit_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deposit
-- ----------------------------
INSERT INTO `deposit` VALUES (13, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 2052.4060000000, 'Enrollment', 2, 17, '12345', 1, '2022-05-29 10:34:45', '2022-05-29 11:01:25', NULL, '2022-05-29 11:01:25');
INSERT INTO `deposit` VALUES (14, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 5131.0130000000, 'Enrollment', 17, 18, 'Fffffff', 1, '2022-05-29 11:08:20', '2022-05-29 11:08:34', NULL, '2022-05-29 11:08:34');
INSERT INTO `deposit` VALUES (15, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 10262.0250000000, 'Enrollment', 17, 19, 'Ttttt', 1, '2022-05-29 11:09:21', '2022-05-29 11:09:43', NULL, '2022-05-29 11:09:43');
INSERT INTO `deposit` VALUES (16, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 5131.0130000000, 'Enrollment', 17, 20, 'Llllll', 1, '2022-05-29 11:10:28', '2022-05-29 11:10:42', NULL, '2022-05-29 11:10:42');
INSERT INTO `deposit` VALUES (17, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 10262.0250000000, 'Enrollment', 17, 21, 'Sssss', 1, '2022-05-29 11:14:28', '2022-05-29 11:14:39', NULL, '2022-05-29 11:14:39');
INSERT INTO `deposit` VALUES (18, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 10262.0250000000, 'Enrollment', 17, 22, 'Saaaa', 1, '2022-05-29 11:15:12', '2022-05-29 11:15:24', NULL, '2022-05-29 11:15:24');
INSERT INTO `deposit` VALUES (19, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 513.1020000000, 'Enrollment', 18, 23, 'Errrr', 1, '2022-05-29 11:17:58', '2022-05-29 11:18:13', NULL, '2022-05-29 11:18:13');
INSERT INTO `deposit` VALUES (20, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 10262.0250000000, 'Enrollment', 18, 24, 'Opppp', 1, '2022-05-29 11:19:17', '2022-05-29 11:19:30', NULL, '2022-05-29 11:19:30');
INSERT INTO `deposit` VALUES (21, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 5131.0130000000, 'Enrollment', 18, 25, 'Taaaaa', 1, '2022-05-29 11:20:46', '2022-05-29 11:20:59', NULL, '2022-05-29 11:20:59');
INSERT INTO `deposit` VALUES (22, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 5131.0130000000, 'Enrollment', 17, 26, '1dfghjkk', 1, '2022-05-29 11:22:08', '2022-05-29 11:22:25', NULL, '2022-05-29 11:22:25');
INSERT INTO `deposit` VALUES (23, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 2052.4060000000, 'Enrollment', 23, 27, 'Suuuu', 1, '2022-05-29 11:26:57', '2022-05-29 11:27:09', NULL, '2022-05-29 11:27:09');
INSERT INTO `deposit` VALUES (24, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 1026.2030000000, 'Enrollment', 23, 28, 'Paaaaa', 1, '2022-05-29 11:27:49', '2022-05-29 11:28:00', NULL, '2022-05-29 11:28:00');
INSERT INTO `deposit` VALUES (25, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 1026.2740000000, 'Enrollment', 26, 29, 'Faaaaa', 1, '2022-05-29 11:29:29', '2022-05-29 11:29:43', NULL, '2022-05-29 11:29:43');
INSERT INTO `deposit` VALUES (26, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 5131.0130000000, 'Enrollment', 26, 30, 'Agus', 1, '2022-05-29 11:32:21', '2022-05-29 11:32:33', NULL, '2022-05-29 11:32:33');
INSERT INTO `deposit` VALUES (27, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 2052.5460000000, 'Enrollment', 30, 31, 'Surii', 1, '2022-05-29 11:36:20', '2022-05-29 11:36:32', NULL, '2022-05-29 11:36:32');
INSERT INTO `deposit` VALUES (28, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 5131.0130000000, 'Enrollment', 31, 32, 'Totok', 1, '2022-05-29 11:38:01', '2022-05-29 11:38:13', NULL, '2022-05-29 11:38:13');
INSERT INTO `deposit` VALUES (29, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 10262.0250000000, 'Enrollment', 32, 33, 'Uki', 1, '2022-05-29 11:39:42', '2022-05-29 11:39:53', NULL, '2022-05-29 11:39:53');
INSERT INTO `deposit` VALUES (30, '0x14Bf1DC530174E64B6Aa5AD368b41EBA86b677Aa', 10262.7270000000, 'Enrollment', 32, 34, 'Pur', 1, '2022-05-29 11:40:41', '2022-05-29 11:40:53', NULL, '2022-05-29 11:40:53');

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
-- Table structure for invalid
-- ----------------------------
DROP TABLE IF EXISTS `invalid`;
CREATE TABLE `invalid`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `value` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `invalid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `pin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pin
-- ----------------------------
INSERT INTO `pin` VALUES (1, 'Transfer from ', 0, 10000, 2, '2021-06-08 22:30:35', '2021-06-08 22:30:35');
INSERT INTO `pin` VALUES (19, 'Enrollment contract 2000 username Atik', 2, 0, 2, '2022-05-29 10:34:45', '2022-05-29 10:34:45');
INSERT INTO `pin` VALUES (20, 'Transferred from james', 0, 15, 17, '2022-05-29 11:07:16', '2022-05-29 11:07:16');
INSERT INTO `pin` VALUES (21, 'Transfer to Atik', 15, 0, 2, '2022-05-29 11:07:16', '2022-05-29 11:07:16');
INSERT INTO `pin` VALUES (22, 'Enrollment contract 5000 username Wildan', 3, 0, 17, '2022-05-29 11:08:20', '2022-05-29 11:08:20');
INSERT INTO `pin` VALUES (23, 'Enrollment contract 10000 username Tika', 5, 0, 17, '2022-05-29 11:09:21', '2022-05-29 11:09:21');
INSERT INTO `pin` VALUES (24, 'Enrollment contract 5000 username Lukas', 3, 0, 17, '2022-05-29 11:10:28', '2022-05-29 11:10:28');
INSERT INTO `pin` VALUES (25, 'Transferred from james', 0, 50, 17, '2022-05-29 11:13:21', '2022-05-29 11:13:21');
INSERT INTO `pin` VALUES (26, 'Transfer to Atik', 50, 0, 2, '2022-05-29 11:13:21', '2022-05-29 11:13:21');
INSERT INTO `pin` VALUES (27, 'Enrollment contract 10000 username Sugeng', 5, 0, 17, '2022-05-29 11:14:28', '2022-05-29 11:14:28');
INSERT INTO `pin` VALUES (28, 'Enrollment contract 10000 username Sari', 5, 0, 17, '2022-05-29 11:15:12', '2022-05-29 11:15:12');
INSERT INTO `pin` VALUES (29, 'Transferred from Atik', 0, 40, 18, '2022-05-29 11:16:15', '2022-05-29 11:16:15');
INSERT INTO `pin` VALUES (30, 'Transfer to Wildan', 40, 0, 17, '2022-05-29 11:16:15', '2022-05-29 11:16:15');
INSERT INTO `pin` VALUES (31, 'Enrollment contract 500 username Eril', 1, 0, 18, '2022-05-29 11:17:58', '2022-05-29 11:17:58');
INSERT INTO `pin` VALUES (32, 'Enrollment contract 10000 username Opan', 5, 0, 18, '2022-05-29 11:19:17', '2022-05-29 11:19:17');
INSERT INTO `pin` VALUES (33, 'Enrollment contract 5000 username Tatik', 3, 0, 18, '2022-05-29 11:20:46', '2022-05-29 11:20:46');
INSERT INTO `pin` VALUES (34, 'Enrollment contract 5000 username Oyim', 3, 0, 17, '2022-05-29 11:22:08', '2022-05-29 11:22:08');
INSERT INTO `pin` VALUES (35, 'Transferred from james', 0, 30, 23, '2022-05-29 11:26:22', '2022-05-29 11:26:22');
INSERT INTO `pin` VALUES (36, 'Transfer to Eril', 30, 0, 2, '2022-05-29 11:26:22', '2022-05-29 11:26:22');
INSERT INTO `pin` VALUES (37, 'Enrollment contract 2000 username Suro', 2, 0, 23, '2022-05-29 11:26:58', '2022-05-29 11:26:58');
INSERT INTO `pin` VALUES (38, 'Enrollment contract 1000 username Parti', 1, 0, 23, '2022-05-29 11:27:49', '2022-05-29 11:27:49');
INSERT INTO `pin` VALUES (39, 'Transferred from Eril', 0, 25, 26, '2022-05-29 11:28:26', '2022-05-29 11:28:26');
INSERT INTO `pin` VALUES (40, 'Transfer to Oyim', 25, 0, 23, '2022-05-29 11:28:26', '2022-05-29 11:28:26');
INSERT INTO `pin` VALUES (41, 'Enrollment contract 1000 username Fajar', 1, 0, 26, '2022-05-29 11:29:29', '2022-05-29 11:29:29');
INSERT INTO `pin` VALUES (42, 'Enrollment contract 5000 username Agus', 3, 0, 26, '2022-05-29 11:32:21', '2022-05-29 11:32:21');
INSERT INTO `pin` VALUES (43, 'Transferred from Oyim', 0, 20, 30, '2022-05-29 11:35:29', '2022-05-29 11:35:29');
INSERT INTO `pin` VALUES (44, 'Transfer to Agus', 20, 0, 26, '2022-05-29 11:35:29', '2022-05-29 11:35:29');
INSERT INTO `pin` VALUES (45, 'Enrollment contract 2000 username Suri', 2, 0, 30, '2022-05-29 11:36:20', '2022-05-29 11:36:20');
INSERT INTO `pin` VALUES (46, 'Transferred from Agus', 0, 16, 31, '2022-05-29 11:37:06', '2022-05-29 11:37:06');
INSERT INTO `pin` VALUES (47, 'Transfer to Suri', 16, 0, 30, '2022-05-29 11:37:06', '2022-05-29 11:37:06');
INSERT INTO `pin` VALUES (48, 'Enrollment contract 5000 username Totok', 3, 0, 31, '2022-05-29 11:38:01', '2022-05-29 11:38:01');
INSERT INTO `pin` VALUES (49, 'Transferred from Suri', 0, 12, 32, '2022-05-29 11:38:54', '2022-05-29 11:38:54');
INSERT INTO `pin` VALUES (50, 'Transfer to Totok', 12, 0, 31, '2022-05-29 11:38:54', '2022-05-29 11:38:54');
INSERT INTO `pin` VALUES (51, 'Enrollment contract 10000 username Uki', 5, 0, 32, '2022-05-29 11:39:42', '2022-05-29 11:39:42');
INSERT INTO `pin` VALUES (52, 'Enrollment contract 10000 username Pur', 5, 0, 32, '2022-05-29 11:40:41', '2022-05-29 11:40:41');

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
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contract_id` bigint(20) NULL DEFAULT NULL,
  `kode` int(11) NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_contract`(`contract_id`) USING BTREE,
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket` VALUES (11, 4, 1, '2022-05-29', '2022-05-29 10:34:45', '2022-05-29 10:34:45');
INSERT INTO `ticket` VALUES (12, 5, 1, '2022-05-29', '2022-05-29 11:08:20', '2022-05-29 11:08:20');
INSERT INTO `ticket` VALUES (13, 6, 1, '2022-05-29', '2022-05-29 11:09:21', '2022-05-29 11:09:21');
INSERT INTO `ticket` VALUES (14, 5, 1, '2022-05-29', '2022-05-29 11:10:28', '2022-05-29 11:10:28');
INSERT INTO `ticket` VALUES (15, 6, 1, '2022-05-29', '2022-05-29 11:14:28', '2022-05-29 11:14:28');
INSERT INTO `ticket` VALUES (16, 6, 1, '2022-05-29', '2022-05-29 11:15:12', '2022-05-29 11:15:12');
INSERT INTO `ticket` VALUES (17, 2, 1, '2022-05-29', '2022-05-29 11:17:58', '2022-05-29 11:17:58');
INSERT INTO `ticket` VALUES (18, 6, 1, '2022-05-29', '2022-05-29 11:19:17', '2022-05-29 11:19:17');
INSERT INTO `ticket` VALUES (19, 5, 1, '2022-05-29', '2022-05-29 11:20:46', '2022-05-29 11:20:46');
INSERT INTO `ticket` VALUES (20, 5, 1, '2022-05-29', '2022-05-29 11:22:08', '2022-05-29 11:22:08');
INSERT INTO `ticket` VALUES (21, 4, 1, '2022-05-29', '2022-05-29 11:26:57', '2022-05-29 11:26:57');
INSERT INTO `ticket` VALUES (22, 3, 1, '2022-05-29', '2022-05-29 11:27:49', '2022-05-29 11:27:49');
INSERT INTO `ticket` VALUES (23, 3, 1, '2022-05-29', '2022-05-29 11:29:29', '2022-05-29 11:29:29');
INSERT INTO `ticket` VALUES (24, 5, 1, '2022-05-29', '2022-05-29 11:32:21', '2022-05-29 11:32:21');
INSERT INTO `ticket` VALUES (25, 4, 1, '2022-05-29', '2022-05-29 11:36:20', '2022-05-29 11:36:20');
INSERT INTO `ticket` VALUES (26, 5, 1, '2022-05-29', '2022-05-29 11:38:01', '2022-05-29 11:38:01');
INSERT INTO `ticket` VALUES (27, 6, 1, '2022-05-29', '2022-05-29 11:39:42', '2022-05-29 11:39:42');
INSERT INTO `ticket` VALUES (28, 6, 1, '2022-05-29', '2022-05-29 11:40:41', '2022-05-29 11:40:41');

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
  `security` int(255) NULL DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `invalid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `member_user`(`username`) USING BTREE,
  INDEX `anggota_paket_id_fkey`(`contract_id`) USING BTREE,
  INDEX `user_ibfk_3`(`upline_id`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'administrator', '$2y$10$JlngtMF.CG0gXN6hADbKX.yj2M6nImCQ6J84SFPDrDb/N.WdYRA5K', 0, '', 'Administrator', 'admin@bttgift.com', NULL, NULL, NULL, '', NULL, 'XRRRPKm2DKjjnKWuhOhWgAjdO765CiRz907eXOfhTtCJDBLDRPNwWB44T5vr', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 18:00:00', '2022-05-29 11:01:09', NULL);
INSERT INTO `user` VALUES (2, 'james', '$2y$10$MzoVXMTXwnqizNTXgGyQHuxPLTlI57eVScANc6mLE6B2OKvzTnYmG', 1, '', 'James', 'andifajarlah@gmail.com', NULL, NULL, NULL, '', 'LD4LYocXxEyNJDCKcZ1wkS31D9nzhNy7wBJDtpW8HfcNb5E5qC5SISXknK0I', NULL, 1, NULL, NULL, 6, 1234, '2022-04-10 03:09:31', '2030-10-07 03:10:31', '2021-06-08 22:30:35', '2022-05-29 22:39:51', NULL);
INSERT INTO `user` VALUES (17, 'Atik', '$2y$10$7ysSw64ATTz1vRJoJnLd/eondPco9tQbrnkyKS25cD.Rj3HgVqee2', 0, 'atik', 'Atik', 'atik@gmail.com', NULL, '2.', NULL, '56677', NULL, NULL, 1, NULL, 2, 4, NULL, '2022-05-29 11:01:25', '2022-11-25 11:11:25', '2022-05-29 10:34:45', '2022-05-29 11:33:54', NULL);
INSERT INTO `user` VALUES (18, 'Wildan', '$2y$10$oPIyo76KB72xj223MXL7heklVO1zegeWCfeDV57FChdI85wyoRi7a', 0, 'wildan', 'Wildan', 'wildan@gmail.com', NULL, '2.17.', NULL, '08123456789', NULL, NULL, 1, NULL, 17, 5, NULL, '2022-05-29 11:08:34', '2022-11-25 11:11:34', '2022-05-29 11:08:20', '2022-05-29 11:41:51', NULL);
INSERT INTO `user` VALUES (19, 'Tika', '$2y$10$vO7bjAkVb6KIk2MbZKsXheAvVl2yM0ErRvqnkfFywihoXi6lhmqrm', 0, 'tika', 'Tika', 'tika@gmail.com', NULL, '2.17.', NULL, '08123456789', NULL, NULL, 1, NULL, 17, 6, NULL, '2022-05-29 11:09:43', '2022-11-25 11:11:43', '2022-05-29 11:09:21', '2022-05-29 11:09:43', NULL);
INSERT INTO `user` VALUES (20, 'Lukas', '$2y$10$eWbChgDniBPdXAHk9PqFUe/fX5pBjSd5tWuRi.JJknyjqd6KPG71e', 0, 'lukas', 'Lukas', 'lukas@gmail.com', NULL, '2.17.', NULL, '081234567890', NULL, NULL, 1, NULL, 17, 5, NULL, '2022-05-29 11:10:42', '2022-11-25 11:11:42', '2022-05-29 11:10:28', '2022-05-29 11:10:42', NULL);
INSERT INTO `user` VALUES (21, 'Sugeng', '$2y$10$17EnZOHlnSswyLoAcbGrQ.hXJp81.pQcjA/dIxVZu3YhUdRGep/gi', 0, 'sugeng', 'Sugeng', 'sugeng@gmail.com', NULL, '2.17.', NULL, '081234567890', NULL, NULL, 1, NULL, 17, 6, NULL, '2022-05-29 11:14:39', '2022-11-25 11:11:39', '2022-05-29 11:14:28', '2022-05-29 11:14:39', NULL);
INSERT INTO `user` VALUES (22, 'Sari', '$2y$10$kgmert8OsTqv6Bh79QSfTOd.kEOmkF5tYkgyxBS6tAsZScR6e5.Ky', 0, 'sari', 'Sari', 'sari@gmail.com', NULL, '2.17.', NULL, '081234567890', NULL, NULL, 1, NULL, 17, 6, NULL, '2022-05-29 11:15:24', '2022-11-25 11:11:24', '2022-05-29 11:15:12', '2022-05-29 11:15:24', NULL);
INSERT INTO `user` VALUES (23, 'Eril', '$2y$10$jEvDAAVW1Rnx9rrd9fj1GeOSSTOLJxi99XuLCAQ9F9KSIGcviIj.K', 0, 'eril', 'Eril', 'eril@gmail.com', NULL, '2.17.18.', NULL, '081234567890', NULL, NULL, 1, NULL, 18, 2, NULL, '2022-05-29 11:18:13', '2022-11-25 11:11:13', '2022-05-29 11:17:58', '2022-05-29 11:24:50', NULL);
INSERT INTO `user` VALUES (24, 'Opan', '$2y$10$3RHRdhhjBv03LiRMZw6fheAxF4GrL0XfzCvCsbmw0hyKJ7gQNoorm', 0, 'opan', 'Opan', 'opan@gmail.com', NULL, '2.17.18.', NULL, '081234567890', NULL, NULL, 1, NULL, 18, 6, NULL, '2022-05-29 11:19:30', '2022-11-25 11:11:30', '2022-05-29 11:19:17', '2022-05-29 11:19:30', NULL);
INSERT INTO `user` VALUES (25, 'Tatik', '$2y$10$YAPRGXrx7rBIu2AhzqGsdOGwhoMHF80SBV//MTDjivjpoa6NUYs32', 0, 'tatik', 'Tatik', 'tatik@gmail.com', NULL, '2.17.18.', NULL, '081234567890', NULL, NULL, 1, NULL, 18, 5, NULL, '2022-05-29 11:20:59', '2022-11-25 11:11:59', '2022-05-29 11:20:46', '2022-05-29 11:20:59', NULL);
INSERT INTO `user` VALUES (26, 'Oyim', '$2y$10$z6rR9SLtjwZS9FzEOsWrnOOFnj0mV2BiaUwxzqYTIQU111IfQwHpG', 0, 'oyim', 'Oyim', 'oyim@gmail.com', NULL, '2.17.18.23.', NULL, '12334', NULL, NULL, 1, NULL, 23, 5, NULL, '2022-05-29 11:22:25', '2022-11-25 11:11:25', '2022-05-29 11:22:08', '2022-05-29 20:23:37', NULL);
INSERT INTO `user` VALUES (27, 'Suro', '$2y$10$45sLXRs7THkY2x.qQ5//g.fXYEib4fv0kr3.Ir2PS2mA.nZH50vbG', 0, 'suro', 'Suro', 'suro@gmail.com', NULL, '2.17.18.23.', NULL, '081234567890', NULL, NULL, 1, NULL, 23, 4, NULL, '2022-05-29 11:27:09', '2022-11-25 11:11:09', '2022-05-29 11:26:57', '2022-05-29 11:27:09', NULL);
INSERT INTO `user` VALUES (28, 'Parti', '$2y$10$kQnew2Dy2v2gofvyKAMhxe4058Jb9Eeyi13BfSArLzan.3tzm77.K', 0, 'parti', 'Parti', 'parti@gmail.com', NULL, '2.17.18.23.', NULL, '081234567890', NULL, NULL, 1, NULL, 23, 3, NULL, '2022-05-29 11:28:00', '2022-11-25 11:11:00', '2022-05-29 11:27:49', '2022-05-29 11:28:00', NULL);
INSERT INTO `user` VALUES (29, 'Fajar', '$2y$10$NJmSm2u6TGx5Sl.6/iDUlOUTcZCV51BpCmMcvOS2KoBm.16obLLPu', 0, 'fajar', 'Fajar', 'fajar@gmail.com', NULL, '2.17.18.23.26.', NULL, '081234567890', NULL, NULL, 1, NULL, 26, 3, NULL, '2022-05-29 11:29:43', '2022-11-25 11:11:43', '2022-05-29 11:29:29', '2022-05-29 11:31:28', NULL);
INSERT INTO `user` VALUES (30, 'Agus', '$2y$10$GXmrlxc8N0CtltBWXjP2beSR2LDKjsGEZO4K25gYPr2UQoIC0cFaa', 0, 'agus', 'Agus', 'agus@gmail.com', NULL, '2.17.18.23.26.29.', NULL, '081234567890', NULL, NULL, 1, NULL, 29, 5, NULL, '2022-05-29 11:32:33', '2022-11-25 11:11:33', '2022-05-29 11:32:21', '2022-05-29 11:35:40', NULL);
INSERT INTO `user` VALUES (31, 'Suri', '$2y$10$F2/6aVNEUr1YECMUtWFG3.Juh0d4ggvoK2xx1bhdF3s43x5WNmqni', 0, 'suri', 'Suri', 'suri@gmail.com', NULL, '2.17.18.23.26.29.30.', NULL, '08123456780', NULL, NULL, 1, NULL, 30, 4, NULL, '2022-05-29 11:36:32', '2022-11-25 11:11:32', '2022-05-29 11:36:20', '2022-05-29 11:37:23', NULL);
INSERT INTO `user` VALUES (32, 'Totok', '$2y$10$/oGpGCvY1m9wDRjqQ9hH7usV6dpfwKWHihduDgzaLcu239O01lWZ6', 0, 'totok', 'Totok', 'totok@gmail.com', NULL, '2.17.18.23.26.29.30.31.', NULL, '081234567890', NULL, NULL, 1, NULL, 31, 5, NULL, '2022-05-29 11:38:13', '2022-11-25 11:11:13', '2022-05-29 11:38:01', '2022-05-29 11:39:10', NULL);
INSERT INTO `user` VALUES (33, 'Uki', '$2y$10$0k8gUe5cCs.Q62B5hZKxCOSQbohc1Z0Besj2Bm1QtuPgE.9Eqr6gO', 0, 'uki', 'Uki', 'uki@gmail.com', NULL, '2.17.18.23.26.29.30.31.32.', NULL, '081234567890', NULL, NULL, 1, NULL, 32, 6, NULL, '2022-05-29 11:39:53', '2022-11-25 11:11:53', '2022-05-29 11:39:42', '2022-05-29 11:39:53', NULL);
INSERT INTO `user` VALUES (34, 'Pur', '$2y$10$b15MHOOZUXSClbkO12zuQ.n9XO4fpHZTy1Xav5rzK.eELvCbuFpXC', 0, 'pur', 'Pur', 'pur@gmail.com', NULL, '2.17.18.23.26.29.30.31.32.33.', NULL, '081234567890', NULL, NULL, 1, NULL, 33, 6, NULL, '2022-05-29 11:40:53', '2022-11-25 11:11:53', '2022-05-29 11:40:41', '2022-05-29 11:40:53', NULL);

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
  CONSTRAINT `withdrawal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `withdrawal_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
