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

 Date: 27/05/2022 08:08:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for authentication_log
-- ----------------------------
DROP TABLE IF EXISTS `authentication_log`;
CREATE TABLE `authentication_log`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `authenticatable_id` bigint NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `authentication_log_authenticatable_type_authenticatable_id_index`(`authenticatable_type`, `authenticatable_id`) USING BTREE,
  INDEX `authenticatable_id`(`authenticatable_id`) USING BTREE,
  CONSTRAINT `authentication_log_ibfk_1` FOREIGN KEY (`authenticatable_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 322 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of authentication_log
-- ----------------------------
INSERT INTO `authentication_log` VALUES (1, 'App\\Models\\User', 2, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 16:14:24', '2022-04-16 16:15:41');
INSERT INTO `authentication_log` VALUES (2, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 16:15:30', NULL);
INSERT INTO `authentication_log` VALUES (4, 'App\\Models\\User', 1, '36.85.100.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/100.0.4896.77 Mobile/15E148 Safari/604.1', '2022-04-16 16:17:19', NULL);
INSERT INTO `authentication_log` VALUES (13, 'App\\Models\\User', 1, '36.85.100.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:08:39', NULL);
INSERT INTO `authentication_log` VALUES (17, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 17:14:08', NULL);
INSERT INTO `authentication_log` VALUES (27, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 19:27:20', '2022-04-16 19:27:42');
INSERT INTO `authentication_log` VALUES (28, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 19:28:43', '2022-04-16 19:29:12');
INSERT INTO `authentication_log` VALUES (29, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 19:29:30', '2022-04-16 19:30:11');
INSERT INTO `authentication_log` VALUES (30, 'App\\Models\\User', 2, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 19:30:19', '2022-04-16 19:31:28');
INSERT INTO `authentication_log` VALUES (31, 'App\\Models\\User', 2, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 19:31:38', '2022-04-16 20:19:58');
INSERT INTO `authentication_log` VALUES (37, 'App\\Models\\User', 1, '110.136.217.160', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-16 20:28:58', '2022-04-16 20:30:29');
INSERT INTO `authentication_log` VALUES (41, 'App\\Models\\User', 1, '36.85.100.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/100.0.4896.77 Mobile/15E148 Safari/604.1', '2022-04-17 00:30:18', NULL);
INSERT INTO `authentication_log` VALUES (47, 'App\\Models\\User', 1, '110.136.218.33', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-17 09:51:50', '2022-04-17 09:52:34');
INSERT INTO `authentication_log` VALUES (53, 'App\\Models\\User', 1, '114.122.164.153', 'Mozilla/5.0 (Linux; Android 12; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-17 17:54:24', '2022-04-17 18:44:29');
INSERT INTO `authentication_log` VALUES (54, 'App\\Models\\User', 1, '203.78.121.44', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/100.0.4896.85 Mobile/15E148 Safari/604.1', '2022-04-17 18:03:12', NULL);
INSERT INTO `authentication_log` VALUES (55, 'App\\Models\\User', 1, '114.122.164.153', 'Mozilla/5.0 (Linux; Android 12; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-17 18:47:21', NULL);
INSERT INTO `authentication_log` VALUES (61, 'App\\Models\\User', 2, '36.75.168.239', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148', '2022-04-18 13:50:45', '2022-04-18 13:51:15');
INSERT INTO `authentication_log` VALUES (63, 'App\\Models\\User', 2, '36.75.168.239', 'Mozilla/5.0 (Linux; Android 12; CPH2159 Build/SKQ1.210216.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-18 14:07:02', NULL);
INSERT INTO `authentication_log` VALUES (64, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-18 14:09:07', '2022-04-18 14:10:48');
INSERT INTO `authentication_log` VALUES (65, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 14:09:28', '2022-04-18 15:04:33');
INSERT INTO `authentication_log` VALUES (69, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 15:06:32', '2022-04-18 15:07:26');
INSERT INTO `authentication_log` VALUES (71, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-18 15:16:08', '2022-04-18 15:16:56');
INSERT INTO `authentication_log` VALUES (72, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 15:17:14', '2022-04-18 15:17:18');
INSERT INTO `authentication_log` VALUES (74, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 15:17:37', '2022-04-18 15:18:19');
INSERT INTO `authentication_log` VALUES (75, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-18 15:18:33', '2022-04-18 15:19:29');
INSERT INTO `authentication_log` VALUES (77, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-18 15:32:17', '2022-04-18 15:33:13');
INSERT INTO `authentication_log` VALUES (83, 'App\\Models\\User', 2, '2401:4900:4ccf:404a:47af:4703:2722:dbdc', 'Mozilla/5.0 (Linux; Android 12; Pixel 4a Build/SP2A.220305.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-19 12:01:43', NULL);
INSERT INTO `authentication_log` VALUES (84, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-19 12:05:12', NULL);
INSERT INTO `authentication_log` VALUES (89, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-19 16:51:29', '2022-04-19 16:52:21');
INSERT INTO `authentication_log` VALUES (96, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-20 10:37:41', NULL);
INSERT INTO `authentication_log` VALUES (102, 'App\\Models\\User', 1, '140.213.150.137', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-20 17:22:33', NULL);
INSERT INTO `authentication_log` VALUES (103, 'App\\Models\\User', 1, '140.213.150.137', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-21 00:31:06', NULL);
INSERT INTO `authentication_log` VALUES (109, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.88 Mobile Safari/537.36', '2022-04-21 11:11:42', '2022-04-21 11:16:21');
INSERT INTO `authentication_log` VALUES (112, 'App\\Models\\User', 1, '112.215.219.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0', '2022-04-21 15:53:43', NULL);
INSERT INTO `authentication_log` VALUES (118, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 10:51:35', '2022-04-22 10:52:27');
INSERT INTO `authentication_log` VALUES (119, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 10:52:34', '2022-04-22 10:52:37');
INSERT INTO `authentication_log` VALUES (120, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 10:52:49', '2022-04-22 11:08:49');
INSERT INTO `authentication_log` VALUES (121, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 11:09:06', '2022-04-22 11:25:37');
INSERT INTO `authentication_log` VALUES (122, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 11:25:53', '2022-04-22 11:40:09');
INSERT INTO `authentication_log` VALUES (123, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 11:40:20', '2022-04-22 19:18:06');
INSERT INTO `authentication_log` VALUES (124, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 13:08:57', '2022-04-22 13:17:29');
INSERT INTO `authentication_log` VALUES (126, 'App\\Models\\User', 1, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 13:17:41', '2022-04-22 13:19:39');
INSERT INTO `authentication_log` VALUES (129, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 13:19:58', '2022-04-22 13:27:39');
INSERT INTO `authentication_log` VALUES (137, 'App\\Models\\User', 1, '203.78.121.132', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-22 16:12:00', NULL);
INSERT INTO `authentication_log` VALUES (139, 'App\\Models\\User', 1, '140.213.126.38', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 16:20:19', NULL);
INSERT INTO `authentication_log` VALUES (140, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 16:20:52', '2022-04-22 16:21:56');
INSERT INTO `authentication_log` VALUES (143, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 16:22:19', NULL);
INSERT INTO `authentication_log` VALUES (146, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 12; SM-F916B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', NULL, '2022-04-22 16:36:32');
INSERT INTO `authentication_log` VALUES (147, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 16:37:14', '2022-04-22 16:47:08');
INSERT INTO `authentication_log` VALUES (150, 'App\\Models\\User', 1, '112.215.219.223', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 16:47:25', NULL);
INSERT INTO `authentication_log` VALUES (159, 'App\\Models\\User', 1, '140.213.126.121', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', NULL, '2022-04-22 18:25:56');
INSERT INTO `authentication_log` VALUES (160, 'App\\Models\\User', 2, '140.213.126.121', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 18:26:12', NULL);
INSERT INTO `authentication_log` VALUES (165, 'App\\Models\\User', 2, '110.136.217.230', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-22 19:18:13', NULL);
INSERT INTO `authentication_log` VALUES (180, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-23 18:47:44', '2022-04-23 18:51:38');
INSERT INTO `authentication_log` VALUES (183, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-23 18:51:49', NULL);
INSERT INTO `authentication_log` VALUES (185, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 00:43:20', NULL);
INSERT INTO `authentication_log` VALUES (188, 'App\\Models\\User', 2, '110.136.151.239', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-24 07:32:13', '2022-04-24 07:32:27');
INSERT INTO `authentication_log` VALUES (190, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 09:48:09', '2022-04-24 09:48:52');
INSERT INTO `authentication_log` VALUES (191, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 09:49:01', '2022-04-24 09:49:39');
INSERT INTO `authentication_log` VALUES (192, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 09:49:45', '2022-04-24 09:50:28');
INSERT INTO `authentication_log` VALUES (193, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 09:51:05', '2022-04-24 09:51:47');
INSERT INTO `authentication_log` VALUES (195, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-24 09:57:54', NULL);
INSERT INTO `authentication_log` VALUES (203, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-25 10:11:48', '2022-04-25 10:12:41');
INSERT INTO `authentication_log` VALUES (204, 'App\\Models\\User', 1, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-25 10:12:56', '2022-04-25 10:13:25');
INSERT INTO `authentication_log` VALUES (205, 'App\\Models\\User', 2, '110.136.218.228', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-25 10:35:11', '2022-04-25 10:38:13');
INSERT INTO `authentication_log` VALUES (217, 'App\\Models\\User', 2, '140.213.151.96', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-26 10:30:24', '2022-04-26 10:33:00');
INSERT INTO `authentication_log` VALUES (219, 'App\\Models\\User', 1, '140.213.151.96', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-26 10:33:17', '2022-04-26 10:33:36');
INSERT INTO `authentication_log` VALUES (220, 'App\\Models\\User', 2, '140.213.151.96', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-26 10:33:47', NULL);
INSERT INTO `authentication_log` VALUES (228, 'App\\Models\\User', 1, '110.136.216.147', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-26 20:43:49', NULL);
INSERT INTO `authentication_log` VALUES (242, 'App\\Models\\User', 1, '112.215.220.89', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-04-28 10:36:30', NULL);
INSERT INTO `authentication_log` VALUES (255, 'App\\Models\\User', 1, '203.78.121.71', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-28 19:33:19', NULL);
INSERT INTO `authentication_log` VALUES (263, 'App\\Models\\User', 1, '110.136.216.147', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-04-29 10:20:56', NULL);
INSERT INTO `authentication_log` VALUES (282, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.41 Mobile Safari/537.36', '2022-05-03 11:06:03', NULL);
INSERT INTO `authentication_log` VALUES (286, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.41 Mobile Safari/537.36', '2022-05-04 03:09:06', NULL);
INSERT INTO `authentication_log` VALUES (287, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-05-04 06:10:03', NULL);
INSERT INTO `authentication_log` VALUES (288, 'App\\Models\\User', 1, '110.136.218.174', 'Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F Build/M1AJQ; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.92 Mobile Safari/537.36', '2022-05-04 13:30:51', '2022-05-04 13:31:45');
INSERT INTO `authentication_log` VALUES (298, 'App\\Models\\User', 1, '110.136.218.3', 'Mozilla/5.0 (Linux; Android 12; SM-F916B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/101.0.4951.41 Mobile Safari/537.36', '2022-05-06 05:49:01', NULL);
INSERT INTO `authentication_log` VALUES (299, 'App\\Models\\User', 1, '110.136.218.3', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-05-06 05:49:02', NULL);
INSERT INTO `authentication_log` VALUES (306, 'App\\Models\\User', 1, '110.136.218.3', 'Mozilla/5.0 (Linux; Android 11; SM-A507FN Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36', '2022-05-08 07:43:19', NULL);
INSERT INTO `authentication_log` VALUES (308, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-23 14:22:36', NULL);
INSERT INTO `authentication_log` VALUES (309, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-24 04:51:33', '2022-05-24 04:51:43');
INSERT INTO `authentication_log` VALUES (310, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Mobile Safari/537.36', '2022-05-24 04:52:21', '2022-05-24 04:52:25');
INSERT INTO `authentication_log` VALUES (311, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Mobile Safari/537.36', '2022-05-24 04:52:52', NULL);
INSERT INTO `authentication_log` VALUES (312, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', NULL, '2022-05-24 05:13:35');
INSERT INTO `authentication_log` VALUES (313, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-24 05:13:38', '2022-05-24 06:29:18');
INSERT INTO `authentication_log` VALUES (314, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-24 06:34:05', NULL);
INSERT INTO `authentication_log` VALUES (315, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-25 02:46:39', '2022-05-25 05:38:51');
INSERT INTO `authentication_log` VALUES (316, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-25 05:42:21', '2022-05-25 05:42:25');
INSERT INTO `authentication_log` VALUES (317, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-25 05:42:37', '2022-05-25 05:46:40');
INSERT INTO `authentication_log` VALUES (318, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-25 05:49:35', NULL);
INSERT INTO `authentication_log` VALUES (319, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '2022-05-25 09:09:44', NULL);
INSERT INTO `authentication_log` VALUES (320, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-25 15:12:33', NULL);
INSERT INTO `authentication_log` VALUES (321, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '2022-05-25 15:42:31', NULL);

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `debit` decimal(40, 30) NULL DEFAULT NULL,
  `credit` decimal(40, 30) NULL DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `withdrawal_id` bigint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_withdrawal`(`withdrawal_id`) USING BTREE,
  INDEX `bonus_ibfk_2`(`user_id`) USING BTREE,
  CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bonus_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bonus
-- ----------------------------
INSERT INTO `bonus` VALUES (1, 'Ref. 8% of $ 2,000 by Frangky', 0.000000000000000000000000000000, 160.000000000000000000000000000000, 2, NULL, '2022-04-16 17:08:26', '2022-04-16 17:08:26', NULL);
INSERT INTO `bonus` VALUES (3, 'Lvl. 1 3% of $ 2,000 by Lalusunkar', 0.000000000000000000000000000000, 60.000000000000000000000000000000, 2, NULL, '2022-04-16 17:11:48', '2022-04-16 17:11:48', NULL);
INSERT INTO `bonus` VALUES (6, 'Lvl. 2 2% of $ 2,000 by rismajaya', 0.000000000000000000000000000000, 40.000000000000000000000000000000, 2, NULL, '2022-04-16 17:15:14', '2022-04-16 17:15:14', NULL);
INSERT INTO `bonus` VALUES (10, 'Lvl. 3 1% of $ 2,000 by Champion', 0.000000000000000000000000000000, 20.000000000000000000000000000000, 2, NULL, '2022-04-16 17:17:10', '2022-04-16 17:17:10', NULL);
INSERT INTO `bonus` VALUES (15, 'Lvl. 4 1% of $ 2,000 by Antiscem', 0.000000000000000000000000000000, 20.000000000000000000000000000000, 2, NULL, '2022-04-16 17:22:57', '2022-04-16 17:22:57', NULL);
INSERT INTO `bonus` VALUES (17, 'Lvl. 1 3% of $ 2,000 by Total', 0.000000000000000000000000000000, 60.000000000000000000000000000000, 2, NULL, '2022-04-18 14:09:41', '2022-04-18 14:09:41', NULL);
INSERT INTO `bonus` VALUES (19, 'Lvl. 1 3% of $ 2,000 by Luffy', 0.000000000000000000000000000000, 60.000000000000000000000000000000, 2, NULL, '2022-04-18 15:06:44', '2022-04-18 15:06:44', NULL);
INSERT INTO `bonus` VALUES (21, 'Lvl. 1 3% of $ 2,000 by Oyim', 0.000000000000000000000000000000, 60.000000000000000000000000000000, 2, NULL, '2022-04-18 15:16:21', '2022-04-18 15:16:21', NULL);
INSERT INTO `bonus` VALUES (26, 'Lvl. 2 2% of $ 2,000 by SSHARTIN', 0.000000000000000000000000000000, 40.000000000000000000000000000000, 2, NULL, '2022-04-20 10:38:09', '2022-04-20 10:38:09', NULL);
INSERT INTO `bonus` VALUES (27, 'Ref. 8% of $ 10,000 by Nusantara001', 0.000000000000000000000000000000, 800.000000000000000000000000000000, 2, NULL, '2022-04-22 13:17:54', '2022-04-22 13:17:54', NULL);
INSERT INTO `bonus` VALUES (29, 'Lvl. 1 3% of $ 1,000 by Iwan87', 0.000000000000000000000000000000, 30.000000000000000000000000000000, 2, NULL, '2022-04-22 16:20:32', '2022-04-22 16:20:32', NULL);
INSERT INTO `bonus` VALUES (31, 'Lvl. 1 3% of $ 1,000 by CUANBESAR', 0.000000000000000000000000000000, 30.000000000000000000000000000000, 2, NULL, '2022-04-22 16:47:35', '2022-04-22 16:47:35', NULL);
INSERT INTO `bonus` VALUES (33, 'Lvl. 1 3% of $ 1,000 by tukangmeubel asdfasdfa sdf asdfasdf asdf', 0.000000000000000000000000000000, 30.000000000000000000000000000000, 2, NULL, '2022-04-22 16:57:36', '2022-04-22 16:57:36', NULL);
INSERT INTO `bonus` VALUES (35, 'Lvl. 1 3% of $ 1,000 by sniper88', 0.000000000000000000000000000000, 30.000000000000000000000000000000, 2, NULL, '2022-04-23 18:48:02', '2022-04-23 18:48:02', NULL);
INSERT INTO `bonus` VALUES (36, 'Ref. 8% of $ 500 by Yasin', 0.000000000000000000000000000000, 40.000000000000000000000000000000, 2, NULL, '2022-04-26 10:33:31', '2022-04-26 10:33:31', NULL);
INSERT INTO `bonus` VALUES (38, 'Lvl. 1 3% of $ 100 by Cryptoqueen', 0.000000000000000000000000000000, 3.000000000000000000000000000000, 2, NULL, '2022-04-28 10:36:42', '2022-04-28 10:36:42', NULL);
INSERT INTO `bonus` VALUES (40, 'Lvl. 1 3% of $ 10,000 by Cryptoqueen25', 300.000000000000000000000000000000, 0.000000000000000000000000000000, 2, NULL, '2022-04-28 10:42:57', '2022-04-28 10:42:57', NULL);

-- ----------------------------
-- Table structure for contract
-- ----------------------------
DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value` int NULL DEFAULT NULL,
  `benefit` int NULL DEFAULT NULL,
  `minimum_withdrawal` double(10, 2) NULL DEFAULT NULL,
  `maximum_withdrawal` double(10, 2) NULL DEFAULT NULL,
  `fee_withdrawal` double(10, 2) NULL DEFAULT NULL,
  `sponsorship_benefits` double(10, 2) NULL DEFAULT NULL,
  `first_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `second_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `third_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `forth_level_benefits` double(10, 2) NULL DEFAULT NULL,
  `pin_requirement` tinyint NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

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
  `id` bigint NOT NULL AUTO_INCREMENT,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `amount` decimal(20, 10) NULL DEFAULT NULL,
  `requisite` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `owner_id` bigint NULL DEFAULT NULL,
  `user_id` bigint NULL DEFAULT NULL,
  `information` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operator_id` bigint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `deposit_ibfk_1`(`user_id`) USING BTREE,
  INDEX `deposit_ibfk_2`(`owner_id`) USING BTREE,
  CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `deposit_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of deposit
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `connection` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `queue` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payload` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exception` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for information
-- ----------------------------
DROP TABLE IF EXISTS `information`;
CREATE TABLE `information`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_user` bigint NULL DEFAULT NULL,
  `title` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `information_ibfk_1`(`id_user`) USING BTREE,
  CONSTRAINT `information_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of information
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payload` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pin
-- ----------------------------
DROP TABLE IF EXISTS `pin`;
CREATE TABLE `pin`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `debit` decimal(40, 30) NULL DEFAULT NULL,
  `credit` decimal(40, 30) NULL DEFAULT NULL,
  `user_id` bigint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `pin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pin
-- ----------------------------

-- ----------------------------
-- Table structure for recovery
-- ----------------------------
DROP TABLE IF EXISTS `recovery`;
CREATE TABLE `recovery`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `recovery_ibfk_1`(`email`) USING BTREE,
  CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of recovery
-- ----------------------------

-- ----------------------------
-- Table structure for spammers
-- ----------------------------
DROP TABLE IF EXISTS `spammers`;
CREATE TABLE `spammers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `attempts` int NOT NULL,
  `blocked_at` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of spammers
-- ----------------------------

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `contract_id` bigint NULL DEFAULT NULL,
  `kode` int NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_contract`(`contract_id`) USING BTREE,
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ticket
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `free` tinyint(1) NOT NULL DEFAULT 0,
  `first_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `network` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ticket` tinyint NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `google2fa_secret` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `role` tinyint(1) NULL DEFAULT 1,
  `upline_id` bigint NULL DEFAULT NULL,
  `contract_id` bigint NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'administrator', '$2y$10$KLMr09x4TTODgaoVQDk89.6sbGnWrKddwVI2OH7uWx336BQq7It2i', 0, '', 'Administrator', 'admin@bttgift.com', NULL, NULL, NULL, '', NULL, 'XRRRPKm2DKjjnKWuhOhWgAjdO765CiRz907eXOfhTtCJDBLDRPNwWB44T5vr', 0, NULL, NULL, NULL, NULL, '2021-05-05 01:00:00', '2022-05-08 07:43:20', NULL);
INSERT INTO `user` VALUES (2, 'james', '$2y$10$tn6E.B.11gddPobmpA2WYOR1P4oS9UtHSetsjGWJZxstSRrMsicLa', 1, '', 'James', 'andifajarlah@gmail.com', '$2y$10$KlmPuF4RBYKUJcHeCFwsBOiFaX2OkBzmC/oTzKGp3LNmHwv3RtSZO\r\n', NULL, NULL, '', 'erHWGIuxGyeISxVCH9PKyJwSzDkZc9T3J4eyN8P0sQEjp6XTB2V68pByeLin', NULL, 1, NULL, 6, '2022-04-10 10:09:31', '2030-10-07 10:10:31', '2021-06-09 05:30:35', '2022-05-25 15:42:31', NULL);

-- ----------------------------
-- Table structure for withdrawal
-- ----------------------------
DROP TABLE IF EXISTS `withdrawal`;
CREATE TABLE `withdrawal`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `wallet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(15, 2) NOT NULL,
  `fee` decimal(15, 2) NOT NULL,
  `usdt_price` decimal(15, 10) NULL DEFAULT NULL,
  `usdt_amount` decimal(15, 2) NULL DEFAULT NULL,
  `txid` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `operator_id` bigint NULL DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `withdrawal_ibfk_1`(`user_id`) USING BTREE,
  INDEX `id_operator`(`operator_id`) USING BTREE,
  CONSTRAINT `withdrawal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `withdrawal_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of withdrawal
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
